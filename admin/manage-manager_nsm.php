<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from nsm where id=?";
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
$sql = "UPDATE nsm SET status='$status' WHERE  id='$eid'";
$query = mysqli_query($mysqli,$sql);
}


if(isset($_REQUEST['status1']))
	{
$aeid=intval($_GET['status1']);
$status1="Active";
$sql = "UPDATE nsm SET status='$status1' WHERE  id='$aeid'";
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
	<title>Manage NSM</title>
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
						<h2 class="page-title" style="margin-top:4%">Manage NSM</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All NSM Details</div>
							<div class="panel-body"style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Sno.</th>
										<th>NSM Name</th>
										<th>Bank Name</th>
										<th>Product Name</th>
										<th>Office no</th>
										<th>Personal no</th>
										<th>Email ID(Official)</th>
										<th>Email ID(Personal)</th>
										<th>Joining Date</th>
										<th>Office Address</th>
										<th>Status</th>
										<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
										<th>NSM Name</th>
											<th>Bank Name</th>
										<th>Product Name</th>
										<th>Office no</th>
										<th>Personal no</th>
										<th>Email ID(Official)</th>
										<th>Email ID(Personal)</th>
										<th>Joining Date</th>
										<th>Office Address</th>
										<th>Status</th>
										<th>Action</th>
											
										
											
															</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from nsm";
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

<td><?php echo $row->address;?></td>


<td><?php if($row->status=="" || $row->status=='Inactive')
{
	?><a href="manage-manager_nsm.php?status1=<?php echo htmlentities($row->id);?>" onclick="return confirm('Do you really want to Active')"> Inactive</a>
<?php } else {?>

<a href="manage-manager_nsm.php?status=<?php echo htmlentities($row->id);?>" onclick="return confirm('Do you really want to Inactive')"> Active</a>
</td>
<?php } ?></td>

<td><a href="edit-nsm.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-manager_nsm.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
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
