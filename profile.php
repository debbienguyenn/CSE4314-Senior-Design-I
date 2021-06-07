<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:Login.php');
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
    <?php
      include('navbar.php');
    ?>
                    <div class="col-2">
                        <a href="HostRoom.php">Host</a>
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