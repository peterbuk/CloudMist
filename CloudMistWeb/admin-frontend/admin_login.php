<?php
    require_once '../backend/connect.php';
    
    if (session_status() != PHP_SESSION_NONE) {
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cloud Mist - Please login</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
          rel='stylesheet' type='text/css'>
</head>
     
<body>
    <header>
        <h1 class="logo">Cloud Mist</h1>
    </header>
    
    <div class="mid-content">
        <h1>Admin Control Panel</h1>
        <form method="post" action="admin_profile.php">
            <table class="form-field">
                <tr>
                    <td>Username:</td>
                    <td><input class="form-field" type="text" name="a_user"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="form-field" type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input class="form-field" type="submit" value="  Submit  "></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>