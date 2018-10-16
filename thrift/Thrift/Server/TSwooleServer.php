<?php
namespace Thrift\Server;
use Thrift\Server\TServer;
use Thrift\Transport\TTransport;
class TSwooleServer extends TServer{
	/* (non-PHPdoc)
	 * @see \Thrift\Server\TServer::serve()
	 */
	public function serve() {
		// TODO Auto-generated method stub
		//$this->transport_->setCallback(array($this, 'handleRequest'));
		$this->transport_->listen();
	}

	/* (non-PHPdoc)
	 * @see \Thrift\Server\TServer::stop()
	 */
	public function stop() {
		// TODO Auto-generated method stub
		$this->transport_->close();
	}
	public function handleRequest(TTransport $transport) {
		$protocol = new TBinaryProtocol($transport, true, true);
		$this->processor_->process($protocol, $protocol);
	}

	
}