<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css-bootstrap/bootstrap.css">
  <link rel="stylesheet" href="style.css" type=text/css>
  <title>Sign up - WatchBuddy</title>

</head>

<body>
  <section>
  <?php
      include('navbar.php');
    ?>

         

        </nav>
      </div>
    </div>

    <form class="form-container" action="../processing/Registration.php" method="post">
      <div class="container-xxl bg" align="center">
        <div class="row">
          <h1 style="color:grey">Sign Up</h1>
          <label style="color:grey">Please fill in this form to create an account.</label>
        </div>

        <div class="row justify-content-center">
          <div class="col">
            <label style="color:grey" for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" style="width: 400px" ; required>

            <label style="color:grey" for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" style="width: 400px" pattern="^(?=.*[A-Za-z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,32}$"  required>
          <span><small><br>At least one number, and one special charcter from !@#$%^&*_=+- with a length of 8 characters is required<br></small></span>
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
          <label style="color:grey">
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          </label>

          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
          <button type="submit" class="signupbtn" style="width: 400px" ;>Sign Up</button>


        </div>

        
        <!-- <div class="clearfix">
          <button type="submit" class="signupbtn" style="width: 400px" ;>Sign Up</button>
        </div> -->
      </div>
    </form>

  </section>

  <?php
        include('footer.php');
    ?>

