<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add employee
if(isset($_POST['submit']))
{                                                                                                    
$full_name=$_POST['Full_Name'];
$role=$_POST['role'];
$bank_name=$_POST['bank_name'];
$product_name=$_POST['typeof_loan'];
$office_no=$_POST['Office_no'];
$personal_no=$_POST['personal_no'];
$mail_ID=$_POST['mail_ID'];
$mail_ID_personal=$_POST['mail_ID_personal'];
$join_date=$_POST['join_date'];
$state=$_POST['state'];
$hub=$_POST['hub'];
$hub1=implode(',', $hub);
$city=$_POST['city'];
$address=$_POST['address'];

$status=$_POST['status'];
$nsm=$_POST['nsm'];
$rsm=$_POST['rsm'];
$zsm=$_POST['zsm'];

$sql=mysqli_query($mysqli,"insert into sm
  (name,role,bank_name,product_name,office_no,personal_no,email,email_personal,join_date,state,hub,city,address,status,rsm_name,zsm_name,nsm_name,rsmid,zsmid,nsmid) 
  values
  ('$full_name','$role','$bank_name','$product_name','$office_no','$personal_no','$mail_ID','$mail_ID_personal','$join_date','$state','$hub1','$city','$address','$status','$rsm','$zsm','$nsm','$rsm','$zsm','$nsm')");
if(!$sql)
{
	die('invalid query'.mysqli_error($mysqli));
}
else
{
  echo "<script>alert('employee has been added successfully');</script>";
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
  <title>Add Manager</title>
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
            <h2 class="page-title">Add Manager (SM) </h2>
  
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Add Manager</div>
                  <div class="panel-body">
                    <form method="post" action="" class="form-horizontal" >
                      
                      <div class="hr-dashed"></div>
<!-- one div in form group having 4 fields-->                      
<div class="form-group">
<label class="col-sm-1 control-label">Full Name </label>
<div class="col-sm-2">
    <input type="text" id="fname" name="Full_Name" class="form-control" required="required">
</div>

   
<label class="col-sm-1 control-label">Role </label>
<div class="col-sm-2">
   <select id="country" name="role" class="form-control" required="required">
  <option value="">Select type</option>
       <option value="NSM">NSM</option>
              
               <option value="ZSM">ZSM</option>
               <option value="RSM">RSM</option>
      <option value="SM">SM</option>

    </select>
    </div>
   
   
   <label class="col-sm-1 control-label">Bank Name </label>
<div class="col-sm-2">
    <select  name="bank_name"  class="form-control"required="required">
      <option value="">Select Bank</option>

 <?php
     $pt1=mysqli_query($mysqli,"select name from banknames");
     while($p1r=mysqli_fetch_array($pt1))
     {
     ?>
     <option value="<?php echo htmlentities($p1r['name']);?>"><?php echo htmlentities($p1r["name"]);?></option>
     <?php
    }
     ?>
</select>
</div>
    <label class="col-sm-1 control-label">Products (Type of Loan) </label> <div class="col-sm-2">
    <select id="typeof_loan" name="typeof_loan"class="form-control" required="required">
  <option value="">Select Loan Type</option>
  <?php
     $pt=mysqli_query($mysqli,"select name from product");
     while($pr=mysqli_fetch_array($pt))
     {
     ?>
     <option value="<?php echo htmlentities($pr['name']);?>"><?php echo htmlentities($pr["name"]);?></option>
     <?php
    }
     ?>
        </select>
</div>
  

 
    </div>
<!-- one div in form group having 4 fields    ends here...--> 

<!-- second div in form group having 4 fields starts-->                      

<div class="form-group">

  <label class="col-sm-1 control-label">Office no</label>
   <div class="col-sm-2">
    <input type="tel" id="lname" name="Office_no" placeholder ="123-456-7890 (Office)"class="form-control" required="required">
  </div>

   <label class="col-sm-1 control-label">Personal no</label>
    <div class="col-sm-2">
  <input type="tel" id="lname" name="personal_no" placeholder ="123-456-7890 (Personal)"class="form-control" required="required">
   </div>



<label class="col-sm-1 control-label">Mail</label>
<div class="col-sm-2">
<input type="email" id="lname" name="mail_ID" class="form-control" placeholder="Official mail_ID" required="required" onclick="ValidateEmail(mail_ID)">
</div>

  <label class="col-sm-1 control-label">Mail</label>
 <div class="col-sm-2">
  <input type="email" id="lname" name="mail_ID_personal" class="form-control" placeholder="Personal mail_ID"  required="required" onclick="ValidateEmail(mail_ID)">
  </div>



 
     </div>
<!-- second div in form group having 4 fields ends-->     
<div class="form-group">                 

   <label class="col-sm-1 control-label">Joining Date </label>
   <div class="col-sm-2">
    <input type="date" id="lname" name="join_date" class="form-control"  required="required">
    </div>

  
  
  

   <label class="col-sm-1 control-label">State</label>
           <div class="col-sm-2">

<?php 
 $query3 = "SELECT distinct(sname) FROM city";

$result3 = mysqli_query($mysqli,$query3);

?>

<select class="form-control"
 onChange="getState(this.value);"  
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
																			
  </div>
   <label class="col-sm-1 control-label">District</label>
  <div class="col-sm-2">
   <select multiple="multiple" id="chkveg" name="hub[]"  class="form-control" required="required"></select> 
</div>
   <label class="col-sm-1 control-label">City</label>
    <div class="col-sm-2">
   <input type="text" id="lname" name="city" class="form-control"  required="required">
 </div>
</div>
<!-- second ends here.. ab ite bad to samaj hi gye hogey na tymwaste ni kru commenting me -->
<div class="form-group">
   <label class="col-sm-1 control-label"> Office Address</label>
    <div class="col-sm-2">
   <input type="text" id="lname" name="address" class="form-control" required="required">
   </div>
 

  <label class="col-sm-1 control-label">Status </label>   
      <div class="col-sm-2">

  <select id="country" name="status" class="form-control" required="required">
  <option value="">Select Type</option>
      <option value="Active">active</option>
      <option value="Inactive">Inactive</option>
    </select>
  
</div>

    <label class="col-sm-1 control-label">R.S.M</label> 
	<div class="col-sm-2">
    <select id="rsm" name="rsm" class="form-control" required="required">
  <option value="">Select RSM</option>
<?php $ret=mysqli_query($mysqli,"select * from rsm");
      while($row=mysqli_fetch_array($ret))
{
?>
    <option value="<?php echo htmlentities($row['id']);?><?php echo htmlentities($row['name']);?>">
    <?php echo htmlentities($row['name']);?>
        </option>
  <?php } ?>
      </select>
 </div>

   <label class="col-sm-1 control-label">Z.S.M </label> <div class="col-sm-2">
    <select id="zsm" name="zsm" class="form-control" required="required">
  <option value="">Select RSM</option>
<?php $ret=mysqli_query($mysqli,"select * from zsm");
      while($row=mysqli_fetch_array($ret))
{
?>
    <option value="<?php echo htmlentities($row['id']);?><?php echo htmlentities($row['name']);?>">
    <?php echo htmlentities($row['name']);?>
        </option>
  <?php } ?>
      </select>
</div>



</div>
 

<div class="form-group">

       <label class="col-sm-1 control-label">N.S.M </label>  <div class="col-sm-2">
    <select id="nsm" name="nsm" class="form-control" required="required">
  <option value="">Select NSM</option>
<?php $ret=mysqli_query($mysqli,"select * from nsm");
      while($row=mysqli_fetch_array($ret))
{
?>
    <option value="<?php echo htmlentities($row['id']);?><?php echo htmlentities($row['name']);?>">
    <?php echo htmlentities($row['name']);?>
        </option>
  <?php } ?>
      </select>
    </div>
  </div>
<br>
<div class="col-sm-6 col-sm-offset-4-offset-8">

  <br>
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
<script type="text/javascript">
$(function() {

    $('#chkveg').multiselect({

        includeSelectAllOption: true
    });
});

</script>
</body>

</html>