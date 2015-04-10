<?php
require_once '../backend/gamer_verify.php';
    function usernamediv() {
        printf($_SESSION['username']); 
    }

/* 
 * Makes a form and fills in the the current selected game. 
 */
function currentGameDiv() {
    require '../backend/connect.php';    

    $game_id = filter_input(INPUT_GET, 'game_id');
    $sql_request = "SELECT name, price, description, release_date, genre, on_sale, game_data, c_name, patch_version FROM game WHERE game_id = 1";
    $result = mysqli_query($conn, $sql_request);
    if($result->num_rows == 1) {

        //output data
        while($row = $result -> fetch_assoc()) {
            echo "<h1>".$row["name"]."</h1>"
                . "<table id='currentGameInfo'>"
                . "<tr><td>Description:</td>"
                . "<td>".$row["description"]."</td></tr>"
                . "<tr><td>Price:</td>"
                . "<td> $".$row["price"]."</td></tr>"
                . "<tr><td>Genre:</td>"
                . "<td>".$row["genre"]."</td></tr>"
                . "<tr><td>Release Date:</td>"
                . "<td>".$row["release_date"]."</td></tr>"
                . "<tr><td>On Sale:</td>"
                . "<td>".$row["on_sale"]."</td></tr>"
                . "<tr><td>Company Name: </td>"
                . "<td>".$row["c_name"]."</td></tr>"
                . "</table>";
        }
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
                    <li><a href="../main-frontend/shop.php">SHOP</a></li>
                    <li><a href="#">FRIENDS</a></li>
                </ul>
            </div>
            <div id="content">
                <?php currentGameDiv() ?>
                <form type="post" action="currentGame.php">
                    
                </form>
            </div>
        </div>
    </body>

</html>
</html>