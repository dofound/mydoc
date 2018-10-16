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


final class BinaryOperation {
  const ADDITION = 1;
  const SUBTRACTION = 2;
  const MULTIPLICATION = 3;
  const DIVISION = 4;
  const MODULUS = 5;
  static public $__names = array(
    1 => 'ADDITION',
    2 => 'SUBTRACTION',
    3 => 'MULTIPLICATION',
    4 => 'DIVISION',
    5 => 'MODULUS',
  );
}

class ArithmeticOperation {
  static $_TSPEC;

  /**
   * @var int
   */
  public $op = null;
  /**
   * @var double
   */
  public $lh_term = null;
  /**
   * @var double
   */
  public $rh_term = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'op',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'lh_term',
          'type' => TType::DOUBLE,
          ),
        3 => array(
          'var' => 'rh_term',
          'type' => TType::DOUBLE,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['op'])) {
        $this->op = $vals['op'];
      }
      if (isset($vals['lh_term'])) {
        $this->lh_term = $vals['lh_term'];
      }
      if (isset($vals['rh_term'])) {
        $this->rh_term = $vals['rh_term'];
      }
    }
  }

  public function getName() {
    return 'ArithmeticOperation';
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
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->op);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->lh_term);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->rh_term);
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
    $xfer += $output->writeStructBegin('ArithmeticOperation');
    if ($this->op !== null) {
      $xfer += $output->writeFieldBegin('op', TType::I32, 1);
      $xfer += $output->writeI32($this->op);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->lh_term !== null) {
      $xfer += $output->writeFieldBegin('lh_term', TType::DOUBLE, 2);
      $xfer += $output->writeDouble($this->lh_term);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->rh_term !== null) {
      $xfer += $output->writeFieldBegin('rh_term', TType::DOUBLE, 3);
      $xfer += $output->writeDouble($this->rh_term);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class ArithmeticException extends TException {
  static $_TSPEC;

  /**
   * @var string
   */
  public $msg = null;
  /**
   * @var double
   */
  public $x = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'msg',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'x',
          'type' => TType::DOUBLE,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['msg'])) {
        $this->msg = $vals['msg'];
      }
      if (isset($vals['x'])) {
        $this->x = $vals['x'];
      }
    }
  }

  public function getName() {
    return 'ArithmeticException';
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
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->msg);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->x);
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
    $xfer += $output->writeStructBegin('ArithmeticException');
    if ($this->msg !== null) {
      $xfer += $output->writeFieldBegin('msg', TType::STRING, 1);
      $xfer += $output->writeString($this->msg);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->x !== null) {
      $xfer += $output->writeFieldBegin('x', TType::DOUBLE, 2);
      $xfer += $output->writeDouble($this->x);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Matrix {
  static $_TSPEC;

  /**
   * @var int
   */
  public $rows = null;
  /**
   * @var int
   */
  public $cols = null;
  /**
   * @var double[][]
   */
  public $data = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'rows',
          'type' => TType::I64,
          ),
        2 => array(
          'var' => 'cols',
          'type' => TType::I64,
          ),
        3 => array(
          'var' => 'data',
          'type' => TType::LST,
          'etype' => TType::LST,
          'elem' => array(
            'type' => TType::LST,
            'etype' => TType::DOUBLE,
            'elem' => array(
              'type' => TType::DOUBLE,
              ),
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['rows'])) {
        $this->rows = $vals['rows'];
      }
      if (isset($vals['cols'])) {
        $this->cols = $vals['cols'];
      }
      if (isset($vals['data'])) {
        $this->data = $vals['data'];
      }
    }
  }

  public function getName() {
    return 'Matrix';
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
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->rows);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->cols);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::LST) {
            $this->data = array();
            $_size0 = 0;
            $_etype3 = 0;
            $xfer += $input->readListBegin($_etype3, $_size0);
            for ($_i4 = 0; $_i4 < $_size0; ++$_i4)
            {
              $elem5 = null;
              $elem5 = array();
              $_size6 = 0;
              $_etype9 = 0;
              $xfer += $input->readListBegin($_etype9, $_size6);
              for ($_i10 = 0; $_i10 < $_size6; ++$_i10)
              {
                $elem11 = null;
                $xfer += $input->readDouble($elem11);
                $elem5 []= $elem11;
              }
              $xfer += $input->readListEnd();
              $this->data []= $elem5;
            }
            $xfer += $input->readListEnd();
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
    $xfer += $output->writeStructBegin('Matrix');
    if ($this->rows !== null) {
      $xfer += $output->writeFieldBegin('rows', TType::I64, 1);
      $xfer += $output->writeI64($this->rows);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->cols !== null) {
      $xfer += $output->writeFieldBegin('cols', TType::I64, 2);
      $xfer += $output->writeI64($this->cols);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->data !== null) {
      if (!is_array($this->data)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('data', TType::LST, 3);
      {
        $output->writeListBegin(TType::LST, count($this->data));
        {
          foreach ($this->data as $iter12)
          {
            {
              $output->writeListBegin(TType::DOUBLE, count($iter12));
              {
                foreach ($iter12 as $iter13)
                {
                  $xfer += $output->writeDouble($iter13);
                }
              }
              $output->writeListEnd();
            }
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class MatrixException extends TException {
  static $_TSPEC;

  /**
   * @var string
   */
  public $msg = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'msg',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['msg'])) {
        $this->msg = $vals['msg'];
      }
    }
  }

  public function getName() {
    return 'MatrixException';
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
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->msg);
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
    $xfer += $output->writeStructBegin('MatrixException');
    if ($this->msg !== null) {
      $xfer += $output->writeFieldBegin('msg', TType::STRING, 1);
      $xfer += $output->writeString($this->msg);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

