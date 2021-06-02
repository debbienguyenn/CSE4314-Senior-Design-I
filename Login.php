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
        header('location:profile.html');
        //echo"login successfully";    
    }
    else
    {
       header('location:Login.html');
       //echo"login failed";
    }
mysqli_close($conn);
?>