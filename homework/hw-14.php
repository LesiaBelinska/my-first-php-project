<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/BankAccount.php';
require APP_DIR . 'classes/MessageHandler.php';

$messageHandler = new MessageHandler();


try {
    $bankAccount = new BankAccount(12345678, 1000);
} catch (Exception $exception) {
    echo $exception->getMessage();
}


if (isset($bankAccount)) {
    $bankAccount->showAccountInfo();
}

try {
   if (isset($bankAccount)) {  // ?????? чи потрібно тут використовувати перевірку?????
       $amount = 500;
       $bankAccount->deposit($amount);
       $newBalance = $bankAccount->getBalance();
       MessageHandler::showMessage("Account has been credited with $amount USD. New balance: $newBalance USD");
   }
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


if (isset($bankAccount)) {
    $bankAccount->showAccountInfo();
}






//
//require __DIR__ . '/../index.php';
//require APP_DIR . 'classes/BankAccount.php';
//
//try {
//    $bankAccount = new BankAccount(12345678, 1000);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}
//
//
//if (isset($bankAccount)) {
//    $bankAccount->showAccountInfo();
//}
//
//try {
//    $bankAccount->deposit(500);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}
//
//try {
//    $bankAccount->withdraw(200);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}
//
//try {
//    $bankAccount->withdraw(10000);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}
//
//try {
//    $bankAccount->withdraw(0);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}
//
//try {
//    $bankAccount->deposit(0);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}
//
//try {
//    $bankAccount->deposit(500000);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}
