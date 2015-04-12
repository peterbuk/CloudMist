<?php
    require '../backend/company_verify.php';
    
    //check if content posted
    if (isset($_POST['patchNum']) && isset($_POST['game_id']) && isset($_POST['game_data'])) {
        $game_id = $_POST['game_id'];
        $patch_Num = $_POST['patchNum'];
        $patch_File = $_POST['game_data'];
        $c_user = $_SESSION['c_name'];
        
        //check for non-empty content
        if (!empty($patch_Num)){
            $patch_query = "UPDATE game SET patch_version='$patch_Num', game_data ='$patch_File'";
            $result = mysqli_query($conn, $patch_query);
            
                if ($result) {
                    $msg = "Patch has been submitted";
                }
                else {
                    $msg= "Error: Could not submit patch";
                }
        }
        else {
            $msg = "Error: Please enter patch Number";
        }
    }
    
    function getGameList() {
        require   '../backend/connect.php';
        $c_user = $_SESSION['c_name'];
        $g_list_query = "SELECT game_id, name, game_data, patch_version "
                . "FROM game WHERE c_name='$c_user'";
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
                <h1>Patch Game</h1>
                <div id="patch">
                    <form method="post" action="company_patch.php">
                        <p> Please fill in the fields below: </p>
                        <div class="ddFields">
                            <?php getGameList() ?>
                            <div class="patch_version">Patch Version #: <input class="form-field" type="text" name="patchNum"></div>
                            <div class="game_data">
                                 Upload File: 
                                <input type="button" id="get_file" value="Select Game Data">
                                <input type="file" name="game_data" id="my_file">
                            </div>
                        </div>
                        <input class="form-field" type="submit" value="  Submit  ">
                    </form>
                </div>
                <p> <?php 
                     if (isset($msg))
                    printf($msg);
                ?>
        </p>
            </div>
	</div>
    
        <script>
	//Grab file
	document.getElementById('get_file').onclick = function() {
	document.getElementById('my_file').click();
	};
        </script>
    
</body>

</html>