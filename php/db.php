<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "interview";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if(!$conn){
    error_log ("connection failed",$mysqli->connect_error);
}

