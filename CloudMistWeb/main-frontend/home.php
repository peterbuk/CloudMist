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

    <script>
        function logoffjs() {
            location.href = "login.php";
        }
    </script>
</head>

<body>
    
    <div id="sidebar">
        <div class="logo_title">Cloud Mist</div>
        <ul id="sideButton">
            <a href="home.php"><li>HOME</li></a>
            <a href="profile.php"><li>PROFILE</li></a>
            <a href="gamelist.php"><li>GAME LIST</li></a>
            <a href="shop.php"><li>SHOP</li></a>
            <a href="friends.php"><li>FRIENDS</li></a>
            <a href="login.php" onclick="logoffjs()"><li id="logoff">LOGOFF</li></a>
        </ul>
    </div>
    
    <div class="container">
        <div class="header">
            <h2 class="username">Welcome <?php echo $user; ?></h2>
            <div class="clear"></div>
        </div>
        
        <div id="content">
            <h2>Recent News</h2><br><br>
            <?php showNews(); ?>
        </div>
    </div>
</body>

</html>