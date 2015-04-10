<?php
    require_once '../backend/connect.php';
    require_once '../backend/admin_verify.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cloud Mist - Admin Profile</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
      rel='stylesheet' type='text/css'>
</head>

<body>
    <header>
        <h1>Welcome <?php printf($_SESSION['a_user']); ?></h1>
    </header>
    
    <div class="container">
        <div id="sidebar">
            <ul id="sideButton">
                <a href="admin_profile.php"><li>PROFILE</li></a>
                <a href="admin_user.php"><li>USER MANAGEMENT</li></a>
                <a href="admin_company.php"><li>COMPANY MANAGEMENT</li></a>
                <a href="admin_blog.php"><li>NEW BLOG</li></a>
                <a href="admin_login.php" onclick="logoffjs()"><li>LOGOFF</li></a>
            </ul>
        </div>
        <div id="content">
            <h1>New Blog Entry</h1>
            
        </div>
    </div>
</body>

</html>