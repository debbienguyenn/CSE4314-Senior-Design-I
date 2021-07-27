<?php
    include_once ('db.php');
       mysqli_select_db($conn, 'groupchat');
       $outgoing = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
       $incoming = mysqli_real_escape_string($conn, $_POST['key']);
       $message = mysqli_real_escape_string($conn, $_POST['message']);
        
       if(!empty($message)){
           $sql = mysqli_query($conn, "INSERT INTO groupchat (sender, roomID, msg) 
                                VALUES ('$outgoing', '$incoming', '$message')") or die();
       }
       else{
       }
?>       