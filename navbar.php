<div class="container">
      <div class="navbar">
        <a href="Homepage.php">
          <image src="images/logo.jpg" class="logo"></image>
        </a>
        <nav style="width:1000px" class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="Homepage.php">Home</a>

            <!--dropdown menu for video categories-->
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
                <!--search bar-->
                <li>
                  <form class="d-flex">
                    <input style="width:400px" class="form-control me-2" type="search" placeholder="Search for videos.."
                      aria-label="Search">
                    <button style="width:100px" class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                  
                  
                </li>
              </ul>
            </div>
          </div>
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
              echo '<div class="col-3">
              <a href="profile.php">Profile</a>
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
