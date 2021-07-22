<?php

session_start();

// $id =   $_POST['id'];
$id = $_GET[id];
$username = $_SESSION['username'];
include('db.php');
mysqli_select_db($conn, 'likedVideos');
$saved = "INSERT INTO likedVideos(Username,videoID) VALUES('$username','$id')";
    if( mysqli_query($conn, $saved))
    {
        echo '<script>alert("Saved successully!")</script>';
        header('location:../pages/profile.php');
       
    }
    else
    {
        echo'<script>alert("Video is already saved!")</script>';
        header('location:../pages/profile.php');
    }
mysqli_close($conn);

?>