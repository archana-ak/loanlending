<?php  include("includes/config.php"); ?>
<?php
if(isset($_POST['r_id'])) {
	$sql = "select * from `sm` where `rsmid`=".mysqli_real_escape_string($mysqli, $_POST['r_id']);
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
