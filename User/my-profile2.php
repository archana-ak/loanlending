<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];
if(isset($_POST['update']))
{
	$personal_no=$_POST['personal_no'];
	$email_personal=$_POST['email_personal'];


$query=mysqli_query($mysqli,"update  employee set personal_no='$personal_no',email_personal='$email_personal' where id='$aid'");
if(!$query)
{
	die("invalid query".mysqli_error($mysqli));
}
else{
echo"<script>alert('Profile updated Succssfully');</script>";
echo "<script> window.location=\"harpal.php\"</script>";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Profile</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="User Profile Form A Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!--//online-fonts -->
<link rel="stylesheet" href="css/style2.css">
</head>
<body>
	<!-- Sidebar -->
<?php include("includes/navigation.php");?>

<!-- Page Content -->

  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  
</div>
	<!--<div class="w3-container">-->
	<?php	
    $aid=$_SESSION['id'];
	$ret="select * from employee where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	



<div class="header">
	<h2>user profile form</h2>
</div>
<div class="w3-main">
		<div class="form-w3l">
			<div class="img">
				<img src="images/img__avatar.png" alt="image" style="border-radius:150px">
				<h2><?php echo $row->name;?></h2>
			</div>	
			<form action="#" method="post">
				<div class="w3l-user">
					<span><i class="fa fa-user-circle-o w3l-1" aria-hidden="true"></i></span>
					<input type="text" name="regno" placeholder="Registration No:-" required="" value="<?php echo $row->emp_code;?>"readonly/>
					<div class="clear"></div>
				</div>
				
				<div class="w3l-password">
					<span><i class="fa fa-lock w3l-2" aria-hidden="true"></i></span>
					<input type="text" name="fname" placeholder="Name"  value="<?php echo $row->name;?>"readonly   required="required"/>
					<div class="clear"></div>
				</div>
				
				<div class="w3l-email">
					<span><i class="fa fa-envelope-o w3l-3" aria-hidden="true"></i></span>
					<input type="text" name="desgination" placeholder="Desgination :" required="" value="<?php echo $row->desgination;?>"readonly />
					<div class="clear"></div>
				</div>
				
				<div class="w3l-phone">	
					<span><i class="fa fa-mobile w3l-4" aria-hidden="true"></i></span>
					<input type="text" name="personal_no" placeholder="Personal Number : "  value="<?php echo $row->personal_no;?>" required="required" />
					<div class="clear"></div>
				</div>
				
				<div class="w3l-phone">	
					<span><i class="fa fa-envelope-o w3l-3" aria-hidden="true"></i></span>
					<input type="text" name="email_personal" placeholder="Personal Email : "  value="<?php echo $row->email_personal;?>" required="required" />
					<div class="clear"></div>
				</div>
				
				<div class="w3l-phone">	
					<span><i class="fa fa-envelope-o w3l-3" aria-hidden="true"></i></span>
					<input type="text" name="email" placeholder="Username: " required="" value="<?php echo $row->email;?>" readonly />
					<div class="clear"></div>
				</div>
				
				<?php } ?>
				<div class="w3l-btn">
					<input type="submit" name="update" value="Update Profile"/>
				</div>
			</form>
		</div>
			<?php include("includes/footer.php");?>	

	</div>
		<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
</body>
</html>