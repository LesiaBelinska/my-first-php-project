<?php

define('APP_DIR', __DIR__ . '/');
define('LOG_DIR', __DIR__ . '/logs/');
define('LOG_FILE', 'logs.txt');
 //////
//define('DB_HOST', 'mysql');  // винести в окремий файл конфігу для бази
//define('DB_PORT', '3306');
//define('DB_NAME', 'hillel');
//define('DB_CHARSET', 'utf8mb4');
//define('DB_USER', 'root');
//define('DB_PASSWORD', 'root');
//
//require_once APP_DIR . 'database/Connector.php';
//require_once APP_DIR . 'database/SQLQueryBuilder.php';
//require_once APP_DIR . 'database/MySqlQueryBuilder.php';
//require_once APP_DIR . 'database/Repository.php';
//require_once APP_DIR . 'database/UserRepository.php';
//
//$builder = new MySqlQueryBuilder();
//
//$userRepository = new UserRepository(Connector::getInstance(), $builder);
//
//echo "<pre>";
//print_r($userRepository->find(8));
//echo "<pre>";

//$builder->select('users')
//    ->where('email', 'july@ukr.net')
//    ->limit(1);
//
//$builder->select('users')
//    ->where('id', 5, '>')
//    ->limit(4);
//
//$connector = Connector::getInstance();
//
//$stmt = $connector->prepare($builder->getSQL());
//$stmt->execute($builder->getValues());
//
//echo "<pre>";
//print_r($stmt->fetchAll());
//echo "</pre>";

//require APP_DIR . 'system/Logger.php';
//require APP_DIR . 'enums/LogLevels.php';

//require APP_DIR . 'loggerFunction.php';

//Logger('call index file test', 'action');

//Logger::log('test message');
//Logger::action('action');
//Logger::error('error');
