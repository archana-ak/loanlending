<?php
session_start();
require('config.php');
$sdate=$_SESSION['sdate'];//print_r($sdate);die();
$edate=$_SESSION['edate'];//print_r($edate);die();
	 if(isset($_POST['balrish'])){
	
$ret = $_POST['nzqma'];
$ballu = mysqli_query($mysqli,$ret) or die("please search first.. then try to export the file".mysqli_error($mysqli));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export data to excel in PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-left: 0px; margin-right: 0px; padding-right: 0px;">
<form method="post" action="export.php">
<input type="hidden" name="nzqma" id="nzqma" value="<?php if(isset($_POST['balrish'])){ echo $ret; } ?>" />
 <button type="Submit" name="funtri" id="funtri" class="btn btn-primary">Export</button>
</form>
  <table class="table table-bordered  table-striped" style="overflow-x:auto;">
    <thead>
      <tr>
      <th>S.No</th>
				<th>Name of Employee</th>
			  <th>Total Records Added</th>
      <th>Stat</th>
      <th>End</th>
      </tr>
    </thead>
    <tbody>
	 <?php 

$cnt=1;

	 while($row=mysqli_fetch_array($ballu,MYSQLI_BOTH))
    {?>	
	 <tr>
<td><?php echo $cnt;;?></td>
<td><?php echo $row['addedby']?></td>
<?php 
$r=$row['addedby'];
   $sql="select count(addedby) as c from customer where  date BETWEEN '$sdate' and '$edate' and  addedby='$r'";
   
 $t=mysqli_query($mysqli,$sql);
 while($r=$t->fetch_object())
 {
	 
   ?>
<td><?php echo $r->c?></td>
<td><?php echo $sdate?></td>
<td><?php echo $edate?></td>


      </tr>
	 <?php }
$cnt=$cnt+1;

  } ?>
    </tbody>
  </table>
</div>
<style>
.btn{
	float: right;
    margin-bottom: 20px;
    margin-top: 20px;
}
</style>
</body>
</html>
