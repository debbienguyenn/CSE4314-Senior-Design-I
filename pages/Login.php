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
</head>

<body>
  <section>
    <?php
      include('navbar.php');
    ?>

    <form class="form-container" action="../processing/Validation.php" method="post">
      <div class="container-xxl bg">
        <h1 style="color:grey"> WatchBuddy Login</h1>
        <div class="mb-3">
          <label style="color:grey" for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" style="width: 400px" ; required>
        </div>
        <div class="mb-3">
          <label style="color:grey" for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" style="width: 400px" ; required>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label style="color:grey" class="form-check-label" for="exampleCheck1">Keep me logged in</label>
        </div>
        <button type="submit" class="btn btn-success" style="width: 150px" ;>Log In</button>
        <a class="btn btn-danger" href="ForgotPass.php" role="button">Forgot Password</a>
        <label style="color:grey"> Doesn't have an account?</label>
        <a class="btn btn-primary" href="SignUp.php" role="button">Register Here</a>


      </div>
    </form>
  </section>
  <?php
        include('footer.php');
    ?>
