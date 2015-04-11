<?php
    require '../backend/reviewer_verify.php';
    
    //check if content posted
    if (isset($_POST['content']) && isset($_POST['game_id']) && isset($_POST['score'])) {
        $game_id = $_POST['game_id'];
        $content = $_POST['content'];
        $score = $_POST['score'];
        $r_user = $_SESSION['username'];
        
        //check for non-empty content
        if (!empty($content)){
            $r_insert_query = "INSERT INTO review (content, score, game_id, r_user)"
                    . "VALUES ('$content', $score, $game_id, '$r_user')";
            $result = mysqli_query($conn, $r_insert_query);
            
                if ($result) {
                    $msg = "Game review has been submitted";
                }
                else {
                    $msg= "Error: Could not submit review";
                }
        }
        else {
            $msg = "Error: Please enter review text";
        }
    }
    
    function getGameList() {
        require   '../backend/connect.php';
        
        $g_list_query = "SELECT name,game_id "
                . "FROM game ";
        $result = mysqli_query($conn, $g_list_query);
        
        if ($result->num_rows > 0){
            /*while ($row = mysql_fetch_array($result)) {
            printf ("THE RESULT IS %s", $row['name']);
            }*/
            
            echo "<select class='form-field' name='game_id'>";
            printf("<option value= ''> Select a Game </option>");
            while ($row = $result -> fetch_assoc()) {
                printf("<option value= %s> %s </option>", $row['game_id'], $row['name']);
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
<link rel="stylesheet" href="../css/companystyle.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>
        <header>
        <h1>Welcome <?php printf($_SESSION['username']) ?></h1>
        </header>
    
	<div class="container">
            <form method="post" action="reviewer_form.php">
                <p> Please fill in the fields below: </p>
                <div class="ddFields">
                <?php getGameList() ?>
                <select class="form-field" name="score">
                    <option value=""> Select Score </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                    <option value="6"> 6 </option>
                    <option value="7"> 7 </option>
                    <option value="8"> 8 </option>
                    <option value="9"> 9 </option>
                    <option value="10"> 10 </option>
                </select>
                </div>
                <textarea class="form-field" name="content" rows="9" cols="75" placeholder="Please enter the review"></textarea>
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