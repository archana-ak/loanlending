<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from sm where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Data Deleted');</script>" ;
}

if(isset($_REQUEST['status']))
	{
$eid=intval($_GET['status']);
$status="Inactive";
$sql = "UPDATE sm SET status='$status' WHERE  id='$eid'";
$query = mysqli_query($mysqli,$sql);
}


if(isset($_REQUEST['status1']))
	{
$aeid=intval($_GET['status1']);
$status1="Active";
$sql = "UPDATE sm SET status='$status1' WHERE  id='$aeid'";
$query = mysqli_query($mysqli,$sql);
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
	<title>Manage SM</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Manage SM</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All SM Details</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>SM Name</th>
											<th>Bank Name</th>
											<th>Product Name</th>
											<th>Office no</th>
										<th>Personal no</th>
										<th>Email ID(Official)</th>
										<th>Email ID(Personal)</th>
										<th>Joining Date</th>
										<th>State</th>
										<th>Hub</th>
											<th>City</th>
											<th>Office Address</th>
											<th>RSM name</th>
											<th>ZSM name</th>
											<th>NSM name</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>Sno.</th>
											<th>SM Name</th>
											<th>Bank Name</th>
											<th>Product Name</th>
											<th>Office no</th>
										<th>Personal no</th>
										<th>Email ID(Official)</th>
										<th>Email ID(Personal)</th>
										<th>Joining Date</th>
										<th>State</th>
										<th>Hub</th>
											<th>City</th>
											<th>Office Address</th>
											<th>RSM name</th>
											<th>ZSM name</th>
											<th>NSM name</th>
										    <th>Status</th>
											<th>Action</th>	</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from sm";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->name;?></td>
<td><?php echo $row->bank_name;?></td>
<td><?php echo $row->product_name;?></td>
<td><?php echo $row->office_no;?></td>
<td><?php echo $row->personal_no;?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->email_personal;?></td>
<td><?php echo $row->join_date;?></td>
<td><?php echo $row->state;?></td>
<td><?php echo $row->hub;?></td>
<td><?php echo $row->city;?></td>
<td><?php echo $row->address;?></td>


<?php 
$r1=$row->nsm_name;
$t1=mysqli_fetch_array(mysqli_query($mysqli,"select * from nsm where id='$r1'"),MYSQLI_BOTH); 
 ?>
<td><?php if(!empty($t1['name'])){echo $t1['name']; }else{echo"Not Found";}?></td>


<?php 
$r2=$row->zsm_name;
$t2=mysqli_fetch_array(mysqli_query($mysqli,"select * from zsm where id='$r2'"),MYSQLI_BOTH); 
 ?>
<td><?php if(!empty($t2['name'])){echo $t2['name']; }else{echo"Not Found";}?></td>


<?php 
$r3=$row->rsm_name;
$t3=mysqli_fetch_array(mysqli_query($mysqli,"select * from rsm where id='$r3'"),MYSQLI_BOTH); 
 ?>
<td><?php if(!empty($t3['name'])){echo $t3['name']; }else{echo"Not Found";}?></td>


<td><?php if($row->status=="" || $row->status=='Inactive')
{
	?><a href="manage-manager_sm.php?status1=<?php echo htmlentities($row->id);?>" onclick="return confirm('Do you really want to Active')"> Inactive</a>
<?php } else {?>

<a href="manage-manager_sm.php?status=<?php echo htmlentities($row->id);?>" onclick="return confirm('Do you really want to Inactive')"> Active</a>
</td>
<?php } ?></td>

<td><a href="edit-sm.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-manager_sm.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
			<?php include('includes/footer.php');?>
	</div>

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
