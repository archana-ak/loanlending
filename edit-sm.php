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
$product_name=$_POST['product_name'];

$office_no=$_POST['Office_no'];
$personal_no=$_POST['personal_no'];
$mail_ID=$_POST['mail_ID'];
$mail_ID_personal=$_POST['mail_ID_personal'];
$join_date=$_POST['join_date'];

$state=$_POST['state'];
$hub=$_POST['hub'];
$city=$_POST['city'];
$address=$_POST['address'];

$status=$_POST['status'];
$zsm=$_POST['zsm'];
$nsm=$_POST['nsm'];
$rsm=$_POST['rsm'];
$id=$_GET['id'];


$sql=mysqli_query($mysqli,"Update sm set name='$full_name', role='$role',bank_name='$bank_name',product_name='$product_name',office_no='$office_no',personal_no='$personal_no',email='$mail_ID',email_personal='$mail_ID_personal',join_date='$join_date',state='$state',hub='$hub',city='$city',address='$address',status='$status',rsm_name='$rsm',zsm_name='$zsm',nsm_name='$nsm',rsmid='$rsm',zsmid='$zsm',nsmid='$nsm' where id='$id'");

if(!$sql)
{
	die('invalid query'.mysqli_error($mysqli));
}
else
{
  echo "<script>alert('SM has been Updated successfully');</script>";
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
  <title>EDIT SM</title>
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
          
            <h2 class="page-title">Edit SM </h2>
  
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Edit SM</div>
                  <div class="panel-body">
                    <form method="post" class="form-horizontal">

                          <?php 
                        $id=$_GET['id'];
  $ret="select * from sm where id=?";
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
											
<label for="fname" class="col-sm-1 control-label" > Name</label>
<div class="col-sm-2">
    <input type="text" id="fname" name="Full_Name" value="<?php echo $row->name;?>" class="form-control" required="required">
</div>

    <label for="lname"  class="col-sm-1 control-label">Role </label>
	<div class="col-sm-2">
	<select id="country" name="role" class="form-control" required="required">
  <option value="">Select type</option>
  
  
   <option value="NSM"<?php if($row->role=="NSM")echo "selected"; ?>>NSM</option>
   
      <option value="RSM"<?php if($row->role=="RSM")echo "selected"; ?>>RSM</option>
      
         <option value="ZSM"<?php if($row->role=="ZSM")echo "selected"; ?>>ZSM</option>
         
      <option value="SM"<?php if($row->role=="SM")echo "selected"; ?>>SM</option>
   
    </select>
  </div>
  
  
  
    <label for="fname" class="col-sm-1 control-label" >Bank Name</label>
  <div class="col-sm-2">
    <input type="text" id="fname" name="bank_name" value="<?php echo $row->bank_name;?>" class="form-control" required="required">
</div>


<label for="fname" class="col-sm-1 control-label" >Product Name</label>

<div class="col-sm-2">
    <input type="text" id="fname" name="product_name" value="<?php echo $row->product_name;?>" class="form-control" required="required">
</div>


 
 </div>
 
 <div class="form-group">
 
 
 
   <label for="lname"   class="col-sm-1 control-label">Office No</label>
   <div class="col-sm-2">
    <input type="tel" id="lname" name="Office_no" class="form-control" value="<?php echo $row->office_no;?>"  required="required">
	</div>
	
   <label for="lname"   class="col-sm-1 control-label">Personal No</label>
   <div class="col-sm-2">
  <input type="tel" id="lname" name="personal_no"  class="form-control" value="<?php echo $row->personal_no;?>" required="required"  >
  </div>
 
 
 
   <label for="lname" class="col-sm-1 control-label">Mail ID</label>
      <div class="col-sm-2">
    <input type="email" id="lname" name="mail_ID"  value="<?php echo $row->email;?>" placeholder="Office"  class="form-control" required="required" onclick="ValidateEmail(mail_ID)">
	</div>
  
  
  <label for="lname" class="col-sm-1 control-label">Mail ID </label>
  <div class="col-sm-2">
    <input type="email" id="lname" name="mail_ID_personal" value="<?php echo $row->email_personal;?>" placeholder="Personal" class="form-control" required="required" onclick="ValidateEmail(mail_ID)">
	</div>
  
  
  
 
	</div>
	
	 <div class="form-group">
	
	
	 <label for="lname"  class="col-sm-1 control-label">Joining Date</label>
     <div class="col-sm-2">
    <input type="date" id="lname" name="join_date" value="<?php echo $row->join_date;?>" class="form-control" required="required">
  </div>


    <label for="country" class="col-sm-1 control-label">State </label>
	<div class="col-sm-2">
   <input type="text" id="lname" name="state" value="<?php echo $row->state;?>" class="form-control"  required="required">
   </div>
  
   <label for="country"  class="col-sm-1 control-label">District</label>
   <div class="col-sm-2">
   <input type="text" id="lname" name="hub" value="<?php echo $row->hub;?>"class="form-control" required="required">
   </div>

   <label for="country" class="col-sm-1 control-label">City </label>
    <div class="col-sm-2">
   <input type="text" id="lname" name="city" value="<?php echo $row->city;?>" class="form-control"  required="required">
   </div>
   </div>
   
    <div class="form-group">

   <label for="country"  class="col-sm-1 control-label">Office Address </label>
   <div class="col-sm-2">
   <input type="text" id="lname" name="address" value="<?php echo $row->address;?>" class="form-control"  required="required">
   </div>
  
  


  
    <label for="country" class="col-sm-1 control-label">Status </label>
	<div class="col-sm-2">
  <select id="country" name="status"  class="form-control" required="required">
  <option value="">Select type</option>
      <option value="Active"<?php if($row->status=="Active")echo "selected"; ?>>active</option>
      <option value="Inactive"<?php if($row->status=="Inactive")echo "selected"; ?>>Inactive</option>
    </select></div>
	
	    <label for="fname"  class="col-sm-1 control-label">R.S.M</label>
	  <div class="col-sm-2">
    <select id="rsm" name="rsm" class="form-control" required="required">
  <option value="">Select RSM</option>
<?php $ret=mysqli_query($mysqli,"select * from rsm");
      while($row2=mysqli_fetch_array($ret))
{
?>
    <option value="<?php echo htmlentities($row2['id']);?><?php echo htmlentities($row2['name']);?>"<?php $r=$row->rsm_name; //print_r($r);die();
 $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from rsm where id='$r'"),MYSQLI_BOTH); 
 if($t['name']==$row2['name']) echo 'selected="selected"';?>>
<?php echo $row2["name"]; ?></option>
  <?php } ?>
      </select></div>
  
   <label for="fname"  class="col-sm-1 control-label" >Z.S.M </label>
   <div class="col-sm-2">
    <select id="zsm" name="zsm" class="form-control" required="required">
  <option value="">Select ZSM</option>
<?php $ret=mysqli_query($mysqli,"select * from zsm");
      while($row3=mysqli_fetch_array($ret))
{
?>
   <option value="<?php echo htmlentities($row3['id']);?><?php echo htmlentities($row3['name']);?>"<?php $r=$row->zsm_name; //print_r($r);die();
 $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from zsm where id='$r'"),MYSQLI_BOTH); 
 if($t['name']==$row3['name']) echo 'selected="selected"';?>>
<?php echo $row3["name"]; ?></option>
        </option>
  <?php } ?>
      </select>
	  </div>
	
	
	
	</div>
  
  <div class="form-group">
  
  

       <label for="fname"   class="col-sm-1 control-label" >N.S.M </label>
	   <div class="col-sm-2">
    <select id="nsm" name="nsm" class="form-control" required="required">
  <option value="">Select NSM</option>
<?php $ret=mysqli_query($mysqli,"select * from nsm");
      while($row4=mysqli_fetch_array($ret))
{
?> <option value="<?php echo htmlentities($row4['id']);?><?php echo htmlentities($row4['name']);?>"<?php $r=$row->nsm_name; //print_r($r);die();
 $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from nsm where id='$r'"),MYSQLI_BOTH); 
 if($t['name']==$row4['name']) echo 'selected="selected"';?>>
<?php echo $row4["name"]; ?></option>
  <?php } ?>
      </select></div>
  <?php } ?>
  </div>
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