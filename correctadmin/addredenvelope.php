<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php?msg1=notauthorized");
	exit();
}
	
	?>
<?php include ("include/connection.php");?>
<?php 
	if(isset($_POST['serial']) && isset($_POST['maxusers']) && isset($_POST['price'])){
		$chkserial = mysqli_query($con,"select * from `redenvelope_admin` where `serial`='".$_POST['serial']."'");
		$chkserialrow = mysqli_num_rows($chkserial);
		if($chkserialrow==0){
			$serial = mysqli_real_escape_string($con, $_POST['serial']);
			$maxusers = mysqli_real_escape_string($con, $_POST['maxusers']);
			$price = mysqli_real_escape_string($con, $_POST['price']);
			$totalusers = 0;
			$createdate = date("Y-m-d H:i");
			$status = 1;
			$sql_q = "INSERT INTO redenvelope_admin (serial, maxusers, price, totalusers, createdate, status) VALUES ('".$serial."', '".$maxusers."', '".$price."', '".$totalusers."', '".$createdate."', '".$status."')";
			$chk = mysqli_query($con, $sql_q);
			if($chk){
				echo '<script type="text/JavaScript"> alert("Red Envelope Added"); </script>';
			}else {echo '<script type="text/JavaScript"> alert("Red Envelope Failed"); </script>';}	
		}
		else{
			echo '<script type="text/JavaScript"> alert("Duplicate Serial"); </script>';
		}
	}
	if(isset($_POST['redserial'])){
		$a_id = $_POST['redserial'];
		$ch_s1 = "UPDATE redenvelope_admin SET status='2' WHERE serial='".$a_id."'";
		$exe_ch_s1 = mysqli_query($con, $ch_s1);
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | Add UPI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
     <link rel="stylesheet" href="css/app.css" id="maincss">
<style>
	.wrapper{
		overflow: visible;
	}
</style>
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
<!--Changed position of connection-->
<?php include ("include/header.inc.php");?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include ("include/navigation.inc.php");?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Red Envelope</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Red Envelope</li>
      </ol>
    </section>
	<form action="#" id="redform" method="post" autocomplete="off" style="margin:5px; padding:8px;">
		<input name="serial" type="text" placeholder="Enter Serial Number" required />
		<br>
		<br>
		<input name="maxusers" type="number" placeholder="Enter Maximum Users" required />
		<br>
		<br>
		<input name="price" type="number" placeholder="Enter Price" required />
		<br>
		<br>
		<button type="submit">Add</button>
	</form>
	
	<!--List of Envelope -->
	<section class="content-header">
		<h1>List of active red envelopes</h1>
	</section>
	<?php
		$sel_red = "SELECT * FROM redenvelope_admin WHERE status='1'";
		$red_r = mysqli_query($con, $sel_red);
	?>
		<form action="#" id="redlist" method="post" autocomplete="off">
	<?php	while ($row = mysqli_fetch_array($red_r)) {
				$maxusers = $row['maxusers'];
				$totalusers = $row['totalusers'];
				if($totalusers<$maxusers){
	?>
		<input name="redserial" type="radio" value="<?php echo $row['serial']; ?>" style="margin-left:12px;" />
		<label for="<?php echo $row['serial']; ?>"><?php echo $row['serial']; ?></label>
		Total Users: <?php echo $totalusers;?> &nbsp;&nbsp;&nbsp;Price: <?php echo $row['price'];?> &nbsp;&nbsp;&nbsp;URL: mary.colorbets.site/redenvelopes.php?code=<?php echo $row['serial']; ?>
		</br>
	<?php	
			}
		}
	?>
		<button type="submit" style="margin-left:12px;">Deactivate</button>
		</form>

    <!-- Main content -->
    
  
<?php include("include/footer.inc.php");?></div>
<!-- ./wrapper -->



</body>
<?php //FolksTalk/PreventRefreshPHP-Refresh saved info ?>
<script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>
