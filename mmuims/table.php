<!--Connection establishing-->
<?php require_once 'php_crud/init.php'; 
 
 if(not_logged_in() === TRUE) {
    header('location: login.php');
}
 
$userdata = getUserDataByUserId($_SESSION['id']);

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags for proper mobile rendering -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--bootstrap CSS external stylesheet-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    
        <title>PHP CRUD</title>
    </head>

    <body>
    <!--container-fluid by bootstrap for responsive sizing-->
    <div class="manageItem container-fluid">

    <!--bootstrap table with hover state and dark table head-->
    <table class="table table-hover" border="1">

        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Stock Number</th>
                <th scope="col">Price</th>
                <th scope="col">Option</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM items"; //SQL Query
    
            $result = $connect->query($sql); //query from DB

            //check if table have data, if yes then fetch and display
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo 
                    "<tr>
                        <th>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['stockNum']."</td>
                        <td>".$row['price']."</td>
                        <td>
                            <a href='edit.php?id=".$row['id']."><button type='button' class='btn btn-warning'>Edit</button>
                            <a href='remove.php?id=".$row['id']."><button type='button' class='btn btn-danger'>Remove</button>
                        </td>
                    </tr>";
                }
            }
            ?>

        </tbody>
    </table>

        <!--Add item button using Bootstrap template anchored to create.php dir-->
        <a href="create.php"><button type="button" class="btn btn-outline-primary">Add Item</button></a>

        <a href="profile.php"><button type="button" class="btn btn-outline-primary">profile</button></a>

        <a href="passchange.php"><button type="button" class="btn btn-outline-primary">change password</button></a>

        <a href="logout.php"><button type="button" class="btn btn-outline-primary">logout</button></a>

    </body>
</html>
