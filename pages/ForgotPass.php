<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css-bootstrap/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" type=text/css>
  <title>Login - WatchBuddy</title>
  <style>
      footer{
          position: fixed !important;
      }
  </style>
</head>

<body>
  <section>
    <?php
      include('navbar.php');
    ?>

    <form class="form-container" action="../processing/sendEmail.php" method="post">
      <div class="container-xxl bg" align="center">
        <h1 style="color:grey"> Forgot Password</h1>
        <div class="mb-3">
          <label style="color:grey" for="username"><b>Enter your email address</b></label>
          <input type="text" placeholder="useremail@example.com" name="email" style="width: 400px" ; required>
        </div>

        <button type="submit" class="btn btn-success" style="width: 150px" ;>Reset Password</button>


      </div>
    </form>
  </section>
  <?php
        include('footer.php');
    ?>
