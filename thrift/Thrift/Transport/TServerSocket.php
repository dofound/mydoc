<?php
namespace Thrift\Transport;
use Thrift\Transport\TServerTransport;

class TServerSocket extends TServerTransport {
	private $streamListening;
	private $streamList = array();
	private $clientList = array();
	/**
	 * Start listening
	*/
	public function listen() {
		$this->streamList[] = $this->streamListening = stream_socket_server($this->host_);
	}
	public function isOpen() {
		return is_resource($this->streamListening);
	}
	public function close() {
		@fclose($this->streamListening);
		$this->streamListening = null;
	}
	public function select($processor, $timeout = 30) {
		static $errors = 0;
		set_time_limit(60);
		$read = $this->streamList;
		$write = $except = array();
		$ret = stream_select($read, $write, $except, $timeout);
		if($ret === false) { // Error while select
			$errors++;
			echo "Select error num $errors\n";
			if($errors > 20) return new Exception('Error while stream_select');
			else return 0;
		} elseif ($ret > 0) { // Some data available
			if($errors > 0) {
				echo "Clearing $errors errors\n";
				$errors = 0; // Clear errors

			}
			// Process all available sockets
			foreach($read as $stream) {
				// Listening socket has changes -> accept new connections
				if($stream == $this->streamListening) {
					$newStream = stream_socket_accept($this->streamListening);
					$this->streamList[] = $newStream;
					// Add new client
					$sock = new TClientSocket($newStream);
					$transport = new TBufferedTransport($sock);
					$proto = new TBinaryProtocol($transport, true, true);
					$this->clientList["$newStream"] = $proto;
					// Open transport
					$transport->open();
				}
				// It's our client
				elseif ($client = $this->clientList["$stream"]) {
					try {
						$processor->process($client, $client);
					}
					catch(TTransportException $e) {
						$this->disconnect($stream);
					}
					catch(TException $e) {
						echo "Error: " . $e->getMessage() . "\n";
						$this->disconnect($stream);
					}
				}
			}
		}
		return $ret;
	}
	// close
	public function disconnect($stream) {
		// Close socket
		stream_socket_shutdown($stream, STREAM_SHUT_RDWR);
		$key = array_search($this->clientList["$stream"], $this->clientList);
		unset($this->clientList[$key]);
		$key = array_search($stream, $this->streamList);
		unset($this->streamList[$key]);
	}
}