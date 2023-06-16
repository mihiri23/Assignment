<?php
//To hide errors
error_reporting(E_WARNING || E_ALL);
//To start a session if not
if(!isset($_SESSION)){
    session_start();
}
//To create a unique session for user/customer
if($_SESSION['sid']==""){
      $ip = $_SERVER['REMOTE_ADDR']; //To get the ip address of customer
      $_SESSION['sid']= time()."_".$ip;
}
$sid=$_SESSION['sid'];
$noc=count($_SESSION['rowcus']);
?>

