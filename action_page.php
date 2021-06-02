<?php
$email= $_POST['email'];
$psw= $_POST['psw'];
$pswrepeat = $_POST['pswrepeat'];



//Database Connection
 
$conn= new mysqli('localhost','root','test');
if($conn->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into SignUp(email,password,repeatPass) values(?,?,?)");
        $stmt->bind_param("sss",$email,$psw,$pswrepeat);
        $stmt->execute();
        echo "registration Successful";
        $stmt->close();
        $conn->close();

    }
?>