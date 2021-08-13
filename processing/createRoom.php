<?php
    session_start();
    include 'db.php';

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

    echo '<script>window.location=\'../pages/groupChat.php?key='.$key.'\'</script>';
?>