<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:Login.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <link rel="stylesheet" href="../css-bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" type=text/css>
    <title>Available Videos</title>
    <style>
         footer
         {
             position: fixed !important;
         }
     </style>
</head>
<body>
    <section>
    <?php
      include('navbar.php');
    ?>

    <form class="form-container" action="../processing/SaveVideo.php" method="post">
        <div class="container">
            <h1> Funny Videos</h1>
            <div class="row justify-content-center">
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/DODLEX4zzLQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="001"><i class = "fa fa-save"></i></input>
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/FFLTU9eIijw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="002">
                    </div>

                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/2acZIOSV9LY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="003">
                    </div>
                </div>
            </div>
            
            <br>
            <div class="row justify-content-center">
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/XJ2hd2cKAJo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="004">
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/CmomQkOau7c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="005">
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/HeGVeBWECu8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="006">
                    </div>
                </div>


        </div>
     </form>
    </section>
    <?php
        include('footer.php');
    ?>
