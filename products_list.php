<?php

$servername = "localhost:3306";
$username = "petrilakova";
$password_db = "987654321";
$database = "cvstore";

try {

    $connect = new PDO("mysql:host=$servername;dbname=$database", $username, $password_db);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    // echo "Connected Successfully";

} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}

?>




