 <html>
<body style="min-width:980px;  padding:0; border:0; margin:0; background:#FFCC99;">

<?php
$q=$_GET['q'];
$conn=odbc_connect('ODBCsource','','',SQL_CUR_USE_ODBC);
if (!$conn)
  {exit("Connection Failed: " . $conn);}
  if($q!="" ||$q!=NULL)
  {
  $sql1=" SELECT Buses2.BusType, Buses2.ParmName, Buses2.value FROM Buses2  
 where ( Buses2.ParmName like '$q%'  )";

  }
  else
  {
  $sql1="SELECT Buses2.BusType, Buses2.ParmName, Buses2.value FROM Buses2 order by  Buses2.ParmName;";
 
  }
  
  if ($flag=1)
  {
  
$rs2=odbc_exec($conn,$sql1);

if (!$rs2)
  {exit("<br>Error in SQL");}
echo"<br><b >Bus Parameter details </b>";
echo "<table border='1' width='40%'  cellspacing='1' cellpadding='5'><tr>";
echo "<th align='center'  style='font-family:Arial bold;font-size:13px;line-height:22px;'>Bus-ID</th>";
echo "<th align='center'  style='font-family:Arial bold;font-size:13px;line-height:22px;'>ParmName </th> ";
 echo "<th align='center' style='font-family:Arial bold;font-size:13px;line-height:22px;'> value</th></tr>";
while (odbc_fetch_row($rs2))
  {
  $BusType=odbc_result($rs2,"BusType");
  $ParmName=odbc_result($rs2,"ParmName");
  $value=odbc_result($rs2,"value");
 


 echo "<tr><td width='12'>  $BusType</td>";
 echo "<td width='12'>  $ParmName</td>";
  echo "<td width='12'>  $value</td></tr>";
  }
  }
  else
  {
  $rs1=odbc_exec($conn,$sql1);
echo $rs1;
if (!$rs1)
  {exit("<br>Error in SQL");}
echo"<br><b >Bus Parameter details</b>";
echo "<table border='1' width='40%'  cellspacing='1' cellpadding='5'><tr>";
echo "<th align='center'  style='font-family:Arial bold;font-size:13px;line-height:22px;'>Bus-ID</th>";
echo "<th align='center'  style='font-family:Arial bold;font-size:13px;line-height:22px;'>ParmName </th> ";
 echo "<th align='center' style='font-family:Arial bold;font-size:13px;line-height:22px;'> value</th></tr>";
while (odbc_fetch_row($rs1))
  {
  $BusType=odbc_result($rs1,"BusType");
  $ParmName=odbc_result($rs1,"ParmName");
  $value=odbc_result($rs1,"value");
 


 echo "<tr><td width='12'>  $BusType</td>";
 echo "<td width='12'>  $ParmName</td>";
  echo "<td width='12'>  $value</td></tr>";
  }

 }
echo "</table>";
 
  
odbc_close($conn); 
?>

</body>
</html> 