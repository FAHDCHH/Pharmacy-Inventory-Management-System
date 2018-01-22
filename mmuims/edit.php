<?php

require_once 'php_crud/db_connect.php';

if($_GET['id']){
    $id = $_GET['id'];

    $sql = "SELECT * FROM items WHERE id = '$id'";

    $result = $connect->query($sql); //query from DB

    $data = $result->fetch_assoc();

    $connect->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--bootstrap CSS external stylesheet-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    
    <title>Edit </title>
</head>

<body class="container">
    <fieldset>
        <!--Form's title-->
        <legend>Edit Item</legend>

        <!--Bootstrap forms, input to DB through HTTP POST method in php_crud dir-->
        <form action="php_crud/update.php" method="post">

            <!--1st row-->
            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" name="name" aria-describedby="itemHelp" placeholder="Enter Item Name" value="<?php echo $data['name'] ?>">
                <small id="itemHelp" class="form-text text-muted">Input Full Name of Item</small>
            </div>

            <!--2nd Row-->
            <div class="form-group">
                <label for="stockNum">Stock Count</label>
                <input type="text" class="form-control" name="stockNum" placeholder="Enter Number of Stock" value="<?php echo $data['stockNum'] ?>">
            </div>

            <!--3rd Row-->
            <div class="form-group">
                <label for="price">Item Price</label>
                <input type="text" class="form-control" name="price" placeholder="Enter Price of Item" value="<?php echo $data['price'] ?>">
            </div>

            <input type ="hidden" name="id" value="<?php echo $data['id']?>" />
            <!--Button, back button anchored to index.php-->
            <button type="submit" class="btn btn-dark">Submit</button>
            <a href="index.php"><button type="button" class="btn btn-dark">Back</button></a>
        </form>
    
    </fieldset>
</body>
</html>