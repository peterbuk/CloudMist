<?php
    require_once '../backend/gamer_verify.php';
    $user = ($_SESSION['g_user']); 

    function getProfile()
    {
        require '../backend/connect.php';
        $user = ($_SESSION['g_user']); 
        
        echo '<h3>Change Password</h3>'
             .'<form method="post" action="profile.php" >'
                .'<table border="0" >'
                    .'<tr>'
                        .'<td><p>Current Password</p></td>'
                        .'<td><input type="password" name="cur_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td><p>New Password</p></td>'
                        .'<td><input type="password" name="new_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td><p>Confirm Password</p></td>'
                        .'<td><input type="password" name="con_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td></br><input type="submit" value="Update"/></td>'
                    .'</tr>'
                .'</table>'
                .'</br><hr></br>'
                .'<h3>Change Payment Info</h3>'
                    .'<table border="0" >'
                    .'<tr>'
                        .'<td><p>Credit Card</p></td>'
                        .'<td><input type="text" name="cc_change"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td><p>Address</p></td>'
                        .'<td><input type="text" name="adrs_change"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td></br><input type="submit" value="Update"/></td>'
                    .'</tr>'
                .'</table>'
            .'</form>';
        
        if (!empty($_POST['cur_password']) && !empty($_POST['new_password']) && !empty($_POST['con_password']))
        {
            if (isset($_POST['cur_password']) && isset($_POST['new_password']) && isset($_POST['con_password']))
            {
                $curPassword = $_POST['cur_password'];
                $newPassword = $_POST['new_password'];
                $conPassword = $_POST['con_password'];
                
                $query = "SELECT password FROM gamer WHERE password='$curPassword' AND g_user='$user'";
                $result = mysqli_query($conn,$query);

                if ($result->num_rows != 0 && ($newPassword == $conPassword))
                {
                    $query = "UPDATE gamer SET password='$newPassword' WHERE g_user='$user'";
                    $result = mysqli_query($conn, $query);
                    
                    if ($result)
                    {
                        echo '</br>'
                        .'Success!';
                    }
                    else
                    {
                        echo '</br>'
                        .'Password UPDATE Error!!';
                    }
                    
                }
                else
                {
                    echo '</br>'
                        .'Change password failed.';
                }
            }
        }
        else if (!empty($_POST['cc_change']) && !empty($_POST['adrs_change']))
        {
            if (isset($_POST['cc_change']) && isset($_POST['adrs_change']))
            {
                $ccChange = $_POST['cc_change'];
                $adrsChange = $_POST['adrs_change']; 
                
                if(is_numeric($_POST['cc_change']))
                {
                    $query = "SELECT credit_card, billing_address FROM payment_info WHERE g_user='$user'";
                    $result = mysqli_query($conn, $query);

                    if($result->num_rows == 0)
                    {
                        $query = "INSERT INTO payment_info (credit_card, billing_address, g_user) VALUES ('$ccChange', '$adrsChange', '$user')";  
                        $result = mysqli_query($conn, $query);
                        
                        if ($result)
                        {
                            echo '</br>'
                            .'Success!';
                        }
                        else
                        {
                            echo '</br>'
                            .'CreditCard INSERT Error!!';
                        }
                    }
                    else
                    {
                        $query = "UPDATE payment_info SET credit_card='$ccChange', billing_address='$adrsChange' WHERE g_user='$user'";  
                        $result = mysqli_query($conn, $query);
                        
                        if ($result)
                        {
                            echo '</br>'
                            .'Success!';
                        }
                        else
                        {
                            echo '</br>'
                            .'CreditCard UPDATE Error!!';
                        }
                    }
                }
                else
                {
                    echo '</br>'
                        .'Credit Card and/or Address change failed.';
                }
            }
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
            <?php getProfile() ?>	
        </div>
    </div>
</body>

</html>