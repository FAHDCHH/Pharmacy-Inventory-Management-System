<?php

//define connection properties
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'php_crud';

// connection creation
$connect = new mysqli($host, $username, $password, $dbname);

// connection check
if($connect->connect_error){
    die("Connection Failed :" .$connect->connect_error);
} else{
    //echo "Connection Established";
}

?>