<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/BankAccount.php';
require APP_DIR . 'classes/MessageHandler.php';


try {
    $bankAccount = new BankAccount(12345678, 1000);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}

$bankAccount->showAccountInfo();

try {
    $amount = 500;
    $bankAccount->deposit($amount);
    $newBalance = $bankAccount->getBalance();
    MessageHandler::showMessage("Account has been credited with $amount USD. New balance: $newBalance USD");
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $amount = 200;
    $bankAccount->withdraw($amount);
    $newBalance = $bankAccount->getBalance();
    MessageHandler::showMessage("Withdrew $amount USD. New balance: $newBalance USD.");
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $amount = 10000;
    $bankAccount->withdraw($amount);
    $newBalance = $bankAccount->getBalance();
    MessageHandler::showMessage("Withdrew $amount USD. New balance: $newBalance USD.");
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $amount = 0;
    $bankAccount->withdraw($amount);
    $newBalance = $bankAccount->getBalance();
    MessageHandler::showMessage("Withdrew $amount USD. New balance: $newBalance USD.");
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $amount = 0;
    $bankAccount->deposit($amount);
    $newBalance = $bankAccount->getBalance();
    MessageHandler::showMessage("Account has been credited with $amount USD. New balance: $newBalance USD");
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $amount = 500000;
    $bankAccount->deposit($amount);
    $newBalance = $bankAccount->getBalance();
    MessageHandler::showMessage("Account has been credited with $amount USD. New balance: $newBalance USD");
} catch (Exception $exception) {
    echo $exception->getMessage();
}
