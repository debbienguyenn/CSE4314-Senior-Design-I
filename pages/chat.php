<?php
   session_start();
   if(!isset($_SESSION['username']))
   {
       header('location: Login.php');
   }
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
                <img src="../images/users/<?php echo $_SESSION['userImage']; ?>" alt="">
            </div>
        <div class="active">
            <?php
                include("../processing/db.php");
                $username = $_SESSION['username'];
                $sql = mysqli_query($conn, "SELECT * FROM registration INNER JOIN buddies ON buddies.BuddyId = registration.username");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }
                // need to add line to go to home page if no buddy found.
                ?>
            <P><?php echo $row['firstname']." ".$row['lastname'] ?></p>
        </div>
        </div>

        <div class="chat-page">
            <div class="msg-inbox">
                <div class="chats">
                    <div class="msg-page">

                    <div class="received-chats">
                    <div class="received-chats-img">
                        <img src="images/profile.jpg">
                    </div>
                    <div class="received-msg-inbox">
                        <p> I am receiver. </p>
                    </div>
                    </div>

                    <div class="outgoing-chats">                    
                        <div class="outgoing-chats-img">
                        <img src="images/profile.jpg">
                        </div>
                        <div class="outgoing-chats-msg">
                            <p> I am sender. </p>
                        </div>
                    </div>
                </div>
            </div>

            <form action="#" class='typing-area' autocomplete="off">                
                    <input type="text" name="outgoing_id" value="<?php echo $username; ?>" hidden >
                    <input type="text" name="incoming_id" value="<?php echo $row['username']; ?>" hidden >
                    <input type="text" name="message" class="input-field" placeholder="Type here.....">
                    <button><i type="button" class="button">Send</i></button>
            </form>
        </div>
    </div>

    <script src="../processing/chat.js"></script>

</body>
</html>