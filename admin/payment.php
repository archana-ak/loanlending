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
<style type="text/css">
	.form-control
	{
		border:1px solid #c5b9a5;
		height: 40px;
	}
</style>

</head>
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					<br>
						<h2 class="page-title">Payment </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Search Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											
										
<div class="form-group">
<label class="col-sm-1 control-label">Disbursement Year :-</label> <div class="col-sm-2">
<?php 
 $query3 = "SELECT distinct(disbursement_year) FROM file";

$result3 = mysqli_query($mysqli,$query3);

?>
 <select id="fname" name="year"  class="form-control">
  <option value="">Select Year</option>

<?php

while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["disbursement_year"]; ?>">
<?php echo $rs["disbursement_year"]; ?></option>

<?php

}

?>
      
</select></div>

  <label class="col-sm-1 control-label">Disbursement Month :-</label> <div class="col-sm-2">
   <select id="typeof_loan" name="month"class="form-control">
  <option value="">Select Month</option>
      <option value="January">January</option>
      <option value="February">February</option>
	  <option value="March">March</option>
      <option value="April">April</option>
	  <option value="May">May</option>
	  <option value="June">June</option>
      <option value="July">July</option>
      <option value="August">August</option>
	  <option value="September">September</option>
      <option value="October">October</option>
	  <option value="November">November</option>
      <option value="December">December</option>
	  </select></div>
 <label class="col-sm-1 control-label">Decision :-</label> <div class="col-sm-2">
 <select id="fname" name="decision" class="form-control">
  <option value="">Select Decision</option>
      <option value="under_process">Under process</option> 
	  <option value="censored">Censored</option>
      <option value="cancel">Cancel</option>
	  <option value="dispersed">Dispersed</option>
	  <option value="approved">Approved</option>
      <option value="kit_signed">Kit signed</option>
      <option value="aproves-cancel">Aproves-Cancel</option>
	  <option value="disperse_by_others">Disperse by others</option>
      
</select></div>
<label class="col-sm-1 control-label">Bank Name :-</label> <div class="col-sm-2">
  <?php 
 $query3 = "SELECT distinct(bankname) FROM file";

$result3 = mysqli_query($mysqli,$query3);

?>
 <select id="fname" name="bank"  class="form-control">
    <option value="">Select Bank</option>

  
<?php

while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["bankname"]; ?>">
<?php echo $rs["bankname"]; ?></option>

<?php

}

?>
      
</select>
</div>
  </div>
  <div class="form-group"> 
<label class="col-sm-1 control-label">Product Name :-</label> <div class="col-sm-2">
  <?php 
 $query3 = "SELECT distinct(product) FROM file";

$result3 = mysqli_query($mysqli,$query3);

?>
 <select id="fname" name="product"  class="form-control">
    <option value="">Select Product</option>

    
<?php

while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["product"]; ?>">
<?php echo $rs["product"]; ?></option>

<?php

}

?>
      
</select></div></div>

  <div class="col-sm-6 col-sm-offset-8"><br>
    <input type="submit" value="Search" name="search" style ="width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"  
>&emsp;
 <input type="reset" value="Reset" style ="width: 20%;
  background-color: #FF0000;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"  
></div>
  </form>
								
									</div>
									</div>
								</div>
							</div>
						</div>
						<?php 
						if(isset($_POST['search'])){
							$aid=$_SESSION['id'];
$year=$_POST['year']; 
if($year<>""){ $hrxtr= "and disbursement_year='".$year."'"; }else{$hrxtr="";}
$month=$_POST['month']; if(!empty($month)){ $fktcv= "and disbursement_month='".$month."'"; }else{$fktcv="";}
$decision=$_POST['decision']; if(!empty($decision)){ $x8qch= "and decision='".$decision."'"; }else{$x8qch="";}
$bank=$_POST['bank'];	if(!empty($bank)){ $d7pth= "and bankname='".$bank."'"; }else{$d7pth="";}
$product=$_POST['product']; if(!empty($product)){ $kyypb= "and product='".$product."'"; }else{$kyypb="";}
$ret="select * from file where id<>'nepal' ".$hrxtr." ".$fktcv." ".$x8qch." ".$d7pth." ".$kyypb."";
							
						}
						?>
							<div class="panel panel-default">
				<div class="panel-heading" style="color: black;">All Data &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<form action="export_file/excel.php" method="post">
				<input type="hidden" name="nzqma" id="nzqma" value="<?php if(isset($_POST['search'])){ echo $ret; } ?>" />
				<button type="submit" name="balrish" id="balrish" style =" border: 2px solid gray;color: gray;background-color: white;padding: 4px 10px;border-radius: 8px;font-size: 20px;font-weight: bold;"> Export</button>
				</form></div>
				
							<div class="panel-body"  style="overflow-x:auto;">
								<?php
