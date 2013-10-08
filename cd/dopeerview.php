



<?php
 

$q=$_GET['q'];
 $conn=odbc_connect('ODBCsource','','',SQL_CUR_USE_ODBC);
if (!$conn)
  {exit("Connection Failed: " . $conn);}
switch($q)
{
  case 1:
 
$sql="SELECT Routes.Route, Routes.RouteAlt, Messages.SignText AS Pattern, Messages.MessageType, Routes.BusTimeDestination, DestCodeLookup.DestKey, DestSignCodes.DestCode, DestSignCodes.DestSignText
FROM (Messages INNER JOIN Routes ON Messages.MessageID = Routes.RouteNameID) INNER JOIN (DestSignCodes INNER JOIN DestCodeLookup ON DestSignCodes.DestKey = DestCodeLookup.DestKey) ON (Routes.RouteKey = DestCodeLookup.RouteKey) AND (Routes.CustomerID = DestCodeLookup.CustomerID)
WHERE (((Messages.MessageType)='RT'))
ORDER BY Routes.Route, Routes.RouteAlt;
";
$rs=odbc_exec($conn,$sql);
if (!$rs)
  {exit("Error in SQL");}
echo"<br><b>Route Details</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route variation </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'> Pattern / Description  </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'> DestCode  </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>BusTimeDestination</th></tr>";
while (odbc_fetch_row($rs))
  {
  $vroute=odbc_result($rs,"Route");
  $vrouteAlt=odbc_result($rs,"RouteAlt");
  $vPattern=odbc_result($rs,"Pattern");
  $vDestCode=odbc_result($rs,"DestCode");
   $vBusTimeDestination=odbc_result($rs,"BusTimeDestination");

 echo "<tr><td> $vroute</td>";
 echo "<td>  $vrouteAlt</td>";
 echo "<td>  $vPattern</td>";
  echo "<td>  $vDestCode</td>";
 echo "<td>  $vBusTimeDestination</td></tr>";
  }
  
  echo "</table>";
break;
case 2:
$sql="SELECT Routes.Route, Routes.RouteAlt, Messages.SignText AS Pattern, Messages.MessageType, Routes.BusTimeDestination, DestCodeLookup.DestKey, DestSignCodes.DestCode, DestSignCodes.DestSignText
FROM (Messages INNER JOIN Routes ON Messages.MessageID = Routes.RouteNameID) INNER JOIN (DestSignCodes INNER JOIN DestCodeLookup ON DestSignCodes.DestKey = DestCodeLookup.DestKey) ON (Routes.RouteKey = DestCodeLookup.RouteKey) AND (Routes.CustomerID = DestCodeLookup.CustomerID)
WHERE (((Messages.MessageType)='RT'))
ORDER BY Routes.Route, Routes.RouteAlt;
";
$rs=odbc_exec($conn,$sql);
if (!$rs)
  {exit("Error in SQL");}
echo"<br><b>Route Details</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route variation </th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'> DestCode  </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>DestSignText</th></tr>";
while (odbc_fetch_row($rs))
  {
  $vroute=odbc_result($rs,"Route");
  $vrouteAlt=odbc_result($rs,"RouteAlt");
   $vDestCode=odbc_result($rs,"DestCode");
   $vDestSignText=odbc_result($rs,"DestSignText");

 echo "<tr><td> $vroute</td>";
 echo "<td>  $vrouteAlt</td>";
   echo "<td>  $vDestCode</td>";
 echo "<td>  $vDestSignText</td></tr>";
  }
  
  echo "</table>";
break;

case 3:
$sql1="SELECT Messages.MessageID, Messages.MessageType, Messages.SignText, Messages.AudioText FROM Messages
WHERE (((Messages.MessageType)='PS'));";
 $rs1=odbc_exec($conn,$sql1);
if (!$rs1)
  {exit("Error in SQL");}
echo"<br><b > Public Service Announcements</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Rank</th>";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>SignText</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Audio Text </th></tr>";
while (odbc_fetch_row($rs1))
  {
  $vMessageID=odbc_result($rs1,"MessageID");
  $vSignText=odbc_result($rs1,"SignText");
  $vAudioText=odbc_result($rs1,"AudioText");
   $temp = wordwrap($vAudioText, 15, "\n", true);

 echo "<tr><td>  $vMessageID</td>";
 echo "<td>  $vSignText</td>";
  echo "<td> $temp </td></tr>";
  }
echo "</table>";
break;

case 4:
$sql2="SELECT Buses2.BusType, Buses2.ParmName, Buses2.value
FROM Buses2 INNER JOIN BWParameters ON Buses2.ParmName = BWParameters.Name
WHERE (((Buses2.ParmName) In ('VehicleManufacturer','VehicleModel')))
ORDER BY Buses2.BusType;";
$rs2=odbc_exec($conn,$sql2);
if (!$rs2)
  {exit("Error in SQL");}
echo"<br><b>Bus Types</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>BusID</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Desc</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>val</th></tr>";
while (odbc_fetch_row($rs2))
  {
  $vbusId=odbc_result($rs2,"BusType");
  $vBusManufacturer=odbc_result($rs2,"ParmName");
  $vBusModel=odbc_result($rs2,"value");
 
 

 echo "<tr><td> $vbusId</td>";
 echo "<td>  $vBusManufacturer</td>";
 echo "<td>  $vBusModel </td></tr>";
 
  }
  echo "</table>";
break;
case 5:
$sql1="SELECT Messages.MessageID, Messages.MessageType, Messages.SignText, Messages.AudioText FROM Messages
WHERE (((Messages.MessageType)='XW'));";
 $rs1=odbc_exec($conn,$sql1);
if (!$rs1)
  {exit("Error in SQL");}
echo"<br><b > Transfer Messages</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Transfer ID</th>";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Transfer SignText</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Transfer AudioText </th></tr>";
while (odbc_fetch_row($rs1))
  {
  $vMessageID=odbc_result($rs1,"MessageID");
  $vSignText=odbc_result($rs1,"SignText");
  $vAudioText=odbc_result($rs1,"AudioText");

 echo "<tr><td>  $vMessageID</td>";
 echo "<td>  $vSignText</td>";
  echo "<td> $vAudioText </td></tr>";
  }
echo "</table>";

break;

case 6:
$sql5=" SELECT OTACannedMessages.[Inbound/Outbound] as InOu, OTACannedMessages.[TCH Caption] as TCHcaption, OTACannedMessages.Description FROM OTACannedMessages
ORDER BY OTACannedMessages.[Inbound/Outbound];";
$rs5=odbc_exec($conn,$sql5);
if (!$rs5)
  {exit("Error in SQL");}
echo"<br><b>Canned Messages</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Inbound/Outbound</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>TCH Caption</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Description</th></tr>";
while (odbc_fetch_row($rs5))
  {
  $vInOu=odbc_result($rs5,"InOu");
  $vTCHcaption=odbc_result($rs5,"TCHcaption");
  $vDescription=odbc_result($rs5,"Description");
 

 echo "<tr><td> $vInOu</td>";
 echo "<td> $vTCHcaption </td>";
 echo "<td> $vDescription </td></tr>";
   }
break;
   
 case 7:
$sql6=" SELECT Routes.Route, Routes.RouteAlt,  StopList.StopSequence, StopList.StopID, StopList.TransferID FROM StopList 
INNER JOIN Routes ON StopList.RouteKey = Routes.RouteKey
Where StopList.TransferID >0
order by Routes.Route, Routes.RouteAlt, StopList.StopSequence";
$rs6=odbc_exec($conn,$sql6);
if (!$rs6)
  {exit("Error in SQL");}
echo"<br><b> Transfer ID assigned to Stops</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Variation</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>StopSequence  </th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>StopID </th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>TransferID</th></tr>";
while (odbc_fetch_row($rs6))
  {
  $Route=odbc_result($rs6,"Route");
  $RouteAlt=odbc_result($rs6,"RouteAlt");
   $StopSequence=odbc_result($rs6,"StopSequence");
    $StopID=odbc_result($rs6,"StopID");
    $TransferID=odbc_result($rs6,"TransferID");
 
 

 echo "<tr><td> $Route</td>";
 echo "<td> $RouteAlt</td>";
  echo "<td> $StopSequence</td>";
 echo "<td> $StopID</td>";
  echo "<td> $TransferID </td></tr>";
   }
 
break; 
}
odbc_close($conn);


?>

