<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css-bootstrap/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" type=text/css>
  <title>Reset Password - WatchBuddy</title>
  <!-- <style>
      footer{
          position: fixed !important;
      }
  </style> -->
</head>

<body>
  <section>
    <?php
      include('navbar.php');
    ?>
    <?php
        include('../processing/db.php');
        if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) 
        {
            $key = $_GET["key"];
            $email = $_GET["email"];
            $query = mysqli_query($conn, "SELECT * FROM `password_reset` WHERE `token`='" . $key . "' and `email`='" . $email . "';");
            $row = mysqli_num_rows($query);
            $error ="";
            if ($row == "") 
            {
                $error .= '<h2 align="center" style="color:red">Invalid Link!</h2>';
                echo $error;
            } 
            else 
            {
                $row = mysqli_fetch_assoc($query);
                $form = '<form class="form-container" action="../processing/changePassword.php" method="post" name="update">
                <div class="container-xxl bg" align="center">
                    <h1 style="color:grey"> Reset Password</h1>
                    <input type="hidden" name="action" value="update" class="form-control"/>
                    <div class="mb-3">
                        <label style="color:grey" for="password"><b>Enter new password</b></label>
                        <input type="password" name="password" style="width: 400px"; required>
                    </div>
                    <div class="mb-3">
                        <label style="color:grey" for="re-passworf"><b>Re-enter new password</b></label>
                        <input type="password"  name="re-password" style="width: 400px"; required>
                    </div>
                    <input type="hidden" name="email" value="'.$email.'"/>
                    <!-- <input type="submit" id="reset" value="Reset Password"  class="btn btn-sucess" style="width: 150px"/> -->
                    <button type="submit" class="btn btn-success" style="width: 150px" ;>Reset Password</button>
                </div>
            </form>';
                echo $form;
            }
        }
    ?>

    
    
  </section>
  <?php
        include('footer.php');
    ?>
