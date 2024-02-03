<?php

require_once "conn.php";
  $username=$_POST['username'];
  $amount=$_POST['amount'];
  $utr=$_POST['utr'];
  $upi=$_POST['upi'];
  $first=0;


$opt="SELECT SUM(recharge) as total FROM `recharge` WHERE username='$username' AND status='Success'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']=="" or $sum['total']=="0"){
   
          if($amount==500){
                $bonus=150;
              }elseif($amount==1000){
                  $bonus=200;
              }elseif($amount==3000){
                  $bonus=400;
              }elseif($amount==4000){
                  $bonus=500;
              }elseif($amount==5000){
                  $bonus=600;
              }elseif($amount==10000){
                  $bonus=1100;
              }elseif($amount==50000){
                  $bonus=2300;
              }elseif($amount==100000){
                  $bonus=5500;
              }
            
        
   
     
          
    $win="select refcode FROM `users` WHERE  username='$username' ";
$result3 =$conn->query($win);
$row3 = mysqli_fetch_assoc($result3);
$refcode=$row3['refcode'];
$adb="UPDATE users SET balance= balance +$bonus WHERE usercode='$refcode'";
$conn->query($adb);
$addbrec="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$username','$refcode','$bonus','1')";
$conn->query($addbrec);
    
}

$sql1 = "INSERT INTO recharge (username, recharge,status,utr,upi) VALUES ('$username', '$amount','Success','$utr','$upi')";
                
$conn->query($sql1);
$addwin0="UPDATE users SET balance= balance +($amount) WHERE username='$username'";
   
$conn->query($addwin0);


?>