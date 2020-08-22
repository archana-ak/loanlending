<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
//$_SESSION['id'] = 28;
check_login();
//$sqzql = "select * from customer order by date desc,rand() limit 10";
$aid = $_SESSION['id'];
if(isset($_POST['search'])){
	$aid=$_SESSION['id']; $state=$_POST['state']; $city=$_POST['city']; $profession=$_POST['profession'];
	 $fltrdalgo = $state.$city.$profession;
	 
	$sqzql = mysqli_query($mysqli,"select * from customer where del<>1 and state='$state' and city='$city' and profession='$profession' order by id desc");
	
	$stack = array(); while($inawq = mysqli_fetch_array($sqzql,MYSQLI_BOTH)){ array_push($stack,$inawq['id']); }
	
	$stack1="";	$stack1 = implode(",",$stack);
	
	$ytuea =  mysqli_query($mysqli,"select * from filteredusercall_log2 where filtered_algo='$fltrdalgo'");
	
	$brqqe = mysqli_num_rows($ytuea); if($brqqe==0){
		
	$qqkhc = mysqli_query($mysqli,"insert into filteredusercall_log2(filtered_algo,calling_series)values('$fltrdalgo','$stack1')");
	
	}else{
	
	$trwea = mysqli_query($mysqli,"update filteredusercall_log2 set calling_series='$stack1' where filtered_algo='$fltrdalgo'") or die(mysqli_error($mysqli));	
		
	}
	
	$fdjxcy = mysqli_query($mysqli,"select * from filteredusercall_log where id<>1");
	
	$dsdtr = array(); while($iuiyd = mysqli_fetch_array($fdjxcy,MYSQLI_BOTH)){ array_push($dsdtr,$iuiyd['calling_series']); }
	
	$dsdtr = implode(",",$dsdtr); $dsdtr = explode(",",$dsdtr); $dsdtr = array_unique($dsdtr);  $stqart1=array_diff($stack,$dsdtr);
	
	if(!empty($stqart1)){
		$laksu = max($stqart1); $cqnzy = $laksu;
		$kjrfv = mysqli_fetch_array(mysqli_query($mysqli,"select * from filteredusercall_log where caller_id='$aid'"),MYSQLI_BOTH);
		$bhyur = $kjrfv['calling_series']; $bhyur = explode(",",$bhyur); array_push($bhyur,$laksu);  $bhyur = implode(",",$bhyur); 
		$wxcer = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$bhyur' where caller_id='$aid'") or die(mysqli_error($mysqli));
				
	}else{
		$ubngh = mysqli_query($mysqli,"select * from filteredusercall_log where id<>1");
		while($injhy = mysqli_fetch_array($ubngh,MYSQLI_BOTH)){
			$uuknj = $injhy['calling_series']; $ighuu = $injhy['id']; 
			$uuknj = explode(",",$uuknj); $ijkkhk=array_diff($uuknj,$stack); $ijkkhk = implode(",",$ijkkhk);
			$okmhh = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$ijkkhk' where id='$ighuu'");
		}
		$laksu = max($stack); $cqnzy = $laksu;
		$kjrfv = mysqli_fetch_array(mysqli_query($mysqli,"select * from filteredusercall_log where caller_id='$aid'"),MYSQLI_BOTH);
		$bhyur = $kjrfv['calling_series']; $bhyur = explode(",",$bhyur); array_push($bhyur,$laksu);  $bhyur = implode(",",$bhyur); 
		$wxcer = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$bhyur' where caller_id='$aid'") or die(mysqli_error($mysqli));
		
	}
	
	
	$sqzql = "SELECT * FROM customer where id='$cqnzy' and del<>1";
	}

	
	
	 

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
    $sql = mysqli_query($mysqli, "update customer set bankname='$bankname',review='$action',calledby='$caller',callerid='$aid',c_date=now() , comment='$comment' where id='$izd'") or die(mysqli_error($mysqli));
   
    if (!$sql)
    {
        die("Some error occured in insertion" . mysqli_error());
    }
	$aid=$_SESSION['id']; $state=$_POST['state']; $city=$_POST['city']; $profession=$_POST['profession'];
	 $fltrdalgo = $state.$city.$profession;
	 
	$sqzql = mysqli_query($mysqli,"select * from customer where del<>1 and state='$state' and city='$city' and profession='$profession' order by id desc");
	
	$stack = array(); while($inawq = mysqli_fetch_array($sqzql,MYSQLI_BOTH)){ array_push($stack,$inawq['id']); }
	
	$stack1="";	$stack1 = implode(",",$stack);
	
	$ytuea =  mysqli_query($mysqli,"select * from filteredusercall_log2 where filtered_algo='$fltrdalgo'");
	
	$brqqe = mysqli_num_rows($ytuea); if($brqqe==0){
		
	$qqkhc = mysqli_query($mysqli,"insert into filteredusercall_log2(filtered_algo,calling_series)values('$fltrdalgo','$stack1')");
	
	}else{
	
	$trwea = mysqli_query($mysqli,"update filteredusercall_log2 set calling_series='$stack1' where filtered_algo='$fltrdalgo'") or die(mysqli_error($mysqli));	
		
	}
	
	$fdjxcy = mysqli_query($mysqli,"select * from filteredusercall_log where id<>1");
	
	$dsdtr = array(); while($iuiyd = mysqli_fetch_array($fdjxcy,MYSQLI_BOTH)){ array_push($dsdtr,$iuiyd['calling_series']); }
	
	$dsdtr = implode(",",$dsdtr); $dsdtr = explode(",",$dsdtr); $dsdtr = array_unique($dsdtr);  $stqart1=array_diff($stack,$dsdtr);
	
	if(!empty($stqart1)){
		$laksu = max($stqart1); $cqnzy = $laksu;
		$kjrfv = mysqli_fetch_array(mysqli_query($mysqli,"select * from filteredusercall_log where caller_id='$aid'"),MYSQLI_BOTH);
		$bhyur = $kjrfv['calling_series']; $bhyur = explode(",",$bhyur); array_push($bhyur,$laksu);  $bhyur = implode(",",$bhyur); 
		$wxcer = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$bhyur' where caller_id='$aid'") or die(mysqli_error($mysqli));
				
	}else{
		$ubngh = mysqli_query($mysqli,"select * from filteredusercall_log where id<>1");
		while($injhy = mysqli_fetch_array($ubngh,MYSQLI_BOTH)){
			$uuknj = $injhy['calling_series']; $ighuu = $injhy['id']; 
			$uuknj = explode(",",$uuknj); $ijkkhk=array_diff($uuknj,$stack); $ijkkhk = implode(",",$ijkkhk);
			$okmhh = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$ijkkhk' where id='$ighuu'");
		}
		$laksu = max($stack); $cqnzy = $laksu;
		$kjrfv = mysqli_fetch_array(mysqli_query($mysqli,"select * from filteredusercall_log where caller_id='$aid'"),MYSQLI_BOTH);
		$bhyur = $kjrfv['calling_series']; $bhyur = explode(",",$bhyur); array_push($bhyur,$laksu);  $bhyur = implode(",",$bhyur); 
		$wxcer = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$bhyur' where caller_id='$aid'") or die(mysqli_error($mysqli));
		
	}
	
	
	$sqzql = "SELECT * FROM customer where id='$cqnzy' and del<>1";
}

