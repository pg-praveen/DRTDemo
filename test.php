<?php
$conn=odbc_connect('ODBCsource','','',SQL_CUR_USE_ODBC);
if (!$conn)
  {exit("Connection Failed: " . $conn);}
 
 $sql1="SELECT BWParameters.ParmType as SelectEquipment = case when BWParameters.ParmType ='2' then 'Global' end, BWFunctionalGroups.function as FunctionName , BWParameters.Name as ParameterName ,BWParameters.TCHName as ParmName_TCHcaption ,BWParameters.value  FROM BWFunctionalGroups INNER JOIN BWParameters
ON BWFunctionalGroups.FunctionKey = BWParameters.FunctionKey
order by BWParameters.Name";
$rs1=odbc_exec($conn,$sql1);
if (!$rs1)
  {exit("Error in SQL");}
echo"<br><b > Parameter Details</b>";
echo "<table border='1' width='50%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>SelectEquipment</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>FunctionName </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>ParameterName</th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>ParmName_TCHcaption</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Parameter value</th></tr>";
while (odbc_fetch_row($rs1))
  {
  $vSelectEquipment=odbc_result($rs1,"SelectEquipment");
  $vFunctionName=odbc_result($rs1,"FunctionName");
  $vParameterName=odbc_result($rs1,"ParameterName");
  $vParmName_TCHcaption=odbc_result($rs1,"ParmName_TCHcaption");
  $vpvalue=odbc_result($rs1,"value");


 echo "<tr><td>  $vSelectEquipment</td>";
 echo "<td>  $vFunctionName</td>";
 echo "<td> $vParameterName</td>";
 echo "<td> $vParmName_TCHcaption</td>";
 echo "<td>  $vpvalue</td></tr>";
  }
echo "</table>";
 
odbc_close($conn);

?>

/* hey baby */