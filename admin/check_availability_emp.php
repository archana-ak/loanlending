<?php
require_once("includes/config.php");
if(!empty($_POST["emailid"]))    //for personal email
{ 
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$result ="SELECT count(*) FROM employee WHERE email=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$email);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo "<span style='color:red'> Email already exist .</span>";
}
else{
	echo "<span style='color:green'> Email available for registration .</span>";
}
}
}

if(!empty($_POST["emailid1"]))
 {                                       //for official email address
	$email= $_POST["emailid1"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$result ="SELECT count(*) FROM employee WHERE email_personal=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$email);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo "<span style='color:red'> Email already exist .</span>";
}
else{
	echo "<span style='color:green'> Email available for registration .</span>";
}
}
}


if(!empty($_POST["emailid2"]))
 {                                         //for phone personal number
	$email= $_POST["emailid2"];
	if (!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/',$email)) {

		echo "error:You did not enter a valid phoneno.";
	}
	else {
		$result ="SELECT count(*) FROM employee WHERE personal_no=? ";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$email);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo "<span style='color:red'> phoneno already exist .</span>";
}
else{
	echo "<span style='color:green'> phoneno available for registration .</span>";
}
}
}


if(!empty($_POST["emailid3"]))
 {          
                                   //for phone office number
	$email= $_POST["emailid3"];
if (!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/',$email)) {

		echo "error:You did not enter a valid phoneno.";
	}
	else {
    $result ="SELECT count(*) FROM employee WHERE office_no=? ";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$email);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo "<span style='color:red'> phoneno already exist .</span>";
}
else{
	echo "<span style='color:green'> phoneno available for registration .</span>";
}
}
}

if(!empty($_POST["oldpassword"])) 
{
$pass=$_POST["oldpassword"];
$result ="SELECT password FROM employee WHERE password=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$pass);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$opass=$result;
if($opass==$pass) 
echo "<span style='color:green'> Password  matched .</span>";
else echo "<span style='color:red'> Password Not matched</span>";
}

if(isset($_GET['status']))
{
	$status1=$_GET['status'];
	$s=mysqli_query($mysqli,"select * from employee where id='$status1'");
	while ($row=mysqli_fetch_array($s)) {
		$status=$row->status;
		if($status=='Active'){
			$status_state='Inactive';
		}
		else{
			$status_state='Active';
		}
		$u=mysqli_query($mysqli,"update employee set status='$status_state' where id='$status1'");
		if($u)
		{
			header("Location:manage-employee.php");
		}
		else
		{
				die('invalid query'.mysqli_error($mysqli));

		}
		# code...
	}
}

?>