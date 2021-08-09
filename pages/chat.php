<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="msg-header">
            <div class="active">
                <!-- Get buddy info -->
                <?php
                    include("../processing/db.php");
                    mysqli_select_db($conn, 'registration');
                    mysqli_select_db($conn, 'chat');
                    mysqli_select_db($conn, 'buddies');
                    $username = $_SESSION['username'];
                    $buddyVar = $_GET['buddyID'];
                    $sql = mysqli_query($conn, "SELECT * FROM registration WHERE '$buddyVar' = registration.username");
                    if(mysqli_num_rows($sql)>0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="profile-pic">
                <img src="../images/users/<?php
                        if(isset($row['userImage'])) 
                            echo $row['userImage'];
                        else
                            echo 'default-profile-picture.png';
                    ?>" alt="profile-picture">
                </div>
                <p><?php echo $row['firstname']." ".$row['lastname'] ?></p>


            </div>
        </div>
        <!-- Chat box -->
        <div class="chat-page">
            <div class="msg-inbox">
                <div class="chats">
                    <div class="msg-page">

                    <div class="received-chats">
                    <div class="received-chats-img"></div>
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
            <!-- typing area -->
            <form action="#" class='typing-area' method= "POST" autocomplete="off">   
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['username']; ?>" hidden>
                    <input type="text" name="incoming_id" value="<?php echo $buddyVar; ?>" hidden>       
                    <input type="text" name="message" class="input-field" placeholder="Type here.....">
                    
                    <button type="submit" class="button" style="width: 150px" ;>Send</button>
            </form>
        </div>
    </div>

    <script src="../processing/chat.js"></script>

</body>
</html>