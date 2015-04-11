<?php
    require_once '../backend/connect.php';

    // check if fields are posted
    if (isset($_POST['g_user']) && isset($_POST['password'])) {
        $g_user = $_POST['g_user'];
        $password = $_POST['password'];
        
        // check for non-empty
        if (!empty($g_user) && !empty($password)) {
            
            // check for password requirement of >5 characters
            if (strlen($password) > 5) {
                
                // check that username doesn't already exist
                $username_check_q = "SELECT * "
                        . "FROM gamer "
                        . "WHERE g_user='$g_user'";
                $result = mysqli_query($conn, $username_check_q);
                
                if ($result->num_rows == 0) {
                    // finally okay to create user
                    $create_user_q = "INSERT INTO gamer "
                            . "VALUES ('$g_user', '$password', 'Active')";
                    $result = mysqli_query($conn, $create_user_q);
                    
                    if ($result) {
                        $msg = "User '$g_user' has been created. Welcome!";
                    }
                    else {
                        $msg= "Error: Could not create account";
                    }
                }
                else {
                    $msg = "Error: Username already exists!";
                }
            }
            else {
                $msg = "Error: Password must be greater than 5 characters.";
            }
        }
        else {
            $msg = "Error: Please fill in all fields.";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cloud Mist - Registration</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
              rel='stylesheet' type='text/css'>
        <script>
            function return_login() {
                location.href = "login.php";
            }
        </script>
    </head>
    
    <body>
        <header>
            <h1 class="logo">Cloud Mist</h1>
        </header>
        
        <div class="mid-content">
            <h1>Please fill in the following information.</h1>
            <p>Password has to be at least 5 characters long.</p>

            <form method="post" action="register_guser.php">
                <table class="form-field">
                    <tr>
                        <td>Username:</td>
                        <td><input class="form-field" type="text" name="g_user"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input class="form-field" type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="form-field" type="submit" value="  Submit  "></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" value="Back to Login" onclick="return_login()"></td>
                    </tr>
                </table>
            </form>
            
            <p> <?php 
                if (isset($msg))
                    printf($msg);
                ?>
            </p>
        </div>
    </body>
</html>

