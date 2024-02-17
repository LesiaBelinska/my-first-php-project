<?php

require __DIR__ . '/../index.php';
require APP_DIR . 'classes/Worker.php';
require APP_DIR . 'enums/WorkPositions.php';

//$worker = new Worker(); // without __construct
//$worker->setName("Jon");
//$worker->setPosition("developer");

try {
    $worker = new Worker("Jon", "developer");
//    $worker2 = new Worker("Kate", "manager");
} catch (Exception $exception){
    echo $exception->getMessage();
}

try {
//    $worker = new Worker("Jon", "developer");
    $worker2 = new Worker("Kate", "manager");
} catch (Exception $exception){
    echo $exception->getMessage();
}

//Виклик методів
 function showWorkerInformation(Worker $worker): void
 {
     echo "name: " . $worker->getName() . PHP_EOL;
     echo "position: " . $worker->getPosition() . PHP_EOL;
 }

 showWorkerInformation($worker);
 showWorkerInformation($worker2);

