<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for  edit loan application
if(isset($_POST['submit']))
{
$customer_name= $_POST['customer_name'];
$business_name= $_POST['business_name'];
$state= $_POST['state'];
$district= $_POST['dist'];
$city= $_POST['city'];
//$nsm= $_POST['nsm'];
//$zsm= $_POST['zsm'];
//$rsm= $_POST['rsm'];
//$sm= $_POST['sm'];
$pmcpl_manager= $_POST['pmcpl_manager'];
$pmcpl_team_leader= $_POST['pmcpl_team_leader'];
$pmcpl_executive= $_POST['pmcpl_executive'];
$closed_by= $_POST['closed_by'];
$mobile= $_POST['mobile'];
$mail= $_POST['email'];
$profession= $_POST['profession'];
$market= $_POST['market'];
$product= $_POST['product'];
$bankname= $_POST['bankname'];
$carry_forward= $_POST['carry_forward'];
$login_date= $_POST['login_date'];
$login_month= $_POST['login_month'];
$login_year= $_POST['login_year'];
$login_amt= $_POST['login_amt'];
$distribution_date= $_POST['disbursement_date'];
$disbursement_month= $_POST['disbursement_month'];
$disbursement_year= $_POST['disbursement_year'];
$distribution_amt= $_POST['distribution_amt'];
$decision= $_POST['decision'];
$remark= $_POST['remark'];
$id=$_GET['id'];
$query=mysqli_query($mysqli,"Update file set name='$customer_name',business_name='$business_name',state='$state',district='$district',city='$city',
manager='$pmcpl_manager',team_leader='$pmcpl_team_leader',executive='$pmcpl_executive',closed_by='$closed_by',mobile='$mobile',mail='$mail',profession='$profession',
market='$market',product='$product',bankname='$bankname',carry_forward='$carry_forward',login_date='$login_date',login_month='$login_month',login_year='$login_year',login_amt='$login_amt',disbursement_date='$distribution_date',disbursement_month='$disbursement_month',disbursement_year='$disbursement_year',disbursement_amt='$distribution_amt',decision='$decision',remark='$remark'

 where id='$id'") or die(mysqli_error($mysqli));
if(!$query)
{
	die('invalid query'.mysqli_error($mysqli));
	//echo "<script>alert('customer has been added successfully');</script>";
}
else
{
  echo "<script>alert('File Processing has been Updated successfully');</script>";
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
	<title>Edit Processing File</title>
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
						<h2 class="page-title">Edit Processing File </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Processing File</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];
	$ret="select * from file where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
		<div class="form-group">
<label for="fname"  class="col-sm-1 control-label" >Customer Name </label>
	<div class="col-sm-2">
    <input type="text" id="fname" name="customer_name" value="<?php echo $row->name;?>" class="form-control" required="required">
	</div>

    <label for="lname"  class="col-sm-1 control-label">Business Name </label>
	<div class="col-sm-2">
    <input type="text" id="lname" name="business_name" value="<?php echo $row->business_name;?>"  class="form-control" required="required">
	</div>
  
  

  <label for="lname"  class="col-sm-1 control-label">State</label>
  <div class="col-sm-2">
<input type="text" value="<?php echo $row->state;?>" class="form-control"  required  name="state">
</div>

  <label for="lname"  class="col-sm-1 control-label">Hub </label>
   <div class="col-sm-2">
<input type="text"  value="<?php echo $row->district;?>" class="form-control"
required  name="dist">
</div>
</div>

<div class="form-group">


			 		
   <label for="lname"  class="col-sm-1 control-label">Location</label> 
   <div class="col-sm-2">
    <input type="text" id="lname" name="city" value="<?php echo $row->city;?>"  class="form-control" required="required">
	</div>

<label for="fname"  class="col-sm-1 control-label" >N.S.M </label>
 <div class="col-sm-2">
<?php
   $sql="select * from nsm where id='$row->nsm_name'";
 $t=mysqli_query($mysqli,$sql);
 while($r=$t->fetch_object())
 {
  ?>
   <input type="text"  name="nsm" id="nsm" value="<?php echo $r->name;?>" class="form-control"  required="required">
		<?php } ?>	</div>
		
<label for="fname"  class="col-sm-1 control-label" >Z.S.M </label>
<div class="col-sm-2">

	<?php 
   $sql1="select * from zsm where id='$row->zsm_name'";
 $t1=mysqli_query($mysqli,$sql1);
 while($r1=$t1->fetch_object())
 {
   ?>
		<input type="text" name="zsm" id="zsm"class="form-control" value="<?php echo $r1->name;?>"  required="required"><?php } ?>
		</div>


			 <label for="fname"  class="col-sm-1 control-label" >R.S.M </label>
			 <div class="col-sm-2">
			 	<?php 
   $sql2="select * from rsm where id='$row->rsm_name'";
 $t2=mysqli_query($mysqli,$sql2);
 while($r2=$t2->fetch_object())
 {
   ?>
   <input type="text" id="rsm" name="rsm" value="<?php echo $r2->name;?>"  class="form-control"  required="required">
	<?php } ?>
						</div>
						</div>
						
						
						<div class="form-group">

<label for="fname"  class="col-sm-1 control-label" >S.M </label>
<div class="col-sm-2">
	<?php 
   $sql3="select * from sm where id='$row->sm_name'";
 $t3=mysqli_query($mysqli,$sql3);
 while($r3=$t3->fetch_object())
 {
   ?>
    <input type="text" id="sm" name="sm"class="form-control" value="<?php echo $r3->name;?>" required="required"><?php } ?>
	</div>

  <label for="lname"  class="col-sm-1 control-label">PMCPL Manager</label> 
  <div class="col-sm-2">
  	    <input type="text" name="pmcpl_manager" class="form-control" value="<?php echo $row->manager;?>" required="required">

   </div>
  <label for="lname"  class="col-sm-1 control-label">PMCPL Team Leader </label>
    <div class="col-sm-2">
    <input type="text"class="form-control" id="chkveg" name="pmcpl_team_leader" value="<?php echo $row->team_leader;?>" >
       </div>
  <label for="lname"  class="col-sm-1 control-label">PMCPL Executive</label>
   <div class="col-sm-2">
    <input type="text" id="profession" name="pmcpl_executive" value="<?php echo $row->executive;?>" class="form-control" required="required">
	</div>
	</div>
	
	
	<div class="form-group">

  <label for="lname"  class="col-sm-1 control-label">Closed By</label> 
   <div class="col-sm-2">
    <input type="text" id="profession" name="closed_by" value="<?php echo $row->closed_by;?>" class="form-control">
	</div>
	

  <label for="lname" class="col-sm-1 control-label">Cutomer Mobile No</label> 
  <div class="col-sm-2">
    <input type="tel" id="profession" name="mobile" value="<?php echo $row->mobile;?>" class="form-control" required="required">
	</div>
 
  <label for="lname"  class="col-sm-1 control-label">Customer Email</label> 
   <div class="col-sm-2">
    <input type="text" id="profession" name="email"value="<?php echo $row->mail;?>" class="form-control" required="required">
	</div>
 
  <label for="lname" class="col-sm-1 control-label">Profession</label> 
  <div class="col-sm-2">
 <select  name="profession"  class="form-control"required="required">
        <?php
     $pt1=mysqli_query($mysqli,"select name from profession");
     while($p1r=mysqli_fetch_array($pt1))
     {
     ?>
     <option value="<?php echo htmlentities($p1r['name']);?>"<?php if($row->name==$p1r['name']) echo 'selected="selected"';?>><?php echo htmlentities($p1r["name"]);?></option>
     <?php
    }
     ?>
        </select>
		</div>
		</div>
		
		<div class="form-group">

  <label for="lname" class="col-sm-1 control-label">Market</label> 
  <div class="col-sm-2">
    <input type="text" id="profession" name="market" value="<?php echo $row->market;?>"class="form-control" required="required">
	</div>

 <label for="lname" class="col-sm-1 control-label">Bank NBFC Name</label> 
	<div class="col-sm-2">
    <input type="text" id="profession" name="bankname" value="<?php echo $row->bankname;?>" class="form-control"required="required">
	</div>
	
    <label for="lname"  class="col-sm-1 control-label">Product</label> 
	 <div class="col-sm-2">
    
     
    <input type="text" name="product"  value="<?php echo $row->product;?>" class="form-control"required="required">
  
   </div>

    <label for="lname"  class="col-sm-1 control-label">Carry Forward</label> 
		<div class="col-sm-2">
    <input type="text" id="profession" name="carry_forward" value="<?php echo $row->carry_forward;?>" class="form-control" >
	</div>
	</div>
 
 <div class="form-group">
 
      <label for="lname" class="col-sm-1 control-label">Login Date</label> 
	  <div class="col-sm-2">
       <select id="typeof_loan" name="login_date" value="<?php echo $row->login_date;?>" class="form-control" required="required">
  <option value="">Select Date</option>
      <option value="1"<?php if($row->login_date=="1")echo "selected"; ?>>1</option>
      <option value="2"<?php if($row->login_date=="2")echo "selected"; ?>>2</option>
	  <option value="3"<?php if($row->login_date=="3")echo "selected"; ?>>3</option>
      <option value="4"<?php if($row->login_date=="4")echo "selected"; ?>>4</option>
	  <option value="5"<?php if($row->login_date=="5")echo "selected"; ?>>5</option>
	  <option value="6"<?php if($row->login_date=="6")echo "selected"; ?>>6</option>
      <option value="7"<?php if($row->login_date=="7")echo "selected"; ?>>7</option>
      <option value="8"<?php if($row->login_date=="8")echo "selected"; ?>>8</option>
	  <option value="9"<?php if($row->login_date=="9")echo "selected"; ?>>9</option>
      <option value="10"<?php if($row->login_date=="10")echo "selected"; ?>>10</option>
	  <option value="11"<?php if($row->login_date=="11")echo "selected"; ?>>11</option>
      <option value="12"<?php if($row->login_date=="12")echo "selected"; ?>>12</option>
	  <option value="13"<?php if($row->login_date=="13")echo "selected"; ?>>13</option>
      <option value="14"<?php if($row->login_date=="14")echo "selected"; ?>>14</option>
	  <option value="15"<?php if($row->login_date=="15")echo "selected"; ?>>15</option>
	  <option value="16"<?php if($row->login_date=="16")echo "selected"; ?>>16</option>
      <option value="17"<?php if($row->login_date=="17")echo "selected"; ?>>17</option>
      <option value="18"<?php if($row->login_date=="18")echo "selected"; ?>>18</option>
	  <option value="19"<?php if($row->login_date=="19")echo "selected"; ?>>19</option>
      <option value="20"<?php if($row->login_date=="20")echo "selected"; ?>>20</option>
	  <option value="21"<?php if($row->login_date=="21")echo "selected"; ?>>21</option>
      <option value="22"<?php if($row->login_date=="22")echo "selected"; ?>>22</option>
	  <option value="23"<?php if($row->login_date=="23")echo "selected"; ?>>23</option>
      <option value="24"<?php if($row->login_date=="24")echo "selected"; ?>>24</option>
	  <option value="25"<?php if($row->login_date=="25")echo "selected"; ?>>25</option>
	  <option value="26"<?php if($row->login_date=="26")echo "selected"; ?>>26</option>
      <option value="27"<?php if($row->login_date=="27")echo "selected"; ?>>27</option>
      <option value="28"<?php if($row->login_date=="28")echo "selected"; ?>>28</option>
	  <option value="29"<?php if($row->login_date=="29")echo "selected"; ?>>29</option>
      <option value="30"<?php if($row->login_date=="30")echo "selected"; ?>>30</option>
	  <option value="31"<?php if($row->login_date=="31")echo "selected"; ?>>31</option>
        </select></div>


     <label for="lname"  class="col-sm-1 control-label">Login Month</label> 
	 <div class="col-sm-2">
         <select id="typeof_loan" name="login_month"value="<?php echo $row->login_month;?>" class="form-control" required="required">
  <option value="">Select Month</option>
      <option value="January"<?php if($row->login_month=="January")echo "selected"; ?>>January</option>
      <option value="February"<?php if($row->login_month=="February")echo "selected"; ?>>February</option>
	  <option value="March"<?php if($row->login_month=="March")echo "selected"; ?>>March</option>
      <option value="April"<?php if($row->login_month=="April")echo "selected"; ?>>April</option>
	  <option value="May"<?php if($row->login_month=="May")echo "selected"; ?>>May</option>
	  <option value="June"<?php if($row->login_month=="June")echo "selected"; ?>>June</option>
      <option value="July"<?php if($row->login_month=="July")echo "selected"; ?>>July</option>
      <option value="August"<?php if($row->login_month=="August")echo "selected"; ?>>August</option>
	  <option value="September"<?php if($row->login_month=="September")echo "selected"; ?>>September</option>
      <option value="October"<?php if($row->login_month=="October")echo "selected"; ?>>October</option>
	  <option value="November"<?php if($row->login_month=="November")echo "selected"; ?>>November</option>
      <option value="December"<?php if($row->login_month=="December")echo "selected"; ?>>December</option>
	  </select>
	  </div>

  <label for="lname"  class="col-sm-1 control-label">Login Year</label> 
  	 <div class="col-sm-2">
    <input type="text" id="profession" name="login_year" value="<?php echo $row->login_year;?>" class="form-control"required="required">
	</div>

  
      <label for="lname" class="col-sm-1 control-label">Login Amount</label> 
	  <div class="col-sm-2">
    <input type="text" id="profession" name="login_amt" value="<?php echo $row->login_amt;?>" class="form-control" required="required">
	</div>
	</div>
	
	<div class="form-group">

      <label for="lname" class="col-sm-1 control-label">Disbursement Date</label> 
	   <div class="col-sm-2">
         <select id="typeof_loan" name="disbursement_date" value="<?php echo $row->distribution_date;?>"class="form-control">
  <option value="">Select Date</option>
    <option value="">Select Date</option>
      <option value="1"<?php if($row->distribution_date=="1")echo "selected"; ?>>1</option>
      <option value="2"<?php if($row->distribution_date=="2")echo "selected"; ?>>2</option>
	  <option value="3"<?php if($row->distribution_date=="3")echo "selected"; ?>>3</option>
      <option value="4"<?php if($row->distribution_date=="4")echo "selected"; ?>>4</option>
	  <option value="5"<?php if($row->distribution_date=="5")echo "selected"; ?>>5</option>
	  <option value="6"<?php if($row->distribution_date=="6")echo "selected"; ?>>6</option>
      <option value="7"<?php if($row->distribution_date=="7")echo "selected"; ?>>7</option>
      <option value="8"<?php if($row->distribution_date=="8")echo "selected"; ?>>8</option>
	  <option value="9"<?php if($row->distribution_date=="9")echo "selected"; ?>>9</option>
      <option value="10"<?php if($row->distribution_date=="10")echo "selected"; ?>>10</option>
	  <option value="11"<?php if($row->distribution_date=="11")echo "selected"; ?>>11</option>
      <option value="12"<?php if($row->distribution_date=="12")echo "selected"; ?>>12</option>
	  <option value="13"<?php if($row->distribution_date=="13")echo "selected"; ?>>13</option>
      <option value="14"<?php if($row->distribution_date=="14")echo "selected"; ?>>14</option>
	  <option value="15"<?php if($row->distribution_date=="15")echo "selected"; ?>>15</option>
	  <option value="16"<?php if($row->distribution_date=="16")echo "selected"; ?>>16</option>
      <option value="17"<?php if($row->distribution_date=="17")echo "selected"; ?>>17</option>
      <option value="18"<?php if($row->distribution_date=="18")echo "selected"; ?>>18</option>
	  <option value="19"<?php if($row->distribution_date=="19")echo "selected"; ?>>19</option>
      <option value="20"<?php if($row->distribution_date=="20")echo "selected"; ?>>20</option>
	  <option value="21"<?php if($row->distribution_date=="21")echo "selected"; ?>>21</option>
      <option value="22"<?php if($row->distribution_date=="22")echo "selected"; ?>>22</option>
	  <option value="23"<?php if($row->distribution_date=="23")echo "selected"; ?>>23</option>
      <option value="24"<?php if($row->distribution_date=="24")echo "selected"; ?>>24</option>
	  <option value="25"<?php if($row->distribution_date=="25")echo "selected"; ?>>25</option>
	  <option value="26"<?php if($row->distribution_date=="26")echo "selected"; ?>>26</option>
      <option value="27"<?php if($row->distribution_date=="27")echo "selected"; ?>>27</option>
      <option value="28"<?php if($row->distribution_date=="28")echo "selected"; ?>>28</option>
	  <option value="29"<?php if($row->distribution_date=="29")echo "selected"; ?>>29</option>
      <option value="30"<?php if($row->distribution_date=="30")echo "selected"; ?>>30</option>
	  <option value="31"<?php if($row->distribution_date=="31")echo "selected"; ?>>31</option>
        </select>
        </select></div>

     <label for="lname"  class="col-sm-1 control-label">Disbursement Month</label> 
	 	<div class="col-sm-2">
         <select id="typeof_loan" name="disbursement_month" value="<?php echo $row->disbursement_month;?>" class="form-control">
    <option value="">Select Month</option>
      <option value="January"<?php if($row->disbursement_month=="January")echo "selected"; ?>>January</option>
      <option value="February"<?php if($row->disbursement_month=="February")echo "selected"; ?>>February</option>
	  <option value="March"<?php if($row->disbursement_month=="March")echo "selected"; ?>>March</option>
      <option value="April"<?php if($row->disbursement_month=="April")echo "selected"; ?>>April</option>
	  <option value="May"<?php if($row->disbursement_month=="May")echo "selected"; ?>>May</option>
	  <option value="June"<?php if($row->disbursement_month=="June")echo "selected"; ?>>June</option>
      <option value="July"<?php if($row->disbursement_month=="July")echo "selected"; ?>>July</option>
      <option value="August"<?php if($row->disbursement_month=="August")echo "selected"; ?>>August</option>
	  <option value="September"<?php if($row->disbursement_month=="September")echo "selected"; ?>>September</option>
      <option value="October"<?php if($row->disbursement_month=="October")echo "selected"; ?>>October</option>
	  <option value="November"<?php if($row->disbursement_month=="November")echo "selected"; ?>>November</option>
      <option value="December"<?php if($row->disbursement_month=="December")echo "selected"; ?>>December</option>
	  </select>
	  </div>



 
   <label for="lname"  class="col-sm-1 control-label">Disbursement Year</label> 
   <div class="col-sm-2">
    <input type="text" id="profession" name="disbursement_year" value="<?php echo $row->disbursement_year;?>"class="form-control" >
	</div>
  

      <label for="lname"  class="col-sm-1 control-label">Disbursement Amount</label> 
	   <div class="col-sm-2">
    <input type="text" id="profession" name="distribution_amt" value="<?php echo $row->distribution_amt;?>"class="form-control">
	</div>
	</div>
	
<div class="form-group">
      <label for="lname"  class="col-sm-1 control-label">Decision</label> 
	   <div class="col-sm-2">
    
	  
	   <select  name="decision"  class="form-control"required="required">
        <?php
     $pt1=mysqli_query($mysqli,"select name from decision");
     while($p1r=mysqli_fetch_array($pt1))
     {
     ?>
     <option value="<?php echo htmlentities($p1r['name']);?>"<?php if($row->name==$p1r['name']) echo 'selected="selected"';?>><?php echo htmlentities($p1r["name"]);?></option>
     <?php
    }
     ?>
        </select>
	  
	  
	  
	  
	  
	  
	  </div>
 
      <label for="lname" class="col-sm-1 control-label">Remark </label> 
	    <div class="col-sm-2">
    <input type="text" id="profession" name="remark" value="<?php echo $row->remark;?>" class="form-control" required="required">
	</div>
	</div>
  <br>
  
  
      <?php } ?>

  
  
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
<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>

</body>

</html>