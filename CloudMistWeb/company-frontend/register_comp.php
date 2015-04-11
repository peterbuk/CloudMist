<?php
    require_once '../backend/connect.php';

    // check if fields are posted
    if (isset($_POST['c_name']) && isset($_POST['location']) && isset($_POST['status'])) {
        $c_name = $_POST['c_name'];
        $location = $_POST['location'];
        $status = $_POST['status'];
        
        // check for non-empty
        if (!empty($c_name) && !empty($location) && !empty($status)) {
            
            // check for location requirement of >5 characters
            if (strlen($location) > 5) {
                
                // check that username doesn't already exist
                $username_check_q = "SELECT * "
                        . "FROM company "
                        . "WHERE c_name='$c_name'";
                $result = mysqli_query($conn, $username_check_q);
                
                if ($result->num_rows == 0) {
                    // finally okay to create user
                    $create_comp_q = "INSERT INTO company "
                            . "VALUES ('$c_name', '$location', '$status')";
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
            <p>Password has to be at least 5 characters long.</p>

            <form method="post" action="register_comp.php">
                <table class="form-field">
                    <tr>
                        <td>Username:</td>
                        <td><input class="form-field" type="text" name="c_name"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input class="form-field" type="text" name="location"></td>
                    </tr>
                    <tr>
                        <td>Location:</td>
                        <td><input class="form-field" type="text" name="status"></td>
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

