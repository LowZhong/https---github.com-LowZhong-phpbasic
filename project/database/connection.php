<?php

// used to connect to the database

$host = "localhost";
$db_name = "lowzhong2";
$username = "lowzhong2";
$password = "_r]h]qvpApYU!I4L";

try {

    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    echo "Connected successfully";
}

// show error
catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
