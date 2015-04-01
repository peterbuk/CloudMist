<?php
       $dbhost = 'localhost';
        $dbuser = 'user';
        $dbpass = 'root';

        //create connection
        $conn = new mysqli($dbhost, $dbuser, $dbpass, "cloud_mist");

        //Check connection
        if($conn->connect_errno) {
            die("Connection failed: " . $conn -> connect_errno);
        }

?>
