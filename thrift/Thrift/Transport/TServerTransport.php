<?php
namespace Thrift\Transport;
abstract class TServerTransport {
	abstract function listen();
	abstract function close();
}