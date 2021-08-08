<?php
    include('../processing/db.php');
    //get saved video ID list
    mysqli_select_db($conn, 'likedVideos');
    $username = $_SESSION['username'];
    $video_query = "SELECT videoID from likedVideos where username = '$username' ";
    $video_result = mysqli_query($conn, $video_query);
    $video_list = array();
    if(mysqli_num_rows($video_result)>0)
    {
        while($list = mysqli_fetch_assoc($video_result))
        {
            $video_list[] = $list;
        }
    }
    
    //get the link of each videoID and put all onto an array
    $link_list =  array();
    foreach($video_list as $videoID)
    {  
        mysqli_select_db($conn, 'likedVideos');
        $videoID = $videoID['videoID'];
        $link_query = "SELECT link from videos where videoID = '$videoID'";
        $link_result = mysqli_query($conn, $link_query);
        if(mysqli_num_rows($link_result)>0)
        {
            $links = mysqli_fetch_assoc($link_result);
            $link_list[] = $links;
        }
        
    }
    
    //display each link onto profile page
    foreach($link_list as $links)
    {
    $link = $links['link'];
    
        $html = '<div class="row">
                    <div class="card">
                        <div class = "iframe-container">
                        <iframe width="400" height="240" 
                        src="'.$link.'"title="YouTube video player" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                        gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div>
                        <form action="../processing/unsave.php" method="POST">
                            <input class="btn btn-outline-danger""
                            type="submit" id="button"
                            name="unlike_button" value="Remove" style="float: right;">
                            <input type=text name="unliked" value="'.$link.'" hidden>
                        </form>
                    </div>
                </div>
                &emsp;';
        echo $html;
    }
?>