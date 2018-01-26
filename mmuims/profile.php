<?php 
 
require_once 'php_crud/init.php'; 
 
if(not_logged_in() === TRUE) {
    header('location: login.php');
}
 
$userdata = getUserDataByUserId($_SESSION['id']);
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Profile Information</title>
</head>
<body>
 
<h1>Profile Information</h1>
 
<table border="1" style="width:100%;">

    <tr>
        <th>User ID</th>
        <td><?php echo $userdata['id'] ?></td>
    </tr>

    <tr>
        <th>Username</th>
        <td><?php echo $userdata['username'] ?></td>
    </tr>

    <tr>
        <th>hashed password</th>
        <td><?php echo $userdata['password'] ?></td>
    </tr>
</table>
 
<br />
 
<a href="table.php"><button type="button">Back</button></a>
 
</body>
</html>