<?php

use App\Helpers\Config;

require_once __DIR__ . '/vendor/autoload.php';

$config = Config::get('app', 'log_path');

print_r($config);