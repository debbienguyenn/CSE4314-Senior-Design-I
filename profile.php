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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                <!--
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
            -->
            <div class="col-3" style="border-right: 1px solid lightgrey; height:500px">
                <!--Display-->
                <img src="images/users/<?php echo $_SESSION['userImage']; ?>" alt="" 
                width="100px" height="100px">
                <b style="text-align:center; margin-left: 25px;">
                <?php echo $_SESSION['username']; ?>
                </b>
                <p style="text-align:center"><?php echo $_SESSION['bio']; ?></p>

                <!--Update form-->
                <form action="profileUpdate.php"
                        method="POST"
                        enctype="multipart/form-data"
                >
                <div class="form-group">
                    <label style="color:grey" for="userImage"><b>Profile Picture</b></label>
                    <input type="file" name="userImage" class="form-control">
                </div>
                <div class="form-group">
                    <label style="color:grey" for="bio"><b>Update Bio</b></label>
                    <input type="text" name="bio" class="form-control" >
                </div>
                <div class="form-group">
                    <input type="submit" name="update"  class="btn btn-info" value="Update">
                </div>

                </form>
            </div>
                <div class="col-6" style="border-right: 1px solid lightgrey; height:500px;">
                    <h1 style="color:3F454C; text-align: center;">Watch List</h1>
                </div>
                <div class="col-3">
                    <h3 style="color:3F454C; text-align: center;">Buddies</h3>
                    <button style="width:300px" class="btn btn-outline-success" type="submit" id="button_clicked"href="Buddies.php">Find Buddies</button>
        
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

<script>
$('#button_clicked').on('click', function() { window.location = 'Buddies.php'; });
</script>
        