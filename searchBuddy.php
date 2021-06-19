<?php  
 include('db.php'); 
 
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM registration WHERE username LIKE '%".$_POST["query"]."%' ORDER BY username ASC";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled" style="text-align: center">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                //line 15 is only the username without any buttons
                //$output .= '<li>'.$row["username"].'</li>';

                //line 19 needs to be fixed to be in line with the username.
                //At the moment, the add button is underneath the username. Not attached to query yet. 06/18/2021
                $output .= $row["username"].'<button><li>Add Buddy </button></li>';

                //NOTE: add condition where if the user is already added to this buddy, then the button should be "un-buddy" instead.
           }  
      }  
      else  
      {  
           $output .= '<li>Buddy Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 