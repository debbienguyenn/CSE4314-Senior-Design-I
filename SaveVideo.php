<?php

session_start();

$id =   $_POST['id'];
$username = $_SESSION['username'];
include('db.php');
mysqli_select_db($conn, 'likedVideos');
$saved = "INSERT INTO likedVideos(Username,videoID) VALUES('$username','$id')";
    if( mysqli_query($conn, $saved))
    {
        echo '<script>alert("Saved successully!")</script>';
       
    }
    else
    {
        echo"Fail";
    }
mysqli_close($conn);

?>