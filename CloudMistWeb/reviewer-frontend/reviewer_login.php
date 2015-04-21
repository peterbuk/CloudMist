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
    <link rel="stylesheet" href="../css/reviewerstyle.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
          rel='stylesheet' type='text/css'>
    <script>
        function register_ruser() {
            location.href = "register_ruser.php";
        }
    </script>
    <style>
        h1{color:white;}
    </style>
</head>
     
<body style="background-color: darkslategrey; color: white;">
    <header>
        <h1 class="logo">Cloud Mist</h1>
    </header>
    
    <div class="mid-content">
        <h1>Reviewer Log in below.</h1>
        <form method="post" action="reviewer_form.php">
            <table class="form-field">
                <tr>
                    <td>Username:</td>
                    <td><input class="form-field" type="text" name="r_user"></td>
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
                    <td><input type="button" value="Register" onclick="register_ruser()"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
