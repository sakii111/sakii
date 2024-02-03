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
	if(isset($_POST['newupi'])){
		$upiid = mysqli_real_escape_string($con, $_POST['newupi']);
		//echo $upiid;
		$sql_q = "INSERT INTO tbl_upiid (value, status) VALUES ('".$upiid."', '0')";
		$chk = mysqli_query($con, $sql_q);
		if($chk){
			echo '<script type="text/JavaScript"> alert("UPI ID Added"); </script>';
		}else {echo '<script type="text/JavaScript"> alert("UPI ID Failed"); </script>';}
	}
	
	if(isset($_POST['upiid'])){
		$a_id = $_POST['upiid'];
		$sql_s = "SELECT * FROM tbl_upiid WHERE value = '".$a_id."'";
		$run = mysqli_query($con, $sql_s);
		//Set status to 0
		$sql_d = "SELECT * FROM tbl_upiid WHERE status = '1'";		
		$run_d = mysqli_query($con, $sql_d);
		$rund_f = mysqli_fetch_array($run_d);
		$ch_s0 = "UPDATE tbl_upiid SET status='0' WHERE id='".$rund_f['id']."'";
		$exe_ch_s0 = mysqli_query($con, $ch_s0);
		//Set status to 1
		$run_f = mysqli_fetch_array($run);
		$ch_s1 = "UPDATE tbl_upiid SET status='1' WHERE id='".$run_f['id']."'";
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
      <h1>Add UPI</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add UPI</li>
      </ol>
    </section>
	<form action="#" id="upiform" method="post" autocomplete="off" style="margin:5px; padding:8px;">
		<input name="newupi" type="text" placeholder="Add an UPI ID" />
		<button type="submit">Add</button>
	</form>
	
	<!--List of UPIs -->
	<?php
		$sel_upi = "SELECT * FROM tbl_upiid WHERE status='0' OR status='1'";
		$upi_r = mysqli_query($con, $sel_upi);
	?>
		<form action="#" id="upisave" method="post" autocomplete="off">
	<?php	while ($row = mysqli_fetch_array($upi_r)) {
	?>
		<input name="upiid" type="radio" value="<?php echo $row['value']; ?>" <?php if($row['status']==1){echo "checked";} ?> style="margin-left:12px;" />
		<label for="<?php echo $row['value']; ?>"><?php echo $row['value']; ?></label>
		</br>
	<?php	}
	?>
		<button type="submit" style="margin-left:12px;">Save</button>
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
