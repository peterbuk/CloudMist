<?php
    require '../backend/company_verify.php';
    /*
    //check if content posted
    if (isset($_POST['game_id'])) {
        $game_id = $_POST['game_id'];
        $c_user = $_SESSION['c_name'];
        
        //check for non-empty content
        $sales_query = "SELECT count(*) FROM game_list WHERE game_id ='$game_id'";
        $result = mysqli_query($conn, $sales_query);
        if($result){
            $row = $result->fetch_row();
            echo "<h2>".$game_id ."</h2>"
            . "<div class='copies_sold'> Number of copies sold: ". $row[0]."</div>";
            
        }
        else {
            echo 'No sales for '. $game_id;
        }
    }*/
    
    function getGameList() {
        require   '../backend/connect.php';
        $c_user = $_SESSION['c_name'];
        $g_list_query = "SELECT game_id, name, price "
                . "FROM game WHERE c_name='$c_user'";
        $result = mysqli_query($conn, $g_list_query);
        
        if ($result->num_rows > 0){
            
            while ($row = $result -> fetch_assoc()) {
                $game_id = $row['game_id'];
                $name = $row['name'];
                $price = $row['price'];
                //check for non-empty content
                $sales_query = "SELECT count(*) FROM game_list WHERE game_id ='$game_id'";
                $result2 = mysqli_query($conn, $sales_query);
                if($result2){
                    $row2 = $result2->fetch_row();
                    $copies_sold = $row2[0];
                    $revenue = $copies_sold * $price;
                    echo "<hr><h2>".$name."</h2>"
                            . "<div class='copies_sold'> Number of copies sold: ". $copies_sold."</div>"
                            . "<div class='revenue'> Revenue gained: $". $revenue."</div>";

                }
                else {
                    echo 'No sales for '. $name;
                }
            }
        }
        
        else {
            $msg = "There are no games in the list";
        }
    }
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/companystyle.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>   
    <div id="sidebar">
        <div class="logo_title">Cloud Mist</div>
        <ul id="sideButton">
            <a href="company_add.php"><li>ADD GAME</li></a>
            <a href="company_patch.php"><li>PATCH GAME</li></a>
            <a href="company_sales.php"><li>SALES</li></a>
            <a href="company_login.php"><li id="logoff">LOGOFF</li></a>
        </ul>
    </div>
    
    <div class="container">
        <header>
            <h1>Welcome <?php printf($_SESSION['c_name']) ?></h1>
        </header>
            <div id="content">
                <h1>Sales Statistics:</h1>
                <div id="patch">
                    <?php getGameList() ?>
                </div>
            </div>
	</div>
    
        <p> <?php 
            if (isset($msg))
                printf($msg);
            ?>
        </p>
    
</body>

</html>