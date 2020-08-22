
<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>

<?php 
if(isset($_POST['submit']))
{
$aid=$_GET['aid'];
  $caller=$_POST['username'];
  $cname=$_POST['cname'];
  $cprofession=$_POST['cprofession'];
  $cstate=$_POST['cstate'];
  $ccity=$_POST['ccity'];
  $phoneno=$_POST['phoneno'];
  $action=$_POST['action'];
  $id=$_POST['id'];
  $bankname=$_POST['bankname'];
  $comment = $_POST['comment'];
  $id=$_GET['id'];

//insert into calling
  $sql=mysqli_query($mysqli,"update customer set bankname='$bankname',review='$action',calledby='$caller',callerid='$aid',c_date=now(),comment='$comment' where id='$id'");
  if($sql)
  {
 
  }
else
{
  die("Some error occured in insertion".mysqli_error());
}
}
?>
<!DOCTYPE html>
<html>
<title>User Dashboard</title>
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


<div class="w3-container" id="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<br>
<?php echo "<form method=post action=>";?>
<?php 
   $aid=$_GET['aid'];print_r($aid);
  $ret="select * from employee where id=?";
    $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$aid);
   $stmt->execute();
   $res=$stmt->get_result();
     while($row=$res->fetch_object())
    {
      ?>  
<input type="text" name="username" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" value="<?php echo $row->name;?>"readonly> <?php }
?>
<table role="table">
  <tbody role="rowgroup">
   
    <?php 
$aid=$_GET['aid'];
 $id=$_GET['id'];
$ret="select * from customer where id=? order by date asc,rand() limit 1";
$stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$id);
$stmt->execute() ;//ok
$res=$stmt->get_result(); 
while($row=$res->fetch_object())
    {
      if($row->calledby!=""&& $row->review!=""){
      ?>
      <p><span style="color: red">This is reviewed by <b><?php echo $row->calledby;?></b> and has <b><?php echo $row->review;?></b> status
        on Date:<b><?php echo $row->c_date;?></b>  status
       Comment is<b><?php echo $row->comment;?></b></span></p><?php }
      else
        {
         ?>
      <p><span style="color: green">This is Fresh data and has no status. Goodluck!!..</span></p><?php }  
        
        ?>
    <tr role="row">
    <br>
    <input type="hidden" name="id" value="<?php echo $row->id;?>">
      <label class="col-sm-2 control-label" style="margin: 5px 5px 5px 5px;">Customer Name : </label>
     <input type="text" style=" width: 80%;
  padding: 5px;
  margin-bottom: 10px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" name="cname" value="<?php echo $row->name;?>"readonly><br>

     <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer Profession : </label>
     <input type="text" name="cprofession" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" value="<?php echo $row->profession;?>"readonly><br>

     <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer State : </label>
     <input type="text" name="cstate" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" value="<?php echo $row->state;?>"readonly><br>

     <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Customer City : </label>
     <input type="text" name="ccity" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" value="<?php echo $row->city;?>"readonly><br>

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
          <option value="<?php echo htmlentities($row1['name']);?>"<?php if($row->bankname==$row1['name']) echo 'selected="selected"';?>><?php echo htmlentities($row1['name']);?>
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
  resize: vertical;" class="fa-fa-eye" value="<?php echo $row->personal_no;?>"hidden>
      <a href="tel:+<?php echo $row->personal_no;?>" name="phoneno"><img src="contact.png"></a><br>


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
        <option value="<?php echo htmlentities($row2['name']);?>"<?php if($row->review==$row2['name']) echo 'selected="selected"';?>><?php echo htmlentities($row2['name']);?></option>
  <?php    } ?>
    </select>
<br>

	 <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Comment : </label>
	  <input type="text" name="comment" value="<?php echo $row->comment;?>" style=" width: 80%;
  padding: 5px;
  margin: 5px 5px 5px 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;" >
<br>
    </tr>
          
  </tbody>
</table>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="submit" name="submit" class="button" value="SUBMIT">
</div> <?php
                   } 
                  
?>

<?php echo "</form>";?>


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
  </script></body>
</html> 