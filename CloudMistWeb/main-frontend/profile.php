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
                        .'<td><p><b>Current Password</b></p></td>'
                        .'<td><input type="password" name="cur_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td><p><b>New Password</b></p></td>'
                        .'<td><input type="password" name="new_password"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td><p><b>Confirm Password</b></p></td>'
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
                        .'<td><p><b>Credit Card</b></p></td>'
                        .'<td><input type="text" name="cc_change"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td><p><b>Address</b></p></td>'
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
                    }
                    else
                    {
                        $query = "UPDATE payment_info SET credit_card='$ccChange', billing_address='$adrsChange' WHERE g_user='$user'";  
                        $result = mysqli_query($conn, $query);
                    }
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