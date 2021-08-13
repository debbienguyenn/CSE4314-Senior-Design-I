<?php
  session_start();

  if(isset($_POST["addBuddiesbtn"]))
  {
    $search_query = preg_replace("#[^a-z 0-9?!]#i", "", $_POST["buddy"]);

    header('location:processing/searchBuddies.php?query='.urlencode($search_query).'');
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> WatchBuddy - Buddies Page</title>
  <link rel="stylesheet" href="css-bootstrap/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="pages/style.css" type=text/css>
  <style>
    footer {
      color: grey
    }
  </style>
</head>

<body>
    <section>
        <?php
            include('pages/navbar.php');
        ?>
      <form class="form-container" action="../processing/search_action.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
              <h2 align="center">Add Buddies!</h2>
              <label style="color:grey" for="buddy" class="col-6">Enter Buddy's Username</label>
              <div class="row justify-content-center">
                <input style="width:600px" class="form-control me-2" type="text" placeholder="Search for buddies.."
                          name="buddy" id="buddy">
                <button style="width:300px" class="btn btn-outline-success" type="submit" id="addBuddiesbtn" name="addBuddiesbtn">Add Buddy</button>
              <div id="buddiesList"></div>
            </div>
        </div>
      </form>

      <form class="form-container" action="../processing/deletebuddy_action.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
              <label style="color:grey" for="buddy" class="col-6">Enter Buddy's Username</label>
              <div class="row justify-content-center">
                <input style="width:600px" class="form-control me-2" type="text" placeholder="Search for buddies.."
                          name="delete" id="delete">
                <button style="width:300px" class="btn btn-outline-danger" type="submit" id="deleteBuddiesbtn" name="deleteBuddiesbtn">Remove Buddy</button>
            </div>
        </div>
      </form>
    </section>

</body>
</html>

