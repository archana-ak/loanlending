<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//$sqzql = "select * from customer order by date desc,rand() limit 10";
$aid = $_SESSION['id'];
$chzql = mysqli_fetch_array(mysqli_query($mysqli,"select * from usercall_log where id=1"),MYSQLI_BOTH);
$uzpth = $chzql['calling_series']; $uzpth = explode(",",$uzpth);
	$sqzql = mysqli_query($mysqli,"select * from customer where del<>1 order by id desc");
	$stack = array();
	while($inawq = mysqli_fetch_array($sqzql,MYSQLI_BOTH)){
		array_push($stack,$inawq['id']);
	}
	$stack1="";	$stack1 = implode(",",$stack);
	$upzmn = mysqli_query($mysqli,"update usercall_log set calling_series='$stack1' where id='1'") or die(mysqli_error($mysqli));
	 $raquel=array(); $raquel=array_diff($stack,$uzpth);
	 if(count($raquel)<>0){
	//print_r($raquel);
	 $qpwut = max($raquel); 
	$ayrmd = mysqli_query($mysqli,"update usercall_log set alloted_calls='$qpwut' where caller_id='$aid'") or die(mysqli_error($mysqli));
	$cqnzy = $qpwut; 
	}else{
		$stqzk = array();
		 $tbvyz = mysqli_query($mysqli,"select * from usercall_log where id<>1");
		while($rdlzq = mysqli_fetch_array($tbvyz,MYSQLI_BOTH)){
		array_push($stqzk,$rdlzq['alloted_calls']);
		}
		$rdeyq = mysqli_fetch_array(mysqli_query($mysqli,"select * from usercall_log where id='1'"),MYSQLI_BOTH);
		$rdeyq21 = mysqli_query($mysqli,"select * from usercall_log where id<>1");
		$stqzk1 = array();
		while($rdeyq1 = mysqli_fetch_array($rdeyq21,MYSQLI_BOTH)){	array_push($stqzk1,$rdeyq1['calling_series']);	} $stqzk1 = implode(",",$stqzk1);
		$stqzk1 = explode(",",$stqzk1); $stqzk1 = array_unique($stqzk1); //print_r($stqzk1);
	$aqkru = $rdeyq['calling_series']; $aqkru = explode(",",$aqkru); $aqkru1 = $stqzk1; $raquel=array(); $raquel=array_diff($aqkru,$stqzk,$aqkru1);
	if(!empty($raquel)){
	$cqnzy = max($raquel);
	array_push($aqkru1,$cqnzy); $dkkmt = implode(",",$aqkru1);
	$ayrmd = mysqli_query($mysqli,"update usercall_log set alloted_calls='$cqnzy',calling_series='$dkkmt' where caller_id='$aid'") or die(mysqli_error($mysqli));
	}else{ $cqnzy = max($aqkru); $ayrmd = mysqli_query($mysqli,"update usercall_log set calling_series='' where id<>1") or die(mysqli_error($mysqli)); $ayrmd = mysqli_query($mysqli,"update usercall_log set calling_series='$cqnzy' where caller_id='$aid'") or die(mysqli_error($mysqli));}	
	 }

$sqzql = "SELECT * FROM customer where id='$cqnzy' and del<>1";
//$sqzql = "select * from customer order by id desc limit 1";
if (isset($_POST['submit']))
{
    $aid = $_SESSION['id'];
    $caller = $_POST['username'];
    $cname = $_POST['cname'];
    $cprofession = $_POST['cprofession'];
    $cstate = $_POST['cstate'];
    $ccity = $_POST['ccity'];
    $phoneno = $_POST['phoneno'];
    $action = $_POST['action'];
    $izd = $_POST['zapql'];
    $bankname = $_POST['bankname'];
    $comment = $_POST['comment'];
    $sql = mysqli_query($mysqli, "update customer set bankname='$bankname',review='$action',calledby='$caller',callerid='$aid',c_date=now(), comment='$comment' where id='$izd'") or die(mysqli_error($mysqli));
   
    if (!$sql)
    {
        die("Some error occured in insertion" . mysqli_error());
    }
}

if (isset($_POST['next']))
{
	
}
?>

