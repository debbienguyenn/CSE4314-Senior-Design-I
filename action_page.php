<?php

session_start();
header('location:Login.html');

$conn= mysqli_connect('localhost:3306','root','', 'sdproject');
mysqli_select_db($conn, 'registration');

$email= filter_input(INPUT_POST, 'email');
$psw= filter_input(INPUT_POST, 'psw');
$pswrepeat = filter_input(INPUT_POST, 'pswrepeat');

$s = "SELECT * from registration where email= '$email'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

    if($num==1)
    {
        echo"account exists";
    }
    else
    {
        $reg = "INSERT INTO registration(email,psw,pswrepeat) VALUES('$email','$psw','$pswrepeat')";
       if( mysqli_query($conn, $reg))
       {
           echo"registration sucessfully";
       }
       else
       {
           echo"fail";
       }
    }
mysqli_close($conn);
?>