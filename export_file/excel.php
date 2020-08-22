<?php
require('config.php');
$sql="select * from file";
$res=mysqli_query($mysqli,$sql);
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
<div class="" style="padding:20px;">
<form method="post" action="excel_dwn.php">
<!--<label>start date </label> <input type="date" name="frmp"/><label>end date </label> <input type="date" name="topr"/>-->
<label style="margin-top:30px;">State</label> <input type="text" name="state" style=" width: 10%;
  padding: 5px 7px;
  margin: 5px 0;
  margin-left:5px;
  margin-right:5px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;"/><label>City</label> <input type="text" name="city" style=" width: 10%;
  padding: 5px 7px;
  margin: 5px 0;
  margin-left:5px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;"/>
<input type="submit" name="downsubmit" value="Filter Export" class="btn-primary" style="padding:5px; border-radius:5px; margin-left:4px;"/>
</form>
  <a href="export.php"><button type="button" class="btn btn-primary">Export</button></a>
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
	 <?php  while($row=mysqli_fetch_assoc($res)){?>	
	 <tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['name']?></td>
<td><?php echo $row['business_name']?></td>
<td><?php echo $row['state']?></td>        
<td><?php echo $row['district']?></td>
<td><?php echo $row['city']?></td>
<td><?php echo $row['nsm_name']?></td>
<td><?php echo $row['zsm_name']?></td>
<td><?php echo $row['rsm_name']?></td>
<td><?php echo $row['sm_name']?></td>

<td><?php echo $row['manager']?></td>
<td><?php echo $row['team_leader']?></td>
<td><?php echo $row['executive']?></td>
<td><?php echo $row['closed_by']?></td>
<td><?php echo $row['mobile']?></td>
<td><?php echo $row['mail']?></td>
<td><?php echo $row['profession']?></td>
<td><?php echo $row['market']?></td>
<td><?php echo $row['product']?></td>
<td><?php echo $row['bankname'];?></td>
<td><?php echo $row['carry_forward']?></td>
<td><?php echo $row['login_date']?></td>
<td><?php echo $row['login_month']?></td>
<td><?php echo $row['login_year']?></td>        
<td><?php echo $row['login_amt']?></td>
<td><?php echo $row['disbursement_date']?></td>
<td><?php echo $row['disbursement_month']?></td>
<td><?php echo $row['disbursement_year']?></td>
<td><?php echo $row['disbursement_amt']?></td>
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
