 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Database Review Tool</title>
</head>

<body style="min-width:980px;  padding:0; border:0; margin:0;">
<script language="JavaScript" type="text/javascript">
function search()
{
 var str=document.getElementById('txt1').value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	var s1=xmlhttp.responseText;
	if (s1==100 )
	{
	alert('Something went wrong with the Database.......!!!');
	}
	else
	{
	document.getElementById('parm').innerHTML=s1;
	
	
	}
    }
  }
  xmlhttp.open("GET","searchparameter.php?q="+str+"",true);
xmlhttp.send();
  
  
  
}
</script>
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
	                         <li><a href="../cd/prchecks.php">Issues</a></li>
                                 <li><a href="../cd/bustypes.php"> Vehicles</a></li>
                                <li><a href="../cd/peerview.php">PeerReview</a></li>
                                <li><a href="../cd/addressbook6.php">Parameters</a></li>
                                <li><a href="../cd/bustools.php">Customer</a></li>
                                <li><a href="../cd/index.php">Home</a></li>
                            </ul>
                        </div>
						</div>
						
						
						
                        <div id="text">
						

  <input type="text" name="q" id="txt1" value="" onKeyup="search()" /> <b>Search</b> 						 
						
<div id="parm">			 
                       		 
		<?php
$conn=odbc_connect('ODBCsource','','',SQL_CUR_USE_ODBC);
if (!$conn)
  {exit("Connection Failed: " . $conn);}
  
  
 $sql1="SELECT BWParameters.ParmType as SelectEquipment, BWFunctionalGroups.function as FunctionName , BWParameters.Name as ParameterName ,BWParameters.TCHName as ParmName_TCHcaption ,BWParameters.value as val  FROM BWFunctionalGroups INNER JOIN BWParameters
ON BWFunctionalGroups.FunctionKey = BWParameters.FunctionKey
order by BWParameters.Name";
  
$rs2=odbc_exec($conn,$sql1);

if (!$rs2)
  {exit("<br>Error in SQL");}
echo"<br><b > Parameter Details</b>";
echo "<table border='1' width='10'  cellspacing='0' cellpadding='5'><tr>";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>SelectEquipment</b></td>";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>FunctionName </b></td> ";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>ParameterName</b></td> ";
echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>ParmName(TCHcaption)</b></td> ";
 echo "<td align='center' bgcolor='#A0CFEC' style='font-family:Arial bold;font-size:13px;line-height:22px;'><b>ParameterValue</b></td></tr>";

 
while (odbc_fetch_row($rs2))
  {

  $vSelectEquipment=odbc_result($rs2,"SelectEquipment");
  $vFunctionName=odbc_result($rs2,"FunctionName");
  $vParameterName=odbc_result($rs2,"ParameterName");
  $vParmName_TCHcaption=odbc_result($rs2,"ParmName_TCHcaption");
  $vpvalue=odbc_result($rs2,"val");
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
                     
					
                        </div>
						</div>

				
				</div>
                <div class="clear"></div>
                <div id="footer">
                	<p><a href="http://www.cleverdevices.com">Clever Devices </a>      | DRT Version 1.1</p>
                </div>
                
                
     </div>
        

  
        
</body>
</html>
