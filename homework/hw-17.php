<?php

require __DIR__ . '/../index.php';
require  APP_DIR . 'traits/Validator.php';
require APP_DIR . 'controllers/AuthController.php';

$controller = new AuthController();
$controller->login();