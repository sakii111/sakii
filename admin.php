<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adminmalinimallapp.php");
    exit;
}
require_once "config.php";
$opt9="SELECT COUNT(*) as total9 FROM `users` ";
$optres9=$conn->query($opt9);
$sum9= mysqli_fetch_assoc($optres9);

if($sum9['total9']==""){
    $bonus9=0;
   
}else{
    $bonus9=$sum9['total9'];
}
$opt="SELECT SUM(withdraw) as total FROM `record` WHERE status='success' ";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']==""){
    $bonus=0;
    
}else{
    $bonus=round($sum['total'],2);
}

$opt1="SELECT SUM(recharge) as total1 FROM `recharge` WHERE status='successfull'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
if($sum1['total1']==""){
    $tbal=0;
    
}else{
    $tbal=$sum1['total1'];
}
$opt10="SELECT SUM(withdraw) as total10 FROM `recharge` WHERE status='Applying'";
$optres10=$conn->query($opt10);
$sum10= mysqli_fetch_assoc($optres10);
if($sum10['total10']==""){
    $tbal0=0;
    
}else{
    $tbal0=$sum10['total10'];
}





$opt9t="SELECT COUNT(*) as total9 FROM `users` WHERE  DATE(`time`) = CURDATE() ";
$optres9t=$conn->query($opt9t);
$sum9t= mysqli_fetch_assoc($optres9t);

if($sum9t['total9']==""){
    $bonus9t=0;
   
}else{
    $bonus9t=$sum9t['total9'];
}
$optt="SELECT SUM(withdraw) as total FROM `record` WHERE status='success' AND  DATE(`created_at`) = CURDATE() ";
$optrest=$conn->query($optt);
$sumt= mysqli_fetch_assoc($optrest);
if($sumt['total']==""){
    $bonust=0;
    
}else{
    $bonust=round($sumt['total'],2);
}

$opt1t="SELECT SUM(recharge) as total1 FROM `recharge` WHERE status='successfull' AND  DATE(`created_at`) = CURDATE()";
$optres1t=$conn->query($opt1t);
$sum1t= mysqli_fetch_assoc($optres1t);
if($sum1t['total1']==""){
    $tbalt=0;
    
}else{
    $tbalt=$sum1t['total1'];
}
$opt10t="SELECT SUM(withdraw) as total10 FROM `recharge` WHERE status='Applying' AND  DATE(`created_at`) = CURDATE()";
$optres10t=$conn->query($opt10t);
$sum10t= mysqli_fetch_assoc($optres10t);
if($sum10t['total10']==""){
    $tbal0t=0;
    
}else{
    $tbal0t=$sum10t['total10'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {
    font-family: "Lato", sans-serif;
  }
  
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #a2dff2;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }
  
  .sidenav a {
    padding: 2px 8px 8px 32px;
    text-decoration: none;
    font-size: 20px;
    border: 2px solid white;
    color: #0e0f0f;
    display: block;
    transition: 0.3s;
  }
  
  .sidenav a:hover {
    color: #eb0918;
  }
  
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 25px;
    margin-left: 50px;
  }
  
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  overflow: hidden;

}
body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}


tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content:  counter(Serial); /* Display the counter */
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
#searchbar{
     margin-left: 15%;
     padding:15px;
     border-radius: 10px;
   }
 
   input[type=text] {
      width: 30%;
      -webkit-transition: width 0.15s ease-in-out;
      transition: width 0.15s ease-in-out;
   }

</style>
</head>
<body>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="admin.php" class="active" >👤 Admin</a>
   <a href="users.php"  >👥 Users</a>
  <a href="adduser.php">🗣️ Add User</a>
  <a href="inviterec.php">📧 Invite Record</a>
  <a href="adpass.php">🔏 Password</a>
  <a href="adwith.php">🏧 Withdraw</a>
  <a href="adpre.php">⏭️ Next Predition</a>
  <a href="adreward.php">🏆 Reward</a>
  <a href="rechargeRequests.php">💰 Recharge</a>
  <a href="delete.php">🚫 Delete User</a>
  <a href="adlogout.php">🔥 Log Out</a>


</div>
   <h2 style="font-size:20px;padding:5px;background-color: lightblue; color:Black; text-align:center;"onclick="window.location.href='gift'"> 🎁 GIFT CARD</h2>
     <h2 style="font-size:20px;padding:5px;background-color: lightblue; color:Black; text-align:center;"onclick="window.location.href='notice'">⚠️ NOTICE</h2>
     <h2 style="font-size:20px;padding:5px; background-color: lightblue;color:Black; text-align:center;"onclick="window.location.href='upi'">💳 UPI ID</h2>
          <h2 style="font-size:20px;padding:5px;background-color: lightblue; color:Black; text-align:center;"onclick="window.location.href='changes'">⚙️ MORE</h2>

<div class="w3-container" style="justify-content: center;display: flex;">


  <div class="w3-card-4" style="width:70%">
    <header class="w3-container w3-light-blue">
      <h3>Total Users</h3>
    </header>
    <div class="w3-container">
   
      
      <p>Todays Users/Total users: <?php echo $bonus9t ?>/<?php echo $bonus9 ?></p><br>
    </div>
    
  </div>
</div>

<div class="w3-container" style="justify-content: center;display: flex;">


  <div class="w3-card-4" style="width:70%">
    <header class="w3-container w3-light-blue">
      <h3>Total Profit</h3>
    </header>
    <div class="w3-container" style="justify-content: center;display: flex;">
   
      
      <p>Todays Profit/Total Profit: <?php echo ($tbalt-$bonust)?>/ <?php echo ($tbal-$bonus)?></p><br>
    </div>
    
  </div>
</div>

<div class="w3-container" style="justify-content: center;display: flex;">


  <div class="w3-card-4" style="width:70%">
    <header class="w3-container w3-light-blue">
      <h3>Total Withdraw</h3>
    </header>
    <div class="w3-container" style="justify-content: center;display: flex;">
   
      
      <p> Amount Withdrawn: <?php echo $bonust?>/ <?php echo $bonus?></p><br>
    </div>
    
  </div>
</div>

<div class="w3-container" style="justify-content: center;display: flex;">


  <div class="w3-card-4" style="width:70%">
    <header class="w3-container w3-light-blue">
      <h3>Pending withdraw</h3>
    </header>
    <div class="w3-container">
   
      
      <p>Today's pending/Total Withdraw pending: <?php echo $tbal0t?>/<?php echo $tbal0?></p><br>
    </div>
    
  </div>
</div>

<div class="w3-container" style="justify-content: center;display: flex;">


  <div class="w3-card-4" style="width:70%">
    <header class="w3-container w3-light-blue">
      <h3>Total Recharge</h3>
    </header>
    <div class="w3-container">
   
      
      <p> Todays Recharge/Total Recharge Amount: <?php echo $tbalt?>/ <?php echo $tbal?></p><br>
    </div>
   
  </div>
</div>


<div>
 
</div>

<script>
      function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
</script>

</body>
</html>
