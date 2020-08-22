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
						<h2 class="page-title">Count Records</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											
										
<div class="form-group">
<label class="col-sm-1 control-label">Starting Date</label> <div class="col-sm-2">
    <input type="date" id="fname" name="sdate"  class="form-control" required="required">
</div>
<label class="col-sm-1 control-label">Ending Date</label> <div class="col-sm-2">
    <input type="date" id="fname" name="edate"  class="form-control" required="required">
</div>
<label class="col-sm-1 control-label">Employee Name</label> <div class="col-sm-2">
	    <select class="form-control" name="ename" required="required" class="form-control">
 <option value="">Select Employee Name</option>

   <?php
   $sqli=mysqli_query($mysqli,"select name from employee");
            while($ro1=mysqli_fetch_array($sqli))
{
          ?>
          <option value="<?php echo htmlentities($ro1['name']);?>"><?php echo htmlentities($ro1['name']);?>
          </option>
          <?php
        }

   ?>
       </select></div>
 </div>  
 
 <div class="col-sm-6 col-sm-offset-8"><br>
    <input type="submit" value="Submit" name="submit" style ="width: 20%;
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
</div></div></div>


	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
							<div class="panel panel-default">
				            <div class="panel-heading" style="color: black;">All Details</div>
							<div class="panel-body"  style="overflow-x:auto;">
								<?php
if(isset($_POST['submit']))
{

?>
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
											<th>Adding Date</th>
											<th>Bank name</th>
											<th>Review</th>
											<th>Comment</th>
											<th>Called by</th>
											
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
											<th>Adding Date</th>
											<th>Bank name</th>
											<th>Review</th>
											<th>Comment</th>
											<th>Called by</th>
											</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
$ename=$_POST['ename'];
$ret="select * from customer where date BETWEEN '$sdate' and '$edate' and addedby='$ename'";
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
<td><?php echo $row->date;?></td>
<td><?php echo $row->bankname;?></td>
<td><?php echo $row->review;?></td>
<td><?php echo $row->comment;?></td>
<td><?php echo $row->calledby;?></td>
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
									</tbody>
								<?php }
								?>
								</table>
								
							</div>
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
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
</body>

</html>