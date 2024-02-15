<?php

define('APP_DIR', __DIR__ . '/');
define('LOG_DIR', __DIR__ . '/logs/');
define('LOG_FILE', 'logs.txt');

require APP_DIR . 'loggerFunction.php';

Logger('call index file test', 'action');