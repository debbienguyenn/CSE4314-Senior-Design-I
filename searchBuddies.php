<?php

 //database connection
 $connect = mysqli_connect('localhost:3306', 'root', '', 'sdproject');  
 
if(isset($_GET["query"]))
 {
      $query = urlencode($_GET["query"]);

      $query = preg_replace("#[^a-z 0-9?!]#i", "", $query);
 }

 //if nothing is set in the search buddies bar, it will redirect user to the homepage for now. 06/19/2021
 if(!isset($query))
 {
     header('location:homepage.php');
 }
 else //otherwise, display query on page.
 {
     include('navbar.php');
?>

     <div class="row">
          <div class="col-md-9">
               <h4>Search Results for <b><?php echo $query; ?>
               </b></h4>
               <div id="search_result">
               <div class="wrapper-preview">
               <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
               </div>
               </div>
          </div>
     </div>

     <script>
		$(document).ready(function(){
			var query_result = "<?php echo $query; ?>";

			$('#buddy').val(query_result);

			load_data(query_result, 1);

			function load_data(query_result, page)
			{
				$.ajax({
					url:"search_action.php",
					method:"POST",
					data:{query_result:query_result, page:page},
					success:function(data)
					{
						$('#search_result').html(data);
					}
				})
			}

               //clicking on page number link at bottom executes this code
			$(document).on('click', '.page-link', function(){
				var page = $(this).data('page_number');

				if(page > 0)
				{
					load_data(query_result, page);
				}
			});

//			$(document).on('click', '.request_button', function(){
//				var to_id = $(this).data('username');

//				var action = 'send_request';

//				if(to_id > 0)
//				{	
//					$.ajax({
//						url:"friend_action.php",
//						method:"POST",
//						data:{to_id:to_id, action:action},
//						beforeSend:function()
//						{
//							$('#request_button_'+to_id).attr('disabled', 'disabled');
//							$('#request_button_'+to_id).html('<i class="fa fa-circle-o-notch fa-spin"></i> Sending...');
//						},
//						success:function(data)
//						{
//							$('#request_button_'+to_id).html('<i class="fa fa-clock-o" aria-hidden="true"></i> Request Send');
//						}
//					});
//				}
//
//			});

		});
		</script>
<?php

	include('footer.php');
}

?>
