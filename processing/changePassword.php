<?php   
include 'db.php';
mysqli_select_db($conn, 'registration');

$pass1 = mysqli_real_escape_string($conn, $_POST["password"]);
$pass2 = mysqli_real_escape_string($conn, $_POST["re-password"]);
$email = $_POST["email"];

$error = "";
if ($pass1 != $pass2) 
{
    echo "Password confirm must match!";
    
}
else 
{

    // $pass1 = md5($pass1)

    if(mysqli_query($conn, "UPDATE `registration` SET `psw` = '" . $pass1 . "' WHERE `email` = '". $email ."'")==false)
    {
        echo '<script>alert("update fail")</script>';

    }
    mysqli_select_db($conn, 'password_reset');
    mysqli_query($conn, "DELETE FROM `password_reset` WHERE `email` = '$email'");
    echo '<script>alert("Password Updated Sucessfully")</script>';
    echo '<script>window.location=\'../pages/Login.php\'</script>';

}

?>