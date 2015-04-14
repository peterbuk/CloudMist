<?php
    require_once '../backend/connect.php';

    // check if fields are posted
    if (isset($_POST['c_name']) && isset($_POST['password']) && isset($_POST['location'])) {
        $c_name = $_POST['c_name'];
        $password = $_POST['password'];
        $location = $_POST['location'];
        $status = "Pending";
        
        // check for non-empty
        if (!empty($c_name) && !empty($password) && !empty($location)) {
            
            // check for password requirement of >5 characters
            if (strlen($password) > 5) {
                
                // check that username doesn't already exist
                $username_check_q = "SELECT * "
                        . "FROM company "
                        . "WHERE c_name='$c_name'";
                $result = mysqli_query($conn, $username_check_q);
                
                if ($result->num_rows == 0) {
                    // finally okay to create user
                    $create_comp_q = "INSERT INTO company (c_name, password, location, status)" 
                            . "VALUES ('$c_name', '$password', '$location', '$status')";
                    $result = mysqli_query($conn, $create_comp_q);
                    
                    if ($result) {
                        $msg = "User '$c_name' has been created. Welcome!";
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
                $msg = "Error: Password has to be at least 6 characters long.";
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
        <link rel="stylesheet" href="../css/companystyle.css">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
              rel='stylesheet' type='text/css'>
        <script>
            function return_login() {
                location.href = "company_login.php";
            }
        </script>
    </head>
    
    <body>
        <header>
            <h1 class="logo">Cloud Mist</h1>
        </header>
        
        <div class="mid-content">
            <h1>Please fill in the following information.</h1>
            <p>Password has to be at least 6 characters long.</p>

            <form method="post" action="register_comp.php">
                <table class="form-field">
                    <tr>
                        <td>Username:</td>
                        <td><input class="form-field" type="text" name="c_name"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input class="form-field" type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Location:</td>
                        <td><input class="form-field" type="text" name="location"></td>
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

