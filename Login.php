<?php

session_start();

$conn= mysqli_connect('localhost:3306','root','', 'sdproject');
mysqli_select_db($conn, 'registration');

$email= filter_input(INPUT_POST, 'email');
$psw= filter_input(INPUT_POST, 'psw');

$s = "SELECT * from registration where email= '$email' && psw= '$psw'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

    if($num==1)
    {  
        echo '<script>alert("Login Sucessfully")</script>';
        echo '<script>window.location=\'profile.html\'</script>';
    }
    else
    {
        echo '<script>alert("Incorrect Email or Password")</script>';
        echo '<script>window.location=\'Login.html\'</script>';
    }
mysqli_close($conn);
?>