<?php
//To make sure authentication
session_start();
error_reporting(E_WARNING || E_ALL);
$userInfo=$_SESSION['userInfo'];
if(count($userInfo)!=0){ //To check login or not    
    if($userInfo['user_image']==""){
        $iname="../images/user.png";    
    }else{
        $iname="../images/user_images/".$userInfo['user_image'];
    }    
}else{
    $msg= base64_encode("Please Login !!!");
    header("Location:../view/login.php?msg=$msg");
    exit();    
}

