<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/BankAccount.php';

try {
    $bankAccount = new BankAccount(12345678, 1000);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

//try {
//    $bankAccount->deposit(500);
//    $bankAccount->withdraw(200);
//    $bankAccount->withdraw(10000);
//    $bankAccount->withdraw(0);
//    $bankAccount->deposit(0);
//    $bankAccount->deposit(500000);
//} catch (Exception $exception) {
//    echo $exception->getMessage();
//}


if (isset($bankAccount)) {
    $bankAccount->showAccountInfo();
}

//$bankAccount->deposit(500);
//$bankAccount->withdraw(200);
//
//$bankAccount->withdraw(10000);
//
//$bankAccount->withdraw(0);
//$bankAccount->deposit(0);
//$bankAccount->deposit(500000);
