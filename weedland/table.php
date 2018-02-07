<!--Connection establishing-->
<?php require_once 'php_crud/init.php';

 if(not_logged_in() === TRUE) {
    header('location: login.php');
}

$userdata = getUserDataByUserId($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags for proper mobile rendering -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--bootstrap JS external script-->
        <script src="sidebar.js"></script>

        <!--bootstrap CSS external stylesheet-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="css/sidebarstyle.css">
        <link rel="stylesheet" href="css/TopNavStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="icon" href="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" />
        <title>Weedland</title>
    </head>

    <body class="weedbackground">
    <!--container-fluid by bootstrap for responsive sizing-->
    <div class="manageItem container-fluid topnav">


    <!--sidebar and top navigation bar-->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="./table.php"><button type="button" class="btn btn-outline-primary">Home</button></a>

        <a href="create.php"><button type="button" class="btn btn-outline-primary">Add Medicine</button></a>

        <a href="profile.php"><button type="button" class="btn btn-outline-primary">Profile</button></a>

        <a href="passchange.php"><button type="button" class="btn btn-outline-primary">Change password</button></a>

        <a href="logout.php"><button type="button" class="btn btn-outline-primary">Logout</button></a>
    </div>    
        <span onclick="openNav()"><img src="img/menuv2.png" width="50" height="50"></span> 
        <span ><a href="./table.php" style="float:none;display:initial;font-weight: bold;padding:10px;font-family:'Raleway';color:#007D44;"><img src=https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png width="40" height="40" style="margin-right:10px;">Weedland</a></span>
        
    <div class="search-container">
        <form action="./table.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>

    <!--bootstrap table with hover state and dark table head-->
    <table class="table table-hover" border="1">

        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Stock Number</th>
                <th scope="col">Price (RM)</th>
                <th scope="col">Option</th>
            </tr>
        </thead>

        <tbody bgcolor="white">
            <?php

            if(!empty($_GET["search"])) {
              $sql = "SELECT * FROM items WHERE user_id = '".$_SESSION["user_id"]."' AND (item_id LIKE '%".$_GET["search"]."%' OR name LIKE '%".$_GET["search"]."%')"; //SQL Query
            }
            else {
              $sql = "SELECT * FROM items WHERE user_id = '".$_SESSION["user_id"]."'";
            }

            $result = $connect->query($sql); //query from DB

            //check if table have data, if yes then fetch and display
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo
                    "<tr>
                        <th>".$row['item_id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['stockNum']."</td>
                        <td>".$row['price']."</td>
                        <td>

                            <a href='edit.php?id=".$row['item_id']."'><button type='button' class='btn btn-warning'>Edit</button>
                            <a href='remove.php?id=".$row['item_id']."'><button type='button' class='btn btn-danger'>Remove</button>
                        </td>
                    </tr>";
                }
            } else{
                echo "No data found.";
            }
        
            ?>

            </tbody>
        </table>
    </body>
</html>

