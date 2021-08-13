<?php
use PHPMailer\PHPMailer\PHPMailer;
include('db.php');
mysqli_select_db($conn, 'registration');


if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    if (!$email) {
        $error .= "Invalid email address";
    } 
    else {
        $sel_query = "SELECT * FROM `registration` WHERE email='" . $email . "'";
        $results = mysqli_query($conn, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .= "User Not Found";
        }
        }
    if (false) {
        echo $error;
    } 
    else {

        $output = '';

        $key = md5(time());
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        // Insert Temp Table
        mysqli_select_db($conn, 'registration');
        mysqli_query($conn, "INSERT INTO `password_reset` (`email`, `token`) VALUES ('$email', '$key');");


        $output.='<p>Please click on the following link to reset your password.</p>';
        //replace the site url
        $output.='<p><a href="http://localhost/project/pages/resetPassword.php?key='. $key .'&email=' . $email . '&action=reset" target="_blank">http://localhost/project/pages/resetPassword.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
        $body = $output;
        $subject = "Password Recovery";

        $email_to = $email;


        //autoload the PHPMailer
        require("../vendor/autoload.php");
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Host = "smtp.mailtrap.io"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "8d0b396c343e44"; // Enter your email here
        $mail->Password = "96405277978b4f"; //Enter your passwrod here
        $mail->SMTPSecure = "tls";
        $mail->Port = 465;
        $mail->setFrom('th180416@gmail.com','WatchBuddy');

        $mail->IsHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo '<script>alert("A password link has been sent to your email!")</script>';
            echo '<script>window.location=\'../pages/Login.php\'</script>';
        }
    }
}

?>