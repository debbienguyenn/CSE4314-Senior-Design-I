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
  <title>Sign up - WatchBuddy</title>

</head>

<body>
  <section>
  <?php
      include('navbar.php');
    ?>

          <div class="col-2">
            <a href="Login.php">Login</a>
            
          </div>

        </nav>
      </div>
    </div>

    <form class="form-container" action="Registration.php" method="post">
      <div class="container-xxl bg">
        <div class="row">
          <h1 style="color:grey">Sign Up</h1>
          <label style="color:grey">Please fill in this form to create an account.</label>
        </div>

        <div class="row justify-content-center">
          <div class="col">
            <label style="color:grey" for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" style="width: 400px" ; required>

            <label style="color:grey" for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" style="width: 400px" ; required>
          </div>

          <div class="col">
            <label style="color:grey" for="firstname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="firstname" style="width: 400px" ; required>

            <label style="color:grey" for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lastname" style="width: 400px" ; required>
          </div>

          <div class="col">
            <label style="color:grey" for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" style="width: 400px" ; required>

            <label style="color:grey" for="birthday"><b>Birth Day</b></label>
            <input type="date" id="birthday" name="birthday" value="2003-01-01" min="1900-01-01" max="2003-01-01">
          </div>



        </div>

        <label style="color:grey">
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix" align="center">
          <button type="submit" class="signupbtn" style="width: 400px" ;>Sign Up</button>
        </div>
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