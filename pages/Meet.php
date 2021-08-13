<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location: pages/Login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chat Rooms - WatchBuddy </title>
    <link rel="stylesheet" href="../css-bootstrap/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" type=text/css>
     
     <style>
         footer
         {
            position: fixed !important;
         }
     </style>
</head>


<body>
    <section>
        <?php
        include('navbar.php');
        ?>
        <div class="container">
            <div class="row justify-content-center">

                <!--first column-->
                <div class="col-2 " style="border-right: 1px solid lightgrey; height:auto">
                    <h4 style="color:3F454C; text-align: center;">Create a chat room</h4>
                
                    <!--User Friend's List-->
                    <?php
                    include('../processing/db.php');

                    //getting current friends of the user to create buddies list
                    mysqli_select_db($conn, 'buddies');
                    $username = $_SESSION['username'];
                    $buddies_query = "SELECT BuddyID from buddies where UserID = '$username'";
                    $buddies_result = mysqli_query($conn, $buddies_query);
                    $buddies_list = array();
                    if(mysqli_num_rows($buddies_result)>0)
                    {
                        while($list = mysqli_fetch_assoc($buddies_result))
                        {
                            $buddies_list[] = $list;
                        }
                    }

                    echo '<script>
                        let count = 0;
                        function addBuddy(buddyName) {
                            let createGroup = document.querySelector("#create-group");
                            let input = document.createElement(\'input\');
                            input.value = buddyName;
                            input.name = count;
                            
                            createGroup.appendChild(input);
                            count++;
                        } 
                        
                        function addCount()
                        {
                            let createGroup = document.querySelector("#create-group");
                            let input = document.createElement(\'input\');
                            input.value = count;
                            input.name = "count";
                            createGroup.appendChild(input);
                        }
                    </script>';
                    
                    //displaying current buddies and their profile pic in a list on profile page.
                    foreach($buddies_list as $buddyname)
                    {
                        $buddies = $buddyname['BuddyID'];
                        
                        //buttons add buddies to the chat 
                        // echo '<a style="float: right" href = ../processing/roomBuddies_action.php?buddyID=".$buddies."><img src=../images/icons/add.png style="width:25px"></a>';
                        
                        // echo "<br>";
                        
                        $html ='<div class="row">'.$buddies.'
                        <button onClick="addBuddy(\''.$buddies.'\')" class="btn btn-light"
                        type="submit" id="button"
                        name="buddyId" value="'.$buddies.'">Add</button>
                        </div>';
                        echo $html;
                        
                    }
                    echo '<button type="btn btn-success" onClick="addCount()">Done</button>';

                    ?>
                </div>
                    
                <!-- Second Column -->
                <div class='col-5' style="border-right: 1px solid lightgrey; height:auto">
                    <?php
                        $key = md5(time());
                        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                        $key = $key . $addKey;
                        $form = 
                        '<form class="form-container" action="../processing/createRoom.php?key='.$key.'" method="post" id="create-group">
                            <button  type="submit" class="btn btn-success" style="width: 150px" ;>Create Group</button>
                        </form>';
                    echo $form;
                    ?>
                </div>

                <!-- Third Column -->
                <div class="col-5">
                    <h2>Active Rooms</h2>
                    <?php
                        // fetching the rooms the current user is in
                        mysqli_select_db($conn, 'rooms');
                        $rooms_query = "SELECT roomID from rooms where username = '$username'";
                        $rooms_result = mysqli_query($conn, $rooms_query);
                        $rooms_list = array();
                        if(mysqli_num_rows($rooms_result)>0)
                        {
                            while($list = mysqli_fetch_assoc($rooms_result))
                            {
                                $rooms_list[] = $list;
                            }
                        }
                        foreach($rooms_list as $room)
                        {
                            $roomID = $room['roomID'];
                           
                            $mem = mysqli_query($conn, "SELECT * FROM rooms WHERE roomID = '$roomID'");
                            while($members = mysqli_fetch_assoc($mem))
                            {
                                if(strcmp($members['username'],$username)==0){
                                    continue;
                                }
                                echo $members['username'].",";
                            }

                            $sql = mysqli_query($conn, "SELECT chat_status FROM groupchat WHERE chat_status=0 AND username != '$username' AND roomID='$roomID'");
                            if(mysqli_num_rows($sql)>0)
                            {
                                $unread_count = mysqli_num_rows($sql);
                            }
                            else{
                                $unread_count = null;
                            }

                            echo '<button title="Chat" id="chatBtn" style="height:20px; width:20px;" onclick="window.open(\'../pages/groupChat.php?key='.$roomID.'\',\'\',\'height=600,width=600,top=400\')"></button>
                                    <span class="badge" id="notify" style=" background-color:red; color:white;font-weight:bold; border-radius: 50px;
                                    position: relative;
                                    top: -10px;
                                    left: -20px;" >'.$unread_count.'</span>';
                            echo '<pre></pre>';
                        } 
    
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

<?php
    include('footer.php');
?>

