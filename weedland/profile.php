<?php

require_once 'php_crud/init.php';

if(not_logged_in() === TRUE) {
    header('location: login.php');
}

$userdata = getUserDataByUserId($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html>
<head>

    <!--bootstrap CSS external stylesheet-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="css/TopNavStyle.css">
    
    <link rel="icon" href="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" />
    <title>Profile Information</title>
</head>

<body class="container weedbackground">

<h1><img src="img/profile.png" height="65" width="65" style="margin-right:10px;margin-top:10px;">Profile Information</h1>

<table border="1" style="width:100%;">

    <tr>
        <th>User ID</th>
        <td><?php echo $userdata['user_id'] ?></td>
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

<a href="table.php"><button type="button" class="btn btn-dark">Back</button></a>

</body>
</html>
