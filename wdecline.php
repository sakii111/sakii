<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
  $username=$_GET['un'];
  $amount=$_GET['am'];
  $id=$_GET['id'];
  
$addwin00="UPDATE record SET status='' WHERE username='$username' AND withdraw='$amount' AND id='$id'";
$conn->query($addwin00);
if($conn->query($addwin00)){
     $addwin0="UPDATE users SET balance= balance +( $amount*(100/97)) WHERE username='$username'";
  
    if($conn->query($addwin0)){
        header("location: adwith");
    }

        
    
}else{
    echo"FAILED";
}
?>