<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/BankAccount.php';

$messageHandler = new MessageHandler();

var_dump($messageHandler);

try {
    $bankAccount = new BankAccount(12345678, 1000);
} catch (Exception $exception) {
    echo $exception->getMessage();
}


if (isset($bankAccount)) {
    $bankAccount->showAccountInfo();
}

try {
    $bankAccount->deposit(500);
} catch (Exception $exception) {
    echo $exception->getMessage();
} finally {

}

try {
    $bankAccount->withdraw(200);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $bankAccount->withdraw(10000);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $bankAccount->withdraw(0);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $bankAccount->deposit(0);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $bankAccount->deposit(500000);
} catch (Exception $exception) {
    echo $exception->getMessage();
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
