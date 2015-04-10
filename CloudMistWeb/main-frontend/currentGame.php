<?php

/* 
 * Makes a form and fills in the the current selected game. 
 */
require_once '../backend/connect.php';    

$game_id = filter_input(INPUT_GET, 'game_id');
$sql_request = "SELECT name, price, description, release_date, genre, on_sale, game_data, c_name, patch_version FROM game WHERE game_id = 1";
echo 'Hello '. $game_id;
$result = mysqli_query($conn, $sql_request);




?>
<html>
    <head>
        
    </head>
    <body>
        <form method="get" action="currentGame.php">
            <table id ="currentGame">
                <tr>
                    <td>Name: </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Release Date:</td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>