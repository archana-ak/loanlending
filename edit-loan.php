<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
/*$bank_name=$_POST['Bank_name'];
$type_of_loan=$_POST['type_of_loan'];
$purpose_of_loan=$_POST['purpose_loan'];
$date =$_POST['date'];
$req_loan_amt=$_POST['loan_amount'];
$req_tenure=$_POST['requested_tenure'];
$channel_name=$_POST['channel_name'];
$channel_code=$_POST['channel_code'];
$executive_name=$_POST['executive_name'];
$executive_code=$_POST['executive_code'];*/
$name_of_entity=$_POST['name_as_certificate'];
$bussiness_type=$_POST['business_type'];
$bussiness_pls_specify=$_POST['business_pls_specify'];
$nature_of_bussniess=$_POST['nature_of_business'];
$industry=$_POST['industry'];
$comp_pan=$_POST['company_pan'];
$gstin=$_POST['gstin'];
//$mobile_no=$_POST['Mobile'];
$business_address=$_POST['business_address'];
$landmark=$_POST['landmark'];
$pin=$_POST['pin'];
$city=$_POST['city'];
$state=$_POST['state'];
$email=$_POST['email'];
$date_of_incorpration=$_POST['doi'];
$co_name=$_POST['name_as_pan'];
$co_category=$_POST['category'];
$co_if_comp=$_POST['if_company_then'];
$co_comp_pls_specify=$_POST['co_comp_pls_specify'];
$co_title=$_POST['title'];
$co_gender=$_POST['gender'];
$co_ckyc=$_POST['ckyc_no'];
$co_pan=$_POST['pan'];
$co_dob=$_POST['dob'];
$co_doa=$_POST['doa'];
$co_maritial_status=$_POST['maritial_status'];
$co_dependents=$_POST['dependents_no'];
$co_edu_level=$_POST['Education_level'];
$co_edu_pls_specify=$_POST['edu_pls_specify'];
$co_occupation=$_POST ['occupation_type'];
$co_occupation_service=$_POST ['services']; 
$co_occupation_other=$_POST ['others'];
$co_email=$_POST['email'];
$co_father=$_POST['father_name'];
$co_mother=$_POST['mother_name'];
$co_current_owned=$_POST['current_owned'];
$co_current_address=$_POST['current_address'];
$co_current_landmark=$_POST['current_landmark'];
$co_current_state=$_POST['current_state'];
$co_current_city=$_POST['current_city'];
$co_current_pin=$_POST['current_pin'];
$co_mobile=$_POST['mobile_number'];
$co_permanent_owned=$_POST['permanent_address_owned'];
$co_permanent_address=$_POST['paddress'];
$co_permanent_landmark=$_POST['plandmark'];
$co_permanent_state=$_POST['pstate'];
$co_permanent_city=$_POST['pcity'];
$co_permanent_pin=$_POST['ppin'];
$tr_name=$_POST['tr_name'];
$tr_entity_name=$_POST['tr_entity_name'];
$tr_mobile=$_POST['tr_mobile_number'];
$tr_relation=$_POST['tr_relation'];
$tr_address=$_POST['tr_address'];
$tr_city=$_POST['tr_city'];
$tr_pin=$_POST['tr_pin'];
$tr2_name=$_POST['tr2_name'];
$tr2_entity_name=$_POST['tr2_entity_name'];
$tr2_mobile=$_POST['tr2_mobile_number'];
$tr2_relation=$_POST['tr2_relation'];
$tr2_address=$_POST['tr2_address'];
$tr2_city=$_POST['tr2_city'];
$tr2_pin=$_POST['tr2_pin'];
$id=$_GET['id'];

