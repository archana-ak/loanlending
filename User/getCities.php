
<?php
include("includes/config.php");

if(!empty($_POST["country_id"])) {
	$query ="SELECT cname FROM city WHERE sname = '" . $_POST["country_id"] . "'";
	$results = mysqli_query($mysqli,$query);
?>
	
<?php
	while($rw=mysqli_fetch_array($results)) {
?>
	<option><?php echo $rw["cname"];?></option>
<?php
	}
}


if(!empty($_POST["country_id1"])) {
	$query1 ="SELECT distinct(city) FROM customer WHERE state = '" . $_POST["country_id1"] . "'";
	$results1 = mysqli_query($mysqli,$query1);
?>
	<option value="">Select City</option>
<?php
	while($rw1=mysqli_fetch_array($results1)) {
?> 
	<option><?php echo $rw1["city"];?></option>
<?php
	}
}

if(!empty($_GET["loadplan"])) {
	$query1 ="SELECT distinct(city) FROM customer WHERE state = '" . $_GET["loadplan"] . "'";
	$results1 = mysqli_query($mysqli,$query1);
?>
	<option value="">Select City</option>
<?php
	while($rw1=mysqli_fetch_array($results1)) {
?> 
	<option <?php if(!empty($_GET["loadclient"])){ if($_GET["loadclient"] == $rw1["city"]){ echo "selected"; }}?>><?php echo $rw1["city"];?></option>
<?php
	}
}
?>