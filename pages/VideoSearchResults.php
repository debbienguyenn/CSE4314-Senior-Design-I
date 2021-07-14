<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location: pages/Login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css-bootstrap/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" type=text/css>
    <title>Searched Videos</title>
    <style>
         footer
         {
             position: fixed !important;
         }
     </style>
</head>
<body>
<div class="container">
      <div class="navbar">
        <a href="Homepage.php">
          <image src="../images/logo.jpg" class="logo"></image>
        </a>
        <nav style="width:1000px" class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php">Home</a>

           <!-- dropdown menu for video categories -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Videos
                    </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="Funny.php">Funny</a></li>
                    <li><a class="dropdown-item" href="Anime.php">Anime</a></li>
                    <li><a class="dropdown-item" href="Horror.php">Horror</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                   
                  </ul>
                </li>
            </ul>
            <?php
            if(!isset($_SESSION['username']))
            {
              echo '<div class="col-3">
              <a href="Login.php">Login</a>
              &emsp;
              <a href="SignUp.php">Sign Up</a>
              </div>';
            }
            else
            {
              echo '<div class="col-3">
              <a href="profile.php">Me</a>
              &emsp;
              <a href="Meet.php">Meet</a>
              &emsp;
              <a href="../processing/Logout.php">Log out</a>
              </div>';
            }
          ?>
          

        </nav>
      </div>
    </div>
    <div class="container">
        <h1>Click to see search results for:</h1>
        <form id="form">
            <div class="form-group">
                <input style="width:400px" class="form-control me-2" type="text" value="<?php
                    $search = filter_input(INPUT_POST, 'search');
                    echo $search;
                ?>"class="form-control" id="search" placeholder="search...">
            </div>
            <button style="width: 200px" class="form-group" class="btn btn-info" value="Search"  >
                Display
            </button>
        </form>
        
        <div class="row">
            <div class="col-md-12">
                <div id="videos">
                </div>
            </div>
        </div>
         
    </div>
      
        
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../processing/script.js"></script>  
<?php include('footer.php');?>


