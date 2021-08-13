<?php
    include_once ('db.php');
       mysqli_select_db($conn, 'rooms');
       $link = mysqli_real_escape_string($conn, $_POST['link']);
       $roomID = mysqli_real_escape_string($conn, $_POST['key']);
        
       if(!empty($link)){
           $sql = mysqli_query($conn, "UPDATE rooms SET video='$link' WHERE roomID='$roomID'") or die();
       }
       else{
       }
?>       