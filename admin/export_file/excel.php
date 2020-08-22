<?php
session_start();
require('config.php');
	 if(isset($_POST['balrish'])){
	
$ret = $_POST['nzqma'];
$ballu = mysqli_query($mysqli,$ret) or die("please search first.. then try to export the file".mysqli_error($mysqli));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export data to excel in PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-left: 0px; margin-right: 0px; padding-right: 0px;">
<form method="post" action="export.php">
<input type="hidden" name="nzqma" id="nzqma" value="<?php if(isset($_POST['balrish'])){ echo $ret; } ?>" />
 <button type="Submit" name="funtri" id="funtri" class="btn btn-primary">Export</button>
</form>
  <table class="table table-bordered  table-striped" style="overflow-x:auto;">
    <thead>
      <tr>
      <th>S.No</th>
											
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
											<th>Distribution Date</th>
											<th>Distribution Month </th>
											<th>Distribution Year</th>
											<th>Distribution Amount</th>
											<th>Decision</th>
											<th>Remark</th>
											
      </tr>
    </thead>
    <tbody>
	 <?php 

$cnt=1;

	 while($row=mysqli_fetch_array($ballu,MYSQLI_BOTH)){?>	
	 <tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['name']?></td>
<td><?php echo $row['business_name']?></td>
<td><?php echo $row['state']?></td>        
<td><?php echo $row['district']?></td>
<td><?php echo $row['city']?></td>
<?php 
$r=$row['nsm_name'];
   $sql="select * from nsm where id='$r'";
 $t=mysqli_query($mysqli,$sql);
 while($r=$t->fetch_object())
 {
   ?>
<td><?php echo $r->name;?></td><?php }?>

<?php 
$z=$row['zsm_name'];

   $sql1="select * from zsm where id='$z'";
 $t1=mysqli_query($mysqli,$sql1);
 while($r1=$t1->fetch_object())
 {
   ?>
<td><?php echo $r1->name;?></td><?php }?>
<?php
$r=$row['rsm_name'];

   $sql2="select * from rsm where id='$r'";
 $t2=mysqli_query($mysqli,$sql2);
 while($r2=$t2->fetch_object())
 {
   ?>
<td><?php echo $r2->name;?></td><?php }?>
<?php 
$s=$row['sm_name'];

   $sql3="select * from sm where id='$s'";
 $t3=mysqli_query($mysqli,$sql3);
 while($r3=$t3->fetch_object())
 {
   ?>
<td><?php echo $r3->name;?></td><?php }?>
<td><?php echo $row['manager']?></td>
<td><?php echo $row['team_leader']?></td>
<td><?php echo $row['executive']?></td>
<td><?php echo $row['closed_by']?></td>
<td><?php echo $row['mobile']?></td>
<td><?php echo $row['mail']?></td>
<td><?php echo $row['profession']?></td>
<td><?php echo $row['market']?></td>
<td><?php echo $row['percent'];?></td>
<td><?php echo $row['product']?></td>
<td><?php echo $row['bankname'];?></td>
<td><?php echo $row['carry_forward']?></td>
<td><?php echo $row['login_date']?></td>
<td><?php echo $row['login_month']?></td>
<td><?php echo $row['login_year']?></td>        
<td><?php echo $row['login_amt']?></td>
<td><?php echo $row['distribution_date']?></td>
<td><?php echo $row['disbursement_month']?></td>
<td><?php echo $row['disbursement_year']?></td>
<td><?php echo $row['distribution_amt']?></td>
<td><?php echo $row['decision']?></td>
<td><?php echo $row['remark']?></td>


      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<style>
.btn{
	float: right;
    margin-bottom: 20px;
    margin-top: 20px;
}
</style>
</body>
</html>
