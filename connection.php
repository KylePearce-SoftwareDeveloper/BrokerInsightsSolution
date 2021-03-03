<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "achmebrokerltd";

//create connection
$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno())
{
    echo "Failed to connect!" . "<br>";
    exit();
}
echo "Connection success!" . "<br>";

?>