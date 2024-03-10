<?php

require __DIR__ . '/../index.php';

require_once APP_DIR . 'database/config.php';
require_once APP_DIR . 'database/Connector.php';
require_once APP_DIR . 'database/SQLQueryBuilder.php';
require_once APP_DIR . 'database/MySqlQueryBuilder.php';
require_once APP_DIR . 'database/Repository.php';
require_once APP_DIR . 'database/UserRepository.php';

$builder = new MySqlQueryBuilder();
$userRepository = new UserRepository(Connector::getInstance(), $builder);

// INSERT
$userRepository->insert(['name' => 'Alice', 'email' => 'alice@ukr.net', 'password' => 'password', 'gender' => 'female', 'age' => 18]);

$userRepository->insertMany([
    ['name' => 'Alen', 'email' => 'alen@ukr.net', 'password' => 'password', 'gender' => 'male', 'age' => 55],
    ['name' => 'Daisy', 'email' => 'daisy@ukr.net', 'password' => 'password', 'gender' => 'female', 'age' => 32],
    ['name' => 'Chloe', 'email' => 'chloe@gmail.com', 'password' => 'password', 'gender' => 'female', 'age' => 45]
]);

// SELECT

echo "<pre>";
print_r($userRepository->find(8));
echo "<pre>";

echo "<pre>";
print_r($allUsers = $userRepository->findAll());
echo "<pre>";

echo "<pre>";
print_r($user = $userRepository->findByEmail('chloe@gmail.com'));
echo "</pre>";

// DELETE
$userRepository->delete(9);

