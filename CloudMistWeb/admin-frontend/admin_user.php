<?php
require '../backend/admin_verify.php';
    
    // a user was banned
    if ( isset($_POST['g_user']) && isset($_POST['status']))
    {
        $g_user = $_POST['g_user'];
        $status = $_POST['status'];
        $a_user = $_SESSION['a_user'];
        
        $status_change_q = "UPDATE gamer "
                . "SET status='$status', a_user='$a_user' "
                . "WHERE g_user='$g_user'";
        $result = mysqli_query($conn, $status_change_q);
        
        if ($result) {
            $msg = $g_user . "'s status changed successfully to " . $status;
        } else {
            $msg = "Failed to change status for " . $g_user;
        }
    }
    
    function getList(){
        require '../backend/connect.php';
        
        $gamer_list_q = "SELECT g_user, status "
                . "FROM gamer ";
                
        $gamers = mysqli_query($conn, $gamer_list_q);
        
        $num_games_q = "SELECT g_user, COUNT(*) "
                . "FROM game_list "
                . "GROUP BY g_user";
        $num_games = mysqli_query($conn, $num_games_q);
        
        if($gamers -> num_rows > 0) {
            echo '<table class="admin-table"><tr>'
                    . '<th>Name</th>'
                    . '<th># Games Bought</th>'
                    . '<th>Status</th>'
                . '</tr>';

            //output data
            while($row = $gamers -> fetch_assoc()) {
                
                // find the associated gamer to print their # games
                $num = 0;
                while ($row2 = $num_games -> fetch_assoc()) {
                    if ($row2["g_user"] == $row["g_user"]) {
                        $num = $row2["COUNT(*)"];
                        break;
                    }
                }
                mysqli_data_seek($num_games, 0);
                
                echo "<tr><td>".$row["g_user"]."</td>"
                       . "<td>".$num."</td>"
                       . "<td>".$row["status"]."</td>";
            }
            echo "</table><br><br>";
            
            // create drop down list of users
            echo "<h3>Ban/Unban User: </h3>"
            . "<form method='post' action='admin_user.php'>"
            . "<select class='form-field' name='g_user'>";

            mysqli_data_seek($gamers, 0);
            while ($row = $gamers -> fetch_assoc()) {
                printf("<option value=%s> %s </option>", $row['g_user'], $row['g_user']);
            }
            echo "</select>";
            echo "<select class='form-field' name='status'>"
            . "<option value='Active'>Active</option>"
            . "<option value='Banned'>Banned</option>"
            . "</select><br><br>"
            . "<input class='form-field' type='submit' value='Change'>"
            . "</form>";
        }
        else {
            echo "There are no gamers registered!";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cloud Mist - Admin Profile</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
        <link rel="stylesheet" href="../css/adminstyle.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
      rel='stylesheet' type='text/css'>
</head>

<body>
    <header>
        <h1>Welcome <?php printf($_SESSION['a_user']); ?></h1>
    </header>
    
    <div class="container">
        <div id="sidebar">
            <ul id="sideButton">
                <a href="admin_profile.php"><li>PROFILE</li></a>
                <a href="admin_user.php"><li id="current">USER MANAGEMENT</li></a>
                <a href="admin_company.php"><li>COMPANY STATUS</li></a>
                <a href="admin_blog.php"><li>NEWS BLOG<</li></a>
                <a href="admin_login.php" onclick="logoffjs()"><li id="logoff">LOGOFF</li></a>
            </ul>
        </div>
        <div id="content">
            <h1>User Management</h1>
            <?php getList();
                if (isset($msg)) { echo "<p>".$msg."</p>"; }
            ?>
        </div>
    </div>
</body>

</html>