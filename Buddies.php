<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title> WatchBuddy - Buddies Page</title>
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
              <a href="Host.php">Host</a>
              &emsp;
              <a href="Join.php">Join</a>
              &emsp;
              <a href="Logout.php">Log out</a>
              </div>';
            }
        ?>

        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <h2 align="center">Add Buddies!</h2>
                <h4 class="col-6">Enter Buddy's Username</h4>
                <div class="row justify-content-center">
                    <input style="width:600px" class="form-control me-2" type="text" placeholder="Search for buddies.."
                        name="buddy" id="buddy">
                    <!--<button style="width:150px" class="btn btn-outline-success" type="submit">Search</button>-->
                    <div id="buddiesList"></div>
                </div>
            </div>
        </div>
    </section>

    <?php
        include('footer.php');
    ?>
</body>

<!--script for searching for a buddy-->
<script>  
 $(document).ready(function(){  
      $('#buddy').keyup(function(){  
           var query = $(this).val();  
           if(query != '' || query != 8 || query != 46)  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          /*comment by Debbie: not fading out when search is empty after typing something. FIX*/
                          //fixed: 06/18/2021
                          if($('#buddy').val() == '')
                          {
                            $('#buddiesList').fadeOut(); 
                          }
                          else
                          {
                            $('#buddiesList').fadeIn();  
                            $('#buddiesList').html(data);
                          } 
                     }  
                });  
           }

      });  
      $(document).on('click', 'button', function(){  
          /*When user searches and clicks add buddy on results, it changes the text in search-bar to the button name for now*/
          /*Change and add to this portion - connect to database to add/delete friends*/
           $('#buddy').val($(this).text());  
           $('#buddiesList').fadeOut();  
      }); 
 });  
 </script>  
</html>

