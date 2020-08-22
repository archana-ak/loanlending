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
	<title>Paarth management </title>
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
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
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
					<br>
						<h2 class="page-title">Count Calls</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											
										
<div class="form-group">
<label class="col-sm-1 control-label">Starting Date</label> <div class="col-sm-2">
    <input type="date" id="fname" name="sdate"  class="form-control" required="required">
</div>
<label class="col-sm-1 control-label">Ending Date</label> <div class="col-sm-2">
    <input type="date" id="fname" name="edate"  class="form-control" required="required">
</div>

 </div>  
 
 <div class="col-sm-6 col-sm-offset-8"><br>
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
</div></div></div>


	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
					<?php 
						if(isset($_POST['submit'])){
							$aid=$_SESSION['id'];
$sdate=$_POST['sdate'];
$_SESSION['sdate']=$sdate;
$edate=$_POST['edate'];
$_SESSION['edate']=$edate;

$ret="select * from customer where c_date BETWEEN '$sdate' and '$edate' group by calledby";
							
						}
						?>
							<div class="panel panel-default">
				            <div class="panel-heading" style="color: black;">All Details
							&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<form action="export_call_count/excel.php" method="post">
				<input type="hidden" name="nzqma" id="nzqma" value="<?php if(isset($_POST['submit'])){ echo $ret; } ?>" />
				<button type="submit" name="balrish" id="balrish" style =" border: 2px solid gray;color: gray;background-color: white;padding: 4px 10px;border-radius: 8px;font-size: 20px;font-weight: bold;"> Export</button>
				</form>
							
							
							
							</div>
							<div class="panel-body"  style="overflow-x:auto;">
								<?php
if(isset($_POST['submit']))
{

?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Name of Employee</th>
											<th>Total Call's</th>
											<th>Starting Date</th>
											<th>Ending Date</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Name of Employee</th>
											<th>Total Call's</th>
											<th>Starting Date</th>
											<th>Ending Date</th>
											<th>Action</th>
											</tr>
									</tfoot>
									<tbody>
<?php	
//$aid=$_SESSION['id'];
//$sdate=$_POST['sdate'];
//$edate=$_POST['edate'];
//$ret="select * from customer where c_date BETWEEN '$sdate' and '$edate' group by calledby";
//$stmt= $mysqli->prepare($ret);
//$stmt->bind_param('i',$aid);
//$stmt->execute() ;//ok
//$res=$stmt->get_result();
$res=mysqli_query($mysqli,$ret);
if(!$res)
{
	die("problem".mysqli_error($mysqli));
}
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->calledby;?></td>
<?php 
   $sql="select count(calledby) as c from customer where c_date BETWEEN '$sdate' and '$edate' and calledby='$row->calledby'";
 $t=mysqli_query($mysqli,$sql);
 while($r=$t->fetch_object())
 {
   ?>
<td><?php echo $r->c;?></td>
<td><?php echo $sdate;?></td>
<td><?php echo $edate;?></td>
<td>
<a href="javascript:void(0);"  onClick="popUpWindow('https://device.digitalzilla.xyz/admin/print-call.php?id=<?php echo $row->id;?>&count=<?php echo $r->c;?>&sdate=<?php echo $sdate;?>&edate=<?php echo $edate;?> ');" title="View Full Details"><i class="fa fa-desktop"></i></a></td>

										</tr><?php }
?>
									<?php
$cnt=$cnt+1;
									 } ?>
											
									</tbody>
								<?php }
								?>
								</table>
								
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