<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add employee
if(isset($_POST['submit']))
{                                                                                                    
$full_name=$_POST['Full_Name'];
$desgination=$_POST['Desgination'];
$team_Leader=$_POST['Team_Leader'];
$team_Manager=$_POST['Team_Manager'];
$office_no=$_POST['Office_no'];
$personal_no=$_POST['personal_no'];
$mail_ID=$_POST['mail_ID'];
$mail_ID_personal=$_POST['mail_ID_personal'];
$join_date=$_POST['join_date'];
$address=$_POST['address'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$basic_salary=$_POST['basic_salary'];
$account_no=$_POST['Account_no'];
$ifsc_code=$_POST['ifsc_code'];
$emp_code=$_POST['emp_code'];
$adhar=$_POST['adhar'];
$pan=$_POST['pan'];
$id=$_GET['id'];
$password=$_POST['pass'];
$status=$_POST['status'];

$sql=mysqli_query($mysqli,"Update employee set name='$full_name', desgination='$desgination',team_leader='$team_Leader',team_manager='$team_Manager',office_no='$office_no',personal_no='$personal_no',email='$mail_ID',email_personal='$mail_ID_personal',join_date='$join_date',address='$address',basic_salary='$basic_salary',account_no='$account_no',ifsc_code='$ifsc_code',state='$state',pin='$pin',emp_code='$emp_code',adhar_no='$adhar',pan_no='$pan',password='$password', status='$status' where id='$id'");
if($sql && $desgination=='Tele Sales Executive' || 'Business Manager')
{
  //echo"<script> alert('Caller is inserted');</script>";
 $id=$_GET['id'];
 $sql=mysqli_query($mysqli,"select * from usercall_log where caller_id='$id'");
 if(mysqli_num_rows($sql)==0)
 {
  $sq=mysqli_query($mysqli,"insert into usercall_log (caller_id) values('$id');") or die(mysqli_error($mysqli));
  $sq=mysqli_query($mysqli,"insert into filteredusercall_log (caller_id) values('$id');") or die(mysqli_error($mysqli));

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
  <title>EDIT Employee</title>
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
            <h2 class="page-title">Edit Employee </h2>
  
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Edit Employee</div>
                  <div class="panel-body">
                    <form method="post" class="form-horizontal">

                          <?php 
                        $id=$_GET['id'];
  $ret="select * from employee where id=?";
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
    <label class="col-sm-1 control-label"> Name</label>
    <div class="col-sm-2">
  
    <input type="text" id="fname" name="Full_Name" value="<?php echo $row->name;?>" class="form-control" required="required">
  </div>
    <label class="col-sm-1 control-label">Desgination</label>
    <div class="col-sm-2">
     <select id="Desgination" name="Desgination"  class="form-control" required="required">
  <option value="">Select Designation</option>
      <?php
      $des=mysqli_query($mysqli,"select name from designation");
      while($d=mysqli_fetch_array($des))
      {
      ?>
      <option value="<?php echo htmlentities($d['name']);?>"<?php if($row->desgination==$d['name']) echo 'selected="selected"';?>><?php echo htmlentities($d["name"]);?></option>
    <?php }
      ?>
    </select>

</div>
 <label class="col-sm-1 control-label">Team Manager</label>
 <div class="col-sm-2">

  <?php 
 $query3 = "SELECT name FROM employee";

$result3 = mysqli_query($mysqli,$query3);

?>
<select  name="Team_Manager" class="form-control">
   <option value="">Select Manager Name</option>
   <option value="Manager">Manager</option>
   
<?php

while($rs=mysqli_fetch_array($result3)) {

?>
<option value="<?php echo $rs["name"]; ?>"<?php if($row->team_manager==$rs['name']) echo 'selected="selected"';?>>
<?php echo $rs["name"]; ?></option>

<?php

}
?>
  </select></div>
 <label class="col-sm-1 control-label">Team Leader</label>
 <div class="col-sm-2">
    <select class="form-control" id="chkveg" name="Team_Leader"  class="form-control">
  <option value="">Select Leader Name</option>
      <option value="Manager">Leader</option>

   <?php
   $sqli=mysqli_query($mysqli,"select name from employee");
            while($ro1=mysqli_fetch_array($sqli))
{
          ?>
          <option value="<?php echo htmlentities($ro1['name']);?>"<?php if($row->team_leader==$ro1['name']) echo 'selected="selected"';?>><?php echo htmlentities($ro1['name']);?>
          </option>
          <?php
        }

   ?>
       
</select>
 </div>
</div>
 <div class="form-group">
   <label class="col-sm-1 control-label">Mobile Number</label>
   <div class="col-sm-2">
    <input type="tel" id="officeno" name="Office_no" value="<?php echo $row->office_no;?>" onBlur="checkAvailability3()" placeholder ="123-456-7890 (Office)" class="form-control" required="required"   >
  <span id="user-availability-status3" style="font-size:12px;"></span>
</div>
 <label class="col-sm-1 control-label">Mobile No</label>
 <div class="col-sm-2">
  <input type="tel" id="personalno" name="personal_no" value="<?php echo $row->personal_no;?>"
 onBlur="checkAvailability2()" placeholder ="123-456-7890 (Personal)" class="form-control" required="required"  >
  <span id="user-availability-status2" style="font-size:12px;"></span>
 </div>
  
    <label class="col-sm-1 control-label">Mail ID </label>
    <div class="col-sm-2">
    <input type="email" id="email" name="mail_ID" value="<?php echo $row->email;?>" placeholder="Office" onBlur="checkAvailability()"  class="form-control" required="required">
  <span id="user-availability-status" style="font-size:12px;"></span>
</div>

 <label class="col-sm-1 control-label">Mail ID </label>
 <div class="col-sm-2">
    <input type="email" id="email1" name="mail_ID_personal"  value="<?php echo $row->email_personal;?>" placeholder="Personal"
 onBlur="checkAvailability1()"  class="form-control" required="required">
  <span id="user-availability-status1" style="font-size:12px;"></span>
 </div>
</div>
 <div class="form-group">
  <label class="col-sm-1 control-label">Joining Date </label>
  <div class="col-sm-2">
    <input type="date" id="lname" name="join_date"  value="<?php echo $row->join_date;?>"
 class="form-control" required="required">
  </div>

  
 <label class="col-sm-1 control-label">Address</label> 
 <div class="col-sm-2">
    <input type="text" id="lname" name="address"   value="<?php echo $row->address;?>" class="form-control" required="required">
</div>

 <label class="col-sm-1 control-label">State</label>
 <div class="col-sm-2">
  <?php 
 $query3 = "SELECT distinct(sname) FROM city";

$result3 = mysqli_query($mysqli,$query3);

?>
   <select name="state"  class="form-control"  required="required">
<option value="">Select State</option>
        <?php $sql1=mysqli_query($mysqli,"SELECT distinct(sname) FROM city");
        while($row1=mysqli_fetch_array($sql1))
        {
          ?>
          <option value="<?php echo htmlentities($row1['sname']);?>"<?php if($row->state==$row1['sname']) echo 'selected="selected"';?>>
          	<?php echo htmlentities($row1['sname']);?>
          </option>
          <?php
        }

?></select>
</div>
  <label class="col-sm-1 control-label">Pin</label>
  <div class="col-sm-2">
   <input type="text" id="lname" name="pin"  value="<?php echo $row->pin;?>"  class="form-control" required="required">
  </div>
  </div>
   <div class="form-group">
 <label class="col-sm-1 control-label">Account No</label>
 <div class="col-sm-2">
    <input type="text" id="lname" name="Account_no"   value="<?php echo $row->account_no;?>" placeholder ="Account Number" class="form-control" required="required">
  </div>
   <label class="col-sm-1 control-label">IFSC Code</label>
   <div class="col-sm-2">
  <input type="text" id="lname" name="ifsc_code"   value="<?php echo $row->ifsc_code;?>" placeholder ="IFSC Code" class="form-control" required="required">
  </div>
  
<label class="col-sm-1 control-label">Basic Salary</label>
<div class="col-sm-2">
    <input type="text" id="lname" name="basic_salary"     value="<?php echo $row->basic_salary;?>" class="form-control"  required="required" >
   </div>

   <label class="col-sm-1 control-label">Employee Code </label>
   <div class="col-sm-2">
   <input type="text" id="lname" name="emp_code"     value="<?php echo $row->emp_code;?>"  class="form-control" required="required">
  </div>
  </div>
   <div class="form-group">
   <label class="col-sm-1 control-label">Adhar No</label>
   <div class="col-sm-2">
   <input type="text" id="lname" name="adhar"  value="<?php echo $row->adhar_no;?>"  class="form-control" required="required">
  </div>
  
 <label class="col-sm-1 control-label">PAN No</label>
 <div class="col-sm-2">
   <input type="text" id="lname" name="pan"  value="<?php echo $row->pan_no;?>" class="form-control" required="required">
  </div>
  
    <label class="col-sm-1 control-label">Password</label>
    <div class="col-sm-2">
   <input type="text" id="pass"  value="<?php echo $row->password;?>" name="pass" class="form-control" required="required">
  </div>
  
   <label class="col-sm-1 control-label">Status</label>
   <div class="col-sm-2">
  <select id="country" name="status"   value="<?php echo $row->status;?>"   class="form-control" required="required">
 <option value="">Select Type</option>
      <option value="Active"<?php if($row->status=="Active")echo "selected"; ?>>Active</option>
      <option value="Inactive"<?php if($row->status=="Inactive")echo "selected"; ?>>Inactive</option>
    </select>
  
  
  <?php } ?>
  </div>
  </div>
  <div class="col-sm-6 col-sm-offset-4-offset-8"><br>
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

</script><script>
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
    }
  </script>
  <script>
function getState(val) {

  $.ajax({

  type: "POST",

  url: "getLeader.php",

  data:'country_id='+val,

  success: function(data){

    $("#chkveg").html(data);

    

  }

  });

}
</script>
</body>

</html>