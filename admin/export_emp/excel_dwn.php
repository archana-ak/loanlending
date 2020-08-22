<?php
require('config.php');

$filename = "Employee_report.csv";
$fp = fopen('php://output', 'w');



$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='parth' AND TABLE_NAME='employee'";
$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

 $pin = $_POST['pin']; 
 $state = $_POST['state'];
if(empty($pin)){ $qz1 = "";}else{ $qz1 = "and pin='$pin'"; }
if(empty($state)){ $zz1 = "";}else{ $zz1 = "and state='$state'"; }
if(empty($frm) || empty($topr)){ $qz2 = "";}else{ $qz2 = "and date BETWEEN {$frm} AND {$topr}"; }
$query = "select * from employee where pin<>1 ".$qz2." ".$qz1." ".$zz1." order by name asc";
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;?>