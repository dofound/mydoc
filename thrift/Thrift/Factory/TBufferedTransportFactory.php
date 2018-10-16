<?php
namespace Thrift\Factory;

use Thrift\Factory\TTransportFactory;
use Thrift\Transport\TTransport;
use Thrift\Transport\TBufferedTransport;

class TBufferedTransportFactory extends TTransportFactory
{
	private static $rBufSize = 512;
	private static $wBufSize = 512;
	public function __construct($rBufSize=512, $wBufSize=512){
		self::$rBufSize = $rBufSize;
		self::$wBufSize = $wBufSize;
	}
	/**
	 * @static
	 * @param TTransport $transport
	 * @return TTransport
	 */
	public static function getTransport(TTransport $transport)
	{
		return new TBufferedTransport($transport, self::$rBufSize, self::$wBufSize);
	}
}