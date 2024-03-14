<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // todo post
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
    header('Content-Type: text/html; charset=utf-8');
    echo "<h1> Hello it's GET method </h1>";

    header('Location: http://localhost:8080/get.php');
    exit;
}