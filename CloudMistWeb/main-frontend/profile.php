<?php
	require_once '../backend/gamer_verify.php';
        require_once '../backend/connect.php';
        $user = ($_SESSION['g_user']); 
        if (isset($_POST['cur_password']) && isset($_POST['new_password']) && isset($_POST['con_password']))
        {
            $curPassword = $_POST['cur_password'];
            $newPassword = $_POST['new_password'];
            $conPassword = $_POST['con_password'];
			
        
            $query = "SELECT password FROM gamer WHERE password='$curPassword' AND g_user='$user'";
            $result = mysqli_query($conn,$query) or die(mysqli_error());
            
            if ($result && ($newPassword == $conPassword))
            {
                $query = "UPDATE gamer SET password='$newPassword'";
                
                $result = mysqli_query($conn, $query) or die(mysqli_error());
            }
        }
       
        if (isset($_POST['cc_change']))
        {
            
            $ccChange = $_POST['cc_change'];
            
            $query = "UPDATE payment_info SET credit_card='$ccChange' WHERE g_user='$user'";  
            
            $result = mysqli_query($conn, $query) or die(mysqli_error());
        }
        
        if (isset($_POST['adrs_change']))
        {
            $adrsChange = $_POST['adrs_change'];  
            
            echo $adrsChange;
            
            $query = "UPDATE payment_info SET billing_address='$adrsChange' WHERE g_user='$user'";
            
            $result = mysqli_query($conn, $query) or die(mysqli_error());
        }
		
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' 
      rel='stylesheet' type='text/css'>

</head>

<body>
    <header>
        <h1>Welcome <?php printf($_SESSION['g_user']); ?></h1>
    </header>
    
    <div class="container">
        <div id="sidebar">
            <ul id="sideButton">
                <li><a href="#">PROFILE</a></li>
                <li><a href="gamelist.php">GAMELIST</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">FRIENDS</a></li>
            </ul>
        </div>
        
        <div id="content">
            <h3>Change Password</h3>
            <form method="post" action="profile.php" >
            
                <table border="0" >
                    <tr>
                        <td><b>Current Password</b></td>
                        <td><input type="password" name="cur_password"></td>
                    </tr>
                    <tr>
                        <td><b>New Password</b></td>
                        <td><input type="password" name="new_password"></td>
                    </tr>
                    <tr>
                        <td><b>Confirm Password</b></td>
                        <td><input type="password" name="con_password"></td>
                    </tr>
                    <br/>
                    <tr>
                        <td><input type="submit" value="Update"/></td>
                    </tr>
                </table>

                <h3>Change Payment Info</h3>

                <table border="0" >
                    <tr>
                        <td><b>Credit Card</b></td>
                        <td><input type="text" name="cc_change"></td>
                    </tr>
                    <tr>
                        <td><b>Address</b></td>
                        <td><input type="text" name="adrs_change"></td>
                    </tr>
                    <br/>
                    <tr>
                        <td><input type="submit" value="Update"/></td>
                    </tr>
                </table>
            </form>	
        </div>
    </div>
</body>

</html>