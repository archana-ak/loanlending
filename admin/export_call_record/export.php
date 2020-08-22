<?php

require('config.php');
session_start();
$sdate=$_SESSION['sdate'];//print_r($sdate);die();
$edate=$_SESSION['edate'];//print_r($edate);die();

if(isset($_POST['funtri'])){
	
$filename = "Call_Record.csv";
$fp = fopen('php://output', 'w');
$ret = $_POST['nzqma'];
$query = $ret;

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
//fputcsv($fp, $header);
fputcsv($fp,array('Sno','Name of Employee ','Total Record Added','Starting Date','Ending Date'));	
	
$cnt=1;	
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$qmztcb = array();
	$qmztcb[0] = $cnt;;
	$qmztcb[1] = $row['addedby'];
	$r=$row['addedby'];$t=mysqli_query($mysqli,"select count(addedby) as c from customer where  date BETWEEN '$sdate' and '$edate' and  addedby='$r'");
	while($r= mysqli_fetch_array($t,MYSQLI_BOTH))
     {
			$qmztcb[2] = $r['c'];
      }

$qmztcb[3] = $sdate;
$qmztcb[4] = $edate;
	fputcsv($fp, $qmztcb);
	$cnt=$cnt+1;

}
}
exit;
?>