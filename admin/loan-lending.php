<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if(isset($_POST['submit']))
{
/*$bank_name =$_POST['Bank_name'];
$type_of_loan =$_POST['type_of_loan'];
$purpose_of_loan =$_POST['purpose_loan'];
$date =$_POST['date'];
$req_loan_amt =$_POST['loan_amount'];
$req_tenure =$_POST['requested_tenure'];
$channel_name =$_POST['channel_name'];
$channel_code =$_POST['channel_code'];
$executive_name =$_POST['executive_name'];
$executive_code =$_POST['executive_code'];*/
$name_of_entity =$_POST['name_as_certificate'];
$bussiness_type =$_POST['business_type'];
$bussiness_pls_specify =$_POST['business_pls_specify'];
$nature_of_bussniess =$_POST['nature_of_business'];
$industry =$_POST['industry'];
$comp_pan =$_POST['company_pan'];
$gstin =$_POST['gstin'];
//$mobile_no =$_POST['Mobile'];
$business_address =$_POST['business_address'];
$landmark =$_POST['landmark'];
$pin =$_POST['pin'];
$city =$_POST['city'];
$state =$_POST['state'];
$email =$_POST['email'];
$date_of_incorpration =$_POST['doi'];
$co_name =$_POST['name_as_pan'];
$co_category =$_POST['category'];
$co_if_comp =$_POST['if_company_then'];
$co_comp_pls_specify =$_POST['co_comp_pls_specify'];
$co_title  =$_POST['title'];
$co_gender =$_POST['gender'];
$co_ckyc =$_POST['ckyc_no'];
$co_pan =$_POST['pan'];
$co_dob =$_POST['dob'];
$co_doa =$_POST['doa'];
$co_maritial_status =$_POST['maritial_status'];
$co_dependents =$_POST['dependents_no'];
$co_edu_level =$_POST['Education_level'];
$co_edu_pls_specify =$_POST['edu_pls_specify'];
$co_occupation =$_POST ['occupation_type'];
$co_occupation_service =$_POST ['services']; 
$co_occupation_other =$_POST ['others'];
$co_email =$_POST['email'];
$co_father =$_POST['father_name'];
$co_mother =$_POST['mother_name'];
$co_current_owned  =$_POST['current_owned'];
$co_current_address =$_POST['current_address'];
$co_current_landmark  =$_POST['current_landmark'];
$co_current_state =$_POST['current_state'];
$co_current_city =$_POST['current_city'];
$co_current_pin =$_POST['current_pin'];
$co_mobile =$_POST['mobile_number'];
$co_permanent_owned =$_POST['permanent_address_owned'];
$co_permanent_address =$_POST['paddress'];
$co_permanent_landmark  =$_POST['plandmark'];
$co_permanent_state =$_POST['pstate'];
$co_permanent_city =$_POST['pcity'];
$co_permanent_pin =$_POST['ppin'];
$tr_name =$_POST['tr_name'];
$tr_entity_name =$_POST['tr_entity_name'];
$tr_mobile =$_POST['tr_mobile_number'];
$tr_relation =$_POST['tr_relation'];
$tr_address =$_POST['tr_address'];
$tr_city =$_POST['tr_city'];
$tr_pin  =$_POST['tr_pin'];
$tr2_name =$_POST['tr2_name'];
$tr2_entity_name =$_POST['tr2_entity_name'];
$tr2_mobile =$_POST['tr2_mobile_number'];
$tr2_relation =$_POST['tr2_relation'];
$tr2_address =$_POST['tr2_address'];
$tr2_city =$_POST['tr2_city'];
$tr2_pin =$_POST['tr2_pin'];

$query=mysqli_query($mysqli,"insert into loan(name_of_entity ,bussiness_type,bussiness_pls_specify,nature_of_bussniess,industry,comp_pan,gstin,business_address,landmark,pin ,city,
state,email,date_of_incorpration,co_name,co_category,co_if_comp,co_comp_pls_specify,co_title,co_gender  ,co_ckyc  ,co_pan ,co_dob,co_doa,co_maritial_status,
co_dependents,co_edu_level,co_edu_pls_specify ,co_occupation,co_occupation_service,co_occupation_other ,co_email,co_father,co_mother,co_current_owned ,
co_current_address,co_current_landmark ,co_current_state,co_current_city ,co_current_pin ,co_mobile  ,co_permanent_owned ,co_permanent_address,co_permanent_landmark,
co_permanent_state,co_permanent_city ,co_permanent_pin,tr_name,tr_entity_name,tr_mobile,tr_relation,tr_address,tr_city,tr_pin,tr2_name ,tr2_entity_name,tr2_mobile,
tr2_relation,tr2_address,tr2_city ,tr2_pin) 

values('$name_of_entity','$bussiness_type','$bussiness_pls_specify','$nature_of_bussniess','$industry ','$comp_pan ','$gstin',
'$business_address','$landmark ','$pin ','$city','$state','$email ','$date_of_incorpration ','$co_name','$co_category ',
'$co_if_comp','$co_comp_pls_specify','$co_title ','$co_gender','$co_ckyc ','$co_pan ','$co_dob ','$co_doa ','$co_maritial_status',
'$co_dependents','$co_edu_level','$co_edu_pls_specify','$co_occupation','$co_occupation_service','$co_occupation_other','$co_email','$co_father','$co_mother',
'$co_current_owned','$co_current_address ','$co_current_landmark ','$co_current_state','$co_current_city','$co_current_pin','$co_mobile','$co_permanent_owned','$co_permanent_address ',
'$co_permanent_landmark ','$co_permanent_state','$co_permanent_city','$co_permanent_pin','$tr_name','$tr_entity_name ','$tr_mobile','$tr_relation','$tr_address ',
'$tr_city ','$tr_pin ','$tr2_name','$tr2_entity_name','$tr2_mobile','$tr2_relation','$tr2_address','$tr2_city','$tr2_pin'
)");
if(!$query)
{
	die('invalid query'.mysqli_error($mysqli));
	//echo "<script>alert('Loan Application has been added successfully');</script>";
}
else
{
  echo "<script>alert('Loan Application  has been added successfully');</script>";
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
	<title>Loan Lender</title>
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
						<h2 class="page-title">Customer Information </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Customer Information Sheet</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
							 <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
INDIVIDUAL INFORMATION</b>
</li>
</ol>
	   <div class="form-group">
	   
  <label for="country" class="col-sm-1 control-label">Name as on PAN</label>
   <div class="col-sm-2">
   <input type="text" id="lname" name="name_as_pan" class="form-control" required="required">
   </div>
   
   
 <label for="country" class="col-sm-1 control-label">Category</label>
 <div class="col-sm-2">
    	<select id="country" name="category" class="form-control" required="required">
  <option value="">Select Category</option>
      <option value="proprietor">Proprietor</option>
      <option value="partner">Partner</option>
      <option value="director">Director</option>
	     <option value="company">Company</option>
	  
	  </select>
	  </div>


 <label for="country" class="col-sm-1 control-label">If Company then </label>
 <div class="col-sm-2">
   	<select id="country" name="if_company_then" class="form-control" required="required">
  <option value="">Select Company Type</option>
      <option value="properietorship">Proprietorship</option>
      <option value="partnership">Partnership</option>
      <option value="pvt_ltd_co">Pvt.Ltd.Co</option>
	     <option value="ltd_co">Ltd.Co.</option>
		  <option value="llp">LLP</option>
	     <option value="others">Others</option>
	  
	  </select></div>
  
  
     <label for="country" class="col-sm-1 control-label">Pls.Specify</label>
	 <div class="col-sm-2">
  <input type="text" id="lname" name="co_comp_pls_specify" class="form-control">
  </div>
  </div>
  
  <div class="form-group">

 <label for="country" class="col-sm-1 control-label">Title</label>
  <div class="col-sm-2">
   	  	<select id="country" name="title"  class="form-control" required="required">
  <option value="">Select Title</option>
      <option value="mr">Mr.</option>
      <option value="ms">Ms.</option>
      <option value="others">Others</option>
	  
	  </select>
	  </div>
	 
	 
 <label for="country" class="col-sm-1 control-label">Gender</label>
  <div class="col-sm-2">
	<select id="country" name="gender" class="form-control" required="required">
  <option value="">Select Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="transgender">Transgender</option>
	 
	  
	  </select>
	  </div>
	 
	 
	 
	 
 <label for="country" class="col-sm-1 control-label">C-KYC No</label>
   <div class="col-sm-2">
  <input type="text" id="lname" name="ckyc_no" class="form-control" required="required">
  </div>
 
  <label for="country" class="col-sm-1 control-label">PAN </label>
  <div class="col-sm-2">
  <input type="text" id="lname" name="pan" class="form-control" required="required">
  </div>
  </div>
  
  <div class="form-group">
  
 <label for="country" class="col-sm-1 control-label">Date Of Birth</label>
 <div class="col-sm-2">
  <input type="date" id="lname" name="dob" class="form-control" required="required">
  </div>
  
 <label for="country" class="col-sm-1 control-label">Date Of Anniversary</label>
 <div class="col-sm-2">
  <input type="date" id="lname" name="doa" class="form-control" required="required">
  </div>

 <label for="country" class="col-sm-1 control-label">Maritial Status</label>
  <div class="col-sm-2">
   		<select id="country" name="maritial_status" class="form-control" required="required">
  <option value="">Select Status</option>
      <option value="single">Single</option>
      <option value="married">Married</option>
      <option value="others">others</option>
	  </select>
	  </div>
	
 <label for="country" class="col-sm-1 control-label">Dependents No</label>
  <div class="col-sm-2">
   <input type="text" id="lname" name="dependents_no" class="form-control" required="required">
	  </div>
	  </div>
	  
	  
	  <div class="form-group">
	
 <label for="country" class="col-sm-1 control-label">Education Level</label>
 <div class="col-sm-2">
   	<select id="country" name="Education_level" class="form-control" required="required">
  <option value="">Select Education Level</option>
      <option value="undergraduate">Undergraduate</option>
      <option value="graduate">Graduate</option>
      <option value="post_graduate">Post Graduate</option>
	     <option value="any_other">Any Other</option>
	  
	  </select>
	  </div>
  
  
 <label for="country" class="col-sm-1 control-label">Pls.Specify </label>
 <div class="col-sm-2">
  <input type="text" id="lname" name="edu_pls_specify" class="form-control">
  </div>
  
   <label for="country" class="col-sm-1 control-label">Occupation Type</label>
   <div class="col-sm-5">
<input type="radio" name="occupation_type"value="occupation_type" ><b> Occupation Type</b></input>&nbsp;(
<input type="radio" name="services" value="pvt_sector" > Pvt.Sector</input>&nbsp;
<input type="radio" name="services" value="public_sector" > Public Sector</input>&nbsp;
<input type="radio" name="services" value="govt_sector" > Govt Sector</input>&nbsp;)
<input type="radio" name="occupation_type" value="occupation_type" ><b> Business</b></input>&nbsp;
<input type="radio" name="occupation_type" value="occupation_type" ><b> X-Not Categorized</b></input>
<input type="radio" name="occupation_type" value="others" ><b> Others</b></input>&nbsp;(
<input type="radio" name="others" value="professional" > Professional </input>&nbsp;
<input type="radio" name="others" value="self_emmployed" > Self-Employed </input>&nbsp;
<input type="radio" name="others" value="retired" > Retired</input>&nbsp;
<input type="radio" name="others" value="house_wife" > House-Wife</input>&nbsp;
<input type="radio" name="others" value="student" > Student</input>&nbsp;

)</div></div>


  
    <div class="form-group">
  <label for="country" class="col-sm-1 control-label">Email</label>
  <div class="col-sm-2">
  <input type="email" id="lname" name="email"  class="form-control" required="required">
  </div>
   <label for="country"  class="col-sm-1 control-label">Father's Name</label>
   <div class="col-sm-2">
  <input type="text" id="lname" name="father_name"  class="form-control"  required="required">
  </div>
  
   <label for="country" class="col-sm-1 control-label">Mother's Name</label>
   <div class="col-sm-2">
  <input type="text " id="lname" name="mother_name" class="form-control"required="required">
  </div>


<!-- address block -->
   

 <label for="country" class="col-sm-1 control-label">Current Residence</label>
 <div class="col-sm-2">
	<select id="country" name="current_owned" class="form-control"  required="required">
  <option value="">Select Address Type</option>
      <option value="owned">Owned</option>
      <option value="rented">Rented</option>
      </select>
	  </div>
	  </div>
	  
	   <div class="form-group">
	   <label for="country" class="col-sm-1 control-label">Address</label>
	  <div class="col-sm-2">
<input type="text" id="address" name="current_address" placeholder="Address" class="form-control" required="required">
</div>
 
 <label for="lname" id="state" class="col-sm-1 control-label">State </label>
 <div class="col-sm-2">

<?php 
 $query3 = "SELECT distinct(sname) FROM city";

$result3 = mysqli_query($mysqli,$query3);

?>

<select  class="form-control"
class="chosen-select" onChange="getState1(this.value);"  
id="country-list1" required  name="current_state">

                                        

<?php

while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["sname"]; ?>">
<?php echo $rs["sname"]; ?></option>

<?php

}

?>
 </select> 
 </div>
                              
                                      
  <label for="lname"  class="col-sm-1 control-label">City </label>
   <div class="col-sm-2">

<select  class="form-control" required class="chosen-select"    id="chkveg1"  name="current_city">
</select> 
</div>




   <label for="lname"  class="col-sm-1 control-label">Landmark</label> 
    <div class="col-sm-2">
    <input type="text" id="landmark" name="current_landmark" class="form-control"required="required">
	</div>
	</div>
	
	
<div class="form-group">

   <label for="lname" class="col-sm-1 control-label">Pin no</label>
   <div class="col-sm-2">
    <input type="text" id="pin" name="current_pin" class="form-control">
	</div>
	
	
  <label for="country" class="col-sm-1 control-label">Mobile No</label>
   <div class="col-sm-2">
<input type="text" id="mobile_number" name="mobile_number" class="form-control" required="required">
</div>
 </div>
 
  <div class="form-group">
  
<label class="col-sm-5 control-label" style="padding-left: 0px; width: 415px;">Permanent Address same as Correspondense address : </label>
<div class="col-sm-2">
<input type="checkbox" name="adcheck" style="margin-top: 12px; width:20px; height: 20px;" value="1"/>
</div>
</div>


<div class="form-group">

<label for="country" class="col-sm-1 control-label"  >Permanant Residence </label>
<div class="col-sm-2">
<select id="country" name="permanent_address_owned" class="form-control" required="required">
  <option value="">Select Address Type</option>
      <option value="owned">Owned</option>
      <option value="rented">Rented</option>
 </select>
 </div>

<label for="country" class="col-sm-1 control-label"  >Address</label>
<div class="col-sm-2">
<input type="text" id="paddress" name="paddress" class="form-control" required="required">
</div>


  <label for="lname" class="col-sm-1 control-label" >State</label>
  <div class="col-sm-2">

<?php 
 $query4 = "SELECT distinct(sname) FROM city";

$result4 = mysqli_query($mysqli,$query4);

?>

<select class="form-control" class="chosen-select" onChange="getState2(this.value);"  id="country-list2" required  name="pstate">

<?php

while($rs4=mysqli_fetch_array($result4)) {

?>

<option value="<?php echo $rs4["sname"]; ?>">
<?php echo $rs4["sname"]; ?></option>

<?php

}

?>
</select> 
</div>
                                      
                                      
  <label for="lname"  class="col-sm-1 control-label">City</label>
  <div class="col-sm-2">
<select class="form-control" required    id="chkveg2"  name="pcity">
</select>
</div>
</div>

<div class="form-group">

   <label for="lname" class="col-sm-1 control-label">Landmark</label> 
   <div class="col-sm-2">
    <input type="text" id="plandmark" name="plandmark" class="form-control" required="required">
	</div>

   <label for="lname" class="col-sm-1 control-label">Pin no</label> 
   <div class="col-sm-2">
    <input type="text" id="ppin" name="ppin" class="form-control">
	</div>
</div>
  <br><br>
  			
										
  <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
Business/Profession Information</b>
</li>
</ol>
     <div class="form-group">
	 
      <label for="country" class="col-sm-1 control-label" >Name of Business</label>
	  <div class="col-sm-2">
   <input type="text" id="lname" name="name_as_certificate" class="form-control"  required="required">
   </div>
  
  
   <label for="country" class="col-sm-1 control-label">Business Type </label>
   <div class="col-sm-2">
    <select id="country" name="business_type" class="form-control" required="required">
   <option value="">Select Business Type</option>
      <option value="proprietorship">Proprietorship</option>
      <option value="partnership">Partnership</option>
      <option value="pvt_ltd_co">Pvt.Ltd.Co</option>
	  <option value="ltd_co">Ltd.Co.</option>
      <option value="llp">LLP</option>
	  <option value="others">Others</option>
        </select>
		</div>
		
     <label for="country" class="col-sm-1 control-label">Pls.Specify </label>
	  <div class="col-sm-2">
  <input type="text" id="lname" name="business_pls_specify" class="form-control" >
  </div>
  
    
   <label for="country" class="col-sm-1 control-label">Nature Of Business </label>
   <div class="col-sm-2">
   	<select id="country" name="nature_of_business" class="form-control" required="required">
  <option value="">Select Business Nature</option>
      <option value="services">Services</option>
      <option value="trading">Trading</option>
      <option value="manufacturing">Manufacturing</option></select>
	  </div>
	  </div>
	  
	       <div class="form-group">
	  
	 <label for="country" class="col-sm-1 control-label">Industry</label>
	 <div class="col-sm-2">
  <input type="text" id="lname" name="industry" class="form-control">
  </div>

  <label for="country" class="col-sm-1 control-label">Company PAN</label>
  <div class="col-sm-2">
  <input type="text" id="lname" name="company_pan" class="form-control" required="required">
  </div>
  
  <label for="country" class="col-sm-1 control-label">GSTIN </label>
  <div class="col-sm-2">
  <input type="text" id="lname" name="gstin" class="form-control"  required="required">
  </div>
   <label for="country" class="col-sm-1 control-label">Business Address </label>
    <div class="col-sm-2">
  <input type="text" id="lname" name="business_address" class="form-control" required="required">
  </div>
 
  </div>
  
   <div class="form-group">
  
 
  
  <label for="lname" class="col-sm-1 control-label">State</label>
   <div class="col-sm-2">

<?php 
 $query3 = "SELECT distinct(sname) FROM city";

$result3 = mysqli_query($mysqli,$query3);

?>

<select   class="form-control" 
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
                                      </select> </div>
                                      
                                      
  <label for="lname"  class="col-sm-1 control-label">City </label>
   <div class="col-sm-2">
<select class="form-control" 
required class="chosen-select"    id="chkveg"  name="city">
</select> </div>

   <label for="lname"  class="col-sm-1 control-label">Landmark</label> 
    <div class="col-sm-2">
    <input type="text" id="lname" name="landmark" class="form-control"  required="required">
	</div>
	<label for="lname"  class="col-sm-1 control-label">Pin no</label> 
    <div class="col-sm-2">
    <input type="text" id="lname" name="pin" class="form-control" >
	</div>
	</div>
	
	   <div class="form-group">

   

   <label for="country" class="col-sm-1 control-label">Email</label>
   <div class="col-sm-2">
  <input type="email" id="lname" name="email" class="form-control" required="required">
  </div>
     <label for="country"class="col-sm-1 control-label">Date Of Incorpration</label>
	  <div class="col-sm-2">
  <input type="date" id="lname" name="doi" class="form-control" required="required">
  </div>
  </div>
  <br><br>
  
  
     <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
TRADE REFERENCE 1</b>
</li>
</ol>
<br>

<div class="form-group">

<label for="country" class="col-sm-1 control-label">Name</label>
<div class="col-sm-2">
<input type="text" id="lname" name="tr_name" class="form-control">
</div>

  <label for="country" class="col-sm-1 control-label">Business Name</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr_entity_name" class="form-control">
</div>


    <label for="country" class="col-sm-1 control-label">Mobile No</label>
	<div class="col-sm-2">
<input type="text" id="lname" name="tr_mobile_number" class="form-control">
</div>

  <label for="country" class="col-sm-1 control-label">Relation</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr_relation" class="form-control">
	  </div>
	  </div>

<div class="form-group">


 <label for="country"  class="col-sm-1 control-label">Address</label>
 <div class="col-sm-2">
<input type="text" id="lname" name="tr_address" class="form-control" >
</div>

  <label for="country" class="col-sm-1 control-label">City</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr_city" class="form-control">
</div>


    <label for="country" class="col-sm-1 control-label">PIN</label>
	<div class="col-sm-2">
<input type="text" id="lname" name="tr_pin" class="form-control"> 
 </div>
</div>
  
       <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
TRADE REFERENCE 2</b>
</li>
</ol>
<br>

<div class="form-group">
<label for="country" class="col-sm-1 control-label">Name</label>
<div class="col-sm-2">
<input type="text" id="lname" name="tr2_name" class="form-control">
</div>

  <label for="country" class="col-sm-1 control-label">Business Name</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr2_entity_name" class="form-control">
</div>

    <label for="country" class="col-sm-1 control-label">Mobile No</label>
	  <div class="col-sm-2">
<input type="text" id="lname" name="tr2_mobile_number" class="form-control">
</div>

  <label for="country" class="col-sm-1 control-label">Relation</label>
   <div class="col-sm-2">
<input type="text" id="lname" name="tr2_relation" class="form-control">
	  </div>
	  </div>
	  
	 <div class="form-group">
	 
 <label for="country" class="col-sm-1 control-label">Address</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr2_address" class="form-control">
</div>

  <label for="country"class="col-sm-1 control-label">City</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr2_city" class="form-control">
</div>

    <label for="country" class="col-sm-1 control-label">PIN</label>
	 <div class="col-sm-2">
<input type="text" id="lname" name="tr2_pin" class="form-control"> 
</div>
</div>
  
  <br>
  
 <div class="col-sm-6 col-sm-offset-4-offset-8">
    <input type="submit" value="Submit" name="submit" style ="width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"  
>&emsp;
 <input type="reset" value="Reset" style ="width: 20%;
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

</script>
<script>
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
    }
  </script>
</body>
<script type="text/javascript">
  $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#parmanent_address').val( $('#current_address').val() );
                  $('#plandmark').val( $('#landmark').val() );
                   $('#paddress').val( $('#address').val() );
                $('#chkveg2').val( $('#chkveg1').val() );
                $('#country-list2').val( $('#country-list1').val() );
                $('#ppin').val( $('#pin').val() );
            } 
            
        });
    });
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
<script>
function getState1(val) {

  $.ajax({

  type: "POST",

  url: "getCities.php",

  data:'country_id1='+val,

  success: function(data){

    $("#chkveg1").html(data);
  }

  });

}
</script>
<script>
function getState2(val) {

  $.ajax({

  type: "POST",

  url: "getCities.php",

  data:'country_id2='+val,

  success: function(data){

    $("#chkveg2").html(data);
  }

  });

}
</script>
<script>
  function getProduct(val)
   {

  $.ajax({

  type: "POST",

  url: "getCities.php",

  data:'product_id='+val,

  success: function(data){

    $("#loan").html(data);
  }

  });

}
</script>

</html>