<!-- 
CPSC471
-->
<?php
    require_once '../backend/gamer_verify.php';
    $user = ($_SESSION['g_user']);

    function filldiv() { 
        require '../backend/connect.php';
        $sql_request = "SELECT game_id, name, price, genre, release_date FROM game";
        $result = mysqli_query($conn, $sql_request);


        if($result->num_rows > 0) {
            echo '<table id="gameList"><tbody><tr>'
                    . '<th>ID</th>'
                    . '<th>NAME</th>'
                    . '<th>PRICE</th>'
                    . '<th>GENRE</th>'
                    . '<th>RELEASE DATE</th>'
                    . '<th>MORE INFO</th>'
                . '</tr>';

            //output data
            while($row = $result -> fetch_assoc()) {
                $game_id = $row["game_id"];
                echo "<tr><td>".$row["game_id"]."</td>"
                       . "<td>".$row["name"]."</td>"
                       . "<td>".$row["price"]."</td>"
                       . "<td>".$row["genre"]."</td>"
                       . "<td>".$row["release_date"]."</td>"
                       . '<td><a href="../main-frontend/currentGame.php?game_id='.$game_id.'"> Buy Game </a></td>'
                    . "</tr>";
            }
            echo "</tbody></table>";
            
        }
        else {
            echo "0 results";
        }

        
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' 
      rel='stylesheet' type='text/css'>
<link href='../css/shopstyle.css' rel='stylesheet'>

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
            <h1>SHOP</h1>
            <h2>Games List</h2>
            <?php filldiv() ?>
        </div>
    </div>
</body>

</html>