<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title> WatchBuddy - Homepage</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" type=text/css>
  <style>
    footer {
      color: grey
    }
  </style>

</head>

<body>
  <section>

    <?php
      include('navbar.php');
    ?>

          <!--Replace Login and Sign Up links when logged in-->
          <?php
            if(!isset($_SESSION['username']))
            {
              echo '<div class="col-2">
              <a href="Login.php">Login</a>
              &emsp;
              <a href="SignUp.php">Sign Up</a>
              </div>';
            }
            else
            {
              echo '<div class="col-2">
              <a href="profile.php">Me</a>
              &emsp;
              <a href="Meet.php">Meet</a>
              &emsp;
              <a href="Logout.php">Log out</a>
              </div>';
            }
          ?>
          

        </nav>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-end">
        <div class="col-4">
          <h1>Chat and Watch<br>with your Buddies</h1>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-4">
          <p>
            Join us <u><a href="SignUp.php">here</a></u>
            to have a wonderful time with your loved ones without leaving your desk.
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php
        include('footer.php');
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>
