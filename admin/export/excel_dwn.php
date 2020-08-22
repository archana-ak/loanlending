<?php
require('config.php');

$filename = "Customer_report.csv";
$fp = fopen('php://output', 'w');



$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='parth' AND TABLE_NAME='customer'";
$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

if (isset($_POST['calledby']))
{
$calledby=$_POST['calledby']; 
}
if (isset($_POST['city'])) 
{
$city = $_POST['city'];
}
if (isset($_POST['review']))
{
$review = $_POST['review']; 
}
if (isset($_POST['bankname']))
{
$bankname = $_POST['bankname']; 
}
if (isset($_POST['date']))
{
$date = $_POST['date']; 
}
if (isset($_POST['profession']))
{
$profession = $_POST['profession']; 
}
 
if(empty($calledby)){ $qz1 = "";}else{ $qz1 = "and calledby='$calledby'"; }
if(empty($city)){ $zz1 = "";}else{ $zz1 = "and city='$city'"; }
if(empty($review)){ $zz2 = "";}else{ $zz2 = "and review='$review'"; }
if(empty($bankname)){ $zz3 = "";}else{ $zz3 = "and bankname='$bankname'"; }
if(empty($date)){ $zz4 = "";}else{ $zz4 = "and date='$date'"; }
if(empty($profession)){ $zz5 = "";}else{ $zz5 = "and profession='$profession'"; }
$query = "select * from customer where review<>1 ".$qz1." ".$zz1." ".$zz2." ".$zz3." ".$zz4." ".$zz5."order by name asc";
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;?>