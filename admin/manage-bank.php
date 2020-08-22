<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from bank where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Data Deleted');</script>" ;
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
	<title>Manage Banks</title>
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
						<h2 class="page-title" style="margin-top:4%">Manage Bank</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Bank Details</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
										
											<th>Bank Name</th>
											<th>Type of loan</th>
											<th>Percent</th>
											<th>NSM name</th>
											<th>ZSM name</th>
											<th>RSM name</th>
											<th>SM name</th>
											<th>City</th>
											<th>Hub</th>
											<th>State</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
										
											<th>Bank Name</th>
											<th>Type of loan</th>
											<th>Percent</th>
											<th>NSM name</th>
											<th>ZSM name</th>
											<th>RSM name</th>
											<th>SM name</th>
											<th>City</th>
											<th>Hub</th>
											<th>State</th>
											<th>Action</th>						</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from bank";
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
<td><?php echo $row->typeof_loan;?></td>
<td><?php echo $row->percent;?></td>

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


<?php 
$r=$row->sm_name;
$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from sm where id='$r'"),MYSQLI_BOTH); 
?>
<td><?php if(!empty($t['name'])){echo $t['name']; }else{echo"Not Found";}?></td>
<td><?php echo $row->city;?></td>
<td><?php echo $row->hub;?></td>
<td><?php echo $row->state;?></td>
<td><a href="edit-bank.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-bank.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
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
