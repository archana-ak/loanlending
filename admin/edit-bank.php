<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add employee
if(isset($_POST['submit']))
{                                                                                                    
$bank_name=$_POST['bank_name'];
$typeof_loan=$_POST['typeof_loan'];
$nsm=$_POST['nsm'];
$zsm=$_POST['zsm'];
$rsm=$_POST['rsm'];
$sm=$_POST['sm'];
$city=$_POST['city'];
$hub=$_POST['hub'];
$state=$_POST['state'];
$id=$_GET['id'];


$sql=mysqli_query($mysqli,"Update bank set name='$bank_name', typeof_loan='$typeof_loan',sm_name='$sm',rsm_name='$rsm',
zsm_name='$zsm',nsm_name='$nsm',city='$city',hub='$hub',state='$state' where id='$id'");

if(!$sql)
{
	die('invalid query'.mysqli_error($mysqli));
}
else
{
  echo "<script>alert('Bank has been Updated successfully');</script>";
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
  <title>EDIT Bank</title>
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
           <h2 class="page-title">Edit Bank </h2>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">Edit Bank</div>
                  <div class="panel-body">
                    <form method="post" class="form-horizontal">

                          <?php 
                        $id=$_GET['id'];
  $ret="select * from bank where id=?";
    $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$id);
   $stmt->execute() ;//ok
   $res=$stmt->get_result();
   //$cnt=1;
     while($row=$res->fetch_object())
    {
      ?>
                      
                                        
<div class="form-group">
<label class="col-sm-1 control-label">Bank Name </label> <div class="col-sm-2">
     <select  name="bank_name"  class="form-control"required="required">
 <?php
     $pt1=mysqli_query($mysqli,"select name from banknames");
     while($p1r=mysqli_fetch_array($pt1))
     {
     ?>
     <option value="<?php echo htmlentities($p1r['name']);?>"<?php if($row->name==$p1r['name']) echo 'selected="selected"';?>><?php echo htmlentities($p1r["name"]);?></option>
     <?php
    }
     ?>
</select></div>

    <label class="col-sm-1 control-label">Products (Type of Loan) </label> <div class="col-sm-2">
    <select id="typeof_loan" name="typeof_loan"class="form-control" required="required">
 <option value="">Select Loan Type</option>
  <?php
     $pt=mysqli_query($mysqli,"select name from product");
     while($pr=mysqli_fetch_array($pt))
     {
     ?>
     <option value="<?php echo htmlentities($pr['name']);?>"<?php if($row->typeof_loan==$pr['name']) echo 'selected="selected"';?>><?php echo htmlentities($pr["name"]);?></option>
     <?php
    }
     ?>
        </select>
</div>
  
<label class="col-sm-1 control-label">Percent(%)</label> <div class="col-sm-2">
    <input type="text" id="fname" name="per" class="form-control" value="<?php echo $row->percent;?>"
 required="required"></div></div>
      
       <ol class ="breadcrumb mb-4">
<b>
Location:-</b>
</ol>
<div class="form-group">

<label class="col-sm-1 control-label">CITY </label> <div class="col-sm-2">
    <input type="text" id="fname" name="city"  value="<?php echo $row->city;?>" class="form-control" required="required"></div>
<label class="col-sm-1 control-label">HUB </label>
 <div class="col-sm-2">
    <input type="text" id="fname" name="hub"  value="<?php echo $row->hub;?>" class="form-control" required="required"></div>

<label class="col-sm-1 control-label">STATE </label> <div class="col-sm-2">
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

<option value="<?php echo $rs["sname"]; ?>"
<?php $r=$row->state; //print_r($r);die();
 $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from city where sname='$r'"),MYSQLI_BOTH); 
 if($t['sname']==$rs['sname']) echo 'selected="selected"';?>>
<?php echo $rs["sname"]; ?></option>

<?php

}

?>
                                      </select></div>
</div>
   
    
    <ol class ="breadcrumb mb-4">
<b>
Managers:-</b>
</ol>
<div class="form-group">
<label class="col-sm-1 control-label">N.S.M </label> <div class="col-sm-2">


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
        while($row1 = mysqli_fetch_array($res))
          {
            
            ?>
        
          <option value="<?php echo htmlentities($row1['id']);?>"<?php $r=$row->nsm_name; //print_r($r);die();
 $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from nsm where id='$r'"),MYSQLI_BOTH); 
 if($t['name']==$row1['name']) echo 'selected="selected"';?>>
<?php echo $row1["name"]; ?></option>
        <?php
        }
      }
      ?>
    </select></div>
    
<label class="col-sm-1 control-label">Z.S.M </label> <div class="col-sm-2">
    <select name="zsm" id="zsm"  class="form-control" required="required">
      <option value="">------- Select --------</option></select></div>


       <label class="col-sm-1 control-label">R.S.M </label> <div class="col-sm-2">
    <select id="rsm" name="rsm"  class="form-control" required="required">
  <option value="">-------Select-------</option>
            </select>
</div>
<label class="col-sm-1 control-label">S.M </label> <div class="col-sm-2">
    <select id="sm" name="sm"  class="form-control" required="required">
  <option value="" >--------Select-------</option>
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
  </form>  <?php }
    ?>
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
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">
</script>
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
</body>

</html>