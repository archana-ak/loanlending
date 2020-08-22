<?php

require('config.php');

if(isset($_POST['funtri'])){
	
$filename = "Search_report.csv";
$fp = fopen('php://output', 'w');
$ret = $_POST['nzqma'];
$query = $ret;

//$header[] = ['a','b'];


header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
//fputcsv($fp, $header);
fputcsv($fp,array('Sno','Customer Name','Bussiness Name','State','Hub','Location','NSM','ZSM','RSM','SM','PMCPL Manager','PMCPL Team Leader','PMCPL Executive','Closed By','Mobile No','Email','Profession','Market','Percent','Product','Bank Name','Carry Forward','Login Date','Login Month','Login Year','Login Amount','Distribution Date','Distribution Month','Distribution Year','Distribution Amount','Decision','Remark'));	
	
	
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$qmztcb = array();
	$qmztcb[0] = $row["id"];
	$qmztcb[1] = $row['name'];
	$qmztcb[2] = $row['business_name'];
	$qmztcb[3] = $row['state'];
	$qmztcb[4] = $row['district'];
	$qmztcb[5] = $row['city'];
	
	$r=$row['nsm_name'];$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from nsm where id='$r'"),MYSQLI_BOTH);if(!empty($t['name'])){$qmztcb[6] = $t['name'];}else{$qmztcb[6] = '';}
	$r=$row['zsm_name'];$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from zsm where id='$r'"),MYSQLI_BOTH);if(!empty($t['name'])){$qmztcb[7] = $t['name'];}else{$qmztcb[7] = '';}
	$r=$row['rsm_name'];$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from rsm where id='$r'"),MYSQLI_BOTH);if(!empty($t['name'])){$qmztcb[8] = $t['name'];}else{$qmztcb[8] = '';}
	$r=$row['sm_name'];$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from sm where id='$r'"),MYSQLI_BOTH);if(!empty($t['name'])){$qmztcb[9] = $t['name'];}else{$qmztcb[9] = '';}
	
	
	$qmztcb[10] = $row['manager'];
	$qmztcb[11] = $row['team_leader'];
	$qmztcb[12] = $row['executive'];
	$qmztcb[13] = $row['closed_by'];
	$qmztcb[14] = $row['mobile'];
	$qmztcb[15] = $row['mail'];
	$qmztcb[16] = $row['profession'];
	$qmztcb[17] = $row['market'];
	$qmztcb[18] = $row['percent'];
	$qmztcb[19] = $row['product'];
	$qmztcb[20] = $row['bankname'];
	$qmztcb[21] = $row['carry_forward'];
	$qmztcb[22] = $row['login_date'];
	$qmztcb[23] = $row['login_month'];
	$qmztcb[24] = $row['login_year'];
	$qmztcb[25] = $row['login_amt'];
	$qmztcb[26] = $row['disbursement_date'];
	$qmztcb[27] = $row['disbursement_month'];
	$qmztcb[28] = $row['disbursement_year'];
	$qmztcb[29] = $row['disbursement_amt'];
	$qmztcb[30] = $row['decision'];
	$qmztcb[31] = $row['remark'];
	
	fputcsv($fp, $qmztcb);
}
}
exit;
?>