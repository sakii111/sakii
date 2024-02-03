<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Brozers Mall">
<meta name="keywords" content="Brozers Mall" />

<style>
h3{ font-weight:normal; font-size:14px;}


    .btn { background-image: linear-gradient(
#2196f3, 
#2196f3);
    border-radius: 5px 5px 5px 5px;
    border: 0.5px solid white;
    color: white;
    transition: 0.5s;
    
}

.checkbox-custom, .radio-custom {
    opacity: 0;
    position: absolute;   
}

.checkbox-custom, .checkbox-custom-label, .radio-custom, .radio-custom-label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}

.checkbox-custom-label, .radio-custom-label {
    position: relative;
}

.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
    content: '';
    background: #fff;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    height: 20px;
    padding: 2px;
    margin-right: 10px;
    text-align: center;
}

.checkbox-custom:checked + .checkbox-custom-label:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    background: rebeccapurple;
    color: #fff;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 50%;
}

.radio-custom:checked + .radio-custom-label:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    color: #bbb;
}

.checkbox-custom:focus + .checkbox-custom-label, .radio-custom:focus + .radio-custom-label {
  outline: 1px solid #ddd; /* focus style */
}
    
    .point2{width:80%;
        margin:auto;
    }
 .point{width:100%;
        display:inline-block;
    }
    
    .bb1{    width: 100%;
    display: inline-block;
}

.bb2{
        display: flex;
    width: 80%;
    margin: auto;
    justify-content: space-between;

}

button#rechamt {
    background-color:#2196f3;;
    color: white;
    border: none;
    border-radius: 8px;
    width: 20%;
    padding: 4px;
}

button#rechamt:hover{background-color:#f35b21 !important}
</style>
</head>

<body>
<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];
?>


<?php

/*

if(isset($_POST['rechargeNow'])){
    
  $userid =   $_SESSION['frontuserid'];
  $amount  = $_POST['userammount'];
  $mobile   = $_POST['mobile '];
  $txn  = $_POST['txn'];
  $paymentMethod  = $_POST['paymentMethod'];
  $status = 2;
  $createdate = date("Y h:i:s");
  
  
 // echo $userid."<br>".$amount."<br>".$mobile."<br>".$txn."<br>".$paymentMethod."<br>".$status."<br>".$createdate;
  
  $sqlinsert =  mysqli_query($con,"INSERT INTO `tbl_recharge` (userid, amount,status,createdate,mobile,txn,paymentMethod ) VALUES ('$userid','$amount','$status','$createdate','$mobile','$txn','$paymentMethod')" );
  
  if($sqlinsert){
      echo '<script>alert("Recharge Request Sent")</script>';
  }else{
      echo '<script>alert("Please try after some time !!")</script>';
  }
        
  
     
};*/


?>





<!-- App Header -->
<div class="appHeader1">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Recharge</div>
        </div>
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1">
      
     
    


</div>


      
  


