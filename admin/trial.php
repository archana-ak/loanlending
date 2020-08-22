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
<title>Loan  Information</title>
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
		 $ret= mysqli_query($con,"SELECT * FROM loan where id = '".$_GET['id']."'");
			while($row=mysqli_fetch_array($ret))
			{
			?>
			
<tr>
<td colspan="4"><h4><u>Loan Realted Info</u></h4></td>
<td>
</tr>
<tr>
<td colspan="6"><b>Reg no. :<?php echo $row['date_of_incorpration'];?></b></td>
</tr>



<tr style="padding-top: 20px;">
<td colspan="6"><h4><u>Customer Information </u></h4></td>
</tr>


<tr>
<td><b>Name of Business:</b></td>
<td><?php echo $row['name_of_entity'];?></td>
<td><b>Bussiness type: </b></td>
<td><?php echo $row['bussiness_type'];?></td>
<td><b>Plz Specify: </b></td>
<td><?php echo $row['bussiness_pls_specify'];?></td>
</tr>

<tr>
<td><b>Nature Of Business :-</b></td>
<td><?php echo $row['nature_of_bussniess'];?></td>
<td><b>Company PAN :-</b></td>
<td><?php echo $row['comp_pan'];?></td>
<td><b>GSTIN :-</b></td>
<td><?php echo $row['gstin'];?></td>
</tr>

<tr>

<td><b>Business Address :- </b></td>
<td><?php echo $row['business_address'];?></td>
<td><b>Landmark :- </b></td>
<td><?php echo $row['landmark'];?></td>
<td><b>PIN :-</b></td>
<td><?php echo $row['pin'];?></td>
</tr>

<tr>

<td><b>City :-</b></td>
<td><?php echo $row['city'];?></td>
<td><b>State :-</b></td>
<td><?php echo $row['state'];?></td>
<td><b>Email:- </b></td>
<td><?php echo $row['email'];?></td>
</tr>

<tr>

<td><b>Date Of Incorpration:- </b></td>
<td><?php echo $row['date_of_incorpration'];?></td>
</tr>

<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
<tr style="padding-top: 20px;">
<td colspan="6"><h4><u>INDIVIDUAL INFORMATION</u> </h4></td>
</tr>


<tr>
<td><b>Name as on PAN Card :-</b></td>
<td><?php echo $row['co_name'];?></td>
<td><b>Category:-</b></td>
<td><?php echo $row['co_category'];?></td>
<td><b>If Company then :- </b></td>
<td><?php echo $row['co_if_comp'];?></td>
</tr>

<tr>
<td><b>Pls.Specify :-</b></td>
<td><?php echo $row['co_comp_pls_specify'];?></td>
<td><b>Title:-</b></td>
<td><?php echo $row['co_title'];?></td>
<td><b>Gender:- </b></td>
<td><?php echo $row['co_gender'];?></td>
</tr>

<tr>
<td><b>C-KYC No:- </b></td>
<td><?php echo $row['co_ckyc'];?></td>
<td><b>PAN :- </b></td>
<td><?php echo $row['co_pan'];?></td>
<td><b>Date Of Birth:- </b></td>
<td><?php echo $row['co_dob'];?></td>
</tr>

<tr>
<td><b>Date Of Anniversary:-</b></td>
<td><?php echo $row['co_doa'];?></td>
<td><b>Maritial Status:-</b></td>
<td><?php echo $row['co_maritial_status'];?></td>
<td><b>Dependents No:-</b></td>
<td><?php echo $row['co_dependents'];?></td>
</tr>

<tr>
<td><b>Education Level :- </b></td>
<td><?php echo $row['co_edu_level'];?></td>
<td><b>Pls.Specify :-  </b></td>
<td><?php echo $row['co_edu_pls_specify'];?></td>
<td><b>Occupation Type :-</b></td>
<td><?php echo $row['co_occupation'];?></td>
</tr>

<tr>
<td><b>Services :-</b></td>
<td><?php echo $row['co_occupation_service'];?></td>
<td><b>Others :- </b></td>
<td><?php echo $row['co_occupation_other'];?></td>
<td><b>Email:- </b></td>
<td><?php echo $row['co_email'];?></td>
</tr>

<tr>
<td><b>Father's Name :- </b></td>
<td><?php echo $row['co_father'];?></td>
<td><b>Mother's Name :-  </b></td>
<td><?php echo $row['co_mother'];?></td>
<td><b>Current Residence Address :-</b></td>
<td><?php echo $row['co_current_owned'];?></td>
</tr>

<tr>
<td><b>Landmark :-</b></td>
<td><?php echo $row['co_current_landmark'];?></td>
<td><b>State :-  </b></td>
<td><?php echo $row['co_current_state'];?></td>
<td><b>City :-</b></td>
<td><?php echo $row['co_current_city'];?></td>
</tr>

<tr>
<td><b>PIN :-</b></td>
<td><?php echo $row['co_current_pin'];?></td>
<td><b>Mobile Number :-</b></td>
<td><?php echo $row['co_mobile'];?></td>
<td><b>Permanant Residence Address :- </b></td>
<td><?php echo $row['co_permanent_owned'];?></td>
</tr>

<tr>
<td><b>Address :- </b></td>
<td><?php echo $row['co_permanent_address'];?></td>
<td><b>Landmark :-  </b></td>
<td><?php echo $row['co_permanent_landmark'];?></td>
<td><b>State :-</b></td>
<td><?php echo $row['co_permanent_state'];?></td>
</tr>

<tr>
<td><b>City :- </b></td>
<td><?php echo $row['co_permanent_city'];?></td>
<td><b>PIN :- </b></td>
<td><?php echo $row['co_permanent_pin'];?></td>

</tr>
<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
<tr style="padding-top: 20px;">
<td colspan="6"><h4><u>Trade Reference 1:</u> </h4></td>
</tr>


<tr>
<td><b>Name:</b></td>
<td><?php echo $row['tr_name'];?></td>
<td><b>Business name:</b></td>
<td><?php echo $row['tr_entity_name'];?></td>
<td><b>Mobile Number :- </b></td>
<td><?php echo $row['tr_mobile'];?></td>
</tr>

<tr>
<td><b>Relation :-</b></td>
<td><?php echo $row['tr_relation'];?></td>
<td><b>Address :-</b></td>
<td><?php echo $row['tr_address'];?></td>
<td><b>City :- </b></td>
<td><?php echo $row['tr_city'];?></td></tr><tr>
<td><b>PIN :-</b></td>
<td><?php echo $row['tr_pin'];?></td>
</tr>
<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
<tr style="padding-top: 20px;">
<td colspan="6"><h4><u>Trade Reference 2: </u></h4></td>
</tr>


<tr>
<td><b>Name:</b></td>
<td><?php echo $row['tr2_name'];?></td>
<td><b>Business name:</b></td>
<td><?php echo $row['tr2_entity_name'];?></td>
<td><b>Mobile Number :- </b></td>
<td><?php echo $row['tr2_mobile'];?></td>
</tr>

<tr>
<td><b>Relation :-</b></td>
<td><?php echo $row['tr2_relation'];?></td>
<td><b>Address :-</b></td>
<td><?php echo $row['tr2_address'];?></td>
<td><b>City :- </b></td>
<td><?php echo $row['tr2_city'];?></td></tr><tr>
<td><b>PIN :-</b></td>
<td><?php echo $row['tr2_pin'];?></td>
</tr>
<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>



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
