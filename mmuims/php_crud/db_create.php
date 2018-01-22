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

    //Query
    $sql = "INSERT INTO items (name, stockNum, price) VALUES ('$name', '$stockNum', '$price')";

    //show POST status
    if($connect->query($sql) === TRUE){
        echo "<p>New Record Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else{
        echo "Error " .$sql .' ' .$connect->connect_error;
    }

    $connect->close();
}

?>