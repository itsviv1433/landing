<?php

include('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);
        $getResult = mysqli_query($conn,"SELECT * FROM `contact` WHERE `email`='".$email."'");
        if(mysqli_num_rows($getResult)){
            echo json_encode(array("code"=>0,"msg"=>"Your message is already recorded.Please wait for response from our team."));
        }else{
            $addResult = mysqli_query($conn,"INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('".$name."','".$email."','".$message."')");
            if($addResult){
                echo json_encode(array("code"=>1,"msg"=>"Response Received Sucessfully. "));
            }else{
                echo json_encode(array("code"=>0,"msg"=>"Something went wrong.Try again later."));
            }
        }
    }
}

?>
