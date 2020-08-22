<?php

require('config.php');

$filename = "Loan_report.csv";
$fp = fopen('php://output', 'w');

$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='parth' AND TABLE_NAME='loan'";
$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_row($result)) {
//	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
//fputcsv($fp, $header);
fputcsv($fp,array('Sno','name_of_Business','bussiness_type','bussiness_pls_specify','nature_of_bussniess','industry','comp_pan','gstin','business_address','landmark','pin','city','state','email','date_of_incorpration','co_name','co_category','co_if_comp','co_comp_pls_specify','co_title','co_gender','co_ckyc','co_pan','co_dob','co_doa','co_maritial_status','co_dependents','co_edu_level','co_edu_pls_specify','co_occupation','co_occupation_service','co_occupation_other','co_email','co_father','co_mother','co_current_owned','co_current_address','co_current_landmark','co_current_state','co_current_city','co_current_pin','co_mobile','co_permanent_owned','co_permanent_address','co_permanent_landmark','co_permanent_state','co_permanent_city','co_permanent_pin','tr_name','tr_Business_name','tr_mobile','tr_relation','tr_address','tr_city','tr_pin','tr2_name','tr2_Business_name','tr2_mobile','tr2_relation','tr2_address','tr2_city','tr2_pin'));	

$query = "SELECT * FROM loan";
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>