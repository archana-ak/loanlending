<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add customer
if(isset($_POST['submit']))
{
$add= $_POST['addedby'];
$full_name=$_POST['Full_Name'];
$address=$_POST['Address'];
$personal_no=$_POST['personal_no'];
$office_no=$_POST['Office_no'];
$mail_ID=$_POST['mail_ID'];
$mail_ID_personal=$_POST['mail_ID_personal'];
$business_name=$_POST['business_name'];
$state=$_POST['state'];
$district=$_POST['dist'];
$city=$_POST['city'];
$pin=$_POST['pin'];
$profession=$_POST['profession'];
$sql=mysqli_query($mysqli,"select * from customer where personal_no='$personal_no' and office_no='$office_no' ");
$count=mysqli_num_rows($sql);
if($count>0){
	  echo "<script>alert('customer already exists.');</script>";

	}
	else
	{
$query=mysqli_query($mysqli,"Update customer set name='$full_name',address='$address',personal_no='$personal_no',office_no='$office_no',email='$mail_ID',email_personal='$mail_ID_personal',business_name='$business_name',state='$state',district='$district',city='$city',pin='$pin',profession='$profession' where id='$id'");
 
if(!$query)
{
	die('invalid query'.mysqli_error($mysqli));
}
else
{
  echo "<script>alert('customer has been added successfully');</script>";
}
}
}
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
	<title>Edit Customer</title>
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
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Customer </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Customer</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];
	$ret="select * from customer where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
						<div class="hr-dashed"></div>
						<div class="form-group">
						 <label for="fname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;" >Fulll Name :-</label>&emsp;&emsp;
    <input type="text" id="fname" name="Full_Name" value="<?php echo $row->name;?>" style="width:30%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">

    <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Address :-</label>
    <input type="text" id="lname" name="Address" value="<?php echo $row->address;?>" style="width:30%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required"><br>

   <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mobile Number :-</label>
   <input type="text" id="lname" name="personal_no" value="<?php echo $row->personal_no;?>" placeholder ="Personal Number"style="width:30%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">&emsp;&emsp;&emsp;
    <input type="text" id="lname" name="Office_no" value="<?php echo $row->office_no;?>" placeholder ="Office Number"style="width:30%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
 
  <br>
  
    <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mail ID (Official):-</label>&emsp;&emsp;&emsp;&nbsp;&nbsp;
    <input type="email" id="lname" name="mail_ID" value="<?php echo $row->email;?>" style="width:30%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">

  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mail ID (Personal) :-</label>&emsp;
    <input type="email" id="email1" name="mail_ID_personal" value="<?php echo $row->email_personal;?>" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <span id="user-availability-status1" style="font-size:12px;"></span>
  <br> 
   <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">State :-</label>&emsp;

<?php 
 $query3 = "SELECT distinct(sname) FROM city";

$result3 = mysqli_query($mysqli,$query3);

?>

<select  style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" 
class="chosen-select" onChange="getState(this.value);"  
id="country-list" required  name="state">

																			  

<?php

while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["sname"]; ?>">
<?php echo $rs["sname"]; ?></option>

<?php

}

?>
																			</select> 
																			
																			
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">District :-</label>&emsp;
<select  style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" 
required class="chosen-select"    id="chkveg"  name="dist">

																			  

																			  

</select> 
  
   <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">City:-</label> &emsp;&nbsp;&nbsp;
    <input type="text" id="lname" name="city" value="<?php echo $row->city;?>" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">

  

   <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Pin no:-</label> &emsp;&nbsp;&nbsp;
    <input type="text" id="lname" name="pin" value="<?php echo $row->pin;?>" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  
  
  <br>
  
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Business/Company Name :-</label>
    <input type="text" id="lname" name="business_name" value="<?php echo $row->business_name;?>" style="width:23.5%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  
  
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Profession:-</label> &emsp;&nbsp;&nbsp;
    <input type="text" id="profession" name="profession" value="<?php echo $row->profession;?>" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <br>
  
  
<?php } ?>
  
  
  
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <input type="submit" value="Submit" name="submit" style ="width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"  
>&emsp;
 <input type="reset" value="Reset" style ="width: 10%;
  background-color: #FF0000;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"  
>
  </form>

									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
				<?php include("includes/footer.php");?>	

		</div>
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

</script><script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
	<script>
function getState(val) {

	$.ajax({

	type: "POST",

	url: "getCities.php",

	data:'country_id='+val,

	success: function(data){

		$("#chkveg").html(data);

		

	}

	});

}
</script>
</body>

</html>