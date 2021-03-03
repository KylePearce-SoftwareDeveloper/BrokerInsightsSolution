<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "achmebrokerltd";

    $connect = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
?>