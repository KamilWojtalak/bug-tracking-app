<?php

use App\Exception\ExceptionHandler;
use App\Helpers\App;
use App\Helpers\Config;

require_once __DIR__ . '/vendor/autoload.php';

set_exception_handler([ExceptionHandler::class, 'handle']);

$config = Config::getFileContent('asefsd');

// $config = Config::get('app', 'log_path');
$app = new App();

echo $app->getServerTime()->format('Y-m-d H:i:s') . PHP_EOL;
echo $app->getLogPath() . PHP_EOL;
echo $app->getEnvironment() . PHP_EOL;
echo $app->isDebugMode() . PHP_EOL;
echo $app->isRunningFromConsole() . PHP_EOL;
