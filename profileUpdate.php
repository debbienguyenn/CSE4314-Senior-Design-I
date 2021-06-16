<?php
session_start();



if(isset($_POST['update'])){

    $conn= mysqli_connect('localhost:3306','root','', 'sdproject');
    mysqli_select_db($conn, 'registration');

         $userImage    =   $_FILES['userImage'];
         $bio =    $_POST['bio'];

        if(!empty($userImage) && !empty($bio)){ 
            $imageName = $userImage ['name'];
            $fileType  = $userImage['type'];
            $fileSize  = $userImage['size'];
            $fileTmpName = $userImage['tmp_name'];
            $fileError = $userImage['error'];

            $fileImageData = explode('/',$fileType);
            $fileExtension = $fileImageData[count($fileImageData)-1];

            
            if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg'){
                //Process Image
                
                if($fileSize < 5000000){
                    //var_dump(basename($imageName));

                    $fileNewName = "images/users/".$imageName;
                    
                    $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
                    
                    if($uploaded){
                        $loggedInUser = $_SESSION['username'];
                        
                        $sql = "UPDATE registration SET bio='$bio',userImage='$imageName' WHERE username = '$loggedInUser'";

                        $results = mysqli_query($conn,$sql);

                        header('Location:profile.php');
                    exit;
                    }


                }else{
                    echo '<script>alert("Invalid File Size!")</script>';
                    echo '<script>window.location=\'profile.php\'</script>';
                    exit;
                }
                exit;
            }else{
                echo '<script>alert("Invalid File Type!")</script>';
                echo '<script>window.location=\'profile.php\'</script>';
                exit;
            }
            


        }else{
            echo '<script>alert("Empty Bio!")</script>';
            echo '<script>window.location=\'profile.php\'</script>';
            exit;
        }
        



}

?>