<?php

session_start();

//database connection
$conn= mysqli_connect('localhost:3306','root','', 'sdproject');
mysqli_select_db($conn, 'registration');

//retrieve user inputs
$username= filter_input(INPUT_POST, 'username');
$psw= filter_input(INPUT_POST, 'psw');

//validate credentials
$s = "SELECT * from registration where username= '$username' && psw= '$psw'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num==1)
{  
    $_SESSION['username'] = $username;
    $_SESSION['bio'] = $result['bio'];
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