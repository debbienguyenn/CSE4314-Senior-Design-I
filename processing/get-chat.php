<?php
   session_start();
       include('db.php');
       mysqli_select_db($conn, 'chat');
       $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
       $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
       $output = "";

        $sql = "SELECT * FROM chat WHERE (fromUser = '$outgoing_id' AND toUser = '$incoming_id')
                OR (fromUser = '$incoming_id' AND toUser =  '$outgoing_id') order by sentAt";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['fromUser'] == $outgoing_id){ // this stands then it is sender
                    $output .='<div class="outgoing-chats">               
                                <div class="outgoing-chats-msg">
                                <p>'.$row['msg'].'</p>
                                </div>
                            </div>';
                }
                else{ // it is a receiver
                    mysqli_select_db($conn, 'registration');
                    $sql = mysqli_query($conn, "SELECT * FROM registration WHERE registration.username = '$incoming_id'");
                    if(mysqli_num_rows($sql)>0){
                        $sender = mysqli_fetch_assoc($sql);
                    }

                    $output .='<div class="received-chats">
                    <div class="received-chats-img">
                        <img src="../images/users/'.$sender['userImage'].'">
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