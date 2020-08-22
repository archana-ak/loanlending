<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if(isset($_POST['submit']))
{
$bank_name =$_POST['Bank_name'];
$type_of_loan =$_POST['type_of_loan'];
$purpose_of_loan =$_POST['purpose_loan'];
$date =$_POST['date'];
$req_loan_amt =$_POST['loan_amount'];
$req_tenure =$_POST['requested_tenure'];
$channel_name =$_POST['channel_name'];
$channel_code =$_POST['channel_code'];
$executive_name =$_POST['executive_name'];
$executive_code =$_POST['executive_code'];
$name_of_entity =$_POST['name_as_certificate'];
$bussiness_type =$_POST['business_type'];
$bussiness_pls_specify =$_POST['business_pls_specify'];
$nature_of_bussniess =$_POST['nature_of_business'];
$industry =$_POST['industry'];
$comp_pan =$_POST['company_pan'];
$gstin =$_POST['gstin'];
$mobile_no =$_POST['Mobile'];
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

$query=mysqli_query($mysqli,"insert into loan(bank_name ,type_of_loan,purpose_of_loan ,date,req_loan_amt,req_tenure ,channel_name,channel_code,executive_name,
executive_code,name_of_entity ,bussiness_type,bussiness_pls_specify,nature_of_bussniess,industry,comp_pan,gstin,mobile_no,business_address,landmark,pin ,city,
state,email,date_of_incorpration,co_name,co_category,co_if_comp,co_comp_pls_specify,co_title,co_gender  ,co_ckyc  ,co_pan ,co_dob,co_doa,co_maritial_status,
co_dependents,co_edu_level,co_edu_pls_specify ,co_occupation,co_occupation_service,co_occupation_other ,co_email,co_father,co_mother,co_current_owned ,
co_current_address,co_current_landmark ,co_current_state,co_current_city ,co_current_pin ,co_mobile  ,co_permanent_owned ,co_permanent_address,co_permanent_landmark,
co_permanent_state,co_permanent_city ,co_permanent_pin,tr_name,tr_entity_name,tr_mobile,tr_relation,tr_address,tr_city,tr_pin,tr2_name ,tr2_entity_name,tr2_mobile,
tr2_relation,tr2_address,tr2_city ,tr2_pin) 

values('$bank_name','$type_of_loan','$purpose_of_loan ','$date','$req_loan_amt ','$req_tenure ','$channel_name ','$channel_code ','$executive_name ',
'$executive_code','$name_of_entity','$bussiness_type','$bussiness_pls_specify','$nature_of_bussniess','$industry ','$comp_pan ','$gstin','$mobile_no',
'$business_address','$landmark ','$pin ','$city','$state','$email ','$date_of_incorpration ','$co_name','$co_category ',
'$co_if_comp','$co_comp_pls_specify','$co_title ','$co_gender','$co_ckyc ','$co_pan ','$co_dob ','$co_doa ','$co_maritial_status',
'$co_dependents','$co_edu_level','$co_edu_pls_specify','$co_occupation','$co_occupation_service','$co_occupation_other','$co_email','$co_father','$co_mother',
'$co_current_owned','$co_current_address ','$co_current_landmark ','$co_current_state','$co_current_city','$co_current_pin','$co_mobile','$co_permanent_owned','$co_permanent_address ',
'$co_permanent_landmark ','$co_permanent_state','$co_permanent_city','$co_permanent_pin','$tr_name','$tr_entity_name ','$tr_mobile','$tr_relation','$tr_address ',
'$tr_city ','$tr_pin ','$tr2_name','$tr2_entity_name','$tr2_mobile','$tr2_relation','$tr2_address','$tr2_city','$tr2_pin'
)");
if(!$query)
{
	die('invalid query'.mysql_error());
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
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Loan Lender </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Loan Lender</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												 <label for="fname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;" >Bank Name :-</label>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
    <input type="text" id="fname" name="Bank_name" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">&nbsp;&nbsp;&nbsp;

    <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Type of Loan :-</label>
	  <select id="country" name="type_of_loan" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select loan type</option>
      <option value="loan_against_property">Loan Against Property </option>
      <option value="business_loan">Business Loan</option>
        </select>
	 <br>
  
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Purpose of Loan :-</label>&emsp;&emsp;&emsp;&nbsp;
    <input type="text" id="lname" name="purpose_loan" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  &nbsp;&nbsp;
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Date :-</label>
    <input type="date" id="lname" name="date" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required"><br>
  
    <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Requested Loan Amount:-</label>&nbsp;&nbsp;&nbsp;
    <input type="text" id="lname" name="loan_amount" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
   <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Requested Tenure  :-</label>
  <input type="text" id="lname" name="requested_tenure" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  
  <br>
  
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Channel Name :-</label>&emsp;&emsp;&emsp;&emsp;
    <input type="text" id="lname" name="channel_name" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  &nbsp;&nbsp;&nbsp;
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Channel Code :-</label>&emsp;&nbsp;&nbsp;
    <input type="text" id="lname" name="channel_code" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  
  <br>
   

    <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Executive Name :-</label>&emsp;&emsp;&emsp;&nbsp;&nbsp;
   <input type="text" id="lname" name="executive_name" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">&emsp;
  
  
    <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Executive Code :-</label>
   <input type="text" id="lname" name="executive_code" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">&emsp;
  
  <br>
  <br>
  <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
MAIN APPLICANT (NON INDIVIDUAL)</b>
</li>
</ol>
  
      <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Name of Entity (as per certificate of registration) :-</label>
   <input type="text" id="lname" name="name_as_certificate" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">&emsp;
  
  
   <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Business Type :-</label>
    <select id="country" name="business_type" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
   <option value="">Select business type</option>
      <option value="proprietorship">Proprietorship</option>
      <option value="partnership">Partnership</option>
      <option value="pvt_ltd_co">Pvt.Ltd.Co</option>
	  <option value="ltd_co">Ltd.Co.</option>
      <option value="llp">LLP</option>
	  <option value="others">Others</option>
        </select>
     <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Pls.Specify :-</label>&nbsp;
  <input type="text" id="lname" name="business_pls_specify" style="width:12%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
     <br>
   <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Nature Of Business :-</label>
   	<select id="country" name="nature_of_business" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  
  <option value="">Select business nature</option>
      <option value="services">Services</option>
      <option value="trading">Trading</option>
      <option value="manufacturing">Manufacturing</option></select>
	 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Industry :-</label>&nbsp;
  <input type="text" id="lname" name="industry" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">

  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Company PAN :-</label>&nbsp;
  <input type="text" id="lname" name="company_pan" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">GSTIN :-</label>&nbsp;
  <input type="text" id="lname" name="gstin" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required"><br>
   <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mobile Number :-</label>&nbsp;
  <input type="text" id="lname" name="Mobile" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Business Address :-</label>&nbsp;
  <input type="text" id="lname" name="business_address" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
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
                                      
                                      
  <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">City :-</label>&emsp;
<select  style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" 
required class="chosen-select"    id="chkveg"  name="city">

                                        

                                        

</select> <br>
   <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Landmark:-</label> &emsp;&nbsp;&nbsp;
    <input type="text" id="lname" name="landmark" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">

   <label for="lname"  Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Pin no:-</label> &emsp;&nbsp;&nbsp;
    <input type="text" id="lname" name="pin" style="width:5%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">

   <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Email:-</label>&nbsp;
  <input type="email" id="lname" name="email" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
     <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Date Of Incorpration:-</label>&nbsp;
  <input type="date" id="lname" name="doi" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <br><br>
   <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
CO-APPLICANT 1</b>
</li>
</ol>
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Name as on PAN Card :-</label>
   <input type="text" id="lname" name="name_as_pan" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">&emsp;
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Category:-</label>
    	<select id="country" name="category" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select category</option>
      <option value="proprietor">Proprietor</option>
      <option value="partner">Partner</option>
      <option value="director">Director</option>
	     <option value="company">Company</option>
	  
	  </select>
	 
	 
	 
	 
	 
	 

 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">If Company then :-</label>
   	<select id="country" name="if_company_then" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select company type</option>
      <option value="properietorship">Proprietorship</option>
      <option value="partnership">Partnership</option>
      <option value="pvt_ltd_co">Pvt.Ltd.Co</option>
	     <option value="ltd_co">Ltd.Co.</option>
		  <option value="llp">LLP</option>
	     <option value="others">Others</option>
	  
	  </select>
  
  
  
  
  
  
     <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Pls.Specify :-</label>&nbsp;
  <input type="text" id="lname" name="co_comp_pls_specify" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
<br>
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Title:-</label>
   	  	<select id="country" name="title" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select title</option>
      <option value="mr">Mr.</option>
      <option value="ms">Ms.</option>
      <option value="others">Others</option>
	  
	  </select>
	 
	 
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Gender:-</label>

	 
	   	<select id="country" name="gender" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="transgender">Transgender</option>
	 
	  
	  </select>
	 
	 
	 
	 
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">C-KYC No:-</label>&nbsp;
  <input type="text" id="lname" name="ckyc_no" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
 
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">PAN :-</label>&nbsp;
  <input type="text" id="lname" name="pan" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Date Of Birth:-</label>&nbsp;
  <input type="date" id="lname" name="dob" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Date Of Anniversary:-</label>&nbsp;
  <input type="date" id="lname" name="doa" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">

 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Maritial Status:-</label>
   	
	 
	   	<select id="country" name="maritial_status" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select status</option>
      <option value="single">Single</option>
      <option value="married">Married</option>
      <option value="others">others</option>
	  </select>
	 
	 
	 
	 
	 
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Dependents No:-</label>
   	
  
    	<select id="country" name="dependents_no" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select dependent</option>
      <option value="child">Child</option>
      <option value="adult">Adult</option>
	  </select>
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Education Level :-</label>
   	<select id="country" name="Education_level" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select education level</option>
      <option value="undergraduate">Undergraduate</option>
      <option value="graduate">Graduate</option>
      <option value="post_graduate">Post Graduate</option>
	     <option value="any_other">Any Other</option>
	  
	  </select>
  
  
  
  
  
  
  
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Pls.Specify :-</label>&nbsp;
  <input type="text" id="lname" name="edu_pls_specify" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
   <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Occupation Type :-</label>&nbsp;
<input type="radio" name="occupation_type" value="occupation_type" ><b> Occupation Type</b></input>&nbsp;(
<input type="radio" name="services" value="pvt_sector" > Pvt.Sector</input>&nbsp;
<input type="radio" name="services" value="public_sector" > Public Sector</input>&nbsp;
<input type="radio" name="services" value="govt_sector" > Govt Sector</input>&nbsp;)
&emsp;&emsp;<input type="radio" name="occupation_type" value="occupation_type" ><b> Business</b></input>&nbsp;
<input type="radio" name="occupation_type" value="occupation_type" ><b> X-Not Categorized</b></input>&nbsp;<br>&nbsp;&nbsp;&nbsp;
<input type="radio" name="occupation_type" value="others" ><b> Others</b></input>&nbsp;(
<input type="radio" name="others" value="professional" > Professional </input>&nbsp;
<input type="radio" name="others" value="self_emmployed" > Self-Employed </input>&nbsp;
<input type="radio" name="others" value="retired" > Retired</input>&nbsp;
<input type="radio" name="others" value="house_wife" > House-Wife</input>&nbsp;
<input type="radio" name="others" value="student" > Student</input>&nbsp;

)

 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Email:-</label>&nbsp;
  <input type="email" id="lname" name="email" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
   <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Father's Name:-</label>&nbsp;
  <input type="text" id="lname" name="father_name" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
   <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mother's Name:-</label>&nbsp;
  <input type="text " id="lname" name="mother_name" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">


<!-- address block -->
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Current Residence Address:-</label>&nbsp;
	<select id="country" name="current_owned" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select address type</option>
      <option value="owned">Owned</option>
      <option value="rented">Rented</option>
      </select>
<input type="text" id="address" name="current_address" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Landmark:-</label>&nbsp; 
<input type="text" id="landmark" name="current_landmark" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <br>
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">State:-</label>&nbsp; 
<input type="text" id="state" name="current_state" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">City:-</label>&nbsp; 
<input type="text" id="city" name="current_city" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">PIN:-</label>&nbsp; 
<input type="text" id="pin" name="current_pin" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mobile Number :-</label>&nbsp; 
<input type="text" id="mobile_number" name="mobile_number" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <br>

<label class="col-sm-5 control-label">Permanent Address same as Correspondense address : </label>
<div class="col-sm-4">
<input type="checkbox" name="adcheck" value="1"/>
</div>
</div>
<label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Permanant Residence Address:-</label>&nbsp;


	<select id="country" name="permanent_address_owned" style="width:8%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select address type</option>
      <option value="owned">Owned</option>
      <option value="rented">Rented</option>
     
	  
	  </select>




<input type="text" id="paddress" name="paddress" style="width:20%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Landmark:-</label>&nbsp; 
<input type="text" id="plandmark" name="plandmark" style="width:15%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">State:-</label>&nbsp; 
<input type="text" id="pstate" name="pstate" style="width:12%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">City:-</label>&nbsp; 
<input type="text" id="pcity" name="pcity" style="width:12%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">PIN:-</label>&nbsp; 
<input type="text" id="ppin" name="ppin" style="width:12%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <br><br>
  
     <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
TRADE REFERENCE 1</b>
</li>
</ol>
<br>
<label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Name:-</label>&nbsp;
<input type="text" id="lname" name="tr_name" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Entity Name:-</label>&nbsp;
<input type="text" id="lname" name="tr_entity_name" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
    <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mobile Number:-</label>&nbsp;
<input type="text" id="lname" name="tr_mobile_number" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;"><br>
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Relation:-</label>&nbsp;



	<select id="country" name="tr_relation" style="width:8%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select relation</option>
      <option value="customer">Customer</option>
      <option value="supplier">Supplier</option>
     
	  
	  </select>



 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Address:-</label>&nbsp;
<input type="text" id="lname" name="tr_address" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">City:-</label>&nbsp;
<input type="text" id="lname" name="tr_city" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
    <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">PIN:-</label>&nbsp;
<input type="text" id="lname" name="tr_pin" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;"> 
  
       <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
TRADE REFERENCE 2</b>
</li>
</ol>
<br>
<label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Name:-</label>&nbsp;
<input type="text" id="lname" name="tr2_name" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Entity Name:-</label>&nbsp;
<input type="text" id="lname" name="tr2_entity_name" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
    <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Mobile Number:-</label>&nbsp;
<input type="text" id="lname" name="tr2_mobile_number" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;"><br>
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Relation:-</label>&nbsp;
<select id="country" name="tr2_relation" style="width:8%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">
  <option value="">Select relation</option>
      <option value="customer">Customer</option>
      <option value="supplier">Supplier</option>
 <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">Address:-</label>&nbsp;
<input type="text" id="lname" name="tr2_address" style="width:18%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
  <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">City:-</label>&nbsp;
<input type="text" id="lname" name="tr2_city" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;">
    <label for="country" Style =" border-radius: 5px; padding: 20px; font-family:Helvetica, sans-serif;">PIN:-</label>&nbsp;
<input type="text" id="lname" name="tr2_pin" style="width:10%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;"> 
  
  
  
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
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
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

</html>