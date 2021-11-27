<?php

use App\Exception\ExceptionHandler;
use App\Helpers\App;
use App\Helpers\Config;
use App\Logger\Logger;
use App\Logger\LogLevel;

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/Src/Exception/exception.php';

print_r((new Config)->getFileContent('app'));

// $logger = new Logger();

// $logger->log(LogLevel::WARNING, 'Warnigng message');