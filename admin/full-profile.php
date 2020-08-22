<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'parth');
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
<title>Loan  Information</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="hostel.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0">
<?php 
		 $ret= mysqli_query($con,"SELECT * FROM loan where id = '".$_GET['id']."'");
			while($row=mysqli_fetch_array($ret))
			{
			?>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			
			<tr>
			  <td colspan="2"  class="font"><?php echo ucfirst($row['name_of_entity']);?> <?php echo ucfirst($row['type_of_loan']);?>'S <span class="font1"> information &raquo;</span> </td>
  </tr>
			<tr>
			  <td colspan="2"  class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <div align="right">Reg Date : <span class="comb-value"><?php echo $row['date_of_incorpration'];?></span></div></td>
  </tr>
			<tr>
			  <td colspan="2"  class="heading" style="color: red;">Loan Related Info &raquo; </td>
  </tr>
			<tr>
			  <td colspan="2"  class="font1"><table width="100%" border="0">


                <tr colspan="2">
                  <td width="32%" valign="top" class="heading">bank name : </td>
                 
                    <td class="comb-value1"><span class="comb-value"><?php echo $row['bank_name'];?></span></td>
                
                  <td width="22%" valign="top" align="right" class="heading">Type of loan: </td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['type_of_loan'];?></span></td>
                    </tr>
                  


                    <tr colspan="2">
                    <td width="12%" valign="top"  class="heading">Purpose of loan : </td>
                      <td class="comb-value1"><?php echo $row['purpose_of_loan'];?></td>

                    <td width="22%" valign="top"align="right" class="heading">Requested loan amount: </td>
                      <td class="comb-value1"><span class="comb-value"><?php echo $row['req_loan_amt'];?></span></td>
                    </tr>


                    <tr>
                    <td width="12%" valign="top" class="heading">Requested tenure: </td>
                      <td class="comb-value1"><?php echo $row['req_tenure'];?></td>
                    </tr>
                    <tr>
                    <td width="12%" valign="top" class="heading">Channel name: </td>
                      <td class="comb-value1"><?php echo $row['channel_name'];?></td>
                    </tr>
                    <tr>
                    <td width="12%" valign="top" class="heading">Channel code: </td>
                      <td class="comb-value1"><?php echo $row['channel_code']?></td>
                    </tr>
                     <tr>
                    <td width="12%" valign="top" class="heading">Executive name: </td>
                      <td class="comb-value1"><?php echo $row['executive_name'];?></td>
                    </tr>
                    <tr>
                    <td width="12%" valign="top" class="heading">Executive code: </td>
                      <td class="comb-value1"><?php echo $row['executive_code']?></td>
                    </tr>
  <tr>
   <td colspan="2" align="left"  class="heading" style="color: red;">Main Applicant Info &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Name of entity: </td>
<td class="comb-value1"><?php echo $row['name_of_entity'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Bussiness type: </td>
<td class="comb-value1"><?php echo $row['bussiness_type'];?></td>
</tr>


<tr>
        <td colspan="2"  class="heading" style="color: red;"> Trade Reference 1:  &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Name: </td>
<td class="comb-value1"><?php echo $row['tr_name'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Entity name: </td>
<td class="comb-value1"><?php echo $row['tr_entity_name'];?></td>
</tr>


<tr>
        <td colspan="2"  class="heading" style="color: red;"> Trade Reference 2:  &raquo; </td>
  </tr>
  <tr>
<td width="12%" valign="top" class="heading">Name: </td>
<td class="comb-value1"><?php echo $row['tr_name'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Entity name: </td>
<td class="comb-value1"><?php echo $row['tr_entity_name'];?></td>
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
<script>
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
    }
  </script>
</body>
</html>
