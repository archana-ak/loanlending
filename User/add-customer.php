<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add customer
if(isset($_POST['submit']))
{
$add= $_POST['addedby'];
$add_id= $_POST['added_id'];
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
$query=mysqli_query($mysqli,"insert into customer(addedby,name,address,personal_no,office_no,email,email_personal,business_name,state,district,city,pin,profession,added_id) values('$add','$full_name','$address','$personal_no','$office_no','$mail_ID','$mail_ID_personal','$business_name','$state','$district','$city','$pin','$profession','$add_id')");
 
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
	
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>


<style>

.margin{
	margin-top:5px;
	margin-bottom:5px;
	margin-left:1px;
	margin-right:5px;
}



  .button {
  background-color: #008CBA; 
  border-radius:5px;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 12px 2px;
  cursor: pointer;
}
 input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

button[type=reset] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}



</style>





<link rel="stylesheet" href="css/style2.css">
</head>
<body>
<!-- Sidebar -->
<?php include("includes/navigation.php");?>


<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>Add Customer</h1>
  </div>
</div>

<form method="post" action="" class="form-horizontal">

<div class="w3-container">		
<?php 
    $aid=$_SESSION['id'];
  $ret="select * from employee where id=?";
    $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$aid);
   $stmt->execute();
   $res=$stmt->get_result();
     while($r=$res->fetch_object())
    {
      ?>  <br>
      	<input type="hidden" name="added_id"  value="<?php echo $r->id;?>">
	<input type="hidden" name="addedby"  value="<?php echo $r->name;?>"><?php } ?>
	<label for="fname"   >Full Name :-</label>
    <input type="text" id="fname" name="Full_Name" style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
<br>
    <label for="lname" style="margin-right:12px;" >Address :-</label>
    <input type="text" id="lname" name="Address"  style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required"><br>
  
  
   <label for="lname" >Mobile No:-</label>

    <input type="tel" id="personalno" name="personal_no" onBlur="checkAvailability2()" placeholder ="123-456-7890 (Personal)"style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" >
<span id="user-availability-status2" style="font-size:12px;"></span>
  <br>
   <label for="lname" >Mobile No:-</label>
   <input type="tel" id="officeno" name="Office_no" onBlur="checkAvailability3()" placeholder ="123-456-7890 (office)"style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" >
<span id="user-availability-status3" style="font-size:12px;"></span>
  <br><!--
   <input type="tel" id="officeno" name="Office_no" onBlur="checkAvailability3()" placeholder ="123-456-7890 (Office)" required="required">
<span id="user-availability-status3" style="font-size:12px;"></span><br>-->
  
    <label for="lname"style="margin-right:12px;" >Mail ID  :-</label>

    <input type="email" name="mail_ID" id="email"  class="form-control" onBlur="checkAvailability()" style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" placeholder="Personal" ><br>
<span id="user-availability-status" style="font-size:12px;"></span><br> 	

 <!--   <input type="email" id="lname" name="mail_ID" onBlur="checkAvailability()" style="width:30%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">-->

  <label for="lname" style="margin-right:12px;">Mail ID :-</label>
    <input type="email" id="email1" name="mail_ID_personal" onBlur="checkAvailability1()" style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;"  placeholder="Official"><br>
  <span id="user-availability-status1" style="font-size:12px;"></span>

<br> 
   <label for="lname" style="margin-right:30px;" >State:-</label> 

<?php 
 $query3 = "SELECT distinct(sname) FROM city";

$result3 = mysqli_query($mysqli,$query3);

?>
    <select style="width:60%; padding: 6px 6px;  margin: 6px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" class="chosen-select" onChange="getState(this.value);"  
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
  <br>

  <label for="lname"  style="margin-right:12px;">District :-</label>
<select  style="width:60%; padding: 6px 6px;  margin: 6px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;"
required class="chosen-select"    id="chkveg"  name="dist">

                                        

                                        

</select> 
<br>
   <label for="lname" style="margin-right:39px;" >City:-</label> 
    <input type="text" id="city" name="city" style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required"><br>

   <label for="lname" style="margin-right:26px;" >Pin no:-</label> 
    <input type="text" id="pin" name="pin" style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">

  <br>
  
  <label for="lname"  >Co. Name :-</label>
    <input type="text" id="bname" name="business_name" style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
  
  <br>
  <label for="lname" >Profession:-</label> 
    <input type="text" id="profession" name="profession" style="width:60%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <br>
 
  
  <br>
    <input type="submit" value="Submit" name="submit"  class ="button" >&emsp;
 <input type="reset" value="Reset"  class ="button"  >
  </form>
									</div>
						<?php include("includes/footer.php");?>	

<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
	<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
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