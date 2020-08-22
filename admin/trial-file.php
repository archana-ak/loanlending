<?php
session_start();
define('DB_SERVER','localhost:3306');
define('DB_USER','kamluzmh_parth');
define('DB_PASS' ,'parth@123');
define('DB_NAME', 'kamluzmh_parth');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>File Processing</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="hostel.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
</head>

<body>
<div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2 class="page-title" style="margin-top:2% padding-left:5%"></h2>
            <div class="panel panel-default">
              <div class="panel-heading"></div>
              <div class="panel-body">
                <table id="zctb" class="table table-bordered " style="padding-left: 50px;"  cellspacing="0" width="100%">
                  
                  
                  <tbody>
<?php 
		 $ret= mysqli_query($con,"SELECT * FROM file where id = '".$_GET['id']."'");
			while($row=mysqli_fetch_array($ret))
			{
			?>
			
<tr>
<td colspan="4"><h4><u>File Processing Info</u></h4></td>
<td>
</tr>




<tr>
<td><b>Customer name  :</b></td>
<td><?php echo $row['name'];?></td>
<td><b>Business Name  :</b></td>
<td><?php echo $row['business_name'];?></td>
<td><b>State :</b></td>
<td><?php echo $row['state'];?></td>
</tr>

<tr>
<td><b>District :</b></td>
<td><?php echo $row['district'];?></td>
<td><b>City :</b></td>
<td><?php echo $row['city'];?></td>
<td><b>NSM:</b></td>
<?php 
$n=$row['nsm_name'];
   $sql="select * from nsm where id='$n'";
 $t=mysqli_query($con,$sql);
 while($r=$t->fetch_object())
 {
   ?>
<td><?php echo $r->name;?></td><?php }?>
</tr>
<tr>
  <tr>
<td><b>ZSM :</b></td>
<?php 
$z=$row['zsm_name'];
   $sql1="select * from zsm where id='$z'";
 $t1=mysqli_query($con,$sql1);
 while($r1=$t1->fetch_object())
 {
   ?>
<td><?php echo $r1->name;?></td><?php }?>
<td><b>RSM :</b></td>
<?php 
$r=$row['rsm_name'];

   $sql2="select * from rsm where id='$r'";
 $t2=mysqli_query($con,$sql2);
 while($r2=$t2->fetch_object())
 {
   ?>
<td><?php echo $r2->name;?></td><?php }?>
<td><b>SM:</b></td>
<?php 
$s=$row['sm_name'];

   $sql3="select * from sm where id='$s'";
 $t3=mysqli_query($con,$sql3);
 while($r3=$t3->fetch_object())
 {
   ?>
<td><?php echo $r3->name;?></td><?php }?>
</tr>
  <tr>
<td><b>Manager:</b></td>
<td><?php echo $row['manager'];?></td>
</tr>
<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>





<tr>
<td><b>Team Leader:</b></td>
<td><?php echo $row['team_leader'];?></td>
<td><b>Executive: </b></td>
<td><?php echo $row['executive'];?></td>
<td><b>Closed By: </b></td>
<td><?php echo $row['closed_by'];?></td>
</tr>

<tr>
<td><b>Email :-</b></td>
<td><?php echo $row['mail'];?></td>
<td><b>Profession :-</b></td>
<td><?php echo $row['profession'];?></td>
<td><b>Market :-</b></td>
<td><?php echo $row['market'];?></td>
</tr>

<tr>
<td><b>Product :- </b></td>
<td><?php echo $row['product'];?></td>
<td><b>Bank Name :- </b></td>
<td><?php echo $row['bankname'];?></td>
<td><b>Login Date :- </b></td>
<td><?php echo $row['login_date'];?></td>
</tr>

<tr>
<td><b>Login Month :-</b></td>
<td><?php echo $row['login_month'];?></td>
<td><b>Login Year :-</b></td>
<td><?php echo $row['login_year'];?></td>
<td><b>Login Amount :-</b></td>
<td><?php echo $row['login_amt'];?></td>
</tr>

<tr>
<td><b>Disbursement Date:- </b></td>
<td><?php echo $row['distribution_date'];?></td>
<td><b>Disbursement Month:- </b></td>
<td><?php echo $row['disbursement_month'];?></td>
</tr>

<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>



<tr>
<td><b>Disbursement Year :-</b></td>
<td><?php echo $row['disbursement_year'];?></td>
<td><b>Disbursement Amount:-</b></td>
<td><?php echo $row['distribution_amt'];?></td>
<td><b>Decision :- </b></td>
<td><?php echo $row['decision'];?></td>
</tr>

<tr>
<td><b>Remark :-</b></td>
<td><?php echo $row['remark'];?></td>

</tr>



<?php
} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
