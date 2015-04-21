<?php
    // This script checks the gamer login credentials
    
    session_start();
    require_once 'connect.php';
    
    // check that form items are submitted
    if (isset($_POST['g_user']) && isset($_POST['password'])) {
        $username = trim($_POST['g_user']);
        $password = trim($_POST['password']);
        
        // check if credentials are in db
        $query = "SELECT * "
                . "FROM gamer "
                . "WHERE g_user='$username' "
                . "AND password='$password'";
        
        $result = mysqli_query($conn, $query);
        
        if ($result->num_rows == 1) {
            // check if user is banned
            $row = $result -> fetch_assoc();
            if ($row['status'] == "Banned") {
                session_destroy();
                header('Location: banned.php');
            } else {
                // login successful, set gamer session username
                $_SESSION['g_user'] = $username;
            }
        }
        else {
            session_destroy();
            header('Location: login_error.php');
        }
    }   // already logged on
    else if (isset($_SESSION['g_user'])) {        
    }
    else {
        session_destroy();
        header('Location: login_error.php');
    }

?>


