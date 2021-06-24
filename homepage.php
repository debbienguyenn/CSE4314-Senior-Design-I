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

    <div class="container">
      <div class="row">
        <div class="col-sm" >
          
          <div class="row">
              <div class="card">
                <div class = "iframe-container">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/zeGupB528L8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
          </div>
          &emsp;
          <div class="row">
              <div class="card">
                <div class = "iframe-container">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/d1tYH1u4CTo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> 
              </div>
          </div>
        </div>
        
        <div class="col-sm" align = "right">
          <h1>Chat and Watch<br>with your Buddies</h1>
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

