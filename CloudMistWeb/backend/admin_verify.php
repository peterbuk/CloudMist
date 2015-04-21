<?php
    // This script checks admin login credentials
    
    session_start();
    require_once 'connect.php';
    
    // check that form items are submitted
    if ((isset($_POST['a_user']) && isset($_POST['password']))) {
        $username = trim($_POST['a_user']);
        $password = trim($_POST['password']);
        
        // check if credentials are in db
        $query = "SELECT * "
                . "FROM admins "
                . "WHERE a_user='$username' "
                . "AND password='$password'";
        
        $result = mysqli_query($conn, $query);
        
        if ($result->num_rows == 1) {
            // login successful, set admin session username
            $_SESSION['a_user'] = $username;
        }
        else {
            session_destroy();
            header('Location: admin_login_error.php');
        }
    }   // already logged on
    else if (isset($_SESSION['a_user'])) {
        
    }
    else {  // failed to verify
        session_destroy();
        header('Location: admin_login_error.php');
    }
?>

