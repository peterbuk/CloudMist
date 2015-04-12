<?php        
    require_once '../backend/gamer_verify.php';
    require_once '../backend/connect.php';
    $user = ($_SESSION['g_user']); 

    function getFriends()
    {          
        require '../backend/connect.php';
        $user = ($_SESSION['g_user']); 
        echo "<h3>Friends</h3>";
        $query = "SELECT f2_user FROM friend_of WHERE f1_user='$user'";
        $result = mysqli_query($conn, $query);

        if($result->num_rows > 0)
        {
            echo "<p>";
            
            while($row = $result -> fetch_assoc())
            {
                echo $row["f2_user"]."</br>";
            }

            echo "</p>";
            echo "</br>";
        }
        else
        {
            echo '<p>'
                    .'No friends found.'
                    .'</p>';
        }

        echo '<form method="post" action="friends.php" >'
                .'<h3>Add Friend</h3>'
                .'<table border="0" >'
                    .'<tr>'
                        .'<td><p><b>Name</b></p></td>'
                        .'<td><input type="text" name="add_friend"></td>'
                    .'</tr>'
                    .'<tr>'
                        .'<td><br/><input type="submit" value="Add"/></td>'
                    .'</tr>'
                .'</table>'
            .'</form>';
        
        if (isset($_POST['add_friend']))
        {
            $addFriend = $_POST['add_friend'];

            if(!empty($_POST['add_friend']))
            {
                $query = "SELECT f1_user FROM friend_of WHERE f1_user='$addFriend'";
                $result = mysqli_query($conn, $query);

                if($result)
                {
                    $query = "INSERT INTO friend_of VALUES ('$user', '$addFriend')";  
                    $result = mysqli_query($conn, $query);
                    header("Refresh: 0");
                }
            }
        }
    }		
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
            <h1>FRIENDS</h1>
            <?php getFriends() ?>
        </div>
    </div>
</body>

</html>