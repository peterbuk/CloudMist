<?php
?>


<!DOCTYPE html>
<html>
<head>
    <title>Cloud Mist - Please login</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
</head>
     
<body>
    <header>
        <h1 class="logo">Cloud Mist</h1>
        <div id="admin-button">
            <a href="admin-login.php">Admin</a>
        </div>
    </header>
    
    <div class="mid-content">
        <h1>Log in below.</h1>
        <form method="post" action="gamer-verify.php">
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
                    <td colspam="2"><input class="form-field" type="submit" value="  Submit  "></td>
                    <td></td>
                    <td></td>
                    <td><input type="button" value="Register" onclick="register_guser()"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>