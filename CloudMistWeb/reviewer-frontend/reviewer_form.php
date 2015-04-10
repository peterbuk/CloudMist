<?php
    require_once '../backend/reviewer_verify.php';
    
    //check if content posted
    /*if (isset($_POST['content'])) {
        
        //
    }*/
    
    function getGameList() {
        require    '../backend/connect.php';
        
        $g_list_query = "SELECT name"
                . "FROM game";
        $result = mysqli_query($conn, $query);
        $testme = "hi";
        
        if ($result->num_rows >= 0){
            /*while ($row = mysql_fetch_array($result)) {
            printf ("THE RESULT IS %s", $row['name']);
            }*/
            
            echo "<select>";
            while ($row = mysql_fetch_array($result)) {
               // echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                echo "<option value='" . $testme . "'>" . $testme . "</option>";
            }
            echo "</select>";
        }
        
        else {
            $msg = "there are no games in the list";
        }
    }
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>
        <header>
        <h1>Welcome <?php printf($_SESSION['username']) ?></h1>
        </header>
    
	<div class="container">
            <form method="post" action="reviewer_form.php">
                <p><?php getGameList() ?></p>
                <textarea class="form-field" name="content" rows="4" cols="50"></textarea>
                <input class="form-field" type="submit" value="  Submit  ">
            </form>
	</div>
    
        <p> <?php 
            if (isset($msg))
                printf($msg);
            ?>
        </p>
</body>

</html>