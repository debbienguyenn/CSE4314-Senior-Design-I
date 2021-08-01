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
</head>

<body>
    <div class="container">
        <div class="msg-header">
            <div class="profile-pic">
                <img src="../images/profile.jpg" alt="">
            </div>
        <div class="active">
            <?php
                include("../processing/db.php");
                mysqli_select_db($conn, 'registration');
                mysqli_select_db($conn, 'chat');
                mysqli_select_db($conn, 'buddies');
                $username = $_SESSION['username'];

                $count = $_POST['count'];
                $buddies = array();
                for($i=0; $i<$count; $i++)
                {
                    $buddies[]= $_POST[strval($i)];
                }
                echo '<p>';
                foreach($buddies as $buddy ){
                    echo $buddy.', ';
                    // mysqli_select_db($conn, 'rooms');
                    // $sql = "INSERT INTO rooms(roomID, username) VALUES()";
                    // $query = mysqli_query($conn, $sql);
                }
                echo '</p>';
            ?>


        </div>
        </div>

        <div class="chat-page">
            <div class="msg-inbox">
                <div class="chats">
                    <div class="msg-page">

                    <div class="received-chats">
                    <div class="received-chats-img">
                        <img src="../images/profile.jpg">
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
                    <?php
                        // $i=0;
                        //  foreach($buddies as $buddy ){
                        //     echo '<input type="text" name="'.$i.'" value='.$buddy.' hidden>';
                        //     $i++;
                        // }
                        // echo '<input type="text" name="count" class="count" value='.$i.' hidden>' ;
                    ?>
                    <input type="text" name="message" class="input-field" placeholder="Type here.....">
                    <?php
                        $key = $_GET["key"];
                        
                        //add users to room
                        mysqli_select_db($conn, 'rooms');
                        $current_user = $_SESSION['username'];
                        $sql = "INSERT INTO rooms(roomID, username) VALUES('$key', '$current_user')";
                        $query = mysqli_query($conn, $sql);
                        foreach($buddies as $buddy ){
                            $sql = "INSERT INTO rooms(roomID, username) VALUES('$key', '$buddy')";
                            $query = mysqli_query($conn, $sql);
                        }
                    ?>
                    <!-- <button><i type="button" class="button">Send</i></button> -->
                    <button type="submit" class="button" style="width: 150px" ;>Send</button>
            </form>
        </div>
    </div>

  

    <script src="../processing/group-chat.js"></script>

</body>
</html>