<?php
require('config.php');
$sql="select * from employee";
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
  box-sizing: border-box;"/><label>Pin</label> <input type="text" name="pin" style=" width: 10%;
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
        <th>Employee Name</th>
        <th>Desgination</th>
		 <th>Team Leader </th>
        <th>Team Manager</th>
        <th>Office Number</th>
		<th>Personal Number</th>
        <th>Email</th>
        <th>Join Date</th>
		<th>Address</th>
		<th>State</th>
		<th>PIN</th>
		<th>Account Number </th>
        <th>IFSC Code</th>
        <th>Basic Salary</th>
		<th>Employee Code</th>
        <th>Adhar Number</th>
        <th>Pan Number</th>
			
      </tr>
    </thead>
    <tbody>
	 <?php  while($row=mysqli_fetch_assoc($res)){?>	
	 <tr>
<td><?php echo $row['id']?></td>
    
<td><?php echo $row['name']?></td>
<td><?php echo $row['desgination']?></td>
<td><?php echo $row['team_leader']?></td>        
<td><?php echo $row['team_manager']?></td>
<td><?php echo $row['office_no']?></td>
<td><?php echo $row['personal_no']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['join_date']?></td>
<td><?php echo $row['address']?></td>
<td><?php echo $row['state']?></td>
<td><?php echo $row['pin']?></td>
<td><?php echo $row['account_no']?></td>
<td><?php echo $row['ifsc_code']?></td>
<td><?php echo $row['basic_salary']?></td>
<td><?php echo $row['emp_code']?></td>
<td><?php echo $row['adhar_no'];?></td>
<td><?php echo $row['pan_no']?></td>

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
