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
 $name = $filesop[1];
 $mobile = $filesop[2];
 $profession = $filesop[3];
 $state = $filesop[4];
 $city = $filesop[5];
 $review = $filesop[6];
 
 $sql = "insert into tele(id,name,mobile,profession,state,city,review) values ('$id','$name','$mobile','$profession','$state','$city','$review')";
 $stmt = mysqli_prepare($mysqli,$sql); mysqli_stmt_execute($stmt); $c = $c + 1; } if($sql){ echo '<script>alert("Successfully Imported")</script>';
} 		
 else 	
	 { echo   '<script>alert("Sorry! Unable to import.")</script>';  } }
 ?>
 <!DOCTYPE html> <html> <body bgcolor="lightgrey"> 
 
 <div style="border-style: solid; background-color:white;" >
 
 <form enctype="multipart/form-data" method="post" role="form"> 
 <div class="form-group" style="padding:5% 35% 1%" > <label for="exampleInputFile" style ="padding: 8px 20px; border-radius: 8px; font-size: 20px; font-family:monospace;">File Upload :-</label> 
 <input type="file" name="file" id="file" size="220" style="font-family:monospace;" > <p class="help-block" style="font-family:monospace; color:red;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Only Excel/CSV File Import.</p> 
 </div> 
 <div style="padding:  0% 40% 5%">
 
 <button type="submit" class="btn btn-default" name="submit" value="submit" style="  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;">Upload</button></div> </form></div>
 </body> </html>