<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title> About Us - WatchBuddy </title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" type=text/css>

</head>

<body>
  <section>
  <?php
      include('navbar.php');
    ?>
          <div class="col-2">
            <a href="Login.php">Login</a>
            &emsp;
            <a href="SignUp.php">Sign Up</a>
          </div>
        </nav>
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