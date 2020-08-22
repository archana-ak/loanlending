<?php
require('config.php');

$filename = "Customer_report.csv";
$fp = fopen('php://output', 'w');

$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='parth' AND TABLE_NAME='customer'";
$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_row($result)) {
//	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
//fputcsv($fp, $header);
fputcsv($fp,array('Sno','Addedby ','Name ','Address',' Personal No','Office No','Email','Email Personal','Business Name','State','District','City','Pin','Profession','Bankname','Review','Called By','Caller Id','Date','Called_Date','Added_Id','Del'));	

$query = "SELECT * FROM customer";
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>