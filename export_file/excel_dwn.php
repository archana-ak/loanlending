<?php
require('config.php');

$filename = "Processing_File_report.csv";
$fp = fopen('php://output', 'w');



$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='parth' AND TABLE_NAME='file'";
$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

 $state = $_POST['state'];
 $city = $_POST['city']; 

 if(empty($state)){ $zz1 = "";}else{ $zz1 = "and state='$state'"; }
if(empty($city)){ $qz1 = "";}else{ $qz1 = "and city='$city'"; }


$query = "select * from file where id<>1  ".$zz1." ".$qz1."  order by name asc";
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;?>