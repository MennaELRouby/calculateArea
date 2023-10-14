<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$servername;port=3306; dbname=13_task", $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //echo "Connected successfully";
    }catch(PDOException $e){
        echo "Connection failed1: " . $e->getMessage();
    }
?>