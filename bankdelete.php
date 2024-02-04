<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}

require_once "config.php";




$sql = "UPDATE users SET account='1111111111' WHERE username='".$_SESSION['username']."'";

$conn->query($sql);
if ($conn->query($sql) == TRUE) {
   
     header("location: bank#");
} else {
    echo '<h1  style="text-align: center;" > Delete Failed</h1>';
}
   



?>