<?php

use App\Helpers\App;
use App\Helpers\Config;

require_once __DIR__ . '/vendor/autoload.php';

// $config = Config::get('app', 'log_path');
$app = new App();

echo $app->getServerTime()->format('Y-m-d H:i:s') . PHP_EOL;
echo $app->getLogPath() . PHP_EOL;
echo $app->getEnvironment() . PHP_EOL;
echo $app->isDebugMode() . PHP_EOL;
echo $app->isRunningFromConsole() . PHP_EOL;
