<?php
    require_once '../backend/gamer_verify.php';
    require_once '../backend/connect.php';
    $user = ($_SESSION['g_user']); 

    require '../backend/fetch_news.php';
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
                <a href="home.php"><li>HOME</li></a>
                <a href="profile.php"><li>PROFILE</li></a>
                <a href="gamelist.php"><li>GAME LIST</li></a>
                <a href="shop.php"><li>SHOP</li></a>
                <a href="friends.php"><li>FRIENDS</li></a>
            </ul>
        </div>
        
        <div id="content">
            <h2>Recent News</h2><br><br>
            <?php showNews(); ?>
        </div>
    </div>
</body>

</html>