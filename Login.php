<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css" type=text/css>
  <title>Login - WatchBuddy</title>
</head>

<body>
  <section>
  <?php
      include('navbar.php');
    ?>

          <div class="col-2">
            <a href="SignUp.php">Sign Up</a>
          </div>

        </nav>
      </div>
    </div>
    <form class="form-container" action="Validation.php" method="post">
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>