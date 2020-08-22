
<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['submit']))
{ 
$id=$_GET['id'];
	$bank_name=$_POST['name'];
	$typeof_loan=$_POST['typeof_loan'];
	$nsm=$row['nsm_name'];
	$zsm=$row['zsm_name'];
	$rsm=$row['rsm_name'];
	$sm=$row['sm_name'];
	$city=$row['city'];
	$hub=$row['hub'];
	$state=$row['state'];
	$sql=mysqli_query($mysqli,"select * from bank where id='$id'");
	if(!$sql){
			die('invalid query'.mysqli_error($mysqli));

}
else
{
	 echo "<script>alert('employee has been added successfully');</script>";
}
}

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
	<title>Paarth management </title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Print Bank </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Print all Info</div>
									<div class="panel-body">
										  <div class="basic_1">
				    	<h3>Bank &amp; Type of loan</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">Name :</td>
									<td class="day_value"><?php echo $bank_name; ?></td>
								</tr>
						    </tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">Type of loan :</td>
									<td class="day_value"><?php echo $typeof_loan;?></td>
								</tr>
						    </tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
				      <div class="basic_1">
				    	<h3>Managers (SM,NSM,RSM,ZSM)</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">NSM name :</td>
									<td class="day_value"><?php echo $nsm_name;?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label"> ZSM name :</td>
									<td class="day_value closed"><span><?php echo $zsm_name;?></span></td>
								</tr>
							</tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">RSM name :</td>
									<td class="day_value"><?php echo $rsm_name;?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">SM name:</td>
									<td class="day_value"><?php echo $sm_name;?></td>
								</tr>
							    
							</tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1 basic_2">
				    	<h3>Address & Location</h3>
				    	<div class="basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">State   :</td>
									<td class="day_value"><?php echo $state;?></td>
								</tr>
				        		<tr class="opened">
									<td class="day_label">City :</td>
									<td class="day_value"><?php echo $city;?></td>
								</tr>
							    <tr class="opened">
									<td class="day_label">Hub :</td>
									<td class="day_value closed"><span><?php echo $hub;?></span></td>
								</tr>
							   
							 </tbody>
				          </table>
				         </div>
				         <div class="clearfix"> </div>
				    </div>
				  </div>