<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}
$con = @mysqli_connect('localhost', 'vclubbuz_M', 'Mjmdehe@1234', 'vclubbuz_M');
$userid= $_SESSION['frontuserid'];

?>



<?php


if (isset($_POST["updateIntrestBal"])) {
    
     $IntrestBal = $_POST['IntrestBal'];
    
    
 //echo "<script type='text/javascript'>alert('Hello');</script>";
 
    
       $selectOldwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."' ");
      
        $oldAmt=mysqli_fetch_array($selectOldwallet);
         $oldAmount =  $oldAmt['amount'];
        
        
        $finalbalanceCredit = $oldAmount +  $IntrestBal;
    
    $sqlIntrestwallet= mysqli_query($con,"UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit' WHERE `userid`= '$userid'");
    
   
    
    $sqlIntrestRemainingBal = mysqli_query($con,"UPDATE `tbl_intrest_amt` SET `amount` = '0' WHERE `userid`= '$userid'");
    
     if($sqlIntrestwallet){
         echo "<script type='text/javascript'>alert('Updated Succesfully !!');</script>";
     }
     
    
  
    
}


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>VCLUB</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>
  body {
	-ms-user-select:text;
	user-select:text;
	-moz-user-select:text;
	-webkit-user-select:text
}
.card {
    border: 1px solid #E5E9F2;
    border-radius: 3px;
    padding: 0px;
}
.card .card-title {
    margin-bottom: 7px;
}
h3{ font-weight:normal; font-size:20px;}
h4{ font-weight:normal; font-size:18px; color:#858585;}
.card-body{ padding:.6rem;}
td{ padding:3px;}
.btn-sm {
    height: 26px;
    padding: 0px 12px;
}
.form-control{box-shadow:none; border-bottom:#ccc solid 1px; margin-bottom:3px;}
#alert h4{font-size: 1rem; font-weight:bold; color:#333;}
#alert p{font-size: 13px; margin-top:20px;}
#alert .modal-content{border-radius:3px}
#alert .modal-dialog{padding:20px; margin-top:130px;}

label{ color:#999;}
#bonus .modal-dialog{margin-top:100px;}
#bonus .modal-footer{ border:none;}
.dropdown-menu{ background:#fff;top: -15px;
left: -145px; border:none;
border-radius:0px;
-webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);}
.appHeader1 .right{right:20px;}
.dropdown-item {
    padding: .75rem 1.5rem;
}
</style>
</head>

<body>
<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];
?>

<!-- App Header -->
<div class="appHeader1">
  <div class="left"> <a href="#" onClick="goBack();" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
    <div class="pageTitle">Promotion</div>
  </div>
  
  <div class="right"> 
  <div class="dropdown">
  <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:20px;">
    <i class="icon ion-md-list"></i></a>
  

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="promotionrecord.php">Promotion Record</a>
    <a class="dropdown-item" href="bonusrecord.php">Bonus Record</a>
    <a class="dropdown-item" href="promotionApplyrecord.php">Apply Record</a>
  </div>
</div>
  </div>
</div>
<!-- searchBox --> 

<!-- * searchBox --> 
<!-- * App Header --> 

<!-- App Capsule -->
<div id="appCapsule" class="pb-2">
  <div class="appContent1 pb-5">
   
 <?php $IntrestBal =  (intrest_user($con,'amount',$userid));?>
 
  <h3 class="text-center m-2">Total Intrest Earn: <span>₹ <span id="bms"><?php echo (intrest_user($con,'amount',$userid));?></span></span></h3>
  <!--<div class="text-center mb-2">
       <form action="#" method="post"  autocomplete="off">
           <input type="hidden" name ="IntrestBal" value= "<?php echo  $IntrestBal; ?>" >
          <input type="submit" name="updateIntrestBal"  class="btn btn-primary" style="width:160px; height:36px;"> 
        </input>
        
        </form>
  </div> -->
     
   
   
    
        
        </div>
        </div>

        </div>
      </div>
      <div class="mt-1">
     
       
<!--<div class="mt-3">
<label>My Promotion Link</label>
<p>Test</p>
</div>-->
      </div>
  </div>
</div>
<!-- appCapsule -->

<?php include("include/footer.php");?>
<div id="bonus" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header paymentheader" id="paymenttitle"> 
      <h4 class="modal-title text-dark">Apply to Balance</h4>
       </div>
 <form action="#" method="post" id="bonusForm" autocomplete="off">
      <div class="modal-body mt-1" id="loadform">
      <div class="row">
                    <div class="col-12">
<div class="inner-addon left-addon mt-3">
      <i class="icon"><i class="fa fa-rupee"></i></i>
        <input type="number" id="bonusammount" name="bonusammount" class="form-control" placeholder="Bonus" onKeyPress="return isNumber(event)" >
      </div>                   
<input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $userid;?>">
<input type="hidden" name="action" id="action" class="form-control" value="bonus">
      
                    </div>
                </div>
      </div>
      <input type="hidden" name="tab" id="tab" value="parity">
      <div class="modal-footer"> 
   <a type="button" class="pull-left btn btn-sm closebtn" data-dismiss="modal">CANCEL</a>
<button type="submit" class="pull-left btn btn-sm btn-white text-info">CONFIRM</button> 
      </div>
      </form>
    </div>
  </div>
</div>

<div id="alert" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" id="alertmessage"> </div>
      <div class="text-center pb-1">
    <a type="button" class="text-info" data-dismiss="modal">OK</a>
    </div> 
    </div>
  </div>
</div>
<!-- Jquery --> 
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/bonus.js"></script>

</body>
</html>