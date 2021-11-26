<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;
use Throwable;

abstract class BaseException extends Exception
{
  protected $_data = [];

  public function __construct(
    string $message = '',
    array $data,
    int $code = 0,
    Throwable $previous = null
  ) {
    $this->_data = $data;
    parent::__construct($message, $code, $previous);
  }

  public function setData(string $key, $value): void
  {
    $this->_data[$key] = $value;
  }

  public function getExtraData($key)
  {
    if (count($this->_data) === 0) {
      return $this->_data;
    }

    return json_decode(json_encode($this->_data[$key]), true);
  }
}
