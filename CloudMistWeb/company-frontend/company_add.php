<?php
    require_once '../backend/company_verify.php';
    require   '../backend/connect.php';
    
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
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/companystyle.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<head>
</head>

<body>
        <header>
        <h1>Welcome <?php printf($_SESSION['c_name']) ?></h1>
        </header>
    
	<div class="container">
            <div id="sidebar">
		<ul id="sideButton">
                    <li><a href="company_add.php">ADD GAME</a></li>
                    <li><a href="company_patch.php">PATCH GAME</a></li>
		</ul>
            </div>
            <div id="content">
                
                <form method="post" action="reviewer_form.php">
                    <table class="form-field">
                        <tr> 
                            <td> Game Name </td>
                            <td> <input type="text" class="form-field" name="name"> </td>
                        </tr>
                    </table>
                </form>
                
            </div>
            
	</div>
    
        <p> <?php 
            if (isset($msg))
                printf($msg);
            ?>
        </p>
</body>

</html>