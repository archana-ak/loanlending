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
$query=mysqli_query($mysqli,"insert into customer(addedby,name,address,personal_no,office_no,email,email_personal,business_name,state,district,city,pin,profession,date) values('$add','$full_name','$address','$personal_no','$office_no','$mail_ID','$mail_ID_personal','$business_name','$state','$district','$city','$pin','$profession',now())");
 
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
	<title>Add customer</title>
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
<style type="text/css">
	.form-control
	{
		border:1px solid #c5b9a5;
		height: 43px;
	}
</style>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					<br>
						<h2 class="page-title">Add customer </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Add customer</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">

											<div class="hr-dashed"></div>
											<div class="form-group">

												<?php 
  $aid=$_SESSION['id'];
  $ret="select * from admin where id=?";
  $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$aid);
   $stmt->execute();
   $res=$stmt->get_result();
     while($r=$res->fetch_object())
    {
      ?>  
	<input type="hidden" name="addedby"  value="<?php echo $r->username;?>"><?php } ?>
	<label class="col-sm-1 control-label">Name</label>
 <div class="col-sm-2">
    <input type="text" id="fname" name="Full_Name" class="form-control" required="required">
</div>

   <label class="col-sm-1 control-label">Address</label>
    <div class="col-sm-2">
    <input type="text" id="lname" name="Address"  class="form-control" required="required">
 </div>
   <label class="col-sm-1 control-label">Personal No</label>
    <div class="col-sm-2">
  <input type="tel" id="personalno" name="personal_no" onBlur="checkAvailability2()" class="form-control" required="required"  >
  <span id="user-availability-status2" style="font-size:12px;"></span>
  </div>
   <label class="col-sm-1 control-label">Office No</label>
    <div class="col-sm-2">
   <input type="tel" id="officeno" name="Office_no" onBlur="checkAvailability3()"  class="form-control" required="required"   >
  <span id="user-availability-status3" style="font-size:12px;"></span>
</div>
 
  </div>

   <div class="form-group">
  <label class="col-sm-1 control-label">Mail ID </label>   
  <div class="col-sm-2">
 <input type="email" name="mail_ID" id="email"   onBlur="checkAvailability()"  placeholder="Office"  class="form-control" >
<span id="user-availability-status" style="font-size:12px;"></span></div>

<label class="col-sm-1 control-label">Mail ID </label>
   <div class="col-sm-2">
    <input type="email" id="email1" name="mail_ID_personal" onBlur="checkAvailability1()" placeholder="Personal" class="form-control">
  <span id="user-availability-status1" style="font-size:12px;"></span></div>


  <label class="col-sm-1 control-label">State</label>   <div class="col-sm-2">

<?php 
 $query3 = "SELECT distinct(sname) FROM city";

$result3 = mysqli_query($mysqli,$query3);

?>

<select   class="form-control" onChange="getState(this.value);"  
id="country-list" required  name="state">

																			  

<?php

while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["sname"]; ?>">
<?php echo $rs["sname"]; ?></option>

<?php

}

?>
																			</select> </div>
																			
																			
 <label class="col-sm-1 control-label">District</label>   <div class="col-sm-2">
<select   class="form-control"
required   id="chkveg"  name="dist">

</select></div>
</div>

 <div class="form-group">
<label class="col-sm-1 control-label">City</label> 
  <div class="col-sm-2">
    <input type="text" id="lname" name="city" class="form-control" required="required">
</div>
  <label class="col-sm-1 control-label">Pin no</label> 
    <div class="col-sm-2">
    <input type="text" id="lname" name="pin" class="form-control">
</div>
 
 <label class="col-sm-1 control-label">Business/Company Name </label>
   <div class="col-sm-2">
    <input type="text" id="lname" name="business_name" class="form-control">
</div>
  <label class="col-sm-1 control-label">Profession</label>  <div class="col-sm-2">
   <select id="lname" name="profession" class="form-control" required="required">
  <option value="">Select Profession</option>
      
       <?php 
 $query = "SELECT name FROM profession";

$result = mysqli_query($mysqli,$query);
while($rp=mysqli_fetch_array($result)) {

?>

<option value="<?php echo $rp["name"]; ?>">
<?php echo $rp["name"]; ?></option>

<?php

}

?>
      
        </select>
  </div>
</div>

    <div class="col-sm-6 col-sm-offset-4"><br>
    <input type="submit" value="Submit" name="submit" style ="width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"  
>&emsp;
 <input type="reset" value="Reset" style ="width: 15%;
  background-color: #FF0000;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"  
></div>
  </form>
									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
			<?php include('includes/footer.php');?>
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
<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>


<script>
function checkAvailability1() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid1='+$("#email1").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

<script>
function checkAvailability2() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid2='+$("#personalno").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

<script>
function checkAvailability3() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid3='+$("#officeno").val(),
type: "POST",
success:function(data){
$("#user-availability-status3").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
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