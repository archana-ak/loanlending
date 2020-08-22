<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for  edit loan application
if(isset($_POST['submit']))
{

$remark= $_POST['remark'];
$id=$_GET['id'];
$query=mysqli_query($mysqli,"Update file set remark='$remark' where id='$id'");
if(!$query)
{
 echo "<script>alert('Sorry cannot update the remark');</script>";
}
else
{
 // echo "<script>alert('File Processing has been Updated successfully');</script>";
  	header("location:manage-file.php");       

}
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Edit Processing File</title>
	
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>

<style>

.margin{
	margin-top:5px;
	margin-bottom:5px;
	margin-left:1px;
	margin-right:5px;
}



  .button {
  background-color: #008CBA; 
  border-radius:5px;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 12px 2px;
  cursor: pointer;
}
 input[type=submit] {
  background-color: #009688;
  color: white;
  padding: 12px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

button[type=reset] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}



</style>


<link rel="stylesheet" href="css/style2.css">
</head>
<body>
<!-- Sidebar -->
<?php include("includes/navigation.php");?>


<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>Edit Remark </h1>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
								
									<div class="panel-body"></div></div></div></div></div></div>
									  <div class="w3-container">

										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];//print_r($id);
	$ret="select * from file where id=?";
	$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
		<br>
      <label for="lname" style="margin: 5px 5px 5px 5px;">Remark </label> 
    <input type="text" id="profession" name="remark" value="<?php echo $row->remark;?>" style="width:100%; padding: 6px 6px;  margin: 8px 0; display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;
  box-sizing: border-box;" required="required">

  
  
      <?php } ?>
<br>
    <input type="submit" value="Submit" name="submit">
  </form>

									</div>
								</div>
									
								</div>
 
							</div>
						
							</div>
						</div>

					</div>
				</div> 	
				
	<?php include("includes/footer.php");?>	

			</div>
		</div>
	</div>
	
<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
	<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>

</html>