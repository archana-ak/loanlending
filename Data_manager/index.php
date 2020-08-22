<?php
session_start();
include('includes/config.php');
//check_login();
if(isset($_POST['login']))
{
$email=mysqli_real_escape_string($mysqli,$_POST['email']);
$password=mysqli_real_escape_string($mysqli,$_POST['password']);
$desgination=mysqli_real_escape_string($mysqli,$_POST['Desgination']);
$stmt=$mysqli->prepare("SELECT email,password,id,name,desgination FROM employee WHERE email=? and password=? and desgination=? and status='Active'");
				$stmt->bind_param('sss',$email,$password,$desgination);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id,$name,$desgination);
				$rs=$stmt->fetch(); //print_r($rs);die();
				$stmt->close();
				$_SESSION['id']=$id;
				$_SESSION['name']=$name;
				$_SESSION['login']=$email;
				$_SESSION['des']=$desgination;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
             $uid=$_SESSION['name'];
             $uemail=$_SESSION['login'];
             $desg=$_SESSION['des'];

$ip=$_SERVER['REMOTE_ADDR'];
$log="insert into userlog(userId,Username,userIp,desgination) values('$uid','$uemail','$ip','$desg')";
$mysqli->query($log);
if($log)
{
header("location:dashboard.php");				
}
}
				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
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
	<title>Paarth Management Consultancy</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar1.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Data Manager Login </h2>

						<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Email</label>
									<input type="text" placeholder="Email" name="email" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									 <label for="" class="text-uppercase text-sm">Role</label>
									
    <select id="Desgination" name="Desgination" class="form-control mb" required="required">
  <option value="">Select Designation</option>
      <?php
      $des=mysqli_query($mysqli,"select name from designation");
      while($d=mysqli_fetch_array($des))
      {
      ?>
      <option value="<?php echo htmlentities($d['name']);?>"><?php echo htmlentities($d["name"]);?></option>
    <?php }
      ?>
    </select>

									<input type="submit" name="login" class="btn btn-primary btn-block" style="font-size: 20px;" value="login" >
								</form>
							</div>
						</div>
						<div class="text-center text-light" style="color:black;">
							<a href="forgot-password.php" style="color:black;">Forgot password?</a>
						</div>
					</div>
				</div>
				<br>
				<center>
				<div class="pull-center"style="visibility: hidden;">
						&copy; 2020<span class="text-bold text-uppercase"> PMC</span>. <span>Brought To You By <a href="https://devicedoctor.in/">Device Doctors</a></span>
					</div></center>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
		
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>