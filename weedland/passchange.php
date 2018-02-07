<?php

require_once 'php_crud/init.php';

if(not_logged_in() === TRUE) {
    header('location: login.php');
}

if($_POST) {
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if($currentpassword == "") {
        echo "Current Password field is required <br />";
    }

    if($newpassword == "") {
        echo "New Password field is required <br />";
    }

    if($confirmpassword == "") {
        echo "Conform Password field is required <br />";
    }

    if($currentpassword && $newpassword && $confirmpassword) {
        if(passwordMatch($_SESSION['user_id'], $currentpassword) === TRUE) {

            if($newpassword != $confirmpassword) {
                echo "New password does not match conform password <br />";
            } else {
                if(changePassword($_SESSION['user_id'], $newpassword) === TRUE) {
                    echo "Successfully updated";
                } else {
                    echo "Error while updating the information <br />";
                }
            }

        } else {
            echo "Current Password is incorrect <br />";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <!--bootstrap CSS external stylesheet-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/TopNavStyle.css">
   
    <link rel="icon" href="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" />
    <title>Change Password</title>
</head>
<body class="container weedbackground">

<legend><img src="img/profile.png" height="50" width="50" style="margin-left:15px;margin-top:15px;margin-right:15px;">Change Password</legend>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="passwordForm">
    
            <!--1st row-->
        <div class="form-group">
            <label>Current Password</label>
            <input type="password" class="form-control" name="currentpassword" placeholder="Current Password" size="30">
        </div>

        <!--2nd Row-->
        <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="password" placeholder="New Password" size="30">
        </div>

        <!--3rd Row-->
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" placeholder="Please enter again your new password." size="30">
        </div>

        <!--Button, back button anchored to index.php-->
        <button type="submit" class="btn btn-dark">Change Password</button>
        <a href="table.php"><button type="button" class="btn btn-dark">Back</button></a>
</form>
</body>
</html>
