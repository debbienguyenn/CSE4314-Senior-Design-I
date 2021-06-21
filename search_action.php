
 <?php  

 //database connection
 $connect = mysqli_connect('localhost:3306', 'root', '', 'sdproject');  
 
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
                $output .= '<li>'.$row["username"].'</li>';

                //line 19 needs to be fixed to be in line with the username.
                //At the moment, the add button is underneath the username. Not attached to query yet. 06/18/2021
                //$output .= $row["username"].'<button><li>Add Buddy </button></li>';

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

 if(isset($_POST["query_result"]))
 {
      $output = '';
      $search_array = explode(" ", $_POST["query_result"]);

      $condition = '';
      foreach($search_array as $search)
      {
           //search value not blank.
           if(trim($search) != '')
           {
                $condition .= "username LIKE '%".$search."%' OR ";
           }
      }

      $condition = substr($condition, 0, -4);

      //displaying results
      //displays only top 5 results for now.
      $limit = 5;

      //starts on page 1.
      $page = 1;

      if($_POST['page'] > 1)
      {
          $start = (($_POST['page'] - 1) * $limit);
          $page = $_POST['page'];
      }
      else
      {
          $start = 0;
      }

      $query = "SELECT * FROM username WHERE ".$condition." AND username != '".$_SESSION["username"]."'";


      $filter_query = $query . ' LIMIT ' .$start.', '.$limit.'';

      $statement = $connect->prepare($query);

      //execute query.
      $statement->execute();
      
      //rowCount() returns how many rows are affected.
      $total_data = $statement->rowCount();

      //preparing only the searched names. Filtered from the others.
      $statement = $connect->prepare($filter_query);

      $statement->execute();

      //fetchAll() returns query results.
      $result = $statement->fetchAll();


      //Storing data in variable $output to display on pages by userImage, Username, and Name.
      if($total_data > 0)
      {
           //loop
          foreach($result as $row)
          {
               $output .= '
                    <div class="wrapper-box">
                         <div class="row">
                              <div class="col-md-1 col-sm-3 col-xs-3">
                                   '. Get_user_avatar_big($row["userImage"], $connect) .'
                              </div>
                              <div class="col-md-8 col-sm-6 col-xs-5">
                              <div class="wrapper-box-title">'.$row["username"].'
                              </div>
                              <div class="wrapper-box-description">'.$row["firstname"].'
                              </div>
                         </div>
                         <div class="col-md-3 col-sm-3 col-xs-4" align="right">
                         <button type = "button"
                              name = "request_button" class="btn btn-primary request_button"></button>
                              data-userid="'.row["username"].'"><i class="fa fa-user-plus"></i> Add Buddy</button>
                         </div>
                         </div>
                    </div>';
          }
      }
      else
      {
           $output .= '<div class="wrapper-box">
                         <h4 align="center">No Buddies Found. Try Again.</h4>
                         </div>';
      }

      /*********************************************************
      Creating the page links at bottom of page if there are more than five results,
         since only five results will appear on a page at a time. 
      *********************************************************/
      $output .= '
      <br/>
      <div align="center">
      <ul class="pagination">';

      $total_links = ceil($total_data/$limit);
      $previous_link = '';
      $next_link = '';
      $page_link = '';

      if($total_links > 5)
      {
          if($page < 5)
          {

               for($count = 1; $count < 5; $count++)
               {
                    $page_array[] = $count;
                    $page_array[] = '...';
                    $page_array[] = $total_links;
               }
          }
          else
          {
               $end_limit = $total_links - 5;

               if($page > $end_limit)
               {
                    $page_array[] = 1;
                    $page_array[] = '...';

                    for($count - $end_limit; $count <= $total_links; $count++)
                    {
                         $page_array[] = $count;
                    }
               }
               else
               {
                    //storing page number in array
                    $page_array[] = 1;
                    $page_array[] ='...';

                    for($count = $page - 1; $count <= $page + 1; $count++)
                    {
                         $page_array[] = $count;
                    }
                    $page_array[] = '...';
                    $page_array[] = $total_links;
               }
          }
      }
      else
      {
          for($count = 1; $count < $total_links; $count++)
          {
               $page_array[] = $count;
          }
      }

      for($count = 0; count($page_array); $count++)
      {
           //if it is the current page we are on, the link button for this page will be active and not clickable.
           if($page == $page_array[$count])
           {
                $page_link .= '
                <li class="page-item active">
                    <a class="page_link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
                </li>';

                //Previous Page through the Previous link
                $previous_id = $page_array[$count] - 1;
                if($previous_id > 0)
                {
                    $previous_link = '
                    <li class="page-item">
                         <a class="page-link"
                              href="javascript:void(0)" data-page_number="'.$previous_id.'">
                         </a>
                    </li>';
                }
                else //if it is on the first page, "previous" link is disabled.
                {
                    $previous_link = '
                    <li class="page-item disabled">
                         <a class="page-link"
                              href="#">Previous</a>
                    </li>';
                }

                //Next Page through the "Next" link
                $next_id = $page_array[$count] + 1;
                //if it reaches the last page, "Next" link is disabled.
                if($next_id > $total_links)
                {
                    $next_link = '
                    <li class="page-item disabled">
                         <a class="page-link"
                              href="#">Next</a>
                    </li>';
                }
                else
                {
                    $next_link = '
                    <li class="page-item">
                         <a class="page-link"
                              href="javascript:void(0)" data-page_number="'.$next_id.'">
                         </a>
                    </li>';
                
                }
           }
           else
           {
               if(page_array[$count] == '...')
               {
                    $page_link .='
                    <li class="page-item disabled">
                         <a class="page-link"
                              href="#">...</a>
                    </li>';
               }
               else
               {
                    $page_link .= '
                    <li class="page-item">
                         <a class="page-link"
                              href="javascript:void(0)"
                              data-page_number="'.$page_array[$count].'">'.$page_array[$count].'
                         </a>
                    </li>';
               }
           }
      }

      $output .= $previous_link . $page_link . $next_link;
      echo $output;
 }
 /************************************End of Page Links*****************************************************/