<!DOCTYPE html>
<html>
<title>User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/*
  Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
  */
  @media
    only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 0;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }

    /*
    Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
    */
    td:nth-of-type(1):before { content: "Customer Name:-"; }
    td:nth-of-type(2):before { content: "Mobile Number:-"; }
    td:nth-of-type(3):before { content: "Profession:-"; }
    td:nth-of-type(4):before { content: "State:-"; }
    td:nth-of-type(5):before { content: "City:-"; }
    td:nth-of-type(6):before { content: "Review:-"; }
    
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
 

</style>


<link rel="stylesheet" href="css/style2.css">

<body>

<!-- Sidebar -->
<?php include("includes/navigation.php");?>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>User Dashboard</h1>
  </div>
</div>


<div class="w3-container">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<br>

<form method="post">



<?php

$ret = "select * from employee where id=?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $aid);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_object())
{
?>  
<input type="hidden" name="username" value="<?php echo $row->name; ?>"readonly> <?php
}
?>

<table role="table">
  <tbody role="rowgroup">
   
<?php
$aid = $_SESSION['id'];
//$id=1;

$stmt = $mysqli->prepare($sqzql);
$stmt->execute(); //ok
$res = $stmt->get_result();
$row = mysqli_fetch_array($res,MYSQLI_BOTH);

    if($row['calledby']<>"" && $row['review']<>"")
    {
?>
      <p><span style="color: red">This is reviewed by <b><?php echo $row['calledby']; ?></b> and has <b><?php echo $row['review']; ?></b> status on <b><?php echo $row['c_date']; ?></b></span> </p><?php
    }
    else
    {
?>
      <p><span style="color: green">This is Fresh data and has no status. Goodluck!!..</span></p><?php
    }

    $name = $row['name'];
    $profession = $row['profession'];
    $personal_no = $row['personal_no'];
    $state = $row['state'];
    $city = $row['city'];
    $hrxtr = $row['id'];

?>
    <tr role="row">
    <br>
      <label class="col-sm-2 control-label" style="margin: 5px 5px 5px 5px;">Customer Name : </label>
     <input type="text" style=" width: 80%;padding: 5px;margin-bottom: 10px;margin: 5px 5px 5px 5px;border: 1px solid #ccc;border-radius: 4px;resize: vertical;" name="cname" value="<?php echo $name; ?>"readonly><br>

     <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer Profession : </label>
	 <input type="hidden" name="zapql" id="zapql" value="<?php echo $hrxtr; ?>" />
     <input type="text" name="cprofession" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" value="<?php echo $profession; ?>"readonly><br>

     <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer State : </label>
     <input type="text" name="cstate" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" value="<?php echo $state; ?>"readonly><br>

     <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer City : </label>
     <input type="text" name="ccity" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" value="<?php echo $city; ?>"readonly><br>

     <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Bank Name : </label>
      <select name="bankname" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" id="bankname">
        <option value="">Select bank name</option>
        <?php $sql1=mysqli_query($mysqli,"select * from banknames");
        while($row1=mysqli_fetch_array($sql1))
        {
          ?>
          <option value="<?php echo htmlentities($row1['name']);?>"><?php echo htmlentities($row1['name']);?>
          </option>
          <?php
        }

?>
</select><br>
     
      <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer Phoneno : </label>
      <input type="tel" name="phoneno" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" class="fa-fa-eye" value="<?php echo $personal_no; ?>"hidden>
      <a href="tel:+<?php echo $personal_no; ?>" name="phoneno"><img src="contact.png"></a><br>


      <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Select Review : </label>
      <select name="action"style=" width:80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" id="action">
       <option value="">Select status</option>
      <?php
      $sql=mysqli_query($mysqli,"select * from review");
      while($row2=mysqli_fetch_array($sql))
      {
        ?>
        <option value="<?php echo htmlentities($row2['name']);?>"><?php echo htmlentities($row2['name']);?></option>
  <?php    } ?>
    </select>
    <br>
	
	 <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Comment : </label>
	  <input type="text" name="comment" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" >
<br>
    </tr>
  
                      
  </tbody>
</table>

<input type="submit" name="submit" class="button" value="SUBMIT">
<input type="submit" name="next" class="button" value="NEXT">

</form>

</div>
<?php include("includes/footer.php");?>


<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
} 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
function w2_open() {
  document.getElementById("div1").style.display = "block";
}
function w2_close() {
  document.getElementById("div1").style.display = "block";
}
</script>

</body>
</html>











