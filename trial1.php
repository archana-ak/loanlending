<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
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
	<title>loan Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:2%">loan Details</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All loan Details</div>
							<div class="panel-body">
								<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
									
									
									<tbody>
<?php 
 $id=$_GET['id'];
		$ret="SELECT * FROM loan where id=?";
			 $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$id);
   $stmt->execute() ;//ok
   $res=$stmt->get_result();
   //$cnt=1;
     while($row=$res->fetch_object())
    {
      ?>

<tr>
<td colspan="4"><h4>Loan Realted Information</h4></td>
<td><a href="javascript:void(0);"  onClick="popUpWindow('https://device.digitalzilla.xyz/trial.php?id=<?php echo $row->id;?>');" title="View Full Details"    >Print Data</a></td>
</tr>
<tr>
<td colspan="6"><b>Reg no. :<?php echo $row->date_of_incorpration;?></b></td>
</tr>





<tr style="padding-top: 20px;">
<td colspan="6"><h4>Customer Information </h4></td>
</tr>


<tr>
<td><b>Name of Business:</b></td>
<td><?php echo $row->name_of_entity;?></td>
<td><b>Bussiness type: </b></td>
<td><?php echo $row->bussiness_type;?></td>
<td><b>Plz Specify: </b></td>
<td><?php echo $row->bussiness_pls_specify;?></td>
</tr>

<tr>
<td><b>Nature Of Business :-</b></td>
<td><?php echo $row->nature_of_bussniess;?></td>
<td><b>Company PAN :-</b></td>
<td><?php echo $row->comp_pan;?></td>
<td><b>GSTIN :-</b></td>
<td><?php echo $row->gstin;?></td>
</tr>

<tr>

<td><b>Business Address :- </b></td>
<td><?php echo $row->business_address;?></td>
<td><b>Landmark :- </b></td>
<td><?php echo $row->landmark;?></td>
<td><b>PIN :-</b></td>
<td><?php echo $row->pin;?></td>
</tr>

<tr>

<td><b>City :-</b></td>
<td><?php echo $row->city;?></td>
<td><b>State :-</b></td>
<td><?php echo $row->state;?></td>
<td><b>Email:- </b></td>
<td><?php echo $row->email;?></td>
</tr>

<tr>

<td><b>Date Of Incorpration:- </b></td>
<td><?php echo $row->date_of_incorpration;?></td><td></td><td></td>
</tr>


<tr style="padding-top: 20px;">
<td colspan="6"><h4>INDIVIDUAL INFORMATION </h4></td>
</tr>


<tr>
<td><b>Name as on PAN Card :-</b></td>
<td><?php echo $row->co_name;?></td>
<td><b>Category:-</b></td>
<td><?php echo $row->co_category;?></td>
<td><b>If Company then :- </b></td>
<td><?php echo $row->co_if_comp;?></td>
</tr>

<tr>
<td><b>Pls.Specify :-</b></td>
<td><?php echo $row->co_comp_pls_specify;?></td>
<td><b>Title:-</b></td>
<td><?php echo $row->co_title;?></td>
<td><b>Gender:- </b></td>
<td><?php echo $row->co_gender;?></td>
</tr>

<tr>
<td><b>C-KYC No:- </b></td>
<td><?php echo $row->co_ckyc;?></td>
<td><b>PAN :- </b></td>
<td><?php echo $row->co_pan;?></td>
<td><b>Date Of Birth:- </b></td>
<td><?php echo $row->co_dob;?></td>
</tr>

<tr>
<td><b>Date Of Anniversary:-</b></td>
<td><?php echo $row->co_doa;?></td>
<td><b>Maritial Status:-</b></td>
<td><?php echo $row->co_maritial_status;?></td>
<td><b>Dependents No:-</b></td>
<td><?php echo $row->co_dependents;?></td>
</tr>

<tr>
<td><b>Education Level :- </b></td>
<td><?php echo $row->co_edu_level;?></td>
<td><b>Pls.Specify :-  </b></td>
<td><?php echo $row->co_edu_pls_specify;?></td>
<td><b>Occupation Type :-</b></td>
<td><?php echo $row->co_occupation;?></td>
</tr>

<tr>
<td><b>Services :-</b></td>
<td><?php echo $row->co_occupation_service;?></td>
<td><b>Others :- </b></td>
<td><?php echo $row->co_occupation_other;?></td>
<td><b>Email:- </b></td>
<td><?php echo $row->co_email;?></td>
</tr>

<tr>
<td><b>Father's Name :- </b></td>
<td><?php echo $row->co_father;?></td>
<td><b>Mother's Name :-  </b></td>
<td><?php echo $row->co_mother;?></td>
<td><b>Current Residence Address :-</b></td>
<td><?php echo $row->co_current_owned;?></td>
</tr>

<tr>
<td><b>Landmark :-</b></td>
<td><?php echo $row->co_current_landmark;?></td>
<td><b>State :-  </b></td>
<td><?php echo $row->co_current_state;?></td>
<td><b>City :-</b></td>
<td><?php echo $row->co_current_city;?></td>
</tr>

<tr>
<td><b>PIN :-</b></td>
<td><?php echo $row->co_current_pin;?></td>
<td><b>Mobile Number :-</b></td>
<td><?php echo $row->co_mobile;?></td>
<td><b>Permanant Residence Address :- </b></td>
<td><?php echo $row->co_permanent_owned;?></td>
</tr>

<tr>
<td><b>Address :- </b></td>
<td><?php echo $row->co_permanent_address;?></td>
<td><b>Landmark :-  </b></td>
<td><?php echo $row->co_permanent_landmark;?></td>
<td><b>State :-</b></td>
<td><?php echo $row->co_permanent_state;?></td>
</tr>

<tr>
<td><b>City :- </b></td>
<td><?php echo $row->co_permanent_city;?></td>
<td><b>PIN :- </b></td>
<td><?php echo $row->co_permanent_pin;?></td><td></td><td></td>

</tr>

<tr style="padding-top: 20px;">
<td colspan="6"><h4>Trade Reference 1: </h4></td>
</tr>


<tr>
<td><b>Name:</b></td>
<td><?php echo $row->tr_name;?></td>
<td><b>Business name:</b></td>
<td><?php echo $row->tr_entity_name;?></td>
<td><b>Mobile Number :- </b></td>
<td><?php echo $row->tr_mobile;?></td>
</tr>

<tr>
<td><b>Relation :-</b></td>
<td><?php echo $row->tr_relation;?></td>
<td><b>Address :-</b></td>
<td><?php echo $row->tr_address;?></td>
<td><b>City :- </b></td>
<td><?php echo $row->tr_city;?></td></tr><tr>
<td><b>PIN :-</b></td>
<td><?php echo $row->tr_pin;?></td><td></td><td></td><td></td><td></td>
</tr>

<tr style="padding-top: 20px;">
<td colspan="6"><h4>Trade Reference 2: </h4></td>
</tr>


<tr>
<td><b>Name:</b></td>
<td><?php echo $row->tr2_name;?></td>
<td><b>Business name:</b></td>
<td><?php echo $row->tr2_entity_name;?></td>
<td><b>Mobile Number :- </b></td>
<td><?php echo $row->tr2_mobile;?></td>
</tr>

<tr>
<td><b>Relation :-</b></td>
<td><?php echo $row->tr2_relation;?></td>
<td><b>Address :-</b></td>
<td><?php echo $row->tr2_address;?></td>
<td><b>City :- </b></td>
<td><?php echo $row->tr2_city;?></td></tr><tr>
<td><b>PIN :-</b></td>
<td><?php echo $row->tr2_pin;?></td><td></td><td></td><td></td><td></td>
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
