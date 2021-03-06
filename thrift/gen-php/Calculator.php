<?php
namespace ;
/**
 * Autogenerated by Thrift Compiler (1.0.0-dev)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


interface CalculatorIf {
  /**
   * @param \ArithmeticOperation $op
   * @return double
   * @throws \ArithmeticException
   */
  public function calc(\ArithmeticOperation $op);
  /**
   * @param \Matrix $A
   * @param \Matrix $B
   * @return \Matrix
   * @throws \MatrixException
   */
  public function mult(\Matrix $A, \Matrix $B);
  /**
   * @param \Matrix $A
   * @return \Matrix
   * @throws \MatrixException
   */
  public function transpose(\Matrix $A);
}

class CalculatorClient implements \CalculatorIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function calc(\ArithmeticOperation $op)
  {
    $this->send_calc($op);
    return $this->recv_calc();
  }

  public function send_calc(\ArithmeticOperation $op)
  {
    $args = new \Calculator_calc_args();
    $args->op = $op;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'calc', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('calc', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_calc()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\Calculator_calc_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \Calculator_calc_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->ae !== null) {
      throw $result->ae;
    }
    throw new \Exception("calc failed: unknown result");
  }

  public function mult(\Matrix $A, \Matrix $B)
  {
    $this->send_mult($A, $B);
    return $this->recv_mult();
  }

  public function send_mult(\Matrix $A, \Matrix $B)
  {
    $args = new \Calculator_mult_args();
    $args->A = $A;
    $args->B = $B;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'mult', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('mult', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_mult()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\Calculator_mult_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \Calculator_mult_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->me !== null) {
      throw $result->me;
    }
    throw new \Exception("mult failed: unknown result");
  }

  public function transpose(\Matrix $A)
  {
    $this->send_transpose($A);
    return $this->recv_transpose();
  }

  public function send_transpose(\Matrix $A)
  {
    $args = new \Calculator_transpose_args();
    $args->A = $A;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'transpose', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('transpose', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_transpose()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\Calculator_transpose_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \Calculator_transpose_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->me !== null) {
      throw $result->me;
    }
    throw new \Exception("transpose failed: unknown result");
  }

}

// HELPER FUNCTIONS AND STRUCTURES

class Calculator_calc_args {
  static $_TSPEC;

  /**
   * @var \ArithmeticOperation
   */
  public $op = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'op',
          'type' => TType::STRUCT,
          'class' => '\ArithmeticOperation',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['op'])) {
        $this->op = $vals['op'];
      }
    }
  }

  public function getName() {
    return 'Calculator_calc_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->op = new \ArithmeticOperation();
            $xfer += $this->op->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Calculator_calc_args');
    if ($this->op !== null) {
      if (!is_object($this->op)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('op', TType::STRUCT, 1);
      $xfer += $this->op->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Calculator_calc_result {
  static $_TSPEC;

  /**
   * @var double
   */
  public $success = null;
  /**
   * @var \ArithmeticException
   */
  public $ae = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        0 => array(
          'var' => 'success',
          'type' => TType::DOUBLE,
          ),
        1 => array(
          'var' => 'ae',
          'type' => TType::STRUCT,
          'class' => '\ArithmeticException',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['ae'])) {
        $this->ae = $vals['ae'];
      }
    }
  }

  public function getName() {
    return 'Calculator_calc_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->success);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->ae = new \ArithmeticException();
            $xfer += $this->ae->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Calculator_calc_result');
    if ($this->success !== null) {
      $xfer += $output->writeFieldBegin('success', TType::DOUBLE, 0);
      $xfer += $output->writeDouble($this->success);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ae !== null) {
      $xfer += $output->writeFieldBegin('ae', TType::STRUCT, 1);
      $xfer += $this->ae->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Calculator_mult_args {
  static $_TSPEC;

  /**
   * @var \Matrix
   */
  public $A = null;
  /**
   * @var \Matrix
   */
  public $B = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'A',
          'type' => TType::STRUCT,
          'class' => '\Matrix',
          ),
        2 => array(
          'var' => 'B',
          'type' => TType::STRUCT,
          'class' => '\Matrix',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['A'])) {
        $this->A = $vals['A'];
      }
      if (isset($vals['B'])) {
        $this->B = $vals['B'];
      }
    }
  }

  public function getName() {
    return 'Calculator_mult_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->A = new \Matrix();
            $xfer += $this->A->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->B = new \Matrix();
            $xfer += $this->B->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Calculator_mult_args');
    if ($this->A !== null) {
      if (!is_object($this->A)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('A', TType::STRUCT, 1);
      $xfer += $this->A->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->B !== null) {
      if (!is_object($this->B)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('B', TType::STRUCT, 2);
      $xfer += $this->B->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Calculator_mult_result {
  static $_TSPEC;

  /**
   * @var \Matrix
   */
  public $success = null;
  /**
   * @var \MatrixException
   */
  public $me = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        0 => array(
          'var' => 'success',
          'type' => TType::STRUCT,
          'class' => '\Matrix',
          ),
        1 => array(
          'var' => 'me',
          'type' => TType::STRUCT,
          'class' => '\MatrixException',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['me'])) {
        $this->me = $vals['me'];
      }
    }
  }

  public function getName() {
    return 'Calculator_mult_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \Matrix();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->me = new \MatrixException();
            $xfer += $this->me->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Calculator_mult_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->me !== null) {
      $xfer += $output->writeFieldBegin('me', TType::STRUCT, 1);
      $xfer += $this->me->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Calculator_transpose_args {
  static $_TSPEC;

  /**
   * @var \Matrix
   */
  public $A = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'A',
          'type' => TType::STRUCT,
          'class' => '\Matrix',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['A'])) {
        $this->A = $vals['A'];
      }
    }
  }

  public function getName() {
    return 'Calculator_transpose_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->A = new \Matrix();
            $xfer += $this->A->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Calculator_transpose_args');
    if ($this->A !== null) {
      if (!is_object($this->A)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('A', TType::STRUCT, 1);
      $xfer += $this->A->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Calculator_transpose_result {
  static $_TSPEC;

  /**
   * @var \Matrix
   */
  public $success = null;
  /**
   * @var \MatrixException
   */
  public $me = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        0 => array(
          'var' => 'success',
          'type' => TType::STRUCT,
          'class' => '\Matrix',
          ),
        1 => array(
          'var' => 'me',
          'type' => TType::STRUCT,
          'class' => '\MatrixException',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['me'])) {
        $this->me = $vals['me'];
      }
    }
  }

  public function getName() {
    return 'Calculator_transpose_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \Matrix();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->me = new \MatrixException();
            $xfer += $this->me->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Calculator_transpose_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->me !== null) {
      $xfer += $output->writeFieldBegin('me', TType::STRUCT, 1);
      $xfer += $this->me->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


