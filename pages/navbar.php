<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css-bootstrap/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" type=text/css>  <title>Document</title>
</head>
<body>
  

<div class="container">
  <div class="navbar">
    <a href="Homepage.php">
      <image src="../images/logo.png" class="logo"></image>
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

            <button class="room" type="button"> My Room</button>
            <!--search bar-->
            <li>
              <form id=form class="d-flex" method ="POST" action="VideoSearchResults.php">
                <input style="width:400px" class="form-control me-2" name="search" type="text" placeholder="Search for videos.."
                  aria-label="Search">
                <button style="width:100px" class="btn btn-outline-success" type="submit">Search</button>
              </form>  
            </li>
          </ul>
      </div>  
      <!--Replace Login and Sign Up links when logged in-->
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
    <!-- </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="script.js"></script>  
</html> -->
  
    
          
<!-- </div>

            <nav class="navbar navbar-light bg-light">
  <form method ="POST" action="../processing/searchedvideos.php" >
    <input class="form-control mr-sm-2" type="search" name="search-term" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
</div> -->