<?php
 
?>

<form enctype="multipart/form-data" action="upload1.php" method="POST">
 
 Please choose a file: <input name="uploaded" type="file" /><br />
 <input type="submit" value="Upload" />
 </form> 
 
 <?php
 /*
 //$conn=odbc_connect('ODBCsource','','');
 $mdbFilename = 'D:\Parminder\DECEMBER\prasad\WRTA_BT32_37_43.mdb';
 $conn = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$mdbFilename", $user, $password);
if (!$conn)
  {exit("Connection Failed: " . $conn);}

$sql3="SELECT Customers.Name as name, Customers.Address1Line1, Customers.City1, Customers.State1, Customers.Zip1, Customers.ContactName1, Customers.Phone1
FROM Customers;";
$rs3=odbc_exec($conn,$sql3);
if (!$rs3)
  {exit("Error in SQL");}
echo"<b> <u>TRANSIT AUTHORITY</b></u>";
echo"<br><b>.</b>";
echo "<table border='1' width='90%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'  style='font-family:Arial bold;font-size:13px;line-height:10px;'>Customer Name</th>";
echo "<th align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:10px;'>Address  </th> ";
echo "<th align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:10px;'>City</th> ";
echo "<th align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:10px;'>Zip</th> ";
echo "<th align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:10px;'>Contact Name</th> ";
echo "<th align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:10px;'>Phone</th></tr>";
  while (odbc_fetch_row($rs3))
  {
  $vCname=odbc_result($rs3,"name");
  $vAddress1Line1=odbc_result($rs3,"Address1Line1");
  $City1=odbc_result($rs3,"City1");
  $Zip1=odbc_result($rs3,"Zip1");
  $vContactName1=odbc_result($rs3,"ContactName1");
    $Phone1=odbc_result($rs3,"Phone1");
  
  echo "<tr><td>  $vCname</td>";
 echo "<td>  $vAddress1Line1</td>";
 echo "<td> $City1</td>";
echo "<td> $Zip1</td>";
 echo "<td>  $vContactName1</td>";
 echo "<td>  $Phone1</td></tr>";
  }
  
  echo "</table>";
  odbc_close($conn); 
*/
 ?>
 
<?php
//end here
  ?>