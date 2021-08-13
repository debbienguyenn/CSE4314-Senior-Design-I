<?php
    include_once ('db.php');
       mysqli_select_db($conn, 'chat');
       $outgoing = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
       $incoming = mysqli_real_escape_string($conn, $_POST['incoming_id']);
       $message = mysqli_real_escape_string($conn, $_POST['message']);
        
       if(!empty($message)){
           $sql = mysqli_query($conn, "INSERT INTO chat (fromUser, toUser, msg) 
                                VALUES ('$outgoing', '$incoming', '$message')") or die();
       }
       else{
       }
?>       