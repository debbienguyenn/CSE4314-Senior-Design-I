<?php  
 $connect = mysqli_connect('localhost:3306', 'root', '', 'sdproject');  
 
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM registration WHERE username LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["username"].'</li>';  
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