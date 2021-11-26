<?php

declare(strict_types=1);

use App\Exception\ExceptionHandler;

set_error_handler([new ExceptionHandler(), 'convertWarningAndNoticesToException']);
set_exception_handler([new ExceptionHandler(), 'handle']);