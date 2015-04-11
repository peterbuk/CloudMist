<?php
    require_once '../backend/gamer_verify.php';
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
            echo "0 results";
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
            <?php verify_buy()?>
        </div>
    </div>
</body>

</html>