<h2 class="text-center m-2" style="font-size:20px;">Balance: <span>₹ <?php echo number_format(wallet($con,'amount',$userid), 2);?></span></h2>
    <form action="gatewayekaypay.php" id="" method="post" class="card-body" autocomplete="off">
      <div class="inner-addon left-addon">
      <?php
      $con = @mysqli_connect('localhost', 'eazywins_prguser', 'Color@12345', 'eazywins_prgmall');
      $up1 = mysqli_query($con, "SELECT * FROM `tbl_user` WHERE id = $userid");
      $rup1 = mysqli_fetch_array($up1);
    ?>
        <input type="number" id="userRechammount" name="userRechammount" class="form-control" placeholder="Enter recharge amount" >
      </div>
      
      <div class="inner-addon left-addon">
      
        <input type="hidden" id="mobile" name="mobile" class="form-control" value="<?php echo  $rup1['mobile'] ; ?>" placeholder="<?php  echo $rup1['mobile'] ;?> " >
      </div>
      
  <!--    <div class="container" >-->
  <!--<div class="row text-center" >-->
  <!--  <div class="col-3">-->
  <!--    <button type="button" class="btn btn-primary" value="500" id="rechamt" name="rechamt"  onclick="displayRechargeValue('500')">500</button>-->
  <!--  </div>-->
  <!--  <div class="col-3">-->
  <!--    <button type="button" class="btn btn-primary"  value="1000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('1000')">1000</button>-->
  <!--  </div>-->
  
  <!--  <div class="col-3">-->
  <!--    <button type="button" class="btn btn-primary"  value="5000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('5000')">5000</button>-->
  <!--  </div>-->
    
  <!--  <div class="col-3">-->
  <!--    <button type="button" class="btn btn-primary"  value="10000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('10000')">10000</button>-->
  <!--  </div>-->
  <!--  </div>-->
  <!--</div>-->
  
  
  
  <div class="bb1">
      <div class="bb2">
         <button type="button" class=""value="500" id="rechamt" name="rechamt"  onclick="displayRechargeValue('500')">500</button>  
         <button type="button"  value="1000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('1000')">1000</button>
         <button type="button"  value="5000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('5000')">5000</button>
         <button type="button"  value="10000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('10000')">10000</button>
         
          
      </div>
      
     
  </div>
  
   
  </div>
  <h2 style="text-align:center;"> Payment</h2>
  <!--<div>-->
  <!--          <input id="radio-1" class="radio-custom" name="radio-group" type="radio" checked>-->
  <!--          <label for="radio-1" class="radio-custom-label">PRG Pay</label>-->
  <!--      </div>-->
        
</div>



            <div class="point">
                <div class="point2">
        <p style="color: black; font-size:13px;" ><strong>Note:</strong> <br>
        1.Minimmum Recharge = 200 Rs 
        <br>

    2. If Someone not received recharge amount so dont make multiple requests just click on recharge support button 
      
      <a class="badge badge-danger" href="https://vclub.buzz/new-complaints.php">Recharge Support</a>
      <a class="badge badge-danger" href="https://www.instagram.com/vclub_admin/?igshid=YmMyMTA2M2Y=">send problem screen shot to this id</a>
        </p>
        </div>
        </div>
        
    <div class="text-center mt-3">
        <button type="submit" name = "rechargeNow" class="btn btn-primary" style="width:264px;">Recharge </button>
        </div>
        
       </div>
    </form>
  </div>
</div>

<div class="container d-flex justify-content-center" style="margin-top:2%;"><a href="rechargehistory.php" class"badge bg-info"> Recharge Record</a>
</div>

<br><br><br><br><br><br>

<!-- appCapsule -->

<?php include("include/footer.php");?>
<div id="paymentdetail" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span></button>
       <p>&nbsp;</p>
        <div class="">
        <form action="#" method="post" id="paymentdetailForm">
        <div class="inner-addon left-addon">
      <i class="icon ion-md-person"></i>
  <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
      </div>
      <div class="inner-addon left-addon">
      <i class="icon ion-md-phone-portrait"></i>
        <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile Number"  value="<?php echo user($con,'mobile',$userid);?>" onKeyPress="return isNumber(event)">
      </div>
      <div class="inner-addon left-addon">
      <i class="icon ion-ios-mail"></i>
   <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email id"  value="<?php echo user($con,'email',$userid);?>">
      </div>
      <input type="hidden" name="finalamount" id="finalamount" value="">
      <input type="hidden" name="action" id="action" value="paydetail">
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" style="width:264px;"> Recharge </button>
        </div>
        </form>          
        </div>
      </div>
    </div>
  </div>
</div>



<script>
        function displayRechargeValue(rechamt) {
           document.getElementById("userRechammount").value  = rechamt;
        }
    </script>
    
    
    
<script src="/assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="/assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/payment.js.php"></script>

</body>
</html>