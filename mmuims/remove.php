<?php 
 
require_once 'php_crud/db_connect.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM items WHERE id = '$id'";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
 
    $connect->close();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags for proper mobile rendering -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--bootstrap CSS external stylesheet-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

        <title>Remove Items</title>
    </head>

    <body class="container">
 
        <div class="alert alert-primary" role="alert">
            Remove item ID <?php echo $data['id'] ?> ?
        </div>

        <!--buttons connecting to server action-->
        <form action="php_crud/db_remove.php" method="post">
 
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
            <button type="submit" class='btn btn-dark'>Save Changes</button>
            <a href="table.php"><button type="button" class='btn btn-dark'>Back</button></a>
        </form>
 
    </body>
</html>
 
<?php
}
?>