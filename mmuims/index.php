<?php 
 
require_once 'php_crud/init.php';
 
if(logged_in() === TRUE) {
    header('location: table.php');
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Login and Registration Procedural PHP </title>
</head>
<body>
 
<a href="login.php">Login</a> or <a href="register.php">Register</a>
 
</body>
</html>