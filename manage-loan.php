<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
error_reporting(0);

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from loan where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        //echo "<script>alert('Data Deleted');</script>" ;
}
if(isset($_POST['delete']))
{
	$sql=mysqli_query($mysqli,"delete from loan");
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
	<title>Manage Loan Application</title>
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
						<h2 class="page-title" style="margin-top:4%">Manage Loan Application&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						
						<button onclick="window.location.href ='export_loan_application/excel.php'" style =" border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;"  
> Export</button>

						
						
						</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All loan lenders Details</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr><th>S.No</th>
											<th>Action</th>
										    <th>ID</th>
											
											<th>Name as PAN</th>
											<th>Category</th>
											<th>If Comp Then</th>
											<th>Comp Pls Specify</th>
											<th>Title</th>
											<th>Gender</th>
											<th>Ckyc No</th>
											<th>PAN</th>
											<th>D.O.B</th>
											<th>D.O.A</th>
											<th>Maritial Status</th>
											<th>Dept No</th>
											<th>Edu Level</th>
											<th>Edu Pls Specify</th>
											<th>Occupation Type</th>
											<th>Services</th>
											<th>Others</th>
											<th>Email</th>
											<th>Father Name</th>
											<th>Mother Name</th>
											<th>Current Owned</th>
											<th>Current Address</th>
											<th>Current Landmark</th>
											<th>Current State</th>
											<th>Current City</th>
											<th>Current Pin</th>
											<th>Mobile Number</th>
											<th>Permanent Address Owned</th>
											<th>Permanent address</th>
											<th>Permanent landmark</th>
											<th>Permanent state</th>
											<th>Permanent city</th>
											<th>Permanent pin</th>
											<th>Name of Business</th>
											<th>Bussiness Type</th>
											<th>Buss.Plz.Specify</th>
											<th>Nature Of Bussiness</th>
											<th>Industry</th>
											<th>Comp.PAN</th>
											<th>GSTIN</th>
											
											<th>Business Address</th>
											<th>Landmark</th>
											<th>PIN</th>
											<th>City</th>
											<th>State</th>
											<th>Email</th>
											<th>D.O.I</th>
											<th>Tr name</th>
											<th>Tr Business_name</th>
											<th>Tr mobile_number</th>
											<th>Tr relation</th>
											<th>Tr address</th>
											<th>Tr city</th>
											<th>Tr pin</th>
											<th>Tr2 name</th>
											<th>Tr2 Busniess_name</th>
											<th>Tr2 mobile_number</th>
											<th>Tr2 relation</th>
											<th>Tr2 address</th>
											<th>Tr2 city</th>
											<th>Tr2 pin</th>
											<th>Action</th>
											
											
										</tr>
									</thead>
									<tfoot>
										<tr><th>S.No</th>
											<th>Action</th>
										     <th>ID</th>
											<th>Name as PAN</th>
											<th>Category</th>
											<th>If Comp Then</th>
											<th>Comp Pls Specify</th>
											<th>Title</th>
											<th>Gender</th>
											<th>Ckyc No</th>
											<th>PAN</th>
											<th>D.O.B</th>
											<th>D.O.A</th>
											<th>Maritial Status</th>
											<th>Dept No</th>
											<th>Edu Level</th>
											<th>Edu Pls Specify</th>
											<th>Occupation Type</th>
											<th>Services</th>
											<th>Others</th>
											<th>Email</th>
											<th>Father Name</th>
											<th>Mother Name</th>
											<th>Current Owned</th>
											<th>Current Address</th>
											<th>Current Landmark</th>
											<th>Current State</th>
											<th>Current City</th>
											<th>Current Pin</th>
											<th>Mobile Number</th>
											<th>Permanent Address Owned</th>
											<th>Permanent address</th>
											<th>Permanent landmark</th>
											<th>Permanent state</th>
											<th>Permanent city</th>
											<th>Permanent pin</th>
											<th>Name of Business</th>
											<th>Bussiness Type</th>
											<th>Buss.Plz.Specify</th>
											<th>Nature Of Bussiness</th>
											<th>Industry</th>
											<th>Comp.PAN</th>
											<th>GSTIN</th>
											
											<th>Business Address</th>
											<th>Landmark</th>
											<th>PIN</th>
											<th>City</th>
											<th>State</th>
											<th>Email</th>
											<th>D.O.I</th>
											<th>Tr name</th>
											<th>Tr Business_name</th>
											<th>Tr mobile_number</th>
											<th>Tr relation</th>
											<th>Tr address</th>
											<th>Tr city</th>
											<th>Tr pin</th>
											<th>Tr2 name</th>
											<th>Tr2 Busniess_name</th>
											<th>Tr2 mobile_number</th>
											<th>Tr2 relation</th>
											<th>Tr2 address</th>
											<th>Tr2 city</th>
											<th>Tr2 pin</th>
											<th>Action</th>
											
											</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from loan";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><a href="edit-loan.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="trial1.php?id=<?php echo $row->id;?>"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
<a href="manage-loan.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a>


	
</td>
<td><?php echo $row->id;?></td>

<td><?php echo $row->co_name;?></td>
<td><?php echo $row->co_category;?></td>

<td><?php echo $row->co_if_comp;?></td>
<td><?php echo $row->co_comp_pls_specify;?></td>
<td><?php echo $row->co_title;?></td>
<td><?php echo $row->co_gender;?></td>
<td><?php echo $row->co_ckyc;?></td>
<td><?php echo $row->co_pan;?></td>
<td><?php echo $row->co_dob;?></td>
<td><?php echo $row->co_doa;?></td>
<td><?php echo $row->co_maritial_status;?></td>

<td><?php echo $row->co_dependents;?></td>
<td><?php echo $row->co_edu_level;?></td>
<td><?php echo $row->co_edu_pls_specify;?></td>
<td><?php echo $row->co_occupation;?></td>
<td><?php echo $row->co_occupation_service;?></td>
<td><?php echo $row->co_occupation_other;?></td>
<td><?php echo $row->co_email;?></td>
<td><?php echo $row->co_father;?></td>
<td><?php echo $row->co_mother;?></td>

<td><?php echo $row->co_current_owned;?></td>
<td><?php echo $row->co_current_address;?></td>
<td><?php echo $row->co_current_landmark;?></td>
<td><?php echo $row->co_current_state;?></td>
<td><?php echo $row->co_current_city;?></td>
<td><?php echo $row->co_current_pin;?></td>
<td><?php echo $row->co_mobile;?></td>
<td><?php echo $row->co_permanent_owned;?></td>
<td><?php echo $row->co_permanent_address;?></td>

<td><?php echo $row->co_permanent_landmark;?></td>
<td><?php echo $row->co_permanent_state;?></td>
<td><?php echo $row->co_permanent_city;?></td>
<td><?php echo $row->co_permanent_pin;?></td>
<td><?php echo $row->name_of_entity;?></td>
<td><?php echo $row->bussiness_type;?></td>
<td><?php echo $row->bussiness_pls_specify;?></td>
<td><?php echo $row->nature_of_bussniess;?></td>
<td><?php echo $row->industry;?></td>
<td><?php echo $row->comp_pan;?></td>
<td><?php echo $row->gstin;?></td>


<td><?php echo $row->business_address;?></td>
<td><?php echo $row->landmark;?></td>
<td><?php echo $row->pin;?></td>
<td><?php echo $row->city;?></td>
<td><?php echo $row->state;?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->date_of_incorpration;?></td>
<td><?php echo $row->tr_name;?></td>
<td><?php echo $row->tr_entity_name;?></td>
<td><?php echo $row->tr_mobile;?></td>
<td><?php echo $row->tr_relation;?></td>
<td><?php echo $row->tr_address;?></td>

<td><?php echo $row->tr_city;?></td>
<td><?php echo $row->tr_pin;?></td>
<td><?php echo $row->tr2_name;?></td>
<td><?php echo $row->tr2_entity_name;?></td>
<td><?php echo $row->tr2_mobile;?></td>
<td><?php echo $row->tr2_relation;?></td>
<td><?php echo $row->tr2_address;?></td>
<td><?php echo $row->tr2_city;?></td>
<td><?php echo $row->tr2_pin;?></td>









<td><a href="edit-loan.php?id=<?php echo $row->id;?>"><i class="fa fa-edit" ></i></a>
&nbsp;
<a href="trial1.php?id=<?php echo $row->id;?>"><i class="fa fa-desktop"></i></a>&nbsp;
<a href="manage-loan.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a>
	
	</td>
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
