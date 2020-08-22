<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<!doctype html>
<html lang="en" class="no-js">
<link rel="stylesheet" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/css/dataTables.bootstrap.min.css">
<head>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
<link rel="stylesheet" href="css/style2.css">
</head>
<body>
<!-- Sidebar -->
<?php include("includes/navigation.php");?>


<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>Manage Customer </h1>
  </div>
</div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
<div class="w3-container">

							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										    <tr><th>S.No</th>
										    <th>Customer Name</th>
										    <th>Location</th>
											<th>NSM</th>
											<th>ZSM</th>
											<th>RSM</th>
											<th>SM</th>
											<th>PMCPL Manager</th>
											<th>Bank Name</th>
									        <th>Login Date</th>
											<th>Login Amount</th>
											<th>Distribution Date</th>
											<th>Distribution Amount</th>
											<th>Decision</th>
											<th>Remark</th>
											<th>Edit Remark</th>
											</tr>
																				</thead>
									<tfoot>
										<tr><th>S.No</th>
										<th>Customer Name</th>
										<th>Location</th>
											<th>NSM</th>
											<th>ZSM</th>
											<th>RSM</th>
											<th>SM</th>
											<th>PMCPL Manager</th>
											<th>Bank Name</th>
									        <th>Login Date</th>
											<th>Login Amount</th>
											<th>Distribution Date</th>
											<th>Distribution Amount</th>
											<th>Decision</th>
											<th>Remark</th>
											<th>Edit Remark</th>
											</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$sql=mysqli_query($mysqli,"select * from employee where id='$aid' ");
while($row=mysqli_fetch_array($sql) )
{
$name=$row['name'];
}
$n=$name;
$ret=mysqli_query($mysqli,"select * from file where executive='$n'");

$cnt=1;
while($row=$ret->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>

<td><?php echo $row->name;?></td>
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
<td><?php echo $row->profession;?></td>
<td><?php echo $row->login_date;?></td>
<td><?php echo $row->login_amt;?></td>
<td><?php echo $row->distribution_date;?></td>
<td><?php echo $row->distribution_amt;?></td>
<td><?php echo $row->decision;?></td>
<td><?php echo $row->remark;?></td>
<td><a href="edit-file.php?id=<?php echo $row->id;?>">Edit</a></td>


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
<?php include("includes/footer.php");?>

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
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
</body>

</html>
