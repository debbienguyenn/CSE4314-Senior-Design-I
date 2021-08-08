<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- <style>
        #video {
            border: 1px solid #999;
            width: 100;
            width:1296px;
        }
        .error {
            color: red;
        }
  
        .warn {
            color: orange;
        }
  
        .info {
            color: darkgreen;
        }
        .start, .stop{
            width: 100px;
        }
    </style> -->

</head>

<body>
    <div class="container"> 
        <div class="chat-page">
            <!-- <div>
                <button id="start">Share your screen</button>
                <button id="stop">Stop sharing</button>
  
                <video id="video" autoplay></video>
                <br>

                <strong></strong>
                <br>
                <pre id="log" hidden></pre>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="../processing/ScreenSharing.js"></script>               
            </div> -->
            <div class="row">
                <div class="col-7">

                    <!-- message box -->
                    <div class="row">
                        <div class="msg-header">
                            <div class="profile-pic">
                                <img src="../images/groupchat.png" alt="">
                            </div>
                            <div class="active">
                                <?php

                                    include("../processing/db.php");
                                    mysqli_select_db($conn, 'rooms');
                                    $key = $_GET['key'];
                                    $buddies_query = "SELECT username from rooms where roomID = '$key'";
                                    $buddies_result = mysqli_query($conn, $buddies_query);
                                    $buddies_list = array();
                                    if(mysqli_num_rows($buddies_result)>0)
                                    {
                                        while($list = mysqli_fetch_assoc($buddies_result))
                                        {
                                            $buddies_list[] = $list;
                                        }
                                    }
                                    
                                    echo '<p>';
                                    foreach($buddies_list as $buddy ){
                                        if($buddy['username'] != $_SESSION['username'])
                                        echo $buddy['username'].', ';
                                    }
                                    echo '</p>';
                                ?>
                            </div>
                        </div>
                        
                        <div class="msg-inbox">
                            <div class="chats">
                                <div class="msg-page">
                                    <div class="received-chats">
                                        <div class="received-chats-img">
                                        <!-- <img src="../images/profile.jpg"> -->
                                    </div>
                                    <div class="received-msg-inbox">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="outgoing-chats">
                                    <div class="outgoing-chats-msg">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                
                        <form action="#" class='typing-area' method= "POST" autocomplete="off">   
                            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['username']; ?>" hidden>
                            <input type="text" name="key" value="<?php echo $key; ?>" hidden>

                            <?php
                                // $i=0;
                                //  foreach($buddies as $buddy ){
                                //     echo '<input type="text" name="'.$i.'" value='.$buddy.' hidden>';
                                //     $i++;
                                // }
                                // echo '<input type="text" name="count" class="count" value='.$i.' hidden>' ;
                            ?>
                            <input type="text" name="message" class="input-field" placeholder="Type here.....">
                            
                            <!-- <button><i type="button" class="button">Send</i></button> -->
                            <button type="submit" class="button" style="width: 150px" ;>Send</button>
                        </form>
                    </div>
                    <!-- -->

                </div>

                <!-- Videos section -->
                <div class="col-3">
                    <?php include '../processing/displayVideos.php' ?>
                </div>
                <!-- -->
            </div>
            
        </div>
    </div>

    <script src="../processing/group-chat.js"></script>

</body>
</html>