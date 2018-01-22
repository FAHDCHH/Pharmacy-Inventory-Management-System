<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $name = $_POST['name'];
    $stockNum = $_POST['stockNum'];
    $price = $_POST['price'];
 
    $id = $_POST['id'];
 
    //SQL Query
$sql = "UPDATE items SET name = '$name', stockNum = '$stockNum', price= '$price' WHERE id = '$id'";

    //connection indication
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../edit.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>