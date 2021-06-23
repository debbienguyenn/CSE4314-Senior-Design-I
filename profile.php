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
         footer
         {
             position: fixed;
         }
     </style>
</head>

<body>
    <section>
        <?php
        include('navbar.php');
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <!--first column-->
                <div class="col-3" style="border-right: 1px solid lightgrey; height:500px">
                    <!--Display-->
                    <img style="border-radius: 50%" src="images/users/<?php echo $_SESSION['userImage']; ?>" alt="" 
                    width="120px" height="120px">
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

                <!--middle column-->
                <div class="col-6" style="border-right: 1px solid lightgrey; height:500px;">
                    <h1 style="color:3F454C; text-align: center;">Watch List</h1>
                        <?php
                        include('db.php');
                        //get saved video ID list
                        mysqli_select_db($conn, 'likedVideos');
                        $username = $_SESSION['username'];
                        $video_query = "SELECT videoID from likedVideos where username = '$username' ";
                        $video_result = mysqli_query($conn, $video_query);
                        $video_list = array();
                        if(mysqli_num_rows($video_result)>0)
                        {
                            while($list = mysqli_fetch_assoc($video_result))
                            {
                                $video_list[] = $list;
                            }
                        }
                        
                        //get the link of each videoID and put all onto an array
                        $link_list =  array();
                        foreach($video_list as $videoID)
                        {  
                            mysqli_select_db($conn, 'likedVideos');
                            $videoID = $videoID['videoID'];
                            $link_query = "SELECT link from videos where videoID = '$videoID'";
                            $link_result = mysqli_query($conn, $link_query);
                            if(mysqli_num_rows($link_result)>0)
                            {
                                $links = mysqli_fetch_assoc($link_result);
                                $link_list[] = $links;
                            }
                            
                        }
                        
                        //display each link onto profile page
                        foreach($link_list as $links)
                        {
                        $link = $links['link'];
                        
                            $html = '<div class="row">
                            <div class="card">
                                <div class = "iframe-container">
                                <iframe width="400" height="240" 
                                src="'.$link.'"title="YouTube video player" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                                gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            </div>
                            &emsp;';
                            echo $html;
                        }
                    ?>
                </div>

                <!--third column-->
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
        