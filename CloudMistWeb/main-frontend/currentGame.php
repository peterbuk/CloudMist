<?php
require_once '../backend/gamer_verify.php';
    function usernamediv() {
        printf($_SESSION['g_user']); 
    }

/* 
 * Makes a form and fills in the the current selected game. 
 */
function currentGameDiv() {
    require '../backend/connect.php';    

    $game_id = filter_input(INPUT_GET, 'game_id');
    $sql_request = "SELECT name, price, description, release_date, genre, on_sale, game_data, c_name, patch_version FROM game WHERE game_id=".$game_id;
    $result = mysqli_query($conn, $sql_request);
    if($result->num_rows == 1) {
        $row = $result -> fetch_assoc();
        $_SESSION['currGame_ID'] = $game_id;
        $_SESSION['currGame'] = $row["name"];
        $_SESSION['currGame_Price'] = $row['price'];
        //output data
            echo "<h1>".$row["name"]."</h1>"
                . "<table class='currentGameInfo'>"
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
    else {
        echo "0 results";
    }
}

function haveGame() {
    require '../backend/connect.php';
    $game_id = filter_input(INPUT_GET, 'game_id');
    $username = $_SESSION['g_user'];
    $sql_request = "SELECT * FROM game_list WHERE g_user='$username' AND game_id ='$game_id'";
    $result = mysqli_query($conn, $sql_request);
    if($result->num_rows == 1) {
        //make button unclickable
        echo "<div class='cancelbtn'><button class='boughtgame_btn' type='button' disabled> You already own this game </button></div>";
    }
    else {
        echo "<div class='confirmbtn'><button class='confirm_btn' onclick='buygame()'> Buy Game </button></div>";
    }
}


function listReviews() {
    require '../backend/connect.php';
    $game_id = filter_input(INPUT_GET, 'game_id');
    $sql_request = "SELECT * FROM review WHERE game_id ='$game_id'";
    $result = mysqli_query($conn, $sql_request);
    if($result->num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo "<div class='news_item'><table class='review'>"
                    . "<tr><td>Reviewer: </td>"
                    . "<td>".$row["r_user"]."</td></tr>"
                    . "<tr><td>Score: </td>"
                    . "<td>".$row["score"]."/10 </td></tr>"
                    . "<tr><td>Content:</td>"
                    . "<td>".$row["content"]."</td></tr>"
                    . "</table></div>";
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/shopstyle.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <head>
        <script>
            function buygame() {
                location.href = "buyGame.php";
            }
        </script>
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
                    <a href="../main-frontend/profile.php"><li>PROFILE</li></a>
                    <a href="../main-frontend/gamelist.php"><li>GAME LIST</li></a>
                    <a href="../main-frontend/shop.php"><li>SHOP</li></a>
                    <a href="../main-frontend/friends.php"><li>FRIENDS</li></a>
                </ul>
            </div>
            <div id="content">
                <?php currentGameDiv();
                        haveGame();
                        listReviews();
                ?>
            </div>
        </div>
    </body>

</html>
</html>