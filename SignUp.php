<?php

session_start();

$conn= mysqli_connect('localhost:3306','root','', 'sdproject');
mysqli_select_db($conn, 'registration');

$email= filter_input(INPUT_POST, 'email');
$psw= filter_input(INPUT_POST, 'psw');
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$username = filter_input(INPUT_POST, 'username');
$birthday = filter_input(INPUT_POST, 'birthday');

$s = "SELECT * from registration where email= '$email'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

    if($num==1)
    {
        echo '<script>alert("Email or Username exists")</script>';
        echo '<script>window.location=\'SignUp.html\'</script>';
    }
    else
    {
        $reg = "INSERT INTO registration(email,psw,firstname, lastname, username, birthday) VALUES('$email','$psw','$firstname', '$lastname', '$username', '$birthday')";
       if( mysqli_query($conn, $reg))
       {
           echo '<script>alert("Registration successully!")</script>';
            echo '<script>window.location=\'Login.html\'</script>';
       }
       else
       {
           echo"fail";
       }
    }
mysqli_close($conn);
?>