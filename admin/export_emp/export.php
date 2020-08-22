<?php

require('config.php');

$filename = "Employee_report.csv";
$fp = fopen('php://output', 'w');

$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='parth' AND TABLE_NAME='employee'";
$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_row($result)) {
//	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
//fputcsv($fp, $header);
fputcsv($fp,array('Sno','Name','Desgination','Team Leader','Team Manager','Office No','Personal No','Email','Email Personal','Join Date','Address','State','Pin','Account No','IFSC','Basic Salary','Emp Code','Adhar No','Pan No','Password','Status'));	


$query = "SELECT * FROM employee";
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>