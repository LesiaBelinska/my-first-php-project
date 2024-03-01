<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'traits/Validator.php';
require APP_DIR . 'controllers/AuthController.php';
require APP_DIR . 'controllers/RegistrationController.php';
require APP_DIR . 'classes/MessageHandler.php';


$loginData = [
    'email' => 'test@test.com',
    'password' => '1234567891011',
];

try {
    $controller = new AuthController();
    $controller->login($loginData);
    MessageHandler::showMessage("Login is successful");
} catch (Exception $exception) {
    echo $exception->getMessage();
}


$registerData = [
    'email' => 'test@test.com',
    'password' => '12345678',
    'name' => 'Test',
];

try {
    $controller = new RegistrationController();
    $controller->register($registerData);
    MessageHandler::showMessage("Register is successful");
} catch (Exception $exception) {
    echo $exception->getMessage();
}