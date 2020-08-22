<?php
session_start();
define('DB_SERVER','localhost:3306');
define('DB_USER','kamluzmh_parth');
define('DB_PASS' ,'parth@123');
define('DB_NAME', 'kamluzmh_parth');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Records  Information</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="hostel.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0">
<?php 
		 $ret= mysqli_query($con,"SELECT * FROM customer where id = '".$_GET['id']."'");
			while($row=mysqli_fetch_array($ret))
			{ 
       // $c=$_GET['edate'];print_r($c);die();
			?>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			
			<tr>
			  <td colspan="2"  class="font"><?php echo ucfirst($row['calledby']);?>'S <span class="font1"> information &raquo;</span> </td>
  </tr>
			<tr>
			  <td colspan="2"  class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <div align="right"><span class="comb-value"><?php echo "Record Given on -: " .date("Y-m-d");?></span></div></td>
  </tr>
			
      <tr>
        <td colspan="2"  class="heading" style="color: red;">Calling Related Info &raquo; </td>
  </tr>
      <tr>
        <td colspan="2"  class="font1"><table width="100%" border="0">
                <tr>
                  <td width="32%" valign="top" class="heading">Starting Date : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $_GET['sdate'];?></span></td>
                    </tr>
                  <tr>
                  <td width="22%" valign="top" class="heading">Ending Date : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $_GET['edate'];?></span></td>
                    </tr>
                    <tr>
                  <td width="22%" valign="top" class="heading">No of call's done : </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $_GET['count'];?></span></td>
                    </tr>
		
<?php } ?>


                   
                  </table></td>
                </tr>
               
					
                  </table></td>
                </tr>
              </table></td>
  </tr>
		
           
 
	 
    </table></td>
  </tr>

  
  <tr>
    <td colspan="2" align="right" ><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="14%">&nbsp;</td>
          <td width="35%" class="comb-value"><label>
            <input name="Submit" type="submit" class="txtbox4" value="Prints this Document " onClick="return f3();" />
          </label></td>
          <td width="3%">&nbsp;</td>
          <td width="26%"><label>
            <input name="Submit2" type="submit" class="txtbox4" value="Close this document " onClick="return f2();"  />
          </label></td>
          <td width="8%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