if(isset($_POST['next'])){
$aid=$_SESSION['id']; $state=$_POST['state']; $city=$_POST['city']; $profession=$_POST['profession'];
	 $fltrdalgo = $state.$city.$profession;
	 
	$sqzql = mysqli_query($mysqli,"select * from customer where del<>1 and state='$state' and city='$city' and profession='$profession' order by id desc");
	
	$stack = array(); while($inawq = mysqli_fetch_array($sqzql,MYSQLI_BOTH)){ array_push($stack,$inawq['id']); }
	
	$stack1="";	$stack1 = implode(",",$stack);
	
	$ytuea =  mysqli_query($mysqli,"select * from filteredusercall_log2 where filtered_algo='$fltrdalgo'");
	
	$brqqe = mysqli_num_rows($ytuea); if($brqqe==0){
		
	$qqkhc = mysqli_query($mysqli,"insert into filteredusercall_log2(filtered_algo,calling_series)values('$fltrdalgo','$stack1')");
	
	}else{
	
	$trwea = mysqli_query($mysqli,"update filteredusercall_log2 set calling_series='$stack1' where filtered_algo='$fltrdalgo'") or die(mysqli_error($mysqli));	
		
	}
	
	$fdjxcy = mysqli_query($mysqli,"select * from filteredusercall_log where id<>1");
	
	$dsdtr = array(); while($iuiyd = mysqli_fetch_array($fdjxcy,MYSQLI_BOTH)){ array_push($dsdtr,$iuiyd['calling_series']); }
	
	$dsdtr = implode(",",$dsdtr); $dsdtr = explode(",",$dsdtr); $dsdtr = array_unique($dsdtr);  $stqart1=array_diff($stack,$dsdtr);
	
	if(!empty($stqart1)){
		$laksu = max($stqart1); $cqnzy = $laksu;
		$kjrfv = mysqli_fetch_array(mysqli_query($mysqli,"select * from filteredusercall_log where caller_id='$aid'"),MYSQLI_BOTH);
		$bhyur = $kjrfv['calling_series']; $bhyur = explode(",",$bhyur); array_push($bhyur,$laksu);  $bhyur = implode(",",$bhyur); 
		$wxcer = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$bhyur' where caller_id='$aid'") or die(mysqli_error($mysqli));
				
	}else{
		$ubngh = mysqli_query($mysqli,"select * from filteredusercall_log where id<>1");
		while($injhy = mysqli_fetch_array($ubngh,MYSQLI_BOTH)){
			$uuknj = $injhy['calling_series']; $ighuu = $injhy['id']; 
			$uuknj = explode(",",$uuknj); $ijkkhk=array_diff($uuknj,$stack); $ijkkhk = implode(",",$ijkkhk);
			$okmhh = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$ijkkhk' where id='$ighuu'");
		}
		$laksu = max($stack); $cqnzy = $laksu;
		$kjrfv = mysqli_fetch_array(mysqli_query($mysqli,"select * from filteredusercall_log where caller_id='$aid'"),MYSQLI_BOTH);
		$bhyur = $kjrfv['calling_series']; $bhyur = explode(",",$bhyur); array_push($bhyur,$laksu);  $bhyur = implode(",",$bhyur); 
		$wxcer = mysqli_query($mysqli,"update filteredusercall_log set calling_series='$bhyur' where caller_id='$aid'") or die(mysqli_error($mysqli));
		
	}
	
	
	$sqzql = "SELECT * FROM customer where id='$cqnzy' and del<>1";
}
?>
<!DOCTYPE html>
<html>
<title>User</title>
<meta name=viewport content="width=device-width, initial-scale=1">
<style>@media only screen and (max-width:760px),(min-device-width:768px) and (max-device-width:1024px){table,thead,tbody,th,td,tr{display:block}thead tr{position:absolute;top:-9999px;left:-9999px}tr{margin:0 0 1rem 0}tr:nth-child(odd){background:#ccc}td{border:0;border-bottom:1px solid #eee;position:relative;padding-left:50%}td:before{position:absolute;top:0;left:6px;width:45%;padding-right:10px;white-space:nowrap}td:nth-of-type(1):before{content:"Customer Name:-"}td:nth-of-type(2):before{content:"Mobile Number:-"}td:nth-of-type(3):before{content:"Profession:-"}td:nth-of-type(4):before{content:"State:-"}td:nth-of-type(5):before{content:"City:-"}td:nth-of-type(6):before{content:"Review:-"}}.button{background-color:#008cba;border-radius:5px;border:0;color:white;padding:10px 25px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:12px 2px;cursor:pointer;</style>
<meta name=viewport content="width=device-width, initial-scale=1"><script type=text/javascript src=js/jquery-1.11.3-jquery.min.js></script>
<script type=text/javascript src=js/validation.min.js></script>
<link rel=stylesheet href=css/style2.css>
<script>function getState1(c,b){var a=new XMLHttpRequest();a.onreadystatechange=function(){if(a.readyState==4&&a.status==200){strs=a.responseText;document.getElementById("chkveg").innerHTML=strs}};a.open("GET","getCities.php?loadplan="+c+"&loadclient="+b,true);a.send()}</script>
<body>
<?php include("includes/navigation.php");?>
<div class=w3-teal>
<button class="w3-button w3-teal w3-xlarge" onclick=w3_open()>☰</button>
<div class=w3-container>
<h1>User Dashboard</h1>
</div>
</div>
<div class=w3-container>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<br>
<form method=post>
<label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px; padding-right:36px;">State </label>
<select name=state required="required" onChange=getState(this.value) id=country-list style="width:50%;padding:5px;margin:5px 5px 5px 5px;border:1px solid #ccc;border-radius:4px;resize:vertical">
<option value>Select State</option>
<?php
      $sql=mysqli_query($mysqli,"select distinct(state) from customer");
      while($row2=mysqli_fetch_array($sql))
      {
        ?>
<option value=<?php echo htmlentities($row2['state']);?> <?php if(isset($_POST['search']) || isset($_POST['next']) || isset($_POST['submit'])){ if(htmlentities($row2['state'])==$state){ echo "Selected";} }?>><?php echo htmlentities($row2['state']);?></option>
<?php    } ?>
</select>
<?php if(isset($_POST['search']) || isset($_POST['next']) || isset($_POST['submit'])){echo "<script>getState1('".$state."','".$city."');</script>"; }?>
<br>
<label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px; padding-right:47px;">City </label>
<select name=city id=chkveg required="required" style="width:50%;padding:5px;margin:5px 5px 5px 5px;border:1px solid #ccc;border-radius:4px;resize:vertical">
</select>
<br>
<label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Profession</label>
<select name=profession  required="required" style="width:50%;padding:5px;margin:5px 5px 5px 5px;border:1px solid #ccc;border-radius:4px;resize:vertical">
<option value>Select Profession</option>
<?php
      $sql=mysqli_query($mysqli,"select distinct(profession) from customer");
      while($row2=mysqli_fetch_array($sql))
      {
        ?>
<option value="<?php echo htmlentities($row2['profession']);?>"<?php if(isset($_POST['search']) || isset($_POST['next'])|| isset($_POST['submit'])){ if(htmlentities($row2['profession'])==$profession){ echo "Selected";} }?>><?php echo htmlentities($row2['profession']);?></option>
<?php    } ?>
</select>
<br>
<input type=submit class=button name=search value=Search>
<?php
if(isset($_POST['search']) || isset($_POST['next']) || isset($_POST['submit'])){
$ret = "select * from employee where id=?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $aid);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_object())
{
?>
<input type=hidden name=username value="<?php echo $row->name; ?>"readonly>
<?php
}
?>
<input type=hidden name=hrxtr value="<?php echo $state; ?>"readonly>
<input type=hidden name=fktcv value="<?php echo $city; ?>"readonly>
<input type=hidden name=x8qch value="<?php echo $profession; ?>"readonly>
<table role=table>
<tbody role=rowgroup>
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
<p><span style=color:red>This is reviewed by <b><?php echo $row['calledby']; ?></b> and has <b><?php echo $row['review']; ?></b> status on <b><?php echo $row['c_date']; ?></b></span> </p><?php
    }
    else
    {
?>
<p><span style=color:green>This is Fresh data and has no status. Goodluck!!..</span></p><?php
    }

    $name = $row['name'];
    $profession = $row['profession'];
    $personal_no = $row['personal_no'];
    $state = $row['state'];
    $city = $row['city'];
    $hrxtr = $row['id'];

?>
<tr role=row>
<br>
<label class="col-sm-2 control-label" style="margin:5px 5px 5px 5px">Customer Name : </label>
<input type=text style="width:80%;padding:5px;margin-bottom:10px;margin:5px 5px 5px 5px;border:1px solid #ccc;border-radius:4px;resize:vertical" name=cname value="<?php echo $name; ?>"readonly><br>
<label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer Profession : </label>
<input type=hidden name=zapql id=zapql value=<?php echo $hrxtr; ?> />
<input type=text name=cprofession style="width:80%;padding:5px;margin:5px 5px 5px 5px;border:1px solid #ccc;border-radius:4px;resize:vertical" value="<?php echo $profession; ?>"readonly><br>
<label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer State : </label>
<input type=text name=cstate style="width:80%;padding:5px;margin:5px 5px 5px 5px;border:1px solid #ccc;border-radius:4px;resize:vertical" value="<?php echo $state; ?>"readonly><br>
<label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer City : </label>
<input type=text name=ccity style="width:80%;padding:5px;margin:5px 5px 5px 5px;border:1px solid #ccc;border-radius:4px;resize:vertical" value="<?php echo $city; ?>"readonly><br>
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

<input type=submit name=submit class=button value=SUBMIT>
<input type=submit name=next class=button value=NEXT>
<?php } ?>
</form>
</div>
	<?php include("includes/footer.php");?>	

</body>
<script>function w3_open(){document.getElementById("mySidebar").style.display="block"}function w3_close(){document.getElementById("mySidebar").style.display="none"}</script>
<script>function getState(a){$.ajax({type:"POST",url:"getCities.php",data:"country_id1="+a,success:function(b){$("#chkveg").html(b)}})};</script>
</html>