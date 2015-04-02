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

		//3. If the form is submitted or not.
        //3.1 If the form is submitted
        if (isset($_POST['usr_change']))
        {
            //3.1.1 Assigning posted values to variables.
            $usr = $_POST['usr_change'];
			
            //3.1.2 Checking the values are existing in the database or not
            $query = "SELECT * FROM gamer WHERE g_user='$usr'";

            $result = mysqli_query($con,$query) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            
            //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
            if ($count == 1){
                $_SESSION['g_user'] = $usr;
            } else{
                //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
                echo "Invalid Login Credentials.";
            }
        }
		
		
		//3. If the form is submitted or not.
        //3.1 If the form is submitted
        if (isset($_POST['pw_change']))
        {
            //3.1.1 Assigning posted values to variables.
            $pw = $_POST['pw_change'];
			
            //3.1.2 Checking the values are existing in the database or not
            $query = "SELECT * FROM gamer WHERE password='$pw'";

            $result = mysqli_query($con,$query) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            
            //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
            if ($count == 1){
                $_SESSION['password'] = $pw;
            } else{
                //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
                echo "Invalid Login Credentials.";
            }
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
            <h3>TEST</h3>
            <form method="post" action="index.php" >
			<table border="0" >
            <tr>
            <td>
            <b>Username</b>
            </td>
            <td><input type="text" name="usr_change">
            </tr>
            <tr>
            <td>
            <b>Password</b>
            </td>
            <td><input type="text" name="pw_change">
            </tr>
			<br/>
            <tr>
            <td><input type="submit" value="Update"/>
            </tr>
        </table>
        </form>
			
			<h3>TEST</h3>
            <form method="post" action="index.php" >
			<table border="0" >
            <tr>
            <td>
            <b>CC</b>
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