<!-- 
CPSC471
-->
<?php
    require_once '../backend/gamer_verify.php';
    function usernamediv() {
        printf($_SESSION['username']); 
    }

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
                    . '<th>DOWNLOAD</th>'
                . '</tr>';

            //output data
            while($row = $result -> fetch_assoc()) {
                $game_id = $row["game_id"];
                echo "<tr><td>".$row["game_id"]."</td>"
                       . "<td>".$row["name"]."</td>"
                       . "<td>".$row["price"]."</td>"
                       . "<td>".$row["genre"]."</td>"
                       . "<td>".$row["release_date"]."</td>"
                       . '<td><a href="../main-frontend/currentGame.php?game_id='.$game_id.'"> More Info </a></td>'
                    . "</tr>";
            }
            echo "</tbody></table>";
            /*
            while($row = $result -> fetch_assoc()) {
                $game_id = $row["game_id"];
                echo '<div class="gametable"'
                    . '<a class="table-row" href="../main-frontend/currentGame.php?game_id='.$game_id.'">'
                       . '<div class="table-cell">'.$game_id.'</div>'
                       . '<div class="table-cell">'.$row["name"]."</div>"
                       . '<div class="table-cell">'.$row["description"].'</div>'
                       . '<div class="table-cell">'.$row["price"]."</div>"
                       . '<div class="table-cell">'.$row["genre"]."</div>"
                       . '<div class="table=cell">'.$row["release_date"]."</div>"
                    . '</a></div>';
            }*/
        }
        else {
            echo "0 results";
        }

        
    }
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="shopstyle.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>
    <div class="header">
        <div class="logo_title">Cloud Mist</div>
        <div class="username">Welcome <?php usernamediv()?></div>
        <div class="clear"></div>
    </div>
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