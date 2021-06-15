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
<div class="container">
    <div classs="row justify-content-center">
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
                          $('#buddiesList').fadeIn();  
                          $('#buddiesList').html(data);  
                     }  
                });  
           }
           /*comment by Debbie: not fading out when search is empty after typing something. FIX*/
           else if(query == 8 && $('#buddy').val($(this).text()) == '')
           {
            $('#buddiesList').fadeOut();  
           }
      });  
      $(document).on('click', 'li', function(){  
          /*When user searches and clicks name on drop-down, it changes the text in search-bar to the name clicked*/
          /*Change or add to this portion*/
           $('#buddy').val($(this).text());  
           $('#buddiesList').fadeOut();  
      }); 
 });  
 </script>  
 </div>
</div>
</html>