$query=mysqli_query($mysqli,"Update loan set name_of_entity='$name_of_entity',bussiness_type='$bussiness_type',bussiness_pls_specify='$bussiness_pls_specify',nature_of_bussniess='$nature_of_bussniess',industry='$industry',comp_pan='$comp_pan',
gstin='$gstin',business_address='$business_address',landmark='$landmark',pin='$pin',city='$city',state='$state',email='$email',
date_of_incorpration='$date_of_incorpration',co_name='$co_name',co_category='$co_category',co_if_comp='$co_if_comp',co_comp_pls_specify='$co_comp_pls_specify',co_title='$co_title',co_gender='$co_gender',co_ckyc='$co_ckyc',
co_pan ='$co_pan',co_dob='$co_dob',co_doa='$co_doa',co_maritial_status ='$co_maritial_status',co_dependents='$co_dependents',co_edu_level='$co_edu_level',co_edu_pls_specify='$co_edu_pls_specify',co_occupation='$co_occupation',
co_occupation_service='$co_occupation_service',co_occupation_other='$co_occupation_other',co_email='$co_email',co_father='$co_father',co_mother='$co_mother',co_current_owned='$co_current_owned',co_current_address='$co_current_address',co_current_landmark='$co_current_landmark',
co_current_state='$co_current_state',co_current_city='$co_current_city',co_current_pin='$co_current_pin',co_mobile='$co_mobile',co_permanent_owned='$co_permanent_owned',co_permanent_address='$co_permanent_address',co_permanent_landmark='$co_permanent_landmark',co_permanent_state='$co_permanent_state',
co_permanent_city='$co_permanent_city',co_permanent_pin='$co_permanent_pin',tr_name='$tr_name',tr_entity_name='$tr_entity_name',tr_mobile='$tr_mobile',tr_relation='$tr_relation',tr_address='$tr_address',tr_city='$tr_city',
tr_pin='$tr_pin',tr2_name='$tr2_name',tr2_entity_name='$tr2_entity_name',tr2_mobile='$tr2_mobile',tr2_relation='$tr2_relation',tr2_address='$tr2_address',tr2_city='$tr2_city',tr2_pin='$tr2_pin' where id='$id'");
if(!$query)
{
	die('invalid query'.mysqli_error($mysqli));
	//echo "<script>alert('customer has been added successfully');</script>";
}
else
{
  echo "<script>alert('Loan Application has been Updated successfully');</script>";
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
	<title>Edit Loan Application</title>
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
						<h2 class="page-title">Edit Customer Information </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
								<div class="panel-heading">Edit Customer Information Sheet</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];
	$ret="select * from loan where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
						

<ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
INDIVIDUAL INFORMATION</b>
</li>
</ol>

  <div class="form-group">
  


  <label for="country" class="col-sm-1 control-label">Name as on PAN Card</label>
  <div class="col-sm-2">
   <input type="text" id="lname" name="name_as_pan" value="<?php echo $row->co_name;?>" class="form-control" required="required">
   </div>
   
 <label for="country" class="col-sm-1 control-label">Category</label>
 <div class="col-sm-2">
   
	<input type="text" id="lname" name="co_category" value="<?php echo $row->co_category;?>" class="form-control" required="required">  
	  
	  
	  </div>

 <label for="country"  class="col-sm-1 control-label">If Company then</label>
 <div class="col-sm-2">
   	<select id="country" name="if_company_then" class="form-control" required="required">
  <option value="">Select company type</option>
      <option value="properietorship"<?php if($row->co_if_comp=="properietorship")echo "selected"; ?>>Proprietorship</option>
      <option value="partnership"<?php if($row->co_if_comp=="partnership")echo "selected"; ?>>Partnership</option>
      <option value="pvt_ltd_co"<?php if($row->co_if_comp=="pvt_ltd_co")echo "selected"; ?>>Pvt.Ltd.Co</option>
	     <option value="ltd_co"<?php if($row->co_if_comp=="ltd_co")echo "selected"; ?>>Ltd.Co.</option>
		  <option value="llp"<?php if($row->co_if_comp=="llp")echo "selected"; ?>>LLP</option>
	     <option value="others"<?php if($row->co_if_comp=="others")echo "selected"; ?>>Others</option>
	  
	  </select>
	  </div>
  
     <label for="country"  class="col-sm-1 control-label">Pls.Specify </label>
	  <div class="col-sm-2">
  <input type="text" id="lname" name="co_comp_pls_specify" value="<?php echo $row->co_comp_pls_specify;?>" class="form-control" >
  </div>
  </div>
  
   <div class="form-group">
  

 <label for="country"  class="col-sm-1 control-label">Title</label>
  <div class="col-sm-2">
   
	  
	  
	  	<input type="text" id="lname" name="title" value="<?php echo $row->co_title;?>" class="form-control" required="required"> 
	  
	  
	  
	  </div>
	 
	 
 <label for="country" class="col-sm-1 control-label" >Gender</label>
<div class="col-sm-2">
	 
	   	<select id="country" name="gender"  class="form-control" required="required">
  <option value="">Select gender</option>
      <option value="male"<?php if($row->co_gender=="male")echo "selected"; ?>>Male</option>
      <option value="female"<?php if($row->co_gender=="female")echo "selected"; ?>>Female</option>
      <option value="transgender"<?php if($row->co_gender=="transgender")echo "selected"; ?>>Transgender</option>
	 
	  
	  </select>
	  
	   
	  
	 </div>
	 
	 
	 
 <label for="country" class="col-sm-1 control-label">C-KYC No</label>
 <div class="col-sm-2">
  <input type="text" id="lname" name="ckyc_no" value="<?php echo $row->co_ckyc;?>" class="form-control" required="required">
  </div>
 
  <label for="country" class="col-sm-1 control-label">PAN</label>
   <div class="col-sm-2">
  <input type="text" id="lname" name="pan" value="<?php echo $row->co_pan;?>" class="form-control" required="required">
  </div>
  </div>
  
  <div class="form-group">
  
  
 <label for="country" class="col-sm-1 control-label">Date Of Birth</label>
  <div class="col-sm-2">
  <input type="date" id="lname" name="dob" value="<?php echo $row->co_dob;?>" class="form-control" required="required">
  </div>
  
  
 <label for="country" class="col-sm-1 control-label" >Date Of Anniversary</label>
 <div class="col-sm-2">
  <input type="date" id="lname" name="doa" value="<?php echo $row->co_doa;?>"  class="form-control" required="required">
  </div>

 <label for="country" class="col-sm-1 control-label">Maritial Status</label>
  <div class="col-sm-2">
   	
	 
	   	<select id="country" name="maritial_status"  class="form-control"  required="required">
  <option value="">Select status</option>
      <option value="single"<?php if($row->co_maritial_status=="single")echo "selected"; ?>>Single</option>
      <option value="married"<?php if($row->co_maritial_status=="married")echo "selected"; ?>>Married</option>
      <option value="others"<?php if($row->co_maritial_status=="others")echo "selected"; ?>>others</option>
	  </select>
	  </div>
	 
<label for="country" class="col-sm-1 control-label">Dependents No</label>
  <div class="col-sm-2">
   	
  
 
	   <input type="text" id="lname" name="dependents_no" value="<?php echo $row->co_dependents;?>" class="form-control" required="required">
	  
	  
	  </div>
	  </div>
	  
	    <div class="form-group">
  
	  
	  
 <label for="country" class="col-sm-1 control-label">Education Level</label>
   <div class="col-sm-2">
   	
   	<select id="country" name="Education_level" class="form-control"  required="required">
  <option value="">Select education level</option>
      <option value="undergraduate"<?php if($row->co_edu_level=="undergraduate")echo "selected"; ?>>Undergraduate</option>
      <option value="graduate"<?php if($row->co_edu_level=="graduate")echo "selected"; ?>>Graduate</option>
      <option value="post_graduate"<?php if($row->co_edu_level=="post_graduate")echo "selected"; ?>>Post Graduate</option>
	     <option value="any_other"<?php if($row->co_edu_level=="any_other")echo "selected"; ?>>Any Other</option>
	  
	  </select>
	  </div>
 
 <label for="country" class="col-sm-1 control-label">Pls.Specify </label>
  <div class="col-sm-2">
  <input type="text" id="lname" name="edu_pls_specify" value="<?php echo $row->co_edu_pls_specify ;?>"  class="form-control">
  </div>

   <label for="country" class="col-sm-1 control-label">Occupation Type </label>
   <div class="col-sm-5">
<input type="radio" name="occupation_type"  value="occupation_type"<?php if($row->co_occupation=="occupation_type") echo "checked";?> ><b> Occupation Type</b></input>(
<input type="radio" name="services" value="<?php echo $row->co_occupation_service;?>" value="pvt_sector"<?php if($row->co_occupation_service=="pvt_sector") echo"checked"; ?> > Pvt.Sector</input>
<input type="radio" name="services" value="public_sector"<?php if($row->co_occupation_service=="public_sector") echo "checked";?> > Public Sector</input>
<input type="radio" name="services" value="govt_sector"<?php if($row->co_occupation_service=="govt_sector") echo "checked";?> > Govt Sector</input>)



<input type="radio" name="occupation_type" value="business"<?php if($row->co_occupation=="business") echo "checked";?> ><b> Business</b></input>


<input type="radio" name="occupation_type" value="notcategoried"<?php if($row->co_occupation=="notcategoried") echo "checked";?> ><b> X-Not Categorized</b></input>&nbsp;


<input type="radio" name="occupation_type" value="others"<?php if($row->co_occupation=="others") echo "checked";?> ><b> Others</b></input>&nbsp;(
<input type="radio" name="others"  value="professional"<?php if($row->co_occupation_other=="professional") echo "checked";?> > Professional </input>&nbsp;
<input type="radio" name="others" value="self_emmployed"<?php if($row->co_occupation_other=="self_emmployed") echo "checked";?> > Self-Employed </input>&nbsp;
<input type="radio" name="others" value="retired"<?php if($row->co_occupation_other=="retired") echo "checked";?> > Retired</input>&nbsp;
<input type="radio" name="others" value="house_wife"<?php if($row->co_occupation_other=="house_wife") echo "checked";?> > House-Wife</input>&nbsp;
<input type="radio" name="others" value="student"<?php if($row->co_occupation_other=="student") echo "checked";?> > Student</input>&nbsp;

)
</div></div>

  <div class="form-group">
  
 <label for="country"  class="col-sm-1 control-label">Email</label>
 <div class="col-sm-2">
  <input type="email" id="lname" name="email" value="<?php echo $row->co_email;?>"  class="form-control" required="required">
  </div>
    
  

  
  
   <label for="country" class="col-sm-1 control-label" >Father's Name</label>
    <div class="col-sm-2">
  <input type="text" id="lname" name="father_name" value="<?php echo $row->co_father;?>"  class="form-control"  required="required">
  </div>

  
  
   <label for="country" class="col-sm-1 control-label">Mother's Name</label>
    <div class="col-sm-2">
  <input type="text " id="lname" name="mother_name" value="<?php echo $row->co_mother;?>" class="form-control" required="required">
  </div>


<!-- address block -->
 <label for="country" class="col-sm-1 control-label">Current Residence </label>
  <div class="col-sm-2">
	<select id="country" name="current_owned"  class="form-control" required="required">
  <option value="">Select address type</option>
      <option value="owned"<?php if($row->co_current_owned=="owned")echo "selected"; ?>>Owned</option>
      <option value="rented"<?php if($row->co_current_owned=="rented")echo "selected"; ?>>Rented</option>
      </select>
	  </div>
	  </div>
	 
	  <div class="form-group">
	  
	   <label for="country" class="col-sm-1 control-label">Address </label>
  <div class="col-sm-2">
	  
<input type="text" id="address" name="current_address" value="<?php echo $row->co_current_address;?>"  class="form-control" required="required">
</div>


  


  <label for="country" class="col-sm-1 control-label">Landmark</label>
    <div class="col-sm-2">
<input type="text" id="landmark" name="current_landmark" value="<?php echo $row->co_current_landmark;?>" class="form-control" required="required">
</div>


  <label for="country" class="col-sm-1 control-label" >State</label>
    <div class="col-sm-2">
<input type="text" id="state" name="current_state" value="<?php echo $row->co_current_state;?>" class="form-control" required="required"> 
</div>


 <label for="country" class="col-sm-1 control-label" >City</label>
     <div class="col-sm-2">
<input type="text" id="city" name="current_city" value="<?php echo $row->co_current_city;?>" class="form-control" required="required"> 
</div>

</div>
<div class="form-group">

 <label for="country" class="col-sm-1 control-label" >PIN</label>
  <div class="col-sm-2">
<input type="text" id="pin" name="current_pin" value="<?php echo $row->co_current_pin;?>" class="form-control"required="required">
</div>





  <label for="country" class="col-sm-1 control-label">Mobile No</label>
  <div class="col-sm-2">
<input type="text" id="mobile_number" name="mobile_number" value="<?php echo $row->co_mobile;?>" class="form-control" required="required">
</div>
 </div>
 <div class="form-group">
<label class="col-sm-5 control-label" style="padding-left: 0px; width: 415px;">Permanent Address same as Correspondense address : </label>
<div class="col-sm-2"  style="margin-top: 12px; width:20px; height: 20px;" >
<input type="checkbox" name="adcheck" value="1"/>
</div>
</div>

<div class="form-group">

<label for="country"  class="col-sm-1 control-label">Permanant Residence </label>
  <div class="col-sm-2">
<select id="country" name="permanent_address_owned"  class="form-control" required="required">
  <option value="">Select address type</option>
      <option value="owned"<?php if($row->co_permanent_owned=="owned")echo "selected"; ?>>Owned</option>
      <option value="rented"<?php if($row->co_permanent_owned=="rented")echo "selected"; ?>>Rented</option>
  </select>
	  </div>


<label for="country"  class="col-sm-1 control-label">Address </label>
  <div class="col-sm-2">

<input type="text" id="paddress" name="paddress" value="<?php echo $row->co_permanent_address;?>" class="form-control"required="required">
</div>



  <label for="country" class="col-sm-1 control-label">Landmark</label>
    <div class="col-sm-2">
<input type="text" id="plandmark" name="plandmark" value="<?php echo $row->co_permanent_landmark;?>" class="form-control" required="required">
</div>

  
  <label for="country" class="col-sm-1 control-label" >State</label>
  <div class="col-sm-2">
<input type="text" id="pstate" name="pstate" value="<?php echo $row->co_permanent_state;?>" class="form-control" required="required">
</div>
</div>

<div class="form-group">

  <label for="country" class="col-sm-1 control-label">City</label>
    <div class="col-sm-2">
<input type="text" id="pcity" name="pcity" value="<?php echo $row->co_permanent_city;?>" class="form-control"required="required"> 
</div>

 <label for="country" class="col-sm-1 control-label" >PIN</label>
     <div class="col-sm-2">
<input type="text" id="ppin" name="ppin" value="<?php echo $row->co_permanent_pin;?>" class="form-control" required="required">
</div>
</div>
  <br><br>


  <ol class ="breadcrumb mb-4">
<li class="breadcrumb-item"><b>
 Business/Profession Information</b>
</li>
</ol>

  	<div class="form-group">
  
      <label for="country" class="col-sm-1 control-label" >Name of Business </label>
	  <div class="col-sm-2">
   <input type="text" id="lname" name="name_as_certificate" value="<?php echo $row->name_of_entity;?>" class="form-control"required="required">
   </div>
  
  
   <label for="country" class="col-sm-1 control-label">Business Type</label>
   <div class="col-sm-2">
    <select id="country" name="business_type"   class="form-control" required="required">
   <option value="">Select business type</option>
      <option value="proprietorship"<?php if($row->bussiness_type=="proprietorship")echo "selected"; ?>>Proprietorship</option>
      <option value="partnership"<?php if($row->bussiness_type=="partnership")echo "selected"; ?>>Partnership</option>
      <option value="pvt_ltd_co"<?php if($row->bussiness_type=="pvt_ltd_co")echo "selected"; ?>>Pvt.Ltd.Co</option>
	  <option value="ltd_co"<?php if($row->bussiness_type=="ltd_co")echo "selected"; ?>>Ltd.Co.</option>
      <option value="llp"<?php if($row->bussiness_type=="llp")echo "selected"; ?>>LLP</option>
	  <option value="others"<?php if($row->bussiness_type=="others")echo "selected"; ?>>Others</option>
        </select>
		</div>
		
		
		
		
     <label for="country" class="col-sm-1 control-label">Pls.Specify</label>
	  <div class="col-sm-2">
  <input type="text" id="lname" name="business_pls_specify" value="<?php echo $row->bussiness_pls_specify;?>"class="form-control">
  </div>
  
  
 
   <label for="country" class="col-sm-1 control-label">Nature Of Business</label>
    <div class="col-sm-2">
   	<select id="country" name="nature_of_business"  class="form-control" required="required">
  
  <option value="">Select business nature</option>
      <option value="services"<?php if($row->nature_of_bussniess=="services")echo "selected"; ?>>Services</option>
      <option value="trading"<?php if($row->nature_of_bussniess=="trading")echo "selected"; ?>>Trading</option>
      <option value="manufacturing"<?php if($row->nature_of_bussniess=="manufacturing")echo "selected"; ?>>Manufacturing</option>
	  </select>
	  </div>
	  </div>
	  
	    	<div class="form-group">
	  
	  
	 <label for="country" class="col-sm-1 control-label">Industry </label>
	  <div class="col-sm-2">
  <input type="text" id="lname" name="industry" value="<?php echo $row->industry ;?>" class="form-control" >
  </div>
  

  <label for="country" class="col-sm-1 control-label">Company PAN </label>
   <div class="col-sm-2">
  <input type="text" id="lname" name="company_pan" value="<?php echo $row->comp_pan;?>" class="form-control" required="required">
  </div>
  
  
  <label for="country" class="col-sm-1 control-label" >GSTIN </label>
   <div class="col-sm-2">
  <input type="text" id="lname" name="gstin" value="<?php echo $row->gstin;?>" class="form-control" required="required">
  </div>
  
 
  <label for="country" class="col-sm-1 control-label">Business Address</label>
  <div class="col-sm-2">
  <input type="text" id="lname" name="business_address" value="<?php echo $row->business_address;?>" class="form-control" required="required">
  </div>
   
  </div>
  
  	    	<div class="form-group">
  
 
  
  
  <label for="country" class="col-sm-1 control-label">Landmark</label>
  <div class="col-sm-2">
  <input type="text" id="lname" name="landmark" value="<?php echo $row->landmark;?>" class="form-control" required="required">
  </div>
  
   <label for="country" class="col-sm-1 control-label">PIN</label>
    <div class="col-sm-2">
  <input type="text" id="lname" name="pin"  value="<?php echo $row->pin;?>" class="form-control" required="required">
  </div>
  
 
  <label for="country" class="col-sm-1 control-label">City </label>
   <div class="col-sm-2">
  <input type="text" id="lname" name="city" value="<?php echo $row->city;?>" class="form-control" required="required">
  </div>
    <label for="country"  class="col-sm-1 control-label">State </label>
 <div class="col-sm-2">
  <input type="text" id="lname" name="state" value="<?php echo $row->state;?>" class="form-control" required="required">
  </div>
  
  </div>
  
  <div class="form-group">
  
  

   <label for="country" class="col-sm-1 control-label">Email</label>
   <div class="col-sm-2">
  <input type="email" id="lname" name="email"  value="<?php echo $row->email;?>" class="form-control" required="required">
  </div>
  
     <label for="country"  class="col-sm-1 control-label">Date Of Incorpration</label>
	  <div class="col-sm-2">
  <input type="date" id="lname" name="doi" value="<?php echo $row->date_of_incorpration;?>" class="form-control" required="required">
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
<input type="text" id="lname" name="tr_name" value="<?php echo $row->tr_name;?>" class="form-control">
</div>



  <label for="country" class="col-sm-1 control-label">Business Name</label>
    <div class="col-sm-2">
<input type="text" id="lname" name="tr_entity_name" value="<?php echo $row->tr_entity_name;?>"  class="form-control">
</div>



    <label for="country" class="col-sm-1 control-label">Mobile No</label>
	 <div class="col-sm-2">
<input type="text" id="lname" name="tr_mobile_number" value="<?php echo $row->tr_mobile;?>" class="form-control">

</div>

  <label for="country" class="col-sm-1 control-label">Relation</label>
  	 <div class="col-sm-2">
<input type="text" id="lname" name="tr_mobile_number" value="<?php echo $row->tr_relation;?>" class="form-control">
	  </div>
	  </div>
	  
	  <div class="form-group">



 <label for="country"  class="col-sm-1 control-label">Address</label>
   	 <div class="col-sm-2">
<input type="text" id="lname" name="tr_address" value="<?php echo $row->tr_address;?>" class="form-control">
</div>



  <label for="country" class="col-sm-1 control-label">City</label>
   <div class="col-sm-2">
<input type="text" id="lname" name="tr_city" value="<?php echo $row->tr_city;?>" class="form-control">
</div>


    <label for="country" class="col-sm-1 control-label">PIN</label>
	  <div class="col-sm-2">
<input type="text" id="lname" name="tr_pin" value="<?php echo $row->tr_pin;?>"class="form-control"> </div>
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
<input type="text" id="lname" name="tr2_name" value="<?php echo $row->tr2_name;?>" class="form-control">
</div>

  <label for="country" class="col-sm-1 control-label">Business Name</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr2_entity_name" value="<?php echo $row->tr2_entity_name;?>" class="form-control">
</div>

    <label for="country" class="col-sm-1 control-label">Mobile No</label>
	<div class="col-sm-2">
<input type="text" id="lname" name="tr2_mobile_number" value="<?php echo $row->tr2_mobile;?>" class="form-control">
</div>


  <label for="country"  class="col-sm-1 control-label">Relation</label>
  <div class="col-sm-2">
<input type="text" id="lname" name="tr2_mobile_number" value="<?php echo $row->tr2_relation;?>" class="form-control">
	  </div>
	  </div>
	 
<div class="form-group">	 
	  
	  
 <label for="country" class="col-sm-1 control-label" >Address</label>
   <div class="col-sm-2">
<input type="text" id="lname" name="tr2_address" value="<?php echo $row->tr2_address;?>"class="form-control">
</div>


  <label for="country" class="col-sm-1 control-label">City</label>
     <div class="col-sm-2">
<input type="text" id="lname" name="tr2_city" value="<?php echo $row->tr2_city ;?>" class="form-control">
</div>

    <label for="country" class="col-sm-1 control-label">PIN:-</label>
	 <div class="col-sm-2">
<input type="text" id="lname" name="tr2_pin" value="<?php echo $row->tr2_pin;?>" class="form-control"> </div>
  
  
  <br>
  
  
<?php } ?>
<br>
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

</script><script>
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
    }
  </script>
</body>

</html>