<?php
    require_once '../backend/gamer_verify.php';
    $user = ($_SESSION['g_user']); 
    function usernamediv() {
        printf($_SESSION['g_user']); 
    }


    
    //function to verify user, verify user's credentials and make sure they wanna buy it
    function verify_buy(){
        require '../backend/connect.php';
        $user = $_SESSION['g_user'];
        $game = $_SESSION['currGame'];
        $game_price = $_SESSION['currGame_Price'];
        
        $sql_request = "SELECT credit_card, billing_address, g_user FROM payment_info WHERE g_user = '".$user."'";
        $result = mysqli_query($conn, $sql_request);
        if($result->num_rows == 1) {

            //output data
            $row = $result -> fetch_assoc();
                echo "<h1>".$game."</h1>"
                    . "<table class='confirm_buy'>"
                    . "<tr><td>Username: </td>"
                    . "<td>".$row["g_user"]."</td></tr>"
                    . "<tr><td>Credit Card:</td>"
                    . "<td>".$row["credit_card"]."</td></tr>"
                    . "<tr><td>Billing Address:</td>"
                    . "<td>".$row["billing_address"]."</td></tr>"
                    . "<tr><td>Price: </td>"
                    . "<td> $".$game_price."</td></tr>"
                    . "</table>";
            
                 echo "<div class='cancelbtn'><button class='back_btn' onclick='backtogame()'> Cancel </button></div>";
                 echo "<div class='confirmbtn'><button class='confirm_btn' onclick='boughtgame()'> Buy Game </button></div>";
        }
        else {
            echo "You have not entered your credit card or billing information yet.";
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
            function backtogame() {
                location.href = "shop.php";
            }
            function boughtgame() {
                location.href = "boughtGame.php";
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
            <?php verify_buy()?>
        </div>
    </div>
</body>

</html>