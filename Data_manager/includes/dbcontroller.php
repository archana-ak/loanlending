<?php
$DB_host = "localhost";
$DB_user = "Archana_aru95";
$DB_pass = "ctLtoLCtPI";
$DB_name = "Archana_loan";
try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 $e->getMessage();
}
?>