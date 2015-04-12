<?php
    require_once '../backend/connect.php';
    require_once '../backend/admin_verify.php';
        
    require '../backend/fetch_news.php';
    
    // check if content posted
    if (isset($_POST['title']) && isset($_POST['content'])) {
        newNews($_POST['title'], $_POST['content'], $_SESSION['a_user']);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cloud Mist - Admin Profile</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
      rel='stylesheet' type='text/css'>
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
            <h1>New Item</h1>
            <form method="post" action="admin_blog.php">
                <p class="piece">Title: </p> <input class="piece" type="text" name="title">
                <br><br>
                <textarea class="piece" name="content" rows="10" cols="75" placeholder="Please enter the news item"></textarea>
                <br>
                <input class="form-field" type="submit" value="  Submit  ">
            </form>
            <?php if (isset($msg)) { echo "<p>".$msg."</p>"; } ?>
            <hr>
            <?php showNews(); ?>
        </div>
    </div>
</body>

</html>