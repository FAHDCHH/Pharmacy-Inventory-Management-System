<?php 
 
require_once 'php_crud/init.php';
 
if(logged_in() === TRUE) {
    header('location: table.php');
}
 
$error = false;
$confirm = false;
$exist = false;
$empty = false;
$success = false;

// form is submitted
if($_POST) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
 
    if($username == "" || $password == "" || $cpassword == "") {
        $empty = true;
    }
 
    if($username && $password && $cpassword) {
 
        if($password == $cpassword) {
            if(userExists($username) === TRUE) {
                $exist = true;
            } else {
                if(registerUser() === TRUE) {
                    $success = true;
                } else {
                    $error = true;
                }
            }
        } else {
            $confirm = true;
        }
    }
 
}
?>
 
 <!DOCTYPE html>
 <html>
 
 <head>
     <title>Registration Form</title>
     <link rel="stylesheet" href= "css/loginstyle.css">
     <link rel="icon" href="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" />
 </head>
 
 <body id = "register">
 <form class = 'login-form' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
 <?php if($error){echo "<a style=\"color:#ff0000; font-size:20px;font-weight:bold; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align:center;padding-bottom: 20px;margin-left:32px; \">There was an error registering!</a>";}?>
 <?php if($confirm){echo "<a style=\"color:#ff0000; font-size:14px;font-weight:bold; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align:center;padding-bottom: 20px;margin-left:4px; \">The password does not match with confirm password!</a>";}?>
 <?php if($exist){echo "<a style=\"color:#ff0000; font-size:20px;font-weight:bold; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align:center;padding-bottom: 20px;margin-left:32px; \">The username is already taken!</a>";}?>
 <?php if($empty){echo "<a style=\"color:#ff0000; font-size:20px;font-weight:bold; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align:center;padding-bottom: 20px;margin-left:32px; \">Please enter all the required field!</a>";}?>
 <?php if($success){echo "<a style=\"color:#ff0000; font-size:20px;font-weight:bold; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align:center;padding-bottom: 20px;margin-left:32px; \">You have successfully registered! <a style=\"color:#8fa9ff; font-size:16px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align:center;padding-bottom: 20px;margin-left:125px\" href='login.php'>Click to login</a> </a>";}?>
         <div class = "flex-row">
             <label class="lf--label" for="username">
                 <svg x="0px" y="0px" width="12px" height="13px">
                 
                      <path fill="#ADD8E6" d="M8.9,7.2C9,6.9,9,6.7,9,6.5v-4C9,1.1,7.9,0,6.5,0h-1C4.1,0,3,1.1,3,2.5v4c0,0.2,0,0.4,0.1,0.7 C1.3,7.8,0,9.5,0,11.5V13h12v-1.5C12,9.5,10.7,7.8,8.9,7.2z M4,2.5C4,1.7,4.7,1,5.5,1h1C7.3,1,8,1.7,8,2.5v4c0,0.2,0,0.4-0.1,0.6 l0.1,0L7.9,7.3C7.6,7.8,7.1,8.2,6.5,8.2h-1c-0.6,0-1.1-0.4-1.4-0.9L4.1,7.1l0.1,0C4,6.9,4,6.7,4,6.5V2.5z M11,12H1v-0.5 c0-1.6,1-2.9,2.4-3.4c0.5,0.7,1.2,1.1,2.1,1.1h1c0.8,0,1.6-0.4,2.1-1.1C10,8.5,11,9.9,11,11.5V12z"/>
                 
                 </svg>
             </label>
 
             <input class= "lf--input" type="text" name="username" id="username" autocomplete="off" placeholder="Username" value="<?php if($_POST) {
             echo $_POST['username'];
             } ?>" />
         </div>
 
         <div class= 'flex-row'>
             <label class= "lf--label" for="password">
             
                 <svg x="0px" y="0px" width="15px" height="5px">
                     <g>
                         <path fill="#ADD8E6" d="M6,2L6,2c0-1.1-1-2-2.1-2H2.1C1,0,0,0.9,0,2.1v0.8C0,4.1,1,5,2.1,5h1.7C5,5,6,4.1,6,2.9V3h5v1h1V3h1v2h1V3h1 V2H6z M5.1,2.9c0,0.7-0.6,1.2-1.3,1.2H2.1c-0.7,0-1.3-0.6-1.3-1.2V2.1c0-0.7,0.6-1.2,1.3-1.2h1.7c0.7,0,1.3,0.6,1.3,1.2V2.9z"/>
                     </g>
                 </svg>
             </label>
                 <input class = "lf--input" type="password" name="password" id="password" autocomplete="off" placeholder="Password" />
             
         </div>
 
         <div class= 'flex-row'>
             <label class= "lf--label" for="cpassword">
             
                 <svg x="0px" y="0px" width="15px" height="5px">
                     <g>
                         <path fill="#ADD8E6" d="M6,2L6,2c0-1.1-1-2-2.1-2H2.1C1,0,0,0.9,0,2.1v0.8C0,4.1,1,5,2.1,5h1.7C5,5,6,4.1,6,2.9V3h5v1h1V3h1v2h1V3h1 V2H6z M5.1,2.9c0,0.7-0.6,1.2-1.3,1.2H2.1c-0.7,0-1.3-0.6-1.3-1.2V2.1c0-0.7,0.6-1.2,1.3-1.2h1.7c0.7,0,1.3,0.6,1.3,1.2V2.9z"/>
                     </g>
                 </svg>
             </label>
                 <input class = "lf--input" type="password" name="cpassword" autocomplete="off" placeholder="Confirm Password" />
             
         </div>
 
         <input class='lf--submit' type='submit' value='REGISTER'>
         </br>
         <a class = 'lf--registerword'>Already Registered?</a> 
         <a class = 'lf--register' href='login.php'>Login Now!</a></br></br>
         <a class = 'mainmenu' href='index.php'>Return to main menu</a> 
  
 </form>
 </body>
 </html>