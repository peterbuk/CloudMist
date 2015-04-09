<?php

/* 
 * Makes a form and fills in the the current selected game. 
 */
require_once 'connect.php';    

$game_id = filter_input(INPUT_GET, 'game_id');
$sql_request = "SELECT name, price, description, release_date, genre, on_sale, game_data, c_name, patch_version FROM game WHERE game_id = 1";
echo 'Hello '. $game_id;
mysqli_query($conn, $sql_request);
    

?>


<html>
   
</html>