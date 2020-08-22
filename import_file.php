<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
error_reporting(0);
check_login();
/*if(isset($_POST["submit"])) {
 if(!$mysqli){ die('Could not Connect My Sql:' .mysqli_error()); 	
 } $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	 { 
 $id = $filesop[0];
 $name = $filesop[1];
 $address = $filesop[2];
 $personal_no = $filesop[3];
 $office_no = $filesop[4];
 $email = $filesop[5];
 $dob = $filesop[6];
 $business_name = $filesop[7];
 $employment = $filesop[8];
 $state=$filesop[9];
 $city=$filesop[10];
 $pin= $filesop[11];
 $sql = "insert into customer(id,name,address,personal_no,office_no,email,dob,business_name,employment,state,city,pin) values ('$id','$name','$address','$personal_no','$office_no','$email','$dob','$business_name','$employment','$state','$city','$pin')";
 $stmt = mysqli_prepare($mysqli,$sql); mysqli_stmt_execute($stmt); $c = $c + 1; } if($sql){ echo '<script>alert("Successfully Imported")</script>';
} 		
 else 	
	 { echo   '<script>alert("Sorry! Unable to import.")</script>';  } }
 
 
 ///*/
 
 if(isset($_POST["submit"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				// $id = $emapData[1];
 $name = $emapData[2];
 $address = $emapData[3];
 $personal_no = $emapData[4];
 $office_no = $emapData[5];
 $email = $emapData[6];
 $email_personal=$emapData[7];
 $business_name = $emapData[8];
 $state=$emapData[9];
 $city=$emapData[10];
 $pin= $emapData[11];
 $profession= $emapData[12];
	    
	          //It wiil insert a row to our subject table from our csv file`
	          $sql = "insert into customer(name,address,personal_no,office_no,email,email_personal,business_name,state,city,pin,profession)
	            	values 
	            	('$name','$address','$personal_no','$office_no','$email','$email_personal','$business_name','$state','$city','$pin','$profession')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $mysqli,$sql);
				if(! $result )
				{
					die('invalid query'.mysqli_error($mysqli));

				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"manage-customer.php\"
					</script>";
	        
			 

			 //close of connection
			mysqli_close($mysqli); 
				
		 	
			
		 }
	}	 
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