<?php  include("includes/config.php"); ?>
<?php
if(isset($_POST['z_id'])){
	$sql1="select * from `rsm` where `zsmid`=".mysqli_real_escape_string($mysqli,$_POST['z_id']);
	$res1=mysqli_query($mysqli,$sql1);
	if(mysqli_num_rows($res1) > 0){
		echo"<option value=''>-----select-----</option>";
		while($row1=mysqli_fetch_array($res1)){
			?>
			<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
<?php	
	}
	}
}
else
{
	header('location:./');
}
