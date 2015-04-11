<?php
    require_once '../backend/connect.php';
    require_once '../backend/gamer_verify.php';
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
            <h1>TEST</h1>
            <p>TEST</p>
        </div>
    </div>
</body>

</html>