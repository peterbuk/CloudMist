<?php
       $dbhost = 'localhost';
        $dbuser = 'user';
        $dbpass = 'root';
        $db = 'cloud_mist';
        $port= 3306;

        //create connection
        // $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
        $conn = mysqli_init();
        $sucess = mysqli_real_connect($conn, $dbhost,$dbuser,$dbpass, $db, $port);
        
        
        //Check connection
        if(!$sucess) {
            die("Connection failed: " . $conn -> connect_errno);
        }

?>