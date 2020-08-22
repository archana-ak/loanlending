<?php
require('config.php');
$sql="select * from customer";
$res=mysqli_query($mysqli,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Data Export</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="" style="padding:20px">
<form method="post" action="excel_dwn.php">
<!--<label>start date </label> <input type="date" name="frmp"/><label>end date </label> <input type="date" name="topr"/>-->
<label style="margin-top:30px;">Called By</label> <input type="text" name="calledby" style=" width: 10%;
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
   <label>Review</label> <input type="text" name="review" style=" width: 10%;
  padding: 5px 7px;
  margin: 5px 0;
  margin-left:5px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;"/>
  <label>Bank</label> <input type="text" name="bankname" style=" width: 10%;
  padding: 5px 7px;
  margin: 5px 0;
  margin-left:5px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;"/>
  <label>Date</label> <input type="text" name="date" style=" width: 10%;
  padding: 5px 7px;
  margin: 5px 0;
  margin-left:5px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;"/>
    <label>Profession</label> <input type="text" name="profession" style=" width: 10%;
  padding: 5px 7px;
  margin: 5px 0;
  margin-left:5px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;"/>
  
  
  
  
<input type="submit" name="downsubmit" value="Filter Export" class="btn-primary" style="padding:5px; border-radius:5px; margin-left:4px;"/>
</form>

  <a href="export.php"><button type="button" class="btn btn-primary">Full Export</button></a>
  <table class="table table-bordered  table-striped" style="overflow-x:auto;">
    <thead>
      <tr>
        <th>S.No</th>
		<th>Added By</th>
        <th>Customer Name</th>
        <th>Customer Address</th>
		<th>Personal Number </th>
        <th>Office Number</th>
        <th>Email</th>
		<th>Email Personal</th>
		<th>Bussiness  Name</th>
		<th>State</th>
		<th>City</th>
		<th>Pin</th>
		<th>Profession</th>
		<th>Bank</th>
		<th>Review</th>
		<th>Called By</th>
		<th>Caller ID</th>
		<th>Date</th>
		
		
      </tr>
    </thead>
    <tbody>
	 <?php  while($row=mysqli_fetch_assoc($res)){?>	
	 <tr>
    
<td><?php echo $row['id']?></td>		
<td><?php echo $row['addedby']?></td>
<td><?php echo $row['name']?></td>
<td><?php echo $row['address']?></td>
<td><?php echo $row['personal_no']?></td>
<td><?php echo $row['office_no']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['email_personal']?></td>
<td><?php echo $row['business_name']?></td>
<td><?php echo $row['state']?></td>
<td><?php echo $row['city']?></td>
<td><?php echo $row['pin']?></td>
<td><?php echo $row['profession']?></td>
<td><?php echo $row['bankname']?></td>
<td><?php echo $row['review']?></td>
<td><?php echo $row['calledby']?></td>
<td><?php echo $row['callerid']?></td>
<td><?php echo $row['date']?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<style>
.btn{
	float: right;
    margin-bottom: 20px;
}
</style>
</body>
</html>
