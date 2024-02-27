<?php

define('APP_DIR', __DIR__ . '/');
define('LOG_DIR', __DIR__ . '/logs/');
define('LOG_FILE', 'logs.txt');

require APP_DIR . 'system/Logger.php';
require APP_DIR . 'enums/LogLevels.php';

//require APP_DIR . 'loggerFunction.php';

//Logger('call index file test', 'action');

Logger::log('test message2');
Logger::action("test message3");