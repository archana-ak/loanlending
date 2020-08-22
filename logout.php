<?php
include("include/config.php");

session_start();

date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($mysqli,"UPDATE userlog  SET logoutTime = '$ldate' WHERE id = '".$_SESSION['id']."'");
unset($_SESSION['id']);
session_destroy();
header('Location:index.php');
?>
