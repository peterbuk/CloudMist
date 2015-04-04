<!-- 
CPSC471
-->

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>

	<?php

        if (isset($_POST['cur_password']) && isset($_POST['new_password']) && isset($_POST['con_password']))
        {
            $curPassword = $_POST['cur_password'];
            $newPassword = $_POST['new_password'];
            $conPassword = $_POST['con_password'];
			
            $query = "SELECT * FROM gamer WHERE password='$curPassword'";

            $result = mysqli_query($con,$query) or die(mysqli_error());
        }
		
	?>


    <div class="container">
        <div id="sidebar">
            <ul id="sideButton">
                <li><a href="#">PROFILE</a></li>
                <li><a href="#">GAMELIST</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">FRIENDS</a></li>
            </ul>
        </div>
		
		
		
		
		
		
		
		
		
		
		
        <div id="content">
            <h3>Change Password</h3>
            <form method="post" action="index.php" >
            
            <table border="0" >
            <tr>
            <td>
            <b>Current Password</b>
            </td>
            <td><input type="text" name="cur_password">
            </tr>
            
            <tr>
            <td>
            <b>New Password</b>
            </td>
            <td><input type="text" name="new_password">
            </tr>
            
            <tr>
            <td>
            <b>Confirm Password</b>
            </td>
            <td><input type="text" name="con_password">
            </tr>
            
            <br/>
            
            <tr>
            <td><input type="submit" value="Update"/>
            </tr>
        </table>
                
        </form>
			
            <h3>Change Payment Info</h3>
            <form method1="post" action="index.php" >
            <table border="0" >
                
            <tr>
            <td>
            <b>Credit Card</b>
            </td>
            <td><input type="text" name="cc_change">
            </tr>
            
            <tr>
            <td>
            <b>Address</b>
            </td>
            <td><input type="text" name="adrs_change">
            </tr>
            
            <br/>
            <tr>
            <td><input type="submit" value="Update"/>
            </tr>
        </table>
        </form>
			
			
        </div>
    </div>
</body>

</html>