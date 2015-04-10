<?php
    
    require_once '../backend/gamer_verify.php';

    function getList(){
        require '../backend/connect.php';
        $username = $_SESSION['username'];
        
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
<link rel="stylesheet" href="stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>
        <header>
        <h1>Welcome <?php printf($_SESSION['username']) ?></h1>
        </header>
    
	<div class="container">
		<div id="sidebar">
		<ul id="sideButton">
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="gamelist.php">GAME LIST</a></li>
                    <li><a href="shop.php">SHOP</a></li>
                    <li><a href="friends.php">FRIENDS</a></li>
		</ul>
		</div>
		<div id="content">
                    
                    <h1> USER GAME LIST </h1>
                    <?php getList()?>
                    
                    
		</div>
	</div>
</body>

</html>