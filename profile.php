<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:Login.html');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> My Profile - WatchBuddy </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type=text/css>
    <style>
        section {
            height: 700px;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <div class="navbar">
                <a href="homepage.html">
                    <image src="images/logo.jpg" class="logo"></image>
                </a>
                <nav style="width:1000px" class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="homepage.html">Home</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
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
                                        <li><a class="dropdown-item" href="#">Youtube</a></li>
                                        <li><a class="dropdown-item" href="#">Anime</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">View All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <form class="d-flex">
                                        <input style="width:500px" class="form-control me-2" type="search"
                                            placeholder="Search" aria-label="Search">
                                        <button style="width:100px" class="btn btn-outline-success"
                                            type="submit">Search</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="HostRoom.html">Host</a>
                        &emsp;
                        <a href="Logout.php">Log Out</a>
                    </div>
                </nav>
            </div>

        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3" style="border-right: 1px solid lightgrey; height:500px">
                    <div class="row justify-content-center">
                        <img src="images/profile.jpg"
                            style="width: 200px; height: 200px;border-radius: 50px; border: 2px solid lightgrey;">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <b style="text-align:center; margin-left: 25px;">
                                <?php echo $_SESSION['username']; ?>
                            </b>
                            <p style="text-align:center">I love watching movies with friends.</p>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="border-right: 1px solid lightgrey; height:500px;">
                    <h1 style="color:3F454C; text-align: center;">Watch List</h1>
                </div>
                <div class="col-3">
                    <h3 style="color:3F454C; text-align: center;">Buddies</h3>
                </div>
            </div>
        </div>
    </section>

    <?php
        include('footer.php');
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

</html>