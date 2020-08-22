
<?php
include("includes/config.php");
//basic state district
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


//for leader and manager
if(!empty($_POST["country_id"])) {
	$query ="SELECT distinct( team_leader) FROM employee WHERE team_manager = '" . $_POST["country_id"] . "'";
	$results = mysqli_query($mysqli,$query);
?>
	
<?php
	while($rw=mysqli_fetch_array($results)) {
?> 
	<option><?php echo $rw["team_leader"];?></option>
<?php
	}
}


//current addess
if(!empty($_POST["country_id1"])) {
	$query ="SELECT cname FROM city WHERE sname = '" . $_POST["country_id1"] . "'";
	$results = mysqli_query($mysqli,$query);
?>
	
<?php
	while($rw=mysqli_fetch_array($results)) {
?>
	<option><?php echo $rw["cname"];?></option>
<?php
	}
}

//permanent address
if(!empty($_POST["country_id2"])) {
	$query ="SELECT cname FROM city WHERE sname = '" . $_POST["country_id2"] . "'";
	$results = mysqli_query($mysqli,$query);
?>
	
<?php
	while($rw=mysqli_fetch_array($results)) {
?>
	<option><?php echo $rw["cname"];?></option>
<?php
	}
}


///for selecting products of a perticular bank
if(!empty($_POST["bank_id"])) {
	$queryy ="SELECT typeof_loan FROM bank WHERE name = '" . $_POST["bank_id"] . "'";
	$resultss = mysqli_query($mysqli,$queryy);
?>
	
<?php
	while($rww=mysqli_fetch_array($resultss)) {
?>
	<option><?php echo $rww["typeof_loan"];?></option>
<?php
	}
}

//for getting zsm from nsm
if(!empty($_POST["nsm_id"])) {
	$query1 ="SELECT name FROM zsm WHERE nsm_name = '" . $_POST["nsm_id"] . "'";
	$results1 = mysqli_query($mysqli,$query1);
?>
	<option value="">Select ZSM</option>
<?php
	while($rw1=mysqli_fetch_array($results1)) {
?>
	<option value="<?php echo $rw1["name"]; ?>">
<?php echo $rw1["name"]; ?></option>
<?php
	}
}


//for getting rsm from zsm
if(!empty($_POST["zsm_id"])) {
	$query2 ="SELECT name FROM rsm WHERE zsm_name = '" . $_POST["zsm_id"] . "'";
	$results2 = mysqli_query($mysqli,$query2);
?>
<option value="">Select RSM</option>
	
<?php
	while($rw2=mysqli_fetch_array($results2)) {
?>
	<option value="<?php echo $rw2["name"]; ?>">
<?php echo $rw2["name"]; ?></option>
<?php
	}
}

//selecting sm from rsm 
if(!empty($_POST["rsm_id"])) {
	$query3 ="SELECT name FROM sm WHERE rsm_name = '" . $_POST["rsm_id"] . "'";
	$results3 = mysqli_query($mysqli,$query3);
?>
<option value="">Select SM</option>
	
<?php
	while($rw3=mysqli_fetch_array($results3)) {
?>
	<option value="<?php echo $rw3["name"]; ?>">
<?php echo $rw3["name"]; ?></option>
<?php
	}
}
?>