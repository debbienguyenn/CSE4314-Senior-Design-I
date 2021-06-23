<?php

session_start();

//database connection
include('db.php');
mysqli_select_db($conn, 'registration');

//retrieve user inputs
$username= filter_input(INPUT_POST, 'username');
$psw= filter_input(INPUT_POST, 'psw');

//validate credentials
$s = "SELECT * from registration where username= '$username' && psw= '$psw'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);


if($num==1)
{  
    $_SESSION['username'] = $username;
    $_SESSION['userImage'] = isset($row['userImage']) ? $row['userImage'] : null;
    $_SESSION['bio'] = $row['bio'];

    echo '<script>alert("Login Sucessfully")</script>';
    echo '<script>window.location=\'profile.php\'</script>';
}
else
{
    echo '<script>alert("Incorrect Email or Password")</script>';
    echo '<script>window.location=\'Login.php\'</script>';
    }
mysqli_close($conn);
?>