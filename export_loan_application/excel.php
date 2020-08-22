<?php
require('config.php');
$sql="select * from loan";
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
											
										
											<th>Name Of Business</th>
											<th>Bussiness Type</th>
											<th>Buss.Plz.Specify</th>
											<th>Nature Of Bussiness</th>
											<th>Industry</th>
											<th>Comp.PAN</th>
											<th>GSTIN</th>
										
											<th>Buss Address</th>
											<th>Landmark</th>
											<th>PIN</th>
											<th>City</th>
											<th>State</th>
											<th>Email</th>
											<th>D.O.I</th>
											<th>Name as PAN</th>
											<th>Category</th>
											<th>If Comp Then</th>
											<th>Comp Pls Specify</th>
											<th>Title</th>
											<th>Gender</th>
											<th>Ckyc No</th>
											<th>PAN</th>
											<th>D.O.B</th>
											<th>D.O.B</th>
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
											<th>Tr name</th>
											<th>Tr Business_name</th>
											<th>Tr mobile_number</th>
											<th>Tr relation</th>
											<th>Tr address</th>
											<th>Tr city</th>
											<th>Tr pin</th>
											<th>Tr2 name</th>
											<th>Tr2 Business_name</th>
											<th>Tr2 mobile_number</th>
											<th>Tr2 relation</th>
											<th>Tr2 address</th>
											<th>Tr2 city</th>
											<th>Tr2 pin</th>
											
      </tr>
    </thead>
    <tbody>
	 <?php  while($row=mysqli_fetch_assoc($res)){?>	
	 <tr>
<td><?php echo $row['id']?></td>

<td><?php echo $row['name_of_entity']?></td>
<td><?php echo $row['bussiness_type']?></td>
<td><?php echo $row['bussiness_pls_specify']?></td>
<td><?php echo $row['nature_of_bussniess']?></td>
<td><?php echo $row['industry'];?></td>
<td><?php echo $row['comp_pan']?></td>
<td><?php echo $row['gstin']?></td>

<td><?php echo $row['business_address']?></td>        
<td><?php echo $row['landmark']?></td>
<td><?php echo $row['pin']?></td>
<td><?php echo $row['city']?></td>
<td><?php echo $row['state']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['date_of_incorpration']?></td>
<td><?php echo $row['co_name']?></td>
<td><?php echo $row['co_category']?></td>
<td><?php echo $row['co_if_comp']?></td>
<td><?php echo $row['co_comp_pls_specify']?></td>
<td><?php echo $row['co_title']?></td>
<td><?php echo $row['co_gender'];?></td>
<td><?php echo $row['co_ckyc']?></td>
<td><?php echo $row['co_pan']?></td>
<td><?php echo $row['co_dob']?></td>
<td><?php echo $row['co_doa']?></td>        
<td><?php echo $row['co_maritial_status']?></td>
<td><?php echo $row['co_dependents']?></td>
<td><?php echo $row['co_edu_level']?></td>
<td><?php echo $row['co_edu_pls_specify']?></td>
<td><?php echo $row['co_occupation']?></td>
<td><?php echo $row['co_occupation_service']?></td>
<td><?php echo $row['co_occupation_other']?></td>
<td><?php echo $row['co_email']?></td>
<td><?php echo $row['co_father']?></td>
<td><?php echo $row['co_mother']?></td>
<td><?php echo $row['co_current_owned']?></td>
<td><?php echo $row['co_current_address'];?></td>
<td><?php echo $row['co_current_landmark']?></td>
<td><?php echo $row['co_current_state']?></td>
<td><?php echo $row['co_current_city']?></td>
<td><?php echo $row['co_current_pin']?></td>        
<td><?php echo $row['co_mobile']?></td>
<td><?php echo $row['co_permanent_owned']?></td>
<td><?php echo $row['co_permanent_address']?></td>
<td><?php echo $row['co_permanent_landmark']?></td>
<td><?php echo $row['co_permanent_state']?></td>
<td><?php echo $row['co_permanent_city']?></td>
<td><?php echo $row['co_permanent_pin']?></td>
<td><?php echo $row['tr_name']?></td>
<td><?php echo $row['tr_entity_name']?></td>
<td><?php echo $row['tr_mobile']?></td>
<td><?php echo $row['tr_relation']?></td>
<td><?php echo $row['tr_address'];?></td>
<td><?php echo $row['tr_city']?></td>
<td><?php echo $row['tr_pin']?></td>
<td><?php echo $row['tr2_name']?></td>
<td><?php echo $row['tr2_entity_name']?></td>
<td><?php echo $row['tr2_mobile']?></td>
<td><?php echo $row['tr2_relation']?></td>
<td><?php echo $row['tr2_address']?></td>
<td><?php echo $row['tr2_city'];?></td>
<td><?php echo $row['tr2_pin']?></td>
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
