<?php
    // This script checks the login credentials
    
    session_start();
    require_once 'connect.php';
    
    // check that form items are submitted
    if (isset($_POST['g_user']) and isset($_POST['password'])) {
        $username = $_POST['g_user'];
        $password = $_POST['password'];
        
        // check if credentials are in db
        $query = "SELECT * "
                . "FROM gamer "
                . "WHERE g_user='$username' "
                . "AND password='$password'";
        
        $result = mysqli_query($conn, $query);
        
        if ($result->num_rows == 1) {
            // login successful, set session username
            $_SESSION['username'] = $username;
        }
        else {
            session_destroy();
            header('Location: login_error.php');
        }
    } else {
        session_destroy();
        header('Location: login_error.php');
    }

?>


