<?php  include("includes/config.php"); ?>
<?php
if(isset($_POST['c_id'])) {
	$sql = "select * from `zsm` where `nsmid`=".mysqli_real_escape_string($mysqli, $_POST['c_id']);
	$res = mysqli_query($mysqli, $sql);
	if(mysqli_num_rows($res) > 0) {
		echo "<option value=''>------- Select --------</option>";
		while($row = mysqli_fetch_array($res)) {
			
			?>
		<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
		
			<?php
		}	
			
	}
} else {
	header('location: ./');
}

