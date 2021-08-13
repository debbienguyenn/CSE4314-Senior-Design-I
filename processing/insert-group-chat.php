<?php
    include_once ('db.php');
        mysqli_select_db($conn, 'groupchat');
        $outgoing = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $roomID = mysqli_real_escape_string($conn, $_POST['key']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO groupchat(roomID, username, msg) 
                                    VALUES ('$roomID', '$outgoing', '$message')") or die();
        }
        else{
        }           
?>       