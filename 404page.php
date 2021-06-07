<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css" type=text/css>
  <title>Page Not Found - WatchBuddy</title>
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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-4" style="text-align: center">
          <p style="font-size: 200px; color:royalblue">404</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-6" style="text-align: center">
          <p style="font-size: 60px; color:royalblue">Oops...Page Not Found!</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-2" style="text-align: center">
          <a href="Homepage.php" class="btn btn-primary">Home</a>
        </div>
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