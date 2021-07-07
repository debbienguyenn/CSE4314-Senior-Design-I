<?php
   session_start();
   if(!isset($_SESSION['username'])){
       include_once ('pages/db.php');
       $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
       $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
       $message = mysqli_real_escape_string($conn, $_POST['message']);

       if(!empty($message)){
           $sql = mysqli_query($conn, "INSERT INTO chat (fromUser, toUser, message) 
                                VALUES ('{$outgoing_id}', '{$incoming_id}', '{$message}')") or die();
       }
       else{

       }
   }   
?>       