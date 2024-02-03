<?php
/*
This file contains database config.phpuration assuming you are running mysql using user "root" and password ""
*/

require "../config.php";
   


// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
    Echo"Fail";
}

?>