<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
error_reporting(0);
//code for add file
if(isset($_POST['submit']))
{
$customer_name= $_POST['customer_name'];
$business_name= $_POST['business_name'];
$state= $_POST['state'];
$district= $_POST['dist'];
$city= $_POST['city'];
$nsm= $_POST['nsm'];
$zsm= $_POST['zsm'];
$rsm= $_POST['rsm'];
$sm= $_POST['sm'];
$pmcpl_manager= $_POST['pmcpl_manager'];
$pmcpl_team_leader= $_POST['pmcpl_team_leader'];
$pmcpl_executive= $_POST['pmcpl_executive'];
$closed_by= $_POST['closed_by'];
$mobile= $_POST['mobile'];
$mail= $_POST['email'];
$profession= $_POST['profession'];
$market= $_POST['market'];
$percent= $_POST['percent'];
$product= $_POST['product'];
$bankname= $_POST['bankname'];
$carry_forward= $_POST['carry_forward'];
$login_date= $_POST['login_date'];
$login_month= $_POST['login_month'];
$login_year= $_POST['login_year'];
$login_amt= $_POST['login_amt'];
$disbursement_date= $_POST['disbursement_date'];
$disbursement_month= $_POST['disbursement_month'];
$disbursement_year= $_POST['disbursement_year'];
$disbursement_amt= $_POST['disbursement_amt'];
$decision= $_POST['decision'];
$remark= $_POST['remark'];

$query=mysqli_query($mysqli,"insert into file(name,business_name,state,district,city,nsm_name,zsm_name,rsm_name,sm_name,manager,team_leader,executive,closed_by,mobile,mail,profession,market,percent,product,bankname,carry_forward,login_date,login_month,login_year,login_amt,disbursement_date,disbursement_month,disbursement_year,disbursement_amt,decision,remark)
values('$customer_name','$business_name','$state','$district','$city','$nsm','$zsm','$rsm','$sm','$pmcpl_manager','$pmcpl_team_leader','$pmcpl_executive','$closed_by','$mobile','$mail','$profession','$market','$percent','$product','$bankname','$carry_forward','$login_date','$login_month','$login_year','$login_amt','$disbursement_date','$disbursement_month','$disbursement_year','$disbursement_amt','$decision','$remark')");
 
if($query)
{
    $id=mysqli_insert_id($mysqli) ;//print_r($id);die();
    $sql=mysqli_query($mysqli,"select * from bank where name='$bankname' and typeof_loan='$product'") or die(mysqli_error($mysqli));
    while ($row=mysqli_fetch_array($sql))
    {
    $percent=$row['percent'];
  $sq=mysqli_query($mysqli,"Update file set percent='$percent' where id='$id'") or die(mysqli_error($mysqli));

}
}
else
{
  die('invalid query'.mysqli_error($mysqli));
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
	<title>Processing File</title>
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
<script type="text/javascript" src="js/js/jquery.min.js"></script>
<script type="text/javascript" src="js/js/js.js"></script>
<script type="text/javascript" src="js/js/js1.js"></script>
<script type="text/javascript" src="js/js/js2.js"></script>

<style type="text/css">
  .form-control
  {
    border:1px solid #c5b9a5;
    height: 40px;
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
						<h2 class="page-title">Processing File </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Processing File</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">

											<div class="hr-dashed"></div>
											<div class="form-group">
<label for="fname" class="col-sm-1 control-label" >Enter File ID</label>
  <div class="col-sm-2">
    <input type="text" id="id" name="id"  class="form-control">
  </div>	
  <div class="col-sm-6 col-sm-offset-4-offset-8">
    <input type="submit" value="process" name="process" style ="width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 7px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 30px;
  cursor: pointer;"   
></div>	
 </div>

          							<?php
                          if( isset($_POST['process']))
                      {
                           $id=$_POST['id'];
                           $sql=mysqli_query($mysqli,"select * from loan where id='$id'") or die(mysqli_error($mysqli));
                           $num=mysqli_num_rows($sql);
                           if($num==0)
                           {
 
?>   <p><span style="color: red; padding-left: 30px;">No file found of this ID. Please enter the correct file ID</span></p>
 <?php
 }
 
  $ret="select * from loan where id=?";
  $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$id);
   $stmt->execute();
   $res=$stmt->get_result();
     while($r=$res->fetch_object())
    {
      ?>  
	  
	  
	  <div class="form-group">
	    <p><span style="color: red; padding-left: 30px;">* are required fields. Please fill</span></p>

	<label for="fname" class="col-sm-1 control-label" >Customer Name</label>
	<div class="col-sm-2">
    <input type="text" id="fname" name="customer_name" value="<?php echo $r->co_name;?>" class="form-control" required="required">
	</div>

    <label for="lname"  class="col-sm-1 control-label">Business Name</label>
	<div class="col-sm-2">
    <input type="text" id="lname" name="business_name"  value="<?php echo $r->name_of_entity;?>" class="form-control"required="required">
	</div>
  
  

  <label for="lname"  class="col-sm-1 control-label">State </label>
  <div class="col-sm-2">
<input type="text" value="<?php echo $r->state;?>" class="form-control"  required  name="state">
</div>

  <label for="lname"  class="col-sm-1 control-label">Hub </label>
    <div class="col-sm-2">
<input type="text"  value="<?php echo $r->city;?>" class="form-control"
required class="chosen-select"    id="chkveg1"  name="dist">
</div>
</div>

<div class="form-group">
			  
   <label for="lname"  class="col-sm-1 control-label">Location</label> 
     <div class="col-sm-2">
    <input type="text" id="lname" name="city" value="<?php echo $r->landmark;?>" 
	class="form-control" required="required">
	</div>

<label for="fname" class="col-sm-1 control-label" ><span style="color: red; font-size: 15pt;">*</span>N.S.M </label>
     <div class="col-sm-2">


<?php 
 $query3 = "SELECT name FROM nsm";

$result3 = mysqli_query($mysqli,$query3);

?>

   <select name="nsm" id="nsm" class="form-control" required="required">
			<option value=''>------- Select --------</option>
		      
<?php

      $sql = "select * from nsm";
      $res = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_array($res))
          {
            
            ?>
        
          <option value="<?php echo htmlentities($row['id']);?>">
          <?php echo $row["name"];?></option>
        <?php
        }
      }
      ?>
    </select></div>
		
<label for="fname"  class="col-sm-1 control-label" ><span style="color: red; font-size: 15pt;">*</span>Z.S.M</label>
 <div class="col-sm-2">
		<select name="zsm" id="zsm" class="chosen-select form-control"  
		 required="required">
      <option value="">------- Select --------</option></select>
	  </div>


			 <label for="fname" class="col-sm-1 control-label" ><span style="color: red; font-size: 15pt;">*</span>R.S.M </label>
			 <div class="col-sm-2">
    <select id="rsm" name="rsm" class="chosen-select form-control"  required="required">
	<option value="">-------Select-------</option>
						</select></div>
						</div>

<div class="form-group">


<label for="fname" class="col-sm-1 control-label" ><span style="color: red; font-size: 15pt;">*</span>S.M </label>
 <div class="col-sm-2">
    <select id="sm" name="sm" class="chosen-select form-control"   required="required">
	<option value="" >--------Select-------</option>
						</select></div>

  
  <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>PMCPL Manager</label> 
  <div class="col-sm-2">
    <?php 
 $query3 = "SELECT distinct( team_manager) FROM employee";

$result3 = mysqli_query($mysqli,$query3);

?>
     <select class="form-control" onChange="getState(this.value);"  
id="country-list" name="pmcpl_manager"  required="required" >
   <option value="">Select Manager Name</option>
   
<?php

while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["team_manager"]; ?>">
<?php echo $rs["team_manager"]; ?></option>

<?php

}
?>
  </select></div>
  
  
  <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>PMCPL Team Leader </label>
  <div class="col-sm-2">
    <select class="chosen-select form-control" id="chkveg" name="pmcpl_team_leader" >
   <option value="">Select Leader Name</option>
       
</select></div>
  

  <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>PMCPL Executive</label>
    <div class="col-sm-2">
      <?php 
 $query4 = "SELECT name FROM employee";

$result4 = mysqli_query($mysqli,$query4);

?>
    <select id="profession" name="pmcpl_executive" value="<?php echo $r->executive_name;?>"class="form-control" required="required">
      <option value="">Select Executive Name</option>
	<?php

while($rs4=mysqli_fetch_array($result4)) {

?>

<option value="<?php echo $rs4["name"]; ?>">
<?php echo $rs4["name"]; ?></option>

<?php

}
?>
  </select>

  </div>
	</div>
	
	<div class="form-group">

  <label for="lname"  class="col-sm-1 control-label">Closed By</label> 
   <div class="col-sm-2">
    <input type="text" id="profession" name="closed_by" class="form-control" >
	</div>

  <label for="lname"  class="col-sm-1 control-label">Cutomer Mobile No</label> 
  <div class="col-sm-2">
    <input type="tel" id="profession" name="mobile" value="<?php echo $r->co_mobile;?>" class="form-control" required="required">
	</div>
 
  <label for="lname"  class="col-sm-1 control-label">Customer Email</label> 
    <div class="col-sm-2">
    <input type="text" id="profession" name="email"value="<?php echo $r->co_email;?>" class="form-control" required="required">
	</div>
 
  <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Profession</label> 
  <div class="col-sm-2">
    <select id="typeof_loan" name="profession" class="form-control" required="required">
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
      
        </select></div>
		</div>
		
		<div class="form-group">

  <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Market</label> 
  <div class="col-sm-2">
    <input type="text" id="profession" name="market" class="form-control" required="required">
	</div>
    <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Bank NBFC Name</label> 
	 <div class="col-sm-2">
    <select id="bank" onChange="getBank(this.value);"  name="bankname"  class="form-control" required="required">
      <option value="">Select Bank</option>
        <?php 
 $query3 = "SELECT * FROM bank";

$result3 = mysqli_query($mysqli,$query3);
while($rs=mysqli_fetch_array($result3)) {

?>

<option value="<?php echo $rs["name"]; ?>">
<?php echo $rs["name"]; ?></option>

<?php

}

?>
    </select>
	</div>

<input type="hidden" name="percent">
    <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Product</label> 
    <div class="col-sm-2">
     <select name="product" id="product" onChange="getPer(this.value);" class="form-control"required="required"></div>
  <option value="">Select Product</option>
     
        </select></div>


   <label for="lname"  class="col-sm-1 control-label">Carry Forward</label> 
	 <div class="col-sm-2">
    <input type="text" id="profession" name="carry_forward" class="form-control">
	</div>
	</div>
 
 <div class="form-group">
 
 
      <label for="lname" class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Login Date</label> 
	  <div class="col-sm-2">
       <select id="typeof_loan" name="login_date" class="form-control" required="required">
  <option value="">Select Date</option>
      <option value="1">1</option>
      <option value="2">2</option>
	  <option value="3">3</option>
      <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
	  <option value="9">9</option>
      <option value="10">10</option>
	  <option value="11">11</option>
      <option value="12">12</option>
	  <option value="13">13</option>
      <option value="14">14</option>
	  <option value="15">15</option>
	  <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
	  <option value="19">19</option>
      <option value="20">20</option>
	  <option value="21">21</option>
      <option value="22">22</option>
	  <option value="23">23</option>
      <option value="24">24</option>
	  <option value="25">25</option>
	  <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
	  <option value="29">29</option>
      <option value="30">30</option>
	  <option value="31">31</option>
        </select></div>


     <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Login Month</label> 
	 	<div class="col-sm-2">
         <select id="typeof_loan" name="login_month" class="form-control" required="required">
  <option value="">Select Month</option>
      <option value="January">January</option>
      <option value="February">February</option>
	  <option value="March">March</option>
      <option value="April">April</option>
	  <option value="May">May</option>
	  <option value="June">June</option>
      <option value="July">July</option>
      <option value="August">August</option>
	  <option value="September">September</option>
      <option value="October">October</option>
	  <option value="November">November</option>
      <option value="December">December</option>
	  </select></div>

  <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Login Year</label> 
  <div class="col-sm-2">
    <input type="text" id="profession" name="login_year" class="form-control" required="required">
	</div>

  
      <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Login Amount</label> 
	    <div class="col-sm-2">
    <input type="text" id="profession" name="login_amt" class="form-control" required="required">
	</div>
	</div>
	
	<div class="form-group">

      <label for="lname"  class="col-sm-1 control-label">Disbursement Date</label>
	   <div class="col-sm-2">
         <select id="typeof_loan" name="disbursement_date" class="form-control">
  <option value="">Select Date</option>
      <option value="1">1</option>
      <option value="2">2</option>
	  <option value="3">3</option>
      <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
	  <option value="9">9</option>
      <option value="10">10</option>
	  <option value="11">11</option>
      <option value="12">12</option>
	  <option value="13">13</option>
      <option value="14">14</option>
	  <option value="15">15</option>
	  <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
	  <option value="19">19</option>
      <option value="20">20</option>
	  <option value="21">21</option>
      <option value="22">22</option>
	  <option value="23">23</option>
      <option value="24">24</option>
	  <option value="25">25</option>
	  <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
	  <option value="29">29</option>
      <option value="30">30</option>
	  <option value="31">31</option>
        </select></div>

     <label for="lname"  class="col-sm-1 control-label">Disbursement Month</label> 
	 	<div class="col-sm-2">
         <select id="typeof_loan" name="disbursement_month" class="form-control">
  <option value="">Select Month</option>
      <option value="January">January</option>
      <option value="February">February</option>
	  <option value="March">March</option>
      <option value="April">April</option>
	  <option value="May">May</option>
	  <option value="June">June</option>
      <option value="July">July</option>
      <option value="August">August</option>
	  <option value="September">September</option>
      <option value="October">October</option>
	  <option value="November">November</option>
      <option value="December">December</option>
	  </select></div>
 
   <label for="lname"  class="col-sm-1 control-label">Disbursement Year</label> 
   <div class="col-sm-2">
    <input type="text" id="profession" name="disbursement_year" class="form-control">
	</div>
  

      <label for="lname"  class="col-sm-1 control-label">Disbursement Amount </label> 
	   <div class="col-sm-2">
    <input type="text" id="profession" name="disbursement_amt" class="form-control">
	</div>
	</div>

<div class="form-group">


      <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Decision </label> 
	   <div class="col-sm-2">
       <select id="typeof_loan" name="decision" class="form-control" required="required">
  <option value="">Select Decision</option>
      
       <?php 
 $queryd = "SELECT name FROM decision";

$resultd = mysqli_query($mysqli,$queryd);
while($rd=mysqli_fetch_array($resultd)) {

?>

<option value="<?php echo $rd["name"]; ?>">
<?php echo $rd["name"]; ?></option>

<?php

}

?>
      
	  </select></div>
 
      <label for="lname"  class="col-sm-1 control-label"><span style="color: red; font-size: 15pt;">*</span>Remark </label> 
	    <div class="col-sm-2">
    <input type="text" id="profession" name="remark" class="form-control" required="required">
	</div>
	</div>
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
  cursor: pointer;"     ></div>
  </form>
      <?php }
      } ?>
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
function getBank(val) {

  $.ajax({

  type: "POST",

  url: "getCities.php",

  data:'bank_id='+val,

  success: function(data){

    $("#product").html(data);

    

  }

  });

}
</script>
<script>
function getPer(val) {

  $.ajax({

  type: "POST",

  url: "getCities.php",

  data:'product_id='+val,

  success: function(data){

    $("#percent").html(data);

    

  }

  });

}
</script>

</body>

</html>