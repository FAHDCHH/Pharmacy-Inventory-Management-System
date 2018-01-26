<?php

function logged_in() {
    if(isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}

//register functions
function userExists($username) {
    // global keyword is used to access a global variable from within a function
    global $connect;
 
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = $connect->query($sql);
    if($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }
 
    $connect->close();
    // close the database connection
}
 
function registerUser() {
 
    global $connect;
 
    $username = $_POST['username'];
    $password = $_POST['password'];
     
    $salt = salt(32);
    $newPassword = makePassword($password, $salt);
    if($newPassword) {
        $sql = "INSERT INTO users (username, password, salt) VALUES ('$username', '$newPassword', '$salt')";
        $query = $connect->query($sql);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    } // /if
 
    $connect->close();
    // close the database connection
} // register user funtion
 
function salt($length) {
    return mcrypt_create_iv($length);
}
 
function makePassword($password, $salt) {
    return hash('sha256', $password.$salt);
}

//login functions
function login($username, $password) {
    global $connect;
    $userdata = userdata($username);
 
    if($userdata) {
        $makePassword = makePassword($password, $userdata['salt']);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$makePassword'";
        $query = $connect->query($sql);
 
        if($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
 
    $connect->close();
    // close the database connection
}
 
function userdata($username) {
    global $connect;
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    if($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }
     
    $connect->close();
 
    // close the database connection
}

//retrieve session user's info
function not_logged_in() {
    if(isset($_SESSION['id']) === FALSE) {
        return true;
    } else {
        return false;
    }
}
 
function getUserDataByUserId($id) {
    global $connect;
 
    $sql = "SELECT * FROM users WHERE id = $id";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    return $result;
 
    $connect->close();
}

//logout function
function logout() {
    if(logged_in() === TRUE){
        // remove all session variable
        session_unset();
 
        // destroy the session
        session_destroy();
 
        header('location: login.php');
    }
}

//change password
function passwordMatch($id, $password) {
    global $connect;
 
    $userdata = getUserDataByUserId($id);
 
    $makePassword = makePassword($password, $userdata['salt']);
 
    if($makePassword == $userdata['password']) {
        return true;
    } else {
        return false;
    }
 
    // close connection
    $connect->close();
}
 
function changePassword($id, $password) {
    global $connect;
 
    $salt = salt(32);
    $makePassword = makePassword($password, $salt);
 
    $sql = "UPDATE users SET password = '$makePassword', salt = '$salt' WHERE id = $id";
    $query = $connect->query($sql);
 
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }
}

?>