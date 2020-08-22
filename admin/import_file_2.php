<?php 
include('includes/config.php');
error_reporting(0);
if(isset($_POST["submit"])) {
 if(!$mysqli){ die('Could not Connect My Sql:' .mysqli_error()); 	
 } $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	 { 
 $id = $filesop[0];
$full_name=$filesop[1];
$desgination=$filesop[2];
$team_Leader=$filesop[3];
$team_Manager=$filesop[4];
$office_no=$filesop[5];
$personal_no=$filesop[6];
$mail_ID=$filesop[7];
$join_date=$filesop[8];
$address=$filesop[9];
$basic_salary=$filesop[10];
$account_no=$filesop[11];
$ifsc_code=$filesop[12];
$state=$filesop[13];
$emp_code=$filesop[14];
$adhar=$filesop[15];
$pan=$filesop[16];
$pass=$filesop[17];
$status=$filesop[18];
$sql=mysqli_query($mysqli,"insert into employee
  (id,name,desgination,team_leader,team_manager,office_no,personal_no,email,join_date,address,basic_salary,account_no,ifsc_code,state,emp_code,adhar_no,pan_no,password,status) 
  values
  ('$id','$full_name','$desgination','$team_Leader','$team_Manager','$office_no','$personal_no','$mail_ID','$join_date','$address','$basic_salary','$account_no','$ifsc_code','$state','$emp_code','$adhar','$pan','$pass','$status')");
 $stmt = mysqli_prepare($mysqli,$sql); mysqli_stmt_execute($stmt); $c = $c + 1; } if($sql){ echo '<script>alert("Successfully Imported")</script>'; } 		
 else 	
	 { echo "Sorry! Unable to impo."; } }
 ?>
 <!DOCTYPE html> <html> <body bgcolor="lightgrey"> 
 
  <div style="border-style: solid; background-color:white;" >
 
 
 <form enctype="multipart/form-data" method="post" role="form"> 
 <div class="form-group"   style="padding:5% 35% 1%"> <label for="exampleInputFile" style ="padding: 8px 20px; border-radius: 8px; font-size: 20px; font-family:monospace;">File Upload</label> 
 <input type="file" name="file" id="file" size="150" style="font-family:monospace;"> <p class="help-block" style="font-family:monospace; color:red;">Only Excel/CSV File Import.</p> 
 </div> 
  <div style="padding:  0% 40% 5%">
 
 <button type="submit" class="btn btn-default" name="submit" value="submit"    style="  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;">Upload</button> </form></div>
 </body> </html>
 
 
 
 
 
 
 