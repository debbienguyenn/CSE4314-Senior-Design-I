<?php

session_start();

//database connection
include('db.php');
mysqli_select_db($conn, 'registration');

//retrieve user inputs
$username = filter_input(INPUT_POST, 'username');
$psw= filter_input(INPUT_POST, 'psw');
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email= filter_input(INPUT_POST, 'email');
$birthday = filter_input(INPUT_POST, 'birthday');

//check if account exists
$s = "SELECT * from registration where username='$username' OR email= '$email'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num==1)
{
    echo '<script>alert("Email or Username exists")</script>';
    echo '<script>window.location=\'../pages/SignUp.php\'</script>';
}
else
{
    $reg = "INSERT INTO registration(username,psw,firstname, lastname, email, birthday) VALUES('$username','$psw','$firstname', '$lastname', '$email', '$birthday')";
    if( mysqli_query($conn, $reg))
    {
        echo '<script>alert("Registration successully!")</script>';
        echo '<script>window.location=\'../pages/Login.php\'</script>';
    }
    else
    {
        echo"fail";
    }
}
mysqli_close($conn);
?>