<!--Connection establishing-->
<?php require_once 'php_crud/init.php';

$userdata = getUserDataByUserId($_SESSION['user_id']);

?>

<!DOCTYPE <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="icon" href="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" />
    <link rel="stylesheet" href="css/TopNavStyle.css">
    
    <title>Add Medicine</title>
</head>

<!--bootstrap container for dynamic sizing-->
<body class="container weedbackground">

<fieldset>

    <!--Form's title-->
    <legend><img src="img/addmed.png" height="50" width="50">Add Medicine</legend>

    <!--Bootstrap forms, input to DB through HTTP POST method in php_crud dir-->
    <form action="php_crud/db_create.php" method="post">

        <!--1st row-->
        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="itemHelp" placeholder="Enter Item Name" required>
        <small id="itemHelp" class="form-text text-muted">Input Full Name of Item</small>
        </div>

        <!--2nd Row-->
        <div class="form-group">
            <label for="stockNum">Stock Count</label>
            <input type="text" class="form-control" name="stockNum" placeholder="Enter Number of Stock" pattern="[0-9]*" required>
        </div>

        <!--3rd Row-->
        <div class="form-group">
            <label for="price">Item Price (RM)</label>
            <input type="text" class="form-control" name="price" placeholder="Enter Price of Item" pattern="[0-9]*" required>
        </div>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" />

        <!--Button, back button anchored to index.php-->
        <button type="submit" class="btn btn-dark">Submit</button>
        <a href="table.php"><button type="button" class="btn btn-dark">Back</button></a>
    </form>

</fieldset>

</body>
</html>
