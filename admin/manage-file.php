<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from file where id=?";
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
	<title>Manage Processing File</title>
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
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Manage Processing File&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						
						
					
				<!--	<button onclick="window.location.href ='export_file/excel.php'" style =" border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;"  
> Export</button>	-->
						
						</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All loan lenders Details</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr><th>S.No</th>
										<th>Action</th> 
										
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
											<th>Product</th>
											<th>Bank Name</th>
											<th>Carry Forward </th>
											<th>Login Date</th>
											<th>Login Month</th>
											<th>Login Year</th>
											<th>Login Amount</th>
											<th>Distribution Date</th>
											<th>Distribution Month </th>
											<th>Distribution Year</th>
											<th>Distribution Amount</th>
											<th>Decision</th>
											<th>Remark</th>
											<th>Action</th>
											
											
										</tr>
									</thead>
									<tfoot>
										<tr><th>S.No</th>
										<th>Action</th>
										
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
											<th>Product</th>
											<th>Bank Name</th>
											<th>Carry Forward </th>
											<th>Login Date</th>
											<th>Login Month</th>
											<th>Login Year</th>
											<th>Login Amount</th>
											<th>Distribution Date</th>
											<th>Distribution Month </th>
											<th>Distribution Year</th>
											<th>Distribution Amount</th>
											<th>Decision</th>
											<th>Remark</th>
											<th>Action</th>
											
											
											</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from file";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><a href="edit-file.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="trial1-file.php?id=<?php echo $row->id;?>"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
<a href="manage-file.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
<td><?php echo $row->name;?></td>
<td><?php echo $row->business_name;?></td>
<td><?php echo $row->state;?></td>
<td><?php echo $row->district;?></td>
<td><?php echo $row->city;?></td>
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
<td><?php echo $row->manager;?></td>
<td><?php echo $row->team_leader;?></td>
<td><?php echo $row->executive;?></td>
<td><?php echo $row->closed_by;?></td>
<td><?php echo $row->mobile;?></td>
<td><?php echo $row->mail;?></td>
<td><?php echo $row->profession;?></td>
<td><?php echo $row->market;?></td>

<td><?php echo $row->product;?></td>
<td><?php echo $row->bankname;?></td>
<td><?php echo $row->carry_forward;?></td>
<td><?php echo $row->login_date;?></td>
<td><?php echo $row->login_month;?></td>
<td><?php echo $row->login_year;?></td>
<td><?php echo $row->login_amt;?></td>
<td><?php echo $row->distribution_date;?></td>
<td><?php echo $row->disbursement_month;?></td>

<td><?php echo $row->disbursement_year;?></td>
<td><?php echo $row->distribution_amt;?></td>
<td><?php echo $row->decision;?></td>
<td><?php echo $row->remark;?></td>









<td><a href="edit-file.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="trial1-file.php?id=<?php echo $row->id;?>"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
<a href="manage-file.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
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
