<?php

try {
    $dsn = 'mysql:host=mysql;port=3306;dbname=hillel;charset=utf8mb4';
    $connect = new  PDO($dsn, 'root', 'root');

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
//    echo "<pre>";


//    while ($result = $stmt->fetch()) { //!!! написати генератор
//        echo "<pre>";
//        print_r($stmt->fetch());
//        echo "<pre>";
//    }


//    while ($result = $stmt->fetch(PDO::FETCH_OBJ)) { //!!! написати генератор
//        echo "<pre>";
//        print_r($result);
//        echo "<pre>";
//    }


//    echo "<pre>";
//      print_r($stmt->fetchAll(PDO::FETCH_OBJ)); // PDO::FETCH_OBJ - виведе у вигляді об'єкту
//    echo "<pre>";


    $email = "lili@gmail.com";
    $query = "SELECT * FROM `users` WHERE `email` = :email";

    $stmt = $connect->prepare($query);
    $stmt->bindParam('email', $email);
    $stmt->execute();
    var_dump($stmt->fetch());

} catch (PDOException $exception) {
    echo $exception->getMessage();
}
exit;