<?php
        $user = 'root';
        $password = 'root';
        $db = 'cloud_mist';
        $host = 'localhost';
        $port = 3306;

        $link = mysqli_init();
        $success = mysqli_real_connect(
           $link, 
           $host, 
           $user, 
           $password, 
           $db,
           $port
        );

        //Check connection
        if(! $success) {
            die("Connection failed: " . mysql_error());
        }
;?>
