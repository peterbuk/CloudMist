<?php
    require_once '../backend/connect.php';
    require_once '../backend/admin_verify.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cloud Mist - Admin Panel</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
      rel='stylesheet' type='text/css'>
    <script>
        function logoffjs() {
            location.href = "admin_login.php";
        }
    </script>
</head>

<body>
    
    
    <div id="sidebar">
        <div class="logo_title">Cloud Mist</div>
        <ul id="sideButton">
            <a href="admin_profile.php"><li>HOME</li></a>
            <a href="admin_user.php"><li>USER MANAGEMENT</li></a>
            <a href="admin_company.php"><li>COMPANY STATUS</li></a>
            <a href="admin_blog.php"><li>NEWS BLOG</li></a>
            <a href="admin_login.php" onclick="logoffjs()"><li id="logoff">LOGOFF</li></a>
        </ul>
    </div>
    
    <div class="container">
        <div class="header">
            <h1 class="username">Welcome <?php printf($_SESSION['a_user']); ?></h1>
        </div>
        
        <div id="content">
            <h1>Admin Control Panel</h1>
            
        </div>
    </div>
</body>

</html>