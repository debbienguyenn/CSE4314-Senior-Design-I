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
    <title> My Profile - WatchBuddy </title>
    <link rel="stylesheet" href="../css-bootstrap/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" type=text/css>
     
</head>

<body>
    <section>
        <?php
        include('navbar.php');
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <!--first column-->
                <div class="col-3">
                    <!--Display-->
                    <img style="border-radius: 50%" src="../images/users/<?php
                        if(isset($_SESSION['userImage'])) 
                            echo $_SESSION['userImage'];
                        else
                            echo 'default-profile-picture.png';
                    ?>" alt="" 
                    width="120px" height="120px">
                    <b style="text-align:center; margin-left: 25px;">
                    <?php echo $_SESSION['username']; ?>
                    </b>
                    <p style="text-align:center"><?php echo $_SESSION['bio']; ?></p>

                    <!--Update form-->
                    <form action="../processing/profileUpdate.php"
                            method="POST"
                            enctype="multipart/form-data">
                        <div class="form-group">
                            <label style="color:grey" for="userImage"><b>Profile Picture</b></label>
                            <input type="file" name="userImage" class="form-control">
                        </div>
                        <div class="form-group">
                            <label style="color:grey" for="bio"><b>Update Bio</b></label>
                            <input type="text" name="bio" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input  type="submit" name="update"  class="btn btn-info" value="Update">
                        </div>

                    </form>
                </div>

                <!--middle column-->
                <div class="col-6">
                    <h1 style="color:3F454C; text-align: center;">Watch List</h1>
                    <?php include '../processing/displayVideos.php' ?>
                </div>

                <!--third column-->
                <div class="col-3">
                    <h3 style="color:3F454C; text-align: center;">Buddies</h3>

                    <form class="form-container" action="../processing/search_action.php" method="post">
                        <div class="container">
                            <div class="row justify-content-left">
                                <input style="width:300px" class="form-control me-2" type="text" placeholder="Add buddies.."
                                        name="buddy" id="buddy">
                                <button style="width:300px" class="btn btn-outline-success" type="submit" id="addBuddiesbtn" name="addBuddiesbtn">Add Buddy</button>
                            <div id="buddiesList"></div>
                            </div>
                        </div>
                    </form>


                    <!-- Button is used to direct users to the buddies page for add and deleting friends. Not currently being used. Delete before submission.
                        <button style="width:300px" class="btn btn-outline-success" type="submit" id="button_clicked"href="Buddies.php">Find Buddies</button>
                    -->

                    <?php
                    

                    //get current friends of the user to create buddies list
                    mysqli_select_db($conn, 'buddies');
                    $username = $_SESSION['username'];
                    $buddies_query = "SELECT BuddyID from buddies where UserID = '$username'";
                    $buddies_result = mysqli_query($conn, $buddies_query);
                    $buddies_list = array();

                    if(mysqli_num_rows($buddies_result)>0)
                    {
                        while($list = mysqli_fetch_assoc($buddies_result))
                        {
                            $buddies_list[] = $list;
                        }
                    }

                    //get current buddies' userImage to put into an array
                    /*
                    $buddyimg_list = array();
                    foreach($buddies_list as $buddiesData)
                    {
                        mysqli_select_db($conn, 'registration');
                        $buddiesData = $buddiesData['userImage'];
                        $buddydata_query = "SELECT userImage from registration where username = '$buddiesData'";
                        $buddyimg_result = mysqli_query($conn, $buddydata_query);
                        if(mysqli_num_rows($buddyimg_result)>0)
                        {
                            $buddyimg = mysqli_fetch_assoc($buddyimg_result);
                            $buddyimg_list[] = $buddyimg;
                        }
                    }
                    */

                    //displaying current buddies and their profile pic in a list on profile page.
                    foreach($buddies_list as $buddyname)
                    {
                        $buddies = $buddyname['BuddyID'];
                        echo $buddies;
                        print_r("  ");
                        //add buttons to remove friend and chat here..
                        echo "<a  href = ../processing/deletebuddy_action.php?buddyID=".$buddies."><img title='Unbuddy Me' id='dltBuddy' src=../images/icons/delete.png style='width:25px'></a>";
                        print_r("  ");
                        echo '<button title="Chat" id="chatBtn" style="height:20px; width:20px" onclick="window.open(\'../pages/chat.php?buddyID='.$buddies.'\',\'\',\'height=600,width=600,top=400\', false)"></button>';
                        echo '<br>';
                    }
                    ?>
                </div>
            </div>
        </div>
        
    </section>

<script>
$('#button_clicked').on('click', function() { window.location = '../processing/Buddies.php'; });
</script>

<?php
        include('footer.php');
    ?>