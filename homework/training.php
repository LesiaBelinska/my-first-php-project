<?php

//try {
//    $dsn = 'mysql:host=mysql;port=3306;dbname=hillel;charset=utf8mb4';
//    $connect = new  PDO($dsn, 'root', 'root');

//    $connect->exec("INSERT INTO `users`(`name`, `email`, `password`, `gender`, `age`)
//                VALUES ('Lili', 'lili@gmail.com', 'password', 'female', 22)");


//    $query = "SELECT * FROM `users`";
//    $stmt = $connect->exec($query);  // виведе int(0) бо exec виконує запит і повертає
//                                    // кількість рядків які було затронуто запитом
//    var_dump($stmt);


//    $query = "SELECT * FROM `users`";
//    $stmt = $connect->query($query);

//    echo "<pre>";
//      print_r($stmt->fetchAll()); // fetchAll() повертає всі записи, але їсть багато ресурсу
//    echo "</pre>";


//    while ($result = $stmt->fetch()) { //!!! написати генератор
//        echo "<pre>";
//        print_r($stmt->fetch());
//        echo "</pre>";
//    }


//    while ($result = $stmt->fetch(PDO::FETCH_OBJ)) { //!!! написати генератор
//        echo "<pre>";
//        print_r($result);
//        echo "</pre>";
//    }


//    echo "<pre>";
//      print_r($stmt->fetchAll(PDO::FETCH_OBJ)); // PDO::FETCH_OBJ - виведе у вигляді об'єкту
//    echo "</pre>";

//
//    $email = "lili@gmail.com";
//    $query = "SELECT * FROM `users` WHERE `email` = :email";
//
//    $stmt = $connect->prepare($query);
//    $stmt->bindParam('email', $email);
//    $stmt->execute();
//    var_dump($stmt->fetch());
//
//} catch (PDOException $exception) {
//    echo $exception->getMessage();
//}
//exit;

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

//$builder = new MySqlQueryBuilder();
//
//$userRepository = new UserRepository(Connector::getInstance(), $builder);
//
//echo "<pre>";
//print_r($userRepository->find(8));
//echo "<pre>";
//
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