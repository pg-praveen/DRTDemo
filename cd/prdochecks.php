



<?php
 

$q=$_GET['q'];
  $conn=odbc_connect('ODBCsource','','',SQL_CUR_USE_ODBC);
if (!$conn)
  {exit("Connection Failed: " . $conn);}
   
switch($q)
{
  case 1:
 
$sql1="SELECT distinct StopList.StopID , GeoIDs.GeoID, GeoIDs.GeoDesc, GeoIDs.TAGeoID, GeoIDs.Hdg, GeoIDs.Lat, GeoIDs.Long FROM GeoIDs
INNER JOIN StopList ON (GeoIDs.GeoID = StopList.GeoID)
WHERE GeoIDs.TAGeoID=' ' or GeoIDs.TAGeoID is null
ORDER BY StopList.StopID;";
$rs1=odbc_exec($conn,$sql1);
if (!$rs1)
  {exit("Error in SQL");}
echo"<br><b > missing TAGeoID</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>StopID</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>GeoID </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>GeoDesc</th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>TAGeoID</th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Latitude</th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Longitude</th></tr>";
while (odbc_fetch_row($rs1))
  {
  $vStopID=odbc_result($rs1,"StopID");
  $vGeoID=odbc_result($rs1,"GeoID");
  $vGeoDesc=odbc_result($rs1,"GeoDesc");
  $vTAGeoID='missing';
$vLat=odbc_result($rs1,"Lat");
  $vLong=odbc_result($rs1,"Long");


 echo "<tr><td>  $vStopID</td>";
 echo "<td>  $vGeoID</td>";
 echo "<td> $vGeoDesc</td>";
echo "<td> $vTAGeoID</td>";
 echo "<td>  $vLat</td>";
 echo "<td>  $vLong</td></tr>";
  }
echo "</table>";
  
break;
case 2:
$sql4=" SELECT Routes.Route, Routes.RouteAlt, Routes.RouteKey
FROM Routes LEFT JOIN DestCodeLookup ON Routes.[RouteKey] = DestCodeLookup.[RouteKey]
where  DestCodeLookup.[RouteKey] is null";
$rs4=odbc_exec($conn,$sql4);
if (!$rs4)
  {exit("Error in SQL");}
echo"<br><b>Destination Code is not assigned to Routes</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Roue Variation</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Destination Code</th></tr>";
while (odbc_fetch_row($rs4))
  {
  $vroute=odbc_result($rs4,"Route");
  $vrouteAlt=odbc_result($rs4,"RouteAlt");
  $vDestcode='UnAssigned';
 

 echo "<tr><td> $vroute</td>";
 echo "<td> $vrouteAlt</td>";
 echo "<td> $vDestcode </td></tr>";
   }
echo "</table>";
break;
case 3:

$sql3="SELECT Routes.Route, Routes.RouteAlt, Messages.AudioText AS RouteAudioText FROM Messages INNER JOIN Routes ON Messages.MessageID = Routes.RouteNameID
WHERE Messages.MessageType='RT' and Messages.AudioText =' ' 
ORDER BY Routes.Route";
$rs3=odbc_exec($conn,$sql3);
if (!$rs3)
  {exit("Error in SQL");}
echo"<br><b>Missing Route audio text</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route variation </th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route Audio text</th></tr>";
while (odbc_fetch_row($rs3))
  {
  $vroute=odbc_result($rs3,"Route");
  $vrouteAlt=odbc_result($rs3,"RouteAlt");
  $vRTaudio='missing';
 

 echo "<tr><td> $vroute</td>";
 echo "<td>  $vrouteAlt</td>";
  echo "<td>  $vRTaudio</td></tr>";
  }
echo "</table>";

break;
case 4:
$sql="SELECT Routes.Route, Routes.RouteAlt, DestCodeLookup.RouteKey, DestSignCodes.DestCode, DestSignCodes.DestSignText FROM Routes INNER JOIN (DestSignCodes INNER JOIN DestCodeLookup ON DestSignCodes.DestKey = DestCodeLookup.DestKey) ON (Routes.RouteKey = DestCodeLookup.RouteKey) AND (Routes.CustomerID = DestCodeLookup.CustomerID)
where DestSignCodes.DestCode= null;";
$rs=odbc_exec($conn,$sql);
if (!$rs)
  {exit("Error in SQL");}
echo"<br><b>Routes with missing Destination Code</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route variation </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'> Destination Code </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>DestSignText</th></tr>";
while (odbc_fetch_row($rs))
  {
  $vroute=odbc_result($rs,"Route");
  $vrouteAlt=odbc_result($rs,"RouteAlt");
  $vDestcode=odbc_result($rs,"DestCode");
  $vDestSign= odbc_result($rs,"DestSignText");

 echo "<tr><td> $vroute</td>";
 echo "<td>  $vrouteAlt</td>";
 echo "<td>  $vDestcode</td>";
 echo "<td>  $vDestSign</td></tr>";
  }

break;

case 5:
$sql2="SELECT Routes.Route, Routes.RouteAlt, Messages.SignText AS Pattern FROM Messages INNER JOIN Routes ON Messages.MessageID = Routes.RouteNameID WHERE Messages.MessageType='RT' and Messages.SignText = ' '
ORDER BY Routes.RouteAlt";
$rs2=odbc_exec($conn,$sql2);
if (!$rs2)
  {exit("Error in SQL");}
echo"<br><b>Routes with missing patterns</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route variation </th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Pattern</th></tr>";
while (odbc_fetch_row($rs2))
  {
  $vroute=odbc_result($rs2,"Route");
  $vrouteAlt=odbc_result($rs2,"RouteAlt");
  $vPattern='missing';
 

 echo "<tr><td> $vroute</td>";
 echo "<td>  $vrouteAlt</td>";
  echo "<td>  $vPattern</td></tr>";
  }

break;

case 6:
$sql5=" SELECT Routes.Route, Routes.RouteAlt, Routes.Verified
FROM Routes LEFT JOIN StopList ON Routes.[RouteKey] = StopList.[RouteKey]
WHERE (((StopList.RouteKey) Is Null)) and Routes.Verified = -1;";
$rs5=odbc_exec($conn,$sql5);
if (!$rs5)
  {exit("Error in SQL");}
echo"<br><b>Routes are verified but does not contain stops</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Roue Variation</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Verified</th></tr>";
while (odbc_fetch_row($rs5))
  {
  $vroute=odbc_result($rs5,"Route");
  $vrouteAlt=odbc_result($rs5,"RouteAlt");
  $Verified=odbc_result($rs5,"Verified");
 

 echo "<tr><td> $vroute</td>";
 echo "<td> $vrouteAlt</td>";
 echo "<td> $Verified </td></tr>";
   }
break;
   
 case 7:
$sql6=" SELECT BusTimeStopDescriptions.TAGeoID, BusTimeStopDescriptions.BusTimeStopText, BusTimeStopDescriptions.Enabled
FROM BusTimeStopDescriptions
where BusTimeStopDescriptions.BusTimeStopText=' ' and BusTimeStopDescriptions.Enabled = true";
$rs6=odbc_exec($conn,$sql6);
if (!$rs6)
  {exit("Error in SQL");}
echo"<br><b> Bus Time Stop Text is missing and it is enabled</b>";
echo "<table border='1' width='80%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>TAGeoID</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>BusTimeStopText  </th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Enabled</th></tr>";
while (odbc_fetch_row($rs6))
  {
  $TAGeoID=odbc_result($rs6,"TAGeoID");
  $BusTimeStopText=odbc_result($rs6,"BusTimeStopText");
  $Enabled=odbc_result($rs6,"Enabled");
 

 echo "<tr><td> $TAGeoID</td>";
 echo "<td> $BusTimeStopText</td>";
 echo "<td> $Enabled </td></tr>";
   }
 
break; 
}
odbc_close($conn);


?>

