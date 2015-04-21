<?php
    require_once '../backend/gamer_verify.php';
    $user = ($_SESSION['g_user']); 

    function printPassword()
    {
        require '../backend/connect.php';
        $user = ($_SESSION['g_user']); 
        
        echo '<h3>Change Password</h3>'
             .'<p>Password has to be at least 6 characters long.</p>'
             .'<form method="post" action="profile.php" >'
                .'<table class="form-field" border="0" >'
                    .'<tr>'
                        .'<td>Current Password</td>'
                        .'<td><input type="password" name="cur_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td>New Password</td>'
                        .'<td><input type="password" name="new_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td>Confirm Password</td>'
                        .'<td><input type="password" name="con_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td></br><input type="submit" value="Update" name="pass"/></td>'
                    .'</tr>'
                .'</table></br>';
    }

    
    function printPayment() {
        echo '<hr></br>'
                .'<h3>Change Payment Info</h3>'
                    .'<table class="form-field" border="0" >'
                    .'<tr>'
                        .'<td>Credit Card</td>'
                        .'<td><input type="text" name="cc_change"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td>Address</td>'
                        .'<td><input type="text" name="adrs_change"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td></br><input type="submit" value="Update" name="payment"/></td>'
                    .'</tr>'
                .'</table>'
            .'</form>';
    }
    
    if (isset($_POST['pass']) && isset($_POST['cur_password']) && isset($_POST['new_password']) && isset($_POST['con_password']))
    {
        if (!empty($_POST['cur_password']) && !empty($_POST['new_password']) && !empty($_POST['con_password']))
        {
            $curPassword = $_POST['cur_password'];
            $newPassword = $_POST['new_password'];
            $conPassword = $_POST['con_password'];

            $verify_q = "SELECT * FROM gamer WHERE password='$curPassword' AND g_user='$user'";
            $verify = mysqli_query($conn, $verify_q);

            // make sure old password matches
            if ($verify->num_rows != 0) {
                
                // make sure new and confirm password match
                if ($newPassword == $conPassword) { 
                    
                    // make sure password is long enough
                    if  (strlen($newPassword) > 5) {
                        $query = "UPDATE gamer SET password='$newPassword' WHERE g_user='$user'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $pass_msg = "Password successfully changed.";
                        }
                        else {
                            // it shouldn't go here.
                            $pass_msg = "Password failed to change. Please try again.";
                        }
                    } 
                    else {
                        $pass_msg = "New password has to be at least 6 characters.";
                    }
                }
                else {
                    $pass_msg = "The two new passwords don't match. Check your spelling!";
                }
            }
            else {
                $pass_msg = "Old password did not match.";
            }
        }
        else {
            $pass_msg = "Please fill in all fields.";
        }
    }
    
    if (isset($_POST['payment']) && isset($_POST['cc_change']) && isset($_POST['adrs_change']))
    {
        if (!empty($_POST['cc_change']) && !empty($_POST['adrs_change'])) {
            $ccChange = $_POST['cc_change'];
            $adrsChange = $_POST['adrs_change']; 

            // make sure credit card # is valid
            if(is_numeric($ccChange) && strlen($ccChange) == 16)
            {
                // check if they already have info and if we should update or insert
                $check_q = "SELECT * FROM payment_info WHERE g_user='$user'";
                $check = mysqli_query($conn, $check_q);

                // they don't have previous info
                if($check->num_rows == 0) {
                    $query = "INSERT INTO payment_info (credit_card, billing_address, g_user) "
                            . "VALUES ('$ccChange', '$adrsChange', '$user')";  
                }
                // update old info with new info
                else {
                    $query = "UPDATE payment_info "
                            . "SET credit_card='$ccChange', billing_address='$adrsChange' "
                            . "WHERE g_user='$user'";  
                }
                
                $result = mysqli_query($conn, $query);
                
                if ($result) {
                    $pay_msg = "Payment info successfully changed.";
                } else {
                    // it shouldn't go here
                    $pay_msg = "Failed to change payment info. Please try again.";
                }
            }
            else {
                $pay_msg = "The inputted credit card number is not valid, please try again.";
            }
        }
        else {
            $pay_msg = "Please fill in all fields.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' 
      rel='stylesheet' type='text/css'>

    <script>
        function logoffjs() {
            location.href = "login.php";
        }
    </script>
</head>

<body>
    <div id="sidebar">
        <div class="logo_title">Cloud Mist</div>
        <ul id="sideButton">
            <a href="home.php"><li>HOME</li></a>
            <a href="profile.php"><li>PROFILE</li></a>
            <a href="gamelist.php"><li>GAME LIST</li></a>
            <a href="shop.php"><li>SHOP</li></a>
            <a href="friends.php"><li>FRIENDS</li></a>
            <a href="login.php" onclick="logoffjs()"><li id="logoff">LOGOFF</li></a>
        </ul>
    </div>
    
    <div class="container">
        <div class="header">
            <h2 class="username">Welcome <?php echo $user; ?></h2>
            <div class="clear"></div>
        </div>
        
        <div id="content">
            <h1>PROFILE</h1>
            <?php 
                printPassword(); 
                
                if (isset($pass_msg))
                    echo '<p>'.$pass_msg.'</p>';
                
                printPayment();
                
                if (isset($pay_msg))
                    echo '<p>'.$pay_msg.'</p>';
            
            ?>	
        </div>
    </div>
</body>

</html>