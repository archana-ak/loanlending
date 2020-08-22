<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from customer where id=?";
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
	<title>Manage customer</title>
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
						<h2 class="page-title" style="margin-top:4%">Manage customer&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						
<button onclick="window.location.href ='export/excel.php'" style =" border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;"  
> Export</button>
&emsp;
<button onclick="window.location.href ='import_file.php'" style =" border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;"  
> Import</button>


						</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All customer Details</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Added by</th>
											<th>Customer Name(Full)</th>
											<th>Customer Address</th>
											<th>Personal number</th>
											<th>Office number</th>
											<th>email</th>
											<th>Email(Official)</th>
											
											<th>Business name</th>
											
											<th>State</th>
											<th>District</th>
											<th>City</th>
											<th>Pin</th>
											<th>Profession</th>
											<th>Bank name</th>
											<th>Review</th>
											<th>Comment</th>
											<th>Called by</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Added by</th>
											<th>Customer Name(Full)</th>
											<th>Customer Address</th>
											<th>Personal number</th>
											<th>Office number</th>
											<th>email</th>
											<th>Email(Official)</th>
											
											<th>Business name</th>
											
											<th>State</th>
											<th>District</th>
											<th>City</th>
											<th>Pin</th>
											<th>Profession</th>
											<th>Bank name</th>
											<th>Review</th>
													<th>Comment</th>
											<th>Called by</th>
											<th>Action</th>						</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from customer";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
	<td><?php echo $row->addedby;?></td>
<td><?php echo $row->name;?></td>
<td><?php echo $row->address;?></td>
<td><?php echo $row->personal_no;?></td>
<td><?php echo $row->office_no;?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->email_personal;?></td>
<td><?php echo $row->business_name;?></td>
<td><?php echo $row->state;?></td>
<td><?php echo $row->district;?></td>
<td><?php echo $row->city;?></td>
<td><?php echo $row->pin;?></td>
<td><?php echo $row->profession;?></td>
<td><?php echo $row->bankname;?></td>
<td><?php echo $row->review;?></td>
<td><?php echo $row->comment;?></td>
<td><?php echo $row->calledby;?></td>

<td><a href="edit-customer.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-customer.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
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
