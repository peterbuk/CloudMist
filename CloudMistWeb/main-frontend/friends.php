<?php        
        require_once '../backend/gamer_verify.php';

        function getList()
        {          
            require '../backend/connect.php';
            $user = ($_SESSION['g_user']);
            
            $query = "SELECT f2_user FROM friend_of WHERE f1_user='$user'";
            $result = mysqli_query($conn,$query);
            
            if($result->num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    echo $row["f2_user"]."</br>";
                }
                
                echo "</br>";
            }
            else
            {
                echo "No friends found.";
            }
            
            if (isset($_POST['add_friend']))
            {
                $addFriend = $_POST['add_friend'];
                
                $query = "SELECT f1_user FROM friend_of WHERE f1_user='$addFriend'";
                $result = mysqli_query($conn,$query);
                
                if($result)
                {
                    $query = "INSERT INTO friend_of VALUES ('$user', '$addFriend')";  
                    $result = mysqli_query($conn, $query);
                    header("Refresh: 0");
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

</head>

<body>
    <header>
        <h1>Welcome <?php printf($_SESSION['g_user']); ?></h1>
    </header>
    
    <div class="container">
        <div id="sidebar">
            <ul id="sideButton">
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="gamelist.php">GAMELIST</a></li>
                <li><a href="shop.php">SHOP</a></li>
                <li><a href="#">FRIENDS</a></li>
            </ul>
        </div>
        
        <div id="content">
            <h1>FRIENDS</h1>
            <h3>Friends</h3>
            <?php
            
            getList()
            
            ?>
            <form method="post" action="friends.php" >
                <h3>Add Friend</h3>
                <table border="0" >
                    <tr>
                        <td><b>Name</b></td>
                        <td><input type="text" name="add_friend"></td>
                    </tr>
                    <br/>
                    <tr>
                        <td><input type="submit" value="Add"/></td>
                    </tr>
                </table>
            </form>	
        </div>
    </div>
</body>

</html>