<?php
   session_start();
       include('db.php');
       mysqli_select_db($conn, 'groupchat');
       $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
       $incoming_id = mysqli_real_escape_string($conn, $_POST['key']);
       $output = "";

$sql = "SELECT * FROM groupchat WHERE (sender = '$outgoing_id' AND roomID = '$incoming_id')
                OR (sender = '$incoming_id' AND roomID =  '$outgoing_id')";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['sender'] == $outgoing_id){ // this stands then it is sender
                    $output .='<div class="outgoing-chats">               
                                <div class="outgoing-chats-msg">
                                <p>'.$row['msg'].'</p>
                                </div>
                            </div>';
                }
                else{ // it is a receiver
                    $output .='<div class="received-chats">
                    <div class="received-chats-img">
                        <img src="../images/profile.jpg">
                    </div>
                    <div class="received-msg-inbox">
                        <p>'.$row['msg'].'</p>
                    </div>
                    </div>';
                }
            }
            echo $output;
        }
    else{
        header("../pages/homepage.php");
    }
?>