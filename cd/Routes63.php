 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Blue Micro by Bryant Smith</title>
</head>

<body>
    <div id="page">
    	        <div id="header">
                	<img src="toplogo.gif" alt="XHTML Template by Bryant Smith" />
                    <!-- Include an <h1></h1> tag with your site's title here, or make a transparent PNG like the one I used -->
                </div>
    
                </div>

                <div id="content">
                	<div id="container">

                        <div id="main">
                        <div id="menu">
                            <ul>
	                            <li><a href="../bluemicro/routes63.php">Issues</a></li>
                                <li><a href="#">BusTypes</a></li>
                                <li><a href="../bluemicro/peerview.php">PeerReview</a></li>
                                <li><a href="../bluemicro/addressbook6.php">Parameters</a></li>
                                <li><a href="../bluemicro/bustools.php">Customer</a></li>
                                <li><a href="../bluemicro/blue.php">Home</a></li>
                            </ul>
                        </div>
						
						
						
                        <div id="text">
                       		 
							 
							 	<?php
$conn=odbc_connect('ODBCsource','','');
if (!$conn)
  {exit("Connection Failed: " . $conn);}

$sql="SELECT Routes.Route, Routes.RouteAlt, DestCodeLookup.RouteKey, DestSignCodes.DestCode, DestSignCodes.DestSignText FROM Routes INNER JOIN (DestSignCodes INNER JOIN DestCodeLookup ON DestSignCodes.DestKey = DestCodeLookup.DestKey) ON (Routes.RouteKey = DestCodeLookup.RouteKey) AND (Routes.CustomerID = DestCodeLookup.CustomerID)
where DestSignCodes.DestSignText=' ';";
$rs1=odbc_exec($conn,$sql);
if (!$rs1)
  {exit("Error in SQL");}
echo"<br><b > missing dest sign text</b>";
echo "<table border='1' width='100%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Route</th>";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>RouteAlt</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>DestCode</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>DestSignText </th></tr>";
while (odbc_fetch_row($rs1))
  {
  $Route=odbc_result($rs1,"Route");
  $RouteAlt=odbc_result($rs1,"RouteAlt");
  $DestCode=odbc_result($rs1,"DestCode");
  $DestSignText= 'missing';


 echo "<tr><td>  $Route</td>";
 echo "<td>  $RouteAlt .</td>";
 echo "<td>  $DestCode .</td>";
  echo "<td> $DestSignText .</td></tr>";
  }
echo "</table>";


$sql1="SELECT distinct StopList.StopID , GeoIDs.GeoID, GeoIDs.GeoDesc, GeoIDs.TAGeoID, GeoIDs.Hdg, GeoIDs.Lat, GeoIDs.Long FROM GeoIDs
INNER JOIN StopList ON (GeoIDs.GeoID = StopList.GeoID)
WHERE GeoIDs.TAGeoID=' ' or GeoIDs.TAGeoID is null
ORDER BY StopList.StopID;";
$rs1=odbc_exec($conn,$sql1);
if (!$rs1)
  {exit("Error in SQL");}
echo"<br><b > Missing TAGeoID</b>";
echo "<table border='1' width='40%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>StopID</th>";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>GeoID</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>GeoDesc</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>TAGeoID</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Lat</th> ";
 echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:22px;'>Long </th></tr>";
while (odbc_fetch_row($rs1))
  {
  $StopID=odbc_result($rs1,"StopID");
  $GeoID=odbc_result($rs1,"GeoID");
  $GeoDesc=odbc_result($rs1,"GeoDesc");
   $TAGeoID='missing';
  $Lat=odbc_result($rs1,"Lat");
  $Long= odbc_result($rs1,"Long");


 echo "<tr><td>  $StopID</td>";
 echo "<td>  $GeoID </td>";
 echo "<td>  $GeoDesc </td>";
  echo "<td>  $TAGeoID </td>";
 echo "<td>  $Lat </td>";
    echo "<td> $Long </td></tr>";
  }
echo "</table>";




$sql2="SELECT Routes.Route, Routes.RouteAlt, Messages.SignText AS Pattern FROM Messages INNER JOIN Routes ON Messages.MessageID = Routes.RouteNameID WHERE Messages.MessageType='RT' and Messages.SignText = ' '
ORDER BY Routes.RouteAlt";
$rs2=odbc_exec($conn,$sql2);
if (!$rs2)
  {exit("Error in SQL");}
echo"<br><b>Routes with missing patterns</b>";
echo "<table border='1' width='100%'  cellspacing='0' cellpadding='5'><tr>";
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
echo "</table>";





$sql4=" SELECT Routes.Route, Routes.RouteAlt, Routes.RouteKey
FROM Routes LEFT JOIN DestCodeLookup ON Routes.[RouteKey] = DestCodeLookup.[RouteKey]
where  DestCodeLookup.[RouteKey] is null";
$rs4=odbc_exec($conn,$sql4);
if (!$rs4)
  {exit("Error in SQL");}
echo"<br><b>Destination Code is not assigned to Routes</b>";
echo "<table border='1' width='100%'  cellspacing='0' cellpadding='5'><tr>";
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


$sql5=" SELECT Routes.Route, Routes.RouteAlt, Routes.Verified
FROM Routes LEFT JOIN StopList ON Routes.[RouteKey] = StopList.[RouteKey]
WHERE (((StopList.RouteKey) Is Null)) and Routes.Verified = -1;";
$rs5=odbc_exec($conn,$sql5);
if (!$rs5)
  {exit("Error in SQL");}
echo"<br><b>Routes are verified but does not contain stops</b>";
echo "<table border='1' width='100%'  cellspacing='0' cellpadding='5'><tr>";
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
echo "</table>";



$sql6=" SELECT BusTimeStopDescriptions.TAGeoID, BusTimeStopDescriptions.BusTimeStopText, BusTimeStopDescriptions.Enabled
FROM BusTimeStopDescriptions
where BusTimeStopDescriptions.BusTimeStopText=' ' and BusTimeStopDescriptions.Enabled = true";
$rs6=odbc_exec($conn,$sql6);
if (!$rs6)
  {exit("Error in SQL");}
echo"<br><b> Bus Time Stop Text is missing and it is enabled</b>";
echo "<table border='1' width='100%'  cellspacing='0' cellpadding='5'><tr>";
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
echo "</table>";




$sql3="SELECT Routes.Route, Routes.RouteAlt, Messages.AudioText AS RouteAudioText FROM Messages INNER JOIN Routes ON Messages.MessageID = Routes.RouteNameID
WHERE Messages.MessageType='RT' and Messages.AudioText =' '
ORDER BY Routes.RouteAlt";
$rs3=odbc_exec($conn,$sql3);
if (!$rs3)
  {exit("Error in SQL");}
echo"<br><b>Missing Route audio text</b>";
echo "<table border='1' width='100%'  cellspacing='0' cellpadding='5'><tr>";
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

odbc_close($conn); 
?>	 



							 
							 
							 
                                                    
                        </div>

                        
						
						
						
						
						
						
						
						</div>
                </div>
                <div class="clear"></div>
                <div id="footer">
                	<p><a href="http://www.bryantsmith.com/template">free xhtml template</a> by <a href="http://www.bryantsmith.com">web page designer</a></p>
                </div>
                
                
     </div>
        

  
        
</body>
</html>
