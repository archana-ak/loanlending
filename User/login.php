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
header("location:harpal.php");				
}
}
        else
        {
          echo "<script>alert('Invalid Username/Email or password');</script>";
        }
      }
        ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-top:20px;
  
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  margin-top:50px;
  margin-left:100px;
  border-radius:100px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body  style="background-image: url('images/bg-01.jpg');">

<div class="card">
  <img src="images/img__avatar.png" alt="Avatar" style="width:100%">
 
</div>


<div class="container">
  <form action="" method="post">
    <div class="row">
      <div class="col-25">
        <label for="fname">Email ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="email" placeholder="Email ID..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="lname" name="password" placeholder="Password..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Role</label>
      </div>
      <div class="col-75">
    <select id="Desgination" name="Desgination" class="form-control mb" required="required">
  <option value="">Select Designation</option>
    <option value="Tele Sales Executive">Tele Sales Executive</option>
       <option value="Business Manager">Business Manager</option>
    </select>
      </div>
    </div>
   
  <br>
    <div class="row">
      <input type="submit" name="login" value="Login">
    </div>
  </form>
</div>
<?php include('includes/footer.php');?>

</body>
</html>
