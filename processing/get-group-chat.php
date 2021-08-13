<?php
   session_start();
       include('db.php');
       mysqli_select_db($conn, 'groupchat');
       $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
       $roomID = mysqli_real_escape_string($conn, $_POST['key']);
       $output = "";
        $curent_user = $_SESSION['username'];
       $sql = "SELECT * FROM groupchat WHERE roomID='$roomID' order by sentAt";
        // $sql = "SELECT * FROM groupchat WHERE (username = '$outgoing_id' AND roomID = '$roomID')";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['username'] == $outgoing_id){ // this stands then it is sender
                    $output .='<div class="outgoing-chats">               
                                <div class="outgoing-chats-msg">
                                <p>'.$row['msg'].'</p>
                                </div>
                            </div>';
                }
                else{ // it is a receiver
                    mysqli_select_db($conn, 'registration');
                    $sentBy = $row['username'];
                    $sql = mysqli_query($conn, "SELECT * FROM registration WHERE registration.username = '$sentBy'");
                    if(mysqli_num_rows($sql)>0){
                        $sender = mysqli_fetch_assoc($sql);
                    }
                    if(isset($sender['userImage']))
                    {
                        $output .='<div class="received-chats">
                        <div class="received-chats-img">
                            <img src="../images/users/'.$sender['userImage'].'">                    
                        </div>
                        <div class="received-msg-inbox">
                            <p>'.$row['msg'].'</p>
                        </div>
                        </div>';
                    }
                    else{
                        $output .='<div class="received-chats">
                        <div class="received-chats-img">
                            <img src="../images/users/default-profile-picture.png">                    
                        </div>
                        <div class="received-msg-inbox">
                            <p>'.$row['msg'].'</p>
                        </div>
                        </div>';
                    }
                }
            }
            echo $output;
        }
    else{
        header("../pages/homepage.php");
    }
?>