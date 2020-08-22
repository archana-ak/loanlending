<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Processing File </title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12"><br>
						<h2 class="page-title" style="margin-top:2%">Processing File</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Processing File</div>
							<div class="panel-body">
								<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
									
									
									<tbody>
<?php 
 $id=$_GET['id'];
		$ret="SELECT * FROM file where id=?";
			 $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$id);
   $stmt->execute() ;//ok
   $res=$stmt->get_result();
   //$cnt=1;
     while($row=$res->fetch_object())
    {
      ?>

<tr>
<td colspan="4"><h4>Loan Realted Information</h4></td>
<td><a href="javascript:void(0);"  onClick="popUpWindow('https://device.digitalzilla.xyz/admin/trial-file.php?id=<?php echo $row->id;?>');" title="View Full Details"    >Print Data</a></td>
</tr>
<tr>

</tr>



<tr>
<td><b>Customer name :</b></td>
<td><?php echo $row->name;?></td>
<td><b>Business Name :</b></td>
<td><?php echo $row->business_name;?></td>
<td><b>State :</b></td>
<td><?php echo $row->state;?></td>
</tr>

<tr>
<td><b>District :</b></td>
<td><?php echo $row->district;?></td>
<td><b>City :</b></td>
<td><?php echo $row->city;?></td>
<td><b>NSM:</b></td>
<?php 
$r1=$row->nsm_name;
$t1=mysqli_fetch_array(mysqli_query($mysqli,"select * from nsm where id='$r1'"),MYSQLI_BOTH); 
 ?>
<td><?php if(!empty($t1['name'])){echo $t1['name']; }else{echo"Not Found";}?></td>

</tr>
<tr>
  <tr>

<td><b>ZSM :</b></td>

<?php 
$r2=$row->zsm_name;
$t2=mysqli_fetch_array(mysqli_query($mysqli,"select * from zsm where id='$r2'"),MYSQLI_BOTH); 
 ?>
<td><?php if(!empty($t2['name'])){echo $t2['name']; }else{echo"Not Found";}?></td>

<td><b>RSM :</b></td>
<?php 
$r3=$row->rsm_name;
$t3=mysqli_fetch_array(mysqli_query($mysqli,"select * from rsm where id='$r3'"),MYSQLI_BOTH); 
 ?>
<td><?php if(!empty($t3['name'])){echo $t3['name']; }else{echo"Not Found";}?></td>

<td><b>SM:</b></td>
<?php 
$r=$row->sm_name;
$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from sm where id='$r'"),MYSQLI_BOTH); 
?>
<td><?php if(!empty($t['name'])){echo $t['name']; }else{echo"Not Found";}?></td>

</tr>
  <tr>
<td><b>Manager:</b></td>
<td><?php echo $row->manager;?></td><td><b>Team Leader:</b></td>
<td><?php echo $row->team_leader;?></td>
<td><b>Executive: </b></td>
<td><?php echo $row->executive;?></td>
</tr>
<br>




<tr>

<td><b>Closed By </b></td>
<td><?php echo $row->closed_by;?></td>
<td><b>Mobile Number :-</b></td>
<td><?php echo $row->mobile;?></td>
<td><b>Email :-</b></td>
<td><?php echo $row->mail;?></td>
</tr>

<tr>

<td><b>Profession :-</b></td>
<td><?php echo $row->profession;?></td>
<td><b>Market :- </b></td>
<td><?php echo $row->market;?></td>
<td><b>Product :- </b></td>
<td><?php echo $row->product;?></td>
</tr>

<tr>

<td><b>Bank Name :- </b></td>
<td><?php echo $row->bankname;?></td>
<td><b>Carry Forward :-</b></td>
<td><?php echo $row->carry_forward;?></td>
<td><b>Login Date :-</b></td>
<td><?php echo $row->login_date;?></td>
</tr>

<tr>

<td><b>Login Month :-</b></td>
<td><?php echo $row->login_month;?></td>
<td><b>Login Year:- </b></td>
<td><?php echo $row->login_year;?></td>
<td><b>Login Amount:- </b></td>
<td><?php echo $row-> login_amt;?></td>
</tr>





<tr>
<td><b>Disbursement Date :-</b></td>
<td><?php echo $row->distribution_date;?></td>
<td><b>Disbursement Month:-</b></td>
<td><?php echo $row->disbursement_month;?></td>
<td><b>Disbursement Year :- </b></td>
<td><?php echo $row->disbursement_year;?></td>
</tr>

<tr>
<td><b>Disbursement Amount :-</b></td>
<td><?php echo $row->distribution_amt;?></td>
<td><b>Decision:-</b></td>
<td><?php echo $row->decision;?></td>
<td><b>Remark:- </b></td>
<td><?php echo $row->remark;?></td>
</tr>

<?php

} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

	<!-- Loading Scripts -->
		<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>


</body>

</html>
