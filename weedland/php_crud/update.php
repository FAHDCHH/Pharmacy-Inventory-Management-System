<?php

require_once 'db_connect.php';

if($_POST) {
    $name = $_POST['name'];
    $stockNum = $_POST['stockNum'];
    $price = $_POST['price'];

    $id = $_POST['id'];

    //SQL Query
$sql = "UPDATE items SET name = '$name', stockNum = '$stockNum', price= '$price' WHERE item_id = '$id'";

    //connection indication
    if($connect->query($sql) === TRUE) {
        echo "<legend>Succcessfully Updated</legend>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
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
    <title>Edit</title>
</head>
<body class="container weedbackground">

<a href="../edit.php?id="><button type="button" class="btn btn-dark">Back</button></a>
<a href="../index.php"><button type="button" class="btn btn-dark">Home</button></a>
</body>
</html>
