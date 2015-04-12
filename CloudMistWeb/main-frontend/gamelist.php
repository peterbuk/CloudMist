<?php
    
    require_once '../backend/gamer_verify.php';
    $user = ($_SESSION['g_user']); 
    
    function getList(){
        require '../backend/connect.php';
        $username = $_SESSION['g_user'];
        
        $query = "SELECT name, description, price, genre, release_date "
                . "FROM game INNER JOIN game_list ON game_list.game_id=game.game_id "
                . "WHERE game_list.g_user='$username'";
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows > 0) {
            echo '<table id="gameList"><tr>'
                    . '<th>NAME</th>'
                    . '<th>DESCRIPTION</th>'
                    . '<th>PRICE</th>'
                    . '<th>GENRE</th>'
                    . '<th>RELEASE DATE</th>'
                . '</tr>';

            //output data
            while($row = $result -> fetch_assoc()) {
                echo "<tr><td>".$row["name"]."</td>"
                       . "<td>".$row["description"]."</td>"
                       . "<td>".$row["price"]."</td>"
                       . "<td>".$row["genre"]."</td>"
                       . "<td>".$row["release_date"]."</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 results";
        }
        //$link->close();
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel='stylesheet' href='../css/shopstyle.css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
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

                <h1> USER GAME LIST </h1>
                <?php getList()?>


        </div>
    </div>
</body>

</html>