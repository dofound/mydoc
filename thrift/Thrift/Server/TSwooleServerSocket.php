<?php
namespace Thrift\Server;
use Thrift\Server\TServerTransport;
class TSwooleServerSocket extends TServerTransport{
	const TCP = 1;
	const UDP = 2;
	protected $pServer = null;
	protected $arrConfig = array(
			'worker_num' => 8,
			'task_worker_num' => 4,
			//'max_request' => 0, #必须设置为0否则并发任务容易丢
			'task_max_request' => 4000,
			//'daemonize' => 1,
	);
	public function __construct($p_strHost = "127.0.0.1", $p_nPort =2015, $p_nProtocol = ""){
		$this->pServer = new \swoole_server($p_strHost, $p_nPort);
		$this->pServer->set($this->arrConfig);
		$this->pServer->on('start', array($this, 'onStart'));
		$this->pServer->on('shutdown', array($this, 'onShutdown'));
		$this->pServer->on('workerstart', array($this, 'onWorkerStart'));
		$this->pServer->on('workerstop', array($this, 'onWorkerStop'));
		$this->pServer->on('workererror', array($this, 'onWorkerError'));
		$this->pServer->on('task', array($this, 'onTask'));
		$this->pServer->on('finish', array($this, 'onFinish'));
		$this->pServer->on('connect', array($this, 'onConnect'));
		$this->pServer->on('receive', array($this, 'onReceive'));
		$this->pServer->on('close', array($this, 'onClose'));
	}
	public function start(){
	
		$this->pServer->start();
	}
	public function onStart($p_pServer){
		echo "Start\n";
	}
	public function onShutdown($p_pServer){
		echo "ShutDown\n";
	}
	public function onWorkerStart($p_pServer, $p_nWorkerID){
		echo "Worker Start:".$p_nWorkerID."\n";
	}
	public function onWorkerStop($p_pServer, $p_nWorkerID){
		echo "Worker Stop:".$p_nWorkerID."\n";
	}
	public function onWorkerError($p_pServer ,$p_nWorkerID, $p_nWorkerPID, $p_nErrorCode){
		echo "Worker Error:".$p_nErrorCode."\n";
	}
	public function onTask($p_pServer, $p_nTaskID, $p_nFromID, $p_strData){
		echo "Task:".$p_nTaskID.",Data:".$p_strData."\n";
		//sleep(3);
		//TODO 使用内存二进制交换数据
		$arrData =  json_decode($p_strData, true);
		$p_pServer->send($arrData['fd'] ,"From Task ");
		$p_pServer->finish(" Task Finsh");
	}
	public function onFinish($p_pServer, $p_nTaskID, $p_strData){
		echo "Task:".$p_nTaskID.",Data:".$p_strData."\n";
	}
	public function onConnect($p_pServer, $p_pFd){
		echo "Client:Connect.\n";
	}
	public function onReceive($p_pServer, $p_pFd, $p_nFromID, $p_strData){
		echo "Recv:".$p_strData."\n";
	
		//$pServer->task(json_encode(array('data' => $strData,'fd' => $fd)));
	
		//$pServer->send($fd, 'Swoole: '.$strData);
		$arrData = json_decode($p_strData);
		//反射执行，以便做权限或参数校验或thrift
		$mxResut = call_user_func_array(array($arrData['service'], $arrData['method']), $arrData['params']);
		$p_pServer->send($p_pFd, json_encode($mxResut));
		//sleep(5);
		//$pServer->close($fd);
	}
	public function onClose($p_pServer, $p_pFd){
		echo "Client: Close.\n";
	}
	public function exceptionHandle(){
	
	}
	public function errorHandle(){
	
	}
	public function __destruct(){
		$this->pServer->shutdown();
	}
	/* (non-PHPdoc)
	 * @see \Thrift\Server\TServerTransport::listen()
	 */
	public function listen() {
		// TODO Auto-generated method stub
		$this->start();
	}

	/* (non-PHPdoc)
	 * @see \Thrift\Server\TServerTransport::close()
	 */
	public function close() {
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see \Thrift\Server\TServerTransport::acceptImpl()
	 */
	protected function acceptImpl() {
		// TODO Auto-generated method stub
		
	}

	
}