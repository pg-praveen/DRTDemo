<html>
<body style="min-width:980px;  padding:0; border:0; margin:0; background:#FFCC99;">

<?php
$q=$_GET['q'];
$conn=odbc_connect('ODBCsource','','',SQL_CUR_USE_ODBC);
if (!$conn)
  {exit("Connection Failed: " . $conn);}
  if($q!="" ||$q!=NULL)
  {
  $sql1="SELECT BWParameters.ParmType as SelectEquipment, BWFunctionalGroups.function as FunctionName , BWParameters.Name as ParameterName ,BWParameters.TCHName as ParmName_TCHcaption, BWParameters.value FROM BWFunctionalGroups INNER JOIN BWParameters
ON BWFunctionalGroups.FunctionKey = BWParameters.FunctionKey
 where ( BWParameters.Name like '$q%' or BWParameters.TCHName like '$q%')";

  }
  else
  {
  $sql1="SELECT BWParameters.ParmType  as SelectEquipment, BWFunctionalGroups.function as FunctionName , BWParameters.Name as ParameterName ,BWParameters.TCHName as ParmName_TCHcaption ,BWParameters.value    FROM BWFunctionalGroups INNER JOIN BWParameters
ON BWFunctionalGroups.FunctionKey = BWParameters.FunctionKey
order by BWParameters.Name";
 
  }
  
$rs2=odbc_exec($conn,$sql1);

if (!$rs2)
  {exit("<br>Error in SQL");}
echo"<br><b > Parameter Details</b>";
echo "<table border='1' width='10'  cellspacing='0' cellpadding='5'><tr>";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>SelectEquipment</b></td>";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>FunctionName </b></td> ";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>ParameterName</b></td> ";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>ParmName(TCHcaption)</b></td> ";
 echo "<td align='center' bgcolor='#A0CFEC'  style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>ParameterValue</b></td></tr>";

 
while (odbc_fetch_row($rs2))
  {

  $vSelectEquipment=odbc_result($rs2,"SelectEquipment");
  $vFunctionName=odbc_result($rs2,"FunctionName");
  $vParameterName=odbc_result($rs2,"ParameterName");
  $vParmName_TCHcaption=odbc_result($rs2,"ParmName_TCHcaption");
  $vpvalue=odbc_result($rs2,"value");
  $temp = wordwrap($vpvalue, 15, "\n", true);
 
  if($vSelectEquipment == 1)
  {
     $vSelectEquipment="System";
	 }
	 else if($vSelectEquipment == 2)
        {
         $vSelectEquipment="Global";
	   }
	   else if($vSelectEquipment == 3)
        {
         $vSelectEquipment="Vehicle";
	   }
	   else if($vSelectEquipment == 4)
        {
         $vSelectEquipment="DestSign";
	   }
	   else if($vSelectEquipment == 6)
        {
         $vSelectEquipment="GPS";
	   }
	   else if($vSelectEquipment == 8)
        {
         $vSelectEquipment="Radios";
	   }
	   else if($vSelectEquipment == 9)
        {
         $vSelectEquipment="OTAmessages";
	   }
	      else if($vSelectEquipment == 10)
        {
         $vSelectEquipment="OTACannedGroups";
	   }
	    else if($vSelectEquipment ==11)
        {
         $vSelectEquipment="OTACannedMessages";
	   }
	    else if($vSelectEquipment == 12)
        {
         $vSelectEquipment="DPF";
	   }
	    else if($vSelectEquipment == 13)
        {
         $vSelectEquipment="RTvarAttribute";
	   }
	    else if($vSelectEquipment == 14)
        {
         $vSelectEquipment="GeoFenceAttributes";
	   }
        else if($vSelectEquipment == 15)
        {
         $vSelectEquipment="TalkGroupParms";
	   }
     else if($vSelectEquipment == 16)
        {
         $vSelectEquipment="InsideSign";
	   }
        else if($vSelectEquipment == 17)
        {
         $vSelectEquipment="17";
	   }	

 echo "<tr><td> $vSelectEquipment</td>";
 echo "<td> $vFunctionName</td>";
 echo "<td> $vParameterName</td>";
 echo "<td> $vParmName_TCHcaption</td>";
 echo "<td> $temp</td></tr>";
  }

echo "</table>";
 
  
odbc_close($conn); 
?>

</body>
</html> 