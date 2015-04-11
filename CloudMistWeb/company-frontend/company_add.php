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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
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
                        <col width="500">
                        <col width="500">
                        <col width="500">
                        <col width="500">
                        <tr> 
                            <td> Game Name </td>
                            <td> <input type="text" class="form-field" name="name"> </td>
                        </tr>
                        <tr>
                            <td style="min-width: 90px"> Price($) </td>
                            <td style="min-width: 90px"><input type="number" class="form-field" name="price" step=0.01 value=0.00></td>
                            <td style="min-width: 50px"> Release Date </td>
                            <td style="min-width: 90px"> <input type="date" id="datepicker" name="release_date"</td>
                        </tr>
                        <tr>
                            <td> Description </td>
                            <td colspan = 4>  <textarea class="form-field" name="description" rows="9" cols="75" placeholder="Please enter a brief description"></textarea></td>
                        </tr>
                        <tr>
                            <td> Genre </td>
                            <td> 
                                <select>
                                    <option value="Action"> Action </option>
                                    <option value="RPG"> RPG </option>
                                    <option value="Shooter"> Shooter </option>
                                    <option value="Fighting"> Fighting </option>
                                    <option value="Platformer"> Platformer </option>
                                    <option value="Strategy"> Strategy </option>
                                    <option value="Puzzle"> Puzzle </option>
                                    <option value="Rhythm"> Rhythm </option>
                                </select>
                            </td>
                            <td> Version Number</td>
                            <td>
                                <input type="text" class="form-field" name="path_version">
                            </td>
                        </tr>
                        <tr>
                            <td> Upload Game Data </td>
                            <td>
                                <input class="form-field" type="button" id="get_file" value="Select Game Data">
                                <input class="form-field" type="file" id="my_file" name="game_data">
                            </td>
                        </tr>
                        <tr>
                            <td> <input class="form-field" type="submit" value="  Submit  "> </td>
                        </tr>
                    </table>
                </form>
                
            </div>
            
	</div>
    
        <script>
	//Grab file
	document.getElementById('get_file').onclick = function() {
	document.getElementById('my_file').click();
	};
        </script>
    
        <p> <?php 
            if (isset($msg))
                printf($msg);
            ?>
        </p>
</body>

</html>