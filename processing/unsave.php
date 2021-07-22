<?php

session_start();

$username = $_SESSION['username'];
$unlike = $_POST['unliked'];
include('db.php');
mysqli_select_db($conn, 'likedVideos');
mysqli_select_db($conn, 'videos');
$link_query = "SELECT * FROM videos WHERE link = '$unlike'";
$link_result = mysqli_query($conn, $link_query);
if(mysqli_num_rows($link_result)>0){
    $IDrow = mysqli_fetch_assoc($link_result);
}
$id = $IDrow['videoID'];
mysqli_query($conn, "DELETE FROM likedVideos WHERE videoID = $id AND Username = '$username'");
header('location:../pages/profile.php');

?>