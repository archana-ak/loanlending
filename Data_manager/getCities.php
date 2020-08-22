
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
?>