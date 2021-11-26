<?php

declare(strict_types = 1);

namespace App\Helpers;

class App 
{
  private $_config = [];

  public function __construct()
  {
    $this->_config = Config::get('app');
  }

  public function isDebugMode(): bool
  {
    return isset($this->_config['debug']) ? $this->_config['debug'] : false;
  }

  public function getEnvironment(): string
  {
    return isset($this->_config['env']) && !empty($this->_config['env']) ? $this->_config['env'] : 'production';
  }

  public function getLogPath(): string
  {
    if ( !isset($this->_config['log_path']) ) {
      throw new \Exception('Log path is not defined');
    }
    return $this->_config['log_path'];
  }

  public function isRunningFromConsole(): bool
  {
    return php_sapi_name() == 'cli' || php_sapi_name() == 'phpbg';
  }

  public function getServerTime(): \DateTimeInterface
  {
    return new \DateTime( 'now', new \DateTimeZone('Europe/Warsaw') );
  }
}