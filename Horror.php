<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type=text/css>
    <title>Available Vidoes</title>
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
              <a href="Host.php">Host</a>
              &emsp;
              <a href="Logout.php">Log out</a>
              </div>';
            }
          ?>
          

        </nav>
      </div>
    </div>
    <div class="wrapper">
        <h1> Horror Videos</h1>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/sTtmpFIaFqc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/zL485SVwlXU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/7-5Upq2hcOA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/7-5Upq2hcOA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/kyNF7mXH3aY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


       


    </div>
    <?php
        include('footer.php');
    ?>
</body>
</html>