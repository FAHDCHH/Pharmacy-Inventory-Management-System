<?php

require_once 'php_crud/init.php';

if(logged_in() === TRUE) {
    header('location: table.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Weedland</title>
    <link rel="stylesheet" type="text/css" href= "css/lpstyle.css">
    <link rel="icon" href="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" />

</head>
<body>

<!--Weedland Get Started-->
<section class="intro">
    <div class="inner">
        <div class="content">
            
            <img src ="https://www.spreadshirt.co.uk/image-server/v1/mp/designs/16093320,width=178,height=178/cool-weed-logo.png" width="110px" height="110px">
            </br></br>
            <a class="logo">Weedland</a>  
            </br></br></br></br></br></br></br>
            <a class ="navigate" href="#info">Get Started</a>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script>
                    $(document).ready(function(){
                // Add smooth scrolling to all links
                    $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                        if (this.hash !== "") {
                // Prevent default anchor click behavior
                        event.preventDefault();

                // Store hash
                        var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                            $('html, body').animate({
                                scrollTop: $(hash).offset().top
                            }, 800, function(){
   
                // Add hash (#) to URL when done scrolling (default click behavior)
                                window.location.hash = hash;
                                });
                            } // End if
                        });
                    });
                </script>

        </div>
    </div>
</section>




<!--About Us-->
<div class = "info" id = "info">
    <div class="inner">
        <div class="content">
            <a class="aboutus"> About Us </br></br></a>
            <a class= "aboutusinfo">Weedland is a Pharmacy Inventory Management System created </br>to aid pharmacy firms all around to keep track of their stocks!</br></br></br></br></br></a>
            <a class ="navigate" href="#proceed">Try now</a>
        </div>
    </div>
</div>




<!--Login and Register-->
<div class = "container" id="proceed">

    <div class="split left">
        <h1>Don't have</br>an account?</br>Register now!</h1>
        <a href="register.php" class ="button">Register</a>
    </div>


    <div class="split right">
        <h1>Already </br>registered?</br>Login now!</h1>
        <a href="login.php" class ="button">Login</a> 
    </div>

</div>

<script src="main.js"></script>

</body>
</html>
