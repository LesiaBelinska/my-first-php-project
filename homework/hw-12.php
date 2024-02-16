<?php

require __DIR__ . '/index.php';
require_once APP_DIR . 'classes/Worker';
//$worker = new Worker(); // without __construct
//$worker->setName("Jon");
//$worker->setPosition("developer");

$worker = new Worker("Jon", "developer");
$worker1 = new Worker("Kate", "manager");


//Виклик методів
 function showWorkerInformation(Worker $worker): void
 {
     echo "name: " . $worker->getName() . PHP_EOL;
     echo "position: " . $worker->getPosition() . PHP_EOL;
 }
 showWorkerInformation($worker);
 showWorkerInformation($worker1);