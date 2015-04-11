<?php

    function newNews($title, $content, $a_user) {
        require '../backend/connect.php';
        
        $date = time();
        
        // title can't be empty, but content can be
        if (!empty($title)) {
            $new_news_q = "INSERT INTO news_item VALUES "
                    . "(default, '$title', '$content', FROM_UNIXTIME('$date'), '$a_user')";
            $result = mysqli_query($conn, $new_news_q);
            
            if ($result) {
                $msg = "News item has been blogged";
            }
            else {
                $msg = "Error: Could not submit news item";
            }
        } else {
            $msg = "Error: Missing a title in the news item.";
        }
    }


    // print out all the news items
    function showNews() {
        require '../backend/connect.php';
        
        $fetch_news_q = "SELECT title, content, date_written, a_user "
                . "FROM news_item "
                . "ORDER BY date_written DESC";
        
        $result = mysqli_query($conn, $fetch_news_q);
        
        while ($row = $result -> fetch_assoc()) {
            echo "<div class='news_item'>"
            . "<h2>".$row['title']."</h2>"
            . "<h3> Written by: ".$row['a_user']." on "
            . $row['date_written']."</h3>"
            . "<p>".$row['content']."</p>"
            . "</div>";
        }
    }
?>
