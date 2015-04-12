<?php
    require_once '../backend/gamer_verify.php';
    $user = ($_SESSION['g_user']); 
    function usernamediv() {
        printf($_SESSION['g_user']); 
    }


function bought(){
    require '../backend/connect.php';
    $user = $_SESSION['g_user'];
    $game_id= $_SESSION['currGame_ID'];
    $name = $_SESSION['currGame'];
    $sql_request = "SELECT g_user, game_id FROM game_list WHERE g_user='$user' AND game_id = $game_id";
    $result = mysqli_query($conn, $sql_request);
    if($result ->num_rows == 0) {
        $sql_request = "INSERT INTO game_list VALUES ('$user',$game_id)";
        $result = mysqli_query($conn, $sql_request);

        if ($result) {
            echo "<h2> Thanks, you have bought ".$name."!";
            echo "<div class='cancelbtn'><button class='boughtgame_btn' onclick='backtoshop()'>Go Back to Shop</button>";
        }
        else {
            echo "Error: could not buy game";
        }
    }
    else {
        echo "You already own this game.";
    }
}
?>

<html>
<link rel="stylesheet" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/shopstyle.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
    <script>
            function backtoshop() {
                location.href = "shop.php";
            }
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
            <?php bought()?>
        </div>
    </div>
</body>

</html>