<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<link rel="stylesheet" href="css/style2.css">
</head>
<body>
<!-- Sidebar -->
<?php include("includes/navigation.php");?>
<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container" >
    <h1>Manage Customer </h1>
  </div>
</div>
<form action="" method="post">
 <label class="col-sm-2 control-label"style="margin: 5px 5px 5px 5px;">Review </label>
  <select name="action"style=" width:50%;
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
    
<input type="submit" name="search" value="search"></form>
<?php if(isset($_POST['search'])) {
$aid=$_SESSION['id']; 
$status=$_POST['action']; 
     $ret="select * from customer where callerid='$aid' and review='$status'";
     $res=mysqli_query($mysqli,$ret);
if(mysqli_num_rows($res)<0)
{
	$msg="No Data Found";
	"<p><?php echo $msg;?></p>";
}
else{
	?>
<br>
<table>
  <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>Status</th>
    <th>Date</th>
    <th>Comment</th>
    <th>Call</th>
  </tr>
  <?php
$cnt=1;
while($row=mysqli_fetch_array($res))
    {?>
<tr><td><?php echo $cnt;;?></td>
  <td><?php echo $row['name'];?></td>
<td><?php echo $row['review'];?></td>
<td><?php echo $row['c_date'];?></td>
<td><?php echo $row['comment'];?></td>
<td><a href="dashboard1.php?id=<?php echo $row['id'];?>"><img src="contact.png"></a></td>

  </tr>
                  <?php
$cnt=$cnt+1;
}
                    }?>
                      

</table>
<?php }?>
</div>


<div class="w3-container">

<br>
<table>
  <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>Status</th>
    <th>Date</th>
     <th>Comment</th>
    <th>Call</th>
  </tr>
  <?php 
$aid=$_SESSION['id'];
$ret="select * from customer  where callerid=? order by c_date desc";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
    {
      ?>
<tr><td><?php echo $cnt;;?></td>
  <td><?php echo $row->name;?></td>
<td><?php echo $row->review;?></td>
<td><?php echo $row->c_date;?></td>
<td><?php echo $row->comment;?></td>
<td><a href="dashboard1.php?id=<?php echo $row->id;?> & aid=<?php echo $row->callerid;?>"><img src="contact.png"></a></td>

  </tr>
                  <?php
$cnt=$cnt+1;
                   } ?>
                      

</table>
</div>
	<?php include("includes/footer.php");?>	

</body>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
</html>