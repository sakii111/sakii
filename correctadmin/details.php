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
	//$tranquery=mysqli_query($con,"select * from `tbl_transaction` order by id desc");
	$tranquery=mysqli_query($con,"SELECT t.*, u.mobile, u.code, u.owncode FROM tbl_transaction t JOIN tbl_user u ON t.userid = u.id ORDER BY t.id DESC");
	$transrow=mysqli_num_rows($tranquery);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | Details</title>
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
<link rel="stylesheet" href="css/app.css" id="maincss">
<style>
	.wrapper{
		overflow: visible;
	}
	thead input {
        width: 100%;
    }
	#example_length{
		padding-left:10px;
	}
	#sum{
		padding-left:10px;
		font-weight: bold;
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
      <h1>Details</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
	<table id="example" class="display">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Mobile</th>
				<th>Amount</th>
				<th>Transaction Type</th>
				<!--<th>Code</th>
				<th>Own Code</th>-->
				<th>Create Date</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			if($transrow>0){
				$i = 1;
				while($i<=$transrow){
				$transarray = mysqli_fetch_array($tranquery);
		?>
					<tr>
						<td><?php echo $transarray['userid']; ?></td>
						<td><?php echo $transarray['mobile']; ?></td>
						<td><?php echo $transarray['amount']; ?></td>
						<td><?php if($transarray['transtype']=='Withdrawal failure'){echo 'Failed withdraw';}else{echo $transarray['transtype'];} ?></td>
						<!--<td><?php echo $transarray['code']; ?></td>
						<td><?php echo $transarray['owncode']; ?></td>-->
						<td><?php echo $transarray['createdate']; ?></td>
					</tr>
		<?php
				$i++;
				}
			}
		?>
		</tbody>
		<tfoot>
			<tr>
				<th>User ID</th>
				<th>Mobile</th>
				<th>Amount</th>
				<th>Transaction Type</th>
				<!--<th>Code</th>
				<th>Own Code</th>-->
				<th>Create Date</th>
			</tr>
		</tfoot>
	</table>
    
  
<?php include("include/footer.inc.php");?></div>
<!-- ./wrapper -->



</body>
<?php //FolksTalk/PreventRefreshPHP-Refresh saved info ?>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.4/api/sum().js"></script>
<script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');
 
    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
		order: [],
		dom: 'ft<"#sum">lpr',
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
		 drawCallback: function () {
		  var api = this.api();
		  var numb = api.column( 2, {page:'current'} ).data().sum();
		  let n = numb.toFixed(2);
		  /*$( api.table().footer() ).html(
			'Total : ' + n
		  );*/
		  document.getElementById("sum").innerHTML = "Total : " + n;
		}
    });
});
</script>
</html>
