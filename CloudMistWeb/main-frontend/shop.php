<!-- 
CPSC471
-->
<?php
    function filldiv() {
        require_once '../backend/connect.php';
        
        $sql_request = "SELECT game_id, name, description, price, genre, release_date FROM game";
        $result = mysqli_query($conn, $sql_request);


        if($result->num_rows > 0) {
            echo '<table id="gameList"><tr>'
                    . '<th>ID</th>'
                    . '<th>NAME</th>'
                    . '<th>DESCRIPTION</th>'
                    . '<th>PRICE</th>'
                    . '<th>GENRE</th>'
                    . '<th>RELEASE DATE</th>'
                    . '<th>DOWNLOAD</th>'
                . '</tr>';

            //output data
            while($row = $result -> fetch_assoc()) {
                $game_id = $row["game_id"];
                echo "<tr><td>".$row["game_id"]."</td>"
                       . "<td>".$row["name"]."</td>"
                       . "<td>".$row["description"]."</td>"
                       . "<td>".$row["price"]."</td>"
                       . "<td>".$row["genre"]."</td>"
                       . "<td>".$row["release_date"]."</td>"
                       . '<td><a href="currentGame.php?game_id='.$game_id.'"> Buy now </a></td>'
                    . "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 results";
        }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>
    <div class="container">
        <div id="sidebar">
            <ul id="sideButton">
                <li><a href="#">PROFILE</a></li>
                <li><a href="#">GAME LIST</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">FRIENDS</a></li>
            </ul>
        </div>
        <div id="content">
            <h1>SHOP</h1>
            <h2>Games List</h2>
            <?php filldiv() ?>
        </div>
    </div>
</body>

</html>