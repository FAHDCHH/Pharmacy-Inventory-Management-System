<?php

require_once 'db_connect.php';

if($_POST) {
    $id = $_POST['id'];

    //SQL Query
    $sql = "DELETE FROM items WHERE item_id = '$id'";

    if($connect->query($sql) === TRUE) {
        echo "<legend>Successfully removed!!</legend>";

    } else {
        echo "Error updating record : " . $connect->error;
    }

    $connect->close();
}

?>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/TopNavStyle.css">
    
    <link rel="icon" type="image/png" href="htmlicon.png">
    <title>Successfully Removed</title>
</head>
<body class="container weedbackground">

<a href="../index.php"><button type="button" class="btn btn-dark">Home</button></a>
</body>
</html>
