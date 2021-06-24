<?php  

 session_start();
 //database connection
 include('db.php');
 mysqli_select_db($conn, 'buddies');
 
 
 //retrieving buddy's username from input
$buddy = filter_input(INPUT_POST, 'delete');
$username = $_SESSION['username'];

//check if buddy is already added to user
$s = "SELECT * from buddies where userID = '$username' AND buddyID = '$buddy'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);


if($num==0)
{
     echo '<script>alert("Buddy Not Found.")</script>';
     echo '<script>window.location=\'Buddies.php\'</script>';
}
else
{
     $delete = "DELETE FROM buddies WHERE userID = '$username' AND buddyID = '$buddy'";
     if(mysqli_query($conn, $delete))
     {
          echo '<script>alert("Buddy has been removed from your buddies list.")</script>';
          echo '<script>window.location=\'Buddies.php\'</script>';
     }
     else
     {
          echo "failed";
     }
}
mysqli_close($conn);
?>