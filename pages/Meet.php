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
    <title> My Profile - WatchBuddy </title>
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
            <div class="row justify-content-left">

                <!--first column-->
                <div class="col-2" style="border-right: 1px solid lightgrey; height:auto">
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
            
            <div class='col-10'>
                <?php
                    $key = md5(time());
                    $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                    $key = $key . $addKey;
                    $form = 
                    '<form class="form-container" id="create-group" method="post">
                        <button  type="submit" class="btn btn-success" name="roomBtn" style="width: 150px" ;>Create Group</button>
                    </form>';
                echo $form;

                echo '<h3 style="color:#8A2BE2;"> Rooms</h3>';

                if(isset($_POST['roomBtn']))
                {
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

                    //$key = $_GET["key"];

                    //add users to room
                    mysqli_select_db($conn, 'rooms');
                    $current_user = $_SESSION['username'];
                    $sql = "INSERT INTO rooms(roomID, username) VALUES('$key', '$current_user')";
                    $query = mysqli_query($conn, $sql);
                    foreach($buddies as $buddy ){
                        $sql = "INSERT INTO rooms(roomID, username) VALUES('$key', '$buddy')";
                        $query = mysqli_query($conn, $sql);
                    }

                    $roomList = array();
                    $r = "SELECT * FROM rooms GROUP BY roomID";
                    $query = mysqli_query($conn,$r);
                    while($list = mysqli_fetch_assoc($query))
                    {
                        $roomList[] = $list;
                    }

                    foreach($roomList as $rlist)
                    {
                        $room = $rlist['roomID'];
                        $mem = mysqli_query($conn, "SELECT * FROM rooms WHERE roomID = '$room'");
                        while($members = mysqli_fetch_assoc($mem))
                        {
                            if(strcmp($members['username'],$username)==0){
                                continue;
                            }
                            echo $members['username'].",";
                        }
                        echo '<button title="Chat" id="chatBtn" style="height:20px; width:20px" onclick="window.open(\'../pages/groupChat.php?key='.$room.'\',\'\',\'height=600,width=600,top=400\', false)"></button>';
                        echo '<br>';
                    }
                    
                }
            ?>

            
            </div>
        </div>
    </section>
</body>

<?php
    include('footer.php');
?>

