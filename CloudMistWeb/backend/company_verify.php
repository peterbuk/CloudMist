<?php
    // This script checks the company login credentials
    
    session_start();
    require_once 'connect.php';
    
    // check that form items are submitted
    if (isset($_POST['c_name']) && isset($_POST['password'])) {
        $username = $_POST['c_name'];
        $password = $_POST['password'];
        
        // check if credentials are in db
        $query = "SELECT * "
                . "FROM company "
                . "WHERE c_name='$username' "
                . "AND password='$password'"
                . "AND status!='Banned'";
        
        $result = mysqli_query($conn, $query);
        
        if ($result->num_rows == 1) {
            // check if company is approved yet
            $row = $result -> fetch_assoc();
            
            if ($row['status'] == "Pending") {
                session_destroy();
                header('Location: company_pending.php');
            } else {
                // login successful, set company session username
                $_SESSION['c_name'] = $username;
            }
        }
        else {
            session_destroy();
            header('Location: company_login_error.php');
        }
    }   // already logged on
    else if (isset($_SESSION['c_name'])) {        
    }
    else {
        session_destroy();
        header('Location: company_login_error.php');
    }

?>