if(isset($_POST['search']))
{

?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>								
											<th>Customer Name</th>
											<th>Bussiness Name</th>
											<th>State</th>
											<th>Hub</th>
											<th>Location</th>
											<th>NSM</th>
											<th>ZSM</th>
											<th>RSM</th>
											<th>SM</th>
											<th>PMCPL Manager</th>
											<th>PMCPL Team Leader</th>
											<th>PMCPL Executive</th>
											<th>Closed By</th>
											<th>Mobile No</th>
											<th>Email</th>
											<th>Profession</th>
											<th>Market</th>
											<th>Percent</th>
											<th>Product</th>
											<th>Bank Name</th>
											<th>Carry Forward </th>
											<th>Login Date</th>
											<th>Login Month</th>
											<th>Login Year</th>
											<th>Login Amount</th>
											<th>Disbursement Date</th>
											<th>Disbursement Month </th>
											<th>Disbursement Year</th>
											<th>Disbursement Amount</th>
											<th>Decision</th>
											<th>Remark</th>
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>										
											<th>Customer Name</th>
											<th>Bussiness Name</th>
											<th>State</th>
											<th>Hub</th>
											<th>Location</th>
											<th>NSM</th>
											<th>ZSM</th>
											<th>RSM</th>
											<th>SM</th>
											<th>PMCPL Manager</th>
											<th>PMCPL Team Leader</th>
											<th>PMCPL Executive</th>
											<th>Closed By</th>
											<th>Mobile No</th>
											<th>Email</th>
											<th>Profession</th>
											<th>Market</th>
											<th>Percent</th>
											<th>Product</th>
											<th>Bank Name</th>
											<th>Carry Forward </th>
											<th>Login Date</th>
											<th>Login Month</th>
											<th>Login Year</th>
											<th>Login Amount</th>
											<th>Disbursement Date</th>
											<th>Disbursement Month </th>
											<th>Disbursement Year</th>
											<th>Disbursement Amount</th>
											<th>Decision</th>
											<th>Remark</th>
																</tr>
									</tfoot>
									<tbody>
<?php 
//disbursement_year='$year' or disbursement_month='$month' 	

$res=mysqli_query($mysqli,$ret);
//$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
//$stmt->execute() ;//ok
//$res=$stmt->get_result();
if(!$res)
{
	die("problem".mysqli_error($mysqli));
}
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>    
<td><?php echo $row->name;?></td>
<td><?php echo $row->business_name;?></td>
<td><?php echo $row->state;?></td>
<td><?php echo $row->district;?></td>
<td><?php echo $row->city;?></td>
<?php 
   $sql="select * from nsm where id='$row->nsm_name'";
 $t=mysqli_query($mysqli,$sql);
 while($r=$t->fetch_object())
 {
   ?>
<td><?php echo $r->name;?></td><?php }?>

<?php 
   $sql1="select * from zsm where id='$row->zsm_name'";
 $t1=mysqli_query($mysqli,$sql1);
 while($r1=$t1->fetch_object())
 {
   ?>
<td><?php echo $r1->name;?></td><?php }?>
<?php 
   $sql2="select * from rsm where id='$row->rsm_name'";
 $t2=mysqli_query($mysqli,$sql2);
 while($r2=$t2->fetch_object())
 {
   ?>
<td><?php echo $r2->name;?></td><?php }?>
<?php 
   $sql3="select * from sm where id='$row->sm_name'";
 $t3=mysqli_query($mysqli,$sql3);
 while($r3=$t3->fetch_object())
 {
   ?>
<td><?php echo $r3->name;?></td><?php }?>
<td><?php echo $row->manager;?></td>
<td><?php echo $row->team_leader;?></td>
<td><?php echo $row->executive;?></td>
<td><?php echo $row->closed_by;?></td>
<td><?php echo $row->mobile;?></td>
<td><?php echo $row->mail;?></td>
<td><?php echo $row->profession;?></td>
<td><?php echo $row->market;?></td>
<td><?php echo $row->percent;?></td>
<td><?php echo $row->product;?></td>
<td><?php echo $row->bankname;?></td>
<td><?php echo $row->carry_forward;?></td>
<td><?php echo $row->login_date;?></td>
<td><?php echo $row->login_month;?></td>
<td><?php echo $row->login_year;?></td>
<td><?php echo $row->login_amt;?></td>
<td><?php echo $row->disbursement_date;?></td>
<td><?php echo $row->disbursement_month;?></td>
<td><?php echo $row->disbursement_year;?></td>
<td><?php echo $row->disbursement_amt;?></td>
<td><?php echo $row->decision;?></td>
<td><?php echo $row->remark;?></td>


<td>
										</tr>
									<?php
$cnt=$cnt+1;
			
			}
									  ?>
											
										
									</tbody>
								</table>
<?php }
?>
								
							</div>
						</div>

					
					</div>
			</div>
						</div>
					</div>
						<?php include('includes/footer.php');?>
				</div> 	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">
</script>
	
</body>

</html>