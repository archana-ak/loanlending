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
  <div class="w3-container">
    <h1>Manage Customer </h1>
  </div>
</div>


<div class="w3-container">

<br>
<table>
  <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>Status</th>
    <th>Call</th>
  </tr>
  <?php 
$aid=$_SESSION['id'];
$ret="select * from customer  where added_id=?";
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
<td><a href="dashboard1.php?id=<?php echo $row->id;?>"><img src="contact.png"></a></td>
  </tr>
                  <?php
$cnt=$cnt+1;
                   } ?>
                      

</table>
<div>
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