<?php
   session_start();
       include('db.php');
       mysqli_select_db($conn, 'rooms');
       $link = mysqli_real_escape_string($conn, $_POST['link']);
       $roomID = mysqli_real_escape_string($conn, $_POST['key']);

       

        $sql = "SELECT * FROM rooms WHERE roomID='$roomID'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            $row = mysqli_fetch_assoc($query);
            $output = '<div class = "iframe-container">
            <iframe width="400" height="240" 
            src="'.$row['video'].'"title="YouTube video player" frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
            gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>';
            echo $output;
        }
    else{
        header('../pages/homepage.php');
    }
?>