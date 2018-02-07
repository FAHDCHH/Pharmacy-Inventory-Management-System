<?php

//using connection method
require_once 'db_connect.php';


/*sending HTTP POST METHOD to mySQL DB
DB = mmuims, table = items, column = name, stockNum, price*/
if($_POST){

    //define variable
    $name = $_POST['name'];
    $stockNum = $_POST['stockNum'];
    $price = $_POST['price'];
    $user_id = $_POST['user_id'];

    //Query
    $sql = "INSERT INTO items (name, stockNum, price, user_id) VALUES ('$name', '$stockNum', '$price','$user_id')";

    //show POST status
    if($connect->query($sql) === TRUE){
        echo "<legend>New Record Created</legend>";
       
    } else{
        echo "Error " .$sql .' ' .$connect->connect_error;
    }

    $connect->close();
}

?>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/TopNavStyle.css">
    
    <link rel="icon" href="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" />
    <title>Successfully Created</title>
</head>
<body class="container weedbackground">

<a href="../create.php"><button type="button" class="btn btn-dark">Back</button></a>
<a href="../index.php"><button type="button" class="btn btn-dark">Home</button></a>
</body>
</html>

