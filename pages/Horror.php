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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css-bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" type=text/css>
    <title>Available Vidoes</title>
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
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/sTtmpFIaFqc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <!--
                        <button id="123" type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                   -->
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="007">
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/zL485SVwlXU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                    <!--
                        <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button>
                   -->
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="008">
                    </div>

                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/7-5Upq2hcOA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <!-- <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button> -->
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="009">
                    </div>
                </div>
            </div>
            
            <br>
            <div class="row justify-content-center">
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/7-5Upq2hcOA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <!-- <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button> -->
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="010">
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/kyNF7mXH3aY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <!-- <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button> -->
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="011">
                    </div>
                </div>
                <div class="col-sm" align="center">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" src="https://www.youtube.com/embed/7-5Upq2hcOA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        </div>
                    </div>
                    <div>
                        <!-- <button type="submit" class="btn btn-success" style="width: 80px" ;>Save</button> -->
                        <input class="btn btn-success"
                        type="submit"
                        name="id" value="012">
                    </div>
                </div>


        </div>
     </form>
    </section>
    <?php
        include('footer.php');
    ?>
