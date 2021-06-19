<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:Login.php');
    }
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

<<<<<<< HEAD
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
              <a href="profile.php">Profile</a>
              &emsp;
              <a href="Host.php">Host</a>
              &emsp;
              <a href="Logout.php">Log out</a>
              </div>';
            }
          ?>
          
=======
    <form class="form-container" action="SaveVideo.php" method="post">
        <div class="container">
            <h1> Funny Videos</h1>
            <div class="row justify-content-center">
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/DODLEX4zzLQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <!--
                        <button id="123" type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                   -->
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="001">
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/FFLTU9eIijw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                    </div>
>>>>>>> c901614c0286725802def8673e2f52e3a85f3e4e

                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/2acZIOSV9LY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                    </div>
                </div>
            </div>
            
            <br>
            <div class="row justify-content-center">
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/XJ2hd2cKAJo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/CmomQkOau7c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/HeGVeBWECu8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                    </div>
                </div>


        </div>
     </form>
    </section>
    <?php
        include('footer.php');
    ?>
</body>
</html>