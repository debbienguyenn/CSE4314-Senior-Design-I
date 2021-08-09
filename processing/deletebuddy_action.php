<?php  

 session_start();
 //database connection
 include('db.php');
 mysqli_select_db($conn, 'buddies');
 
 
 //retrieving buddy's username from input
//$buddy = filter_input(INPUT_POST, 'delete');
$username = $_SESSION['username'];

//check if buddy is already added to user
//$s = "SELECT * from buddies where userID = '$username' AND buddyID = '$buddy'";
//$result = mysqli_query($conn, $s);
//$num = mysqli_num_rows($result);

$i = "DELETE FROM buddies WHERE userID = '$username' AND buddyID = '$_GET[buddyID]'";
$i2 = "DELETE FROM buddies WHERE buddyID = '$username' AND userID = '$_GET[buddyID]'";

if(mysqli_query($conn, $i) && mysqli_query($conn, $i2))
{
     header("refresh:1; url=../pages/profile.php");
}
else{
     echo "failed";
}

mysqli_close($conn);
?>