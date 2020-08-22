<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['login']))
{
$email=$_POST['email'];
$contact=$_POST['contact'];
$stmt=$mysqli->prepare("SELECT email,office_no,password FROM employee WHERE (email=? && office_no=?) ");
				$stmt->bind_param('ss',$email,$contact);
				$stmt->execute();
				$stmt -> bind_result($name,$email,$password);
				$rs=$stmt->fetch();
				if($rs)
				{
				$pwd=$password;				
				}

				else
				{ 
					?>
					<script type="text/javascript">
						alert("Invalid or Wrong Username or Office number");
						window.location.href="index.php";
					</script>
					<?php
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

	<title>User Forgot Password</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head
<body>
	
	<div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Forgot Password</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							<?php if(isset($_POST['login']))
{ ?>
					<p>Yuor Password is <?php echo $pwd;?><br> Change the Password After login</p>
					<?php }  ?>
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Your Username</label>
									<input type="email" placeholder="Email" name="email" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Your Office no</label>
									<input type="text" placeholder="Contact no" name="contact" class="form-control mb">
									<input type="submit" name="login" class="btn btn-primary btn-block" style="  background-color: CadetBlue;
 color: white; font-size: 20px;" value="Check password" >
								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="index.php" class="text-light" style="font-size: 20px;">Login?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php include('includes/footer.php');?>
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