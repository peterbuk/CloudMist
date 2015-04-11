<?php
    require_once '../backend/connect.php';
    require_once '../backend/admin_verify.php';
    
    // check if content posted
    if (isset($_POST['title']) && isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = time();
        $a_user = $_SESSION['a_user'];
        
        // title can't be empty, but content can be
        if (!empty($title)) {
            $new_news_q = "INSERT INTO news_item VALUES "
                    . "(default, '$title', '$content', FROM_UNIXTIME('$date'), '$a_user')";
            $result = mysqli_query($conn, $new_news_q);
            
            if ($result) {
                $msg = "News item has been blogged";
            }
            else {
                $msg = "Error: Could not submit news item";
            }
        } else {
            $msg = "Error: Missing a title in the news item.";
        }
    }
    
    // print out all the news items
    function showNews() {
        require '../backend/connect.php';
        
        $fetch_news_q = "SELECT title, content, date_written, a_user "
                . "FROM news_item "
                . "ORDER BY date_written DESC";
        
        $result = mysqli_query($conn, $fetch_news_q);
        
        while ($row = $result -> fetch_assoc()) {
            echo "<div class='news_item'>"
            . "<h2>".$row['title']."</h2>"
            . "<h3> Written by: ".$row['a_user']." on "
            . $row['date_written']."</h3>"
            . "<p>".$row['content']."</p>"
            . "</div>";
        }
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
    <header>
        <h1>Welcome <?php printf($_SESSION['a_user']); ?></h1>
    </header>
    
    <div class="container">
        <div id="sidebar">
            <ul id="sideButton">
                <a href="admin_profile.php"><li>PROFILE</li></a>
                <a href="admin_user.php"><li>USER MANAGEMENT</li></a>
                <a href="admin_company.php"><li>COMPANY STATUS</li></a>
                <a href="admin_blog.php"><li id="current">NEWS BLOG</li></a>
                <a href="admin_login.php" onclick="logoffjs()"><li id="logoff">LOGOFF</li></a>
            </ul>
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