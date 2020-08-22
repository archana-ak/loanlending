<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from employee where id=?";
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
	<title>Manage Employee</title>
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
						<h2 class="page-title" style="margin-top: 4%">Manage Employee
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						
<button onclick="window.location.href ='export_emp/excel.php'" style =" border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;"  
> Export</button>
&emsp;
<button onclick="window.location.href ='import_file_2.php'"style =" border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;"  
> Import</button>
						
						
						</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Employee Details</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Sno.</th>
										<th>Full_Name</th>  
                     					<th>Desgination</th>
										<th>Team Leader</th>
										<th>Team Manager</th>
										<th>Office no</th>
										<th>Personal no</th>
										<th>Mail ID</th>
										<th>Joining Date</th>
										<th>address</th>
										<th>Basic salary</th>
										<th>Account no</th>
										<th>IFSC code</th>
										<th>State</th>
										<th>Emp Code</th>
										<th>Adhar no.</th>
										<th>Pan no.</th>
										<th>Password</th>
										<th>Action</th>
										<th>status</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
										<th>Full_Name</th>  
                     					<th>Desgination</th>
										<th>Team Leader</th>
										<th>Team Manager</th>
										<th>Office no</th>
										<th>Personal no</th>
										<th>Mail ID</th>
										<th>Joining Date</th>
										<th>address</th>
										<th>Basic salary</th>
										<th>Account no</th>
										<th>IFSC code</th>
										<th>State</th>
										<th>Emp Code</th>
										<th>Adhar no.</th>
										<th>Pan no.</th>
										<th>Password</th>
										<th>Action</th>
										<th>status</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from employee";
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
<td><?php echo $row->desgination;?></td>
<td><?php echo $row->team_leader;?></td>        
<td><?php echo $row->team_manager;?></td>
<td><?php echo $row->office_no;?></td>
<td><?php echo $row->personal_no;?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->join_date;?></td>
<td><?php echo $row->address;?></td>
<td><?php echo $row->basic_salary;?></td>
<td><?php echo $row->account_no;?></td>
<td><?php echo $row->ifsc_code;?></td>
<td><?php echo $row->state;?></td>
<td><?php echo $row->emp_code;?></td>
<td><?php echo $row->adhar_no;?></td>
<td><?php echo $row->pan_no;?></td>
<td><?php echo $row->password;?></td>

<td><a href="edit-employee.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-employee.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
<td><?php echo $row->status;?></td>
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
