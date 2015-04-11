<?php
    require '../backend/admin_verify.php';
    
    // a change was made to a company status
    if ( isset($_POST['c_name']) && isset($_POST['status']))
    {
        $c_name = $_POST['c_name'];
        $status = $_POST['status'];
        $a_user = $_SESSION['a_user'];
        
        $status_change_q = "UPDATE company "
                . "SET status='$status', a_user='$a_user'"
                . "WHERE c_name='$c_name'";
        $result = mysqli_query($conn, $status_change_q);
        
        if ($result) {
            $msg = $c_name . "'s status changed successfully to " . $status;
        } else {
            $msg = "Failed to change status for " . $c_name;
        }
            
    }
    
    function getList(){
        require '../backend/connect.php';
        
        $comp_list_q = "SELECT c_name, location, status "
                . "FROM company ";
        $companies = mysqli_query($conn, $comp_list_q);
        
        $num_games_q = "SELECT c_name, COUNT(*) "
                . "FROM GAME "
                . "GROUP BY c_name";
        $num_games = mysqli_query($conn, $num_games_q);
        
        if($companies -> num_rows > 0) {
            echo '<table class="admin-table"><tr>'
                    . '<th>Name</th>'
                    . '<th>Location</th>'
                    . '<th># Games</th>'
                    . '<th>Status</th>'
                . '</tr>';

            //output data
            while($row = $companies -> fetch_assoc()) {
                
                // find the associated company to print their # games
                $num = 0;
                while ($row2 = $num_games -> fetch_assoc()) {
                    if ($row2["c_name"] == $row["c_name"]) {
                        $num = $row2["COUNT(*)"];
                        break;
                    }
                }
                mysqli_data_seek($num_games, 0);
                
                echo "<tr><td>".$row["c_name"]."</td>"
                       . "<td>".$row["location"]."</td>"
                       . "<td>".$num."</td>"
                       . "<td>".$row["status"]."</td>";
                       
            }
            echo "</table><br><br>";
            
            // create drop down list of company and status to change
            echo "<h3>Change Company Status: </h3>"
            . "<form method='post' action='admin_company.php'>"
            . "<select class='form-field' name='c_name'>";

            mysqli_data_seek($companies, 0);
            while ($row = $companies -> fetch_assoc()) {
                printf("<option value=%s> %s </option>", $row['c_name'], $row['c_name']);
            }
            echo "</select>";
            echo "<select class='form-field' name='status'>"
            . "<option value='Approved'>Approved</option>"
            . "<option value='Banned'>Banned</option>"
            . "</select><br><br>"
            . "<input class='form-field' type='submit' value='Change'>"
            . "</form>";
        }
        else {
            echo "There are no companies registered!";
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
                <a href="admin_user.php"><li>USER MANAGEMENT</li></a>
                <a href="admin_company.php"><li id="current">COMPANY STATUS</li></a>
                <a href="admin_blog.php"><li>NEW BLOG</li></a>
                <a href="admin_login.php" onclick="logoffjs()"><li id="logoff">LOGOFF</li></a>
            </ul>
        </div>
        <div id="content">
            <h1>Company Management</h1>
            <?php getList();
                if (isset($msg)) { echo "<p>".$msg."</p>"; }
            ?>
            
            
        </div>
    </div>
</body>

</html>