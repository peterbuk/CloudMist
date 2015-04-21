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
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
          rel='stylesheet' type='text/css'>
    <script>
        function gamer() {
            location.href = "register_guser.php";
        }
        function reviewer() {
            location.href= "../reviewer-frontend/reviewer_login.php";
        }
        function company() {
            location.href= "../company-frontend/company_login.php";
        }
        function admin() {
            location.href= "../admin-frontend/admin_login.php";
        }
    </script>
</head>
     
<body>
    <header>
        <h1 class="logo">Cloud Mist</h1>
    </header>
    
    <div class="mid-content" style="width: 50%; margin: 0 auto;">
        <input type="button" value="Gamer Log In" onclick="gamer()">
        <input type="button" value="Company Log In" onclick="company()">
        <input type="button" value="Reviewer Log In" onclick="reviewer()">
        <input type="button" value="Admin Log In" onclick="admin()">
    </div>
</body>

</html>