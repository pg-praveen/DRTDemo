  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Database Review Tool</title>
</head>

<body>
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
  xmlhttp.open("GET","searchbusparm.php?q="+str+"",true);
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
						
						
						
                        <div id="text">
						

  <input type="text" name="q" id="txt1" value="" onKeyup="search()" /> Search 						 
						
<div id="parm">			 
                       		 
		<?php
$conn=odbc_connect('ODBCsource','','',SQL_CUR_USE_ODBC);
if (!$conn)
  {exit("Connection Failed: " . $conn);}
  
  
 $sql1="SELECT Buses2.BusType, Buses2.ParmName, Buses2.value FROM Buses2
order by  Buses2.ParmName;";
$rs1=odbc_exec($conn,$sql1);
if (!$rs1)
  {exit("Error in SQL");}
echo"<br><b >Bus Parameter details </b>";
echo "<table border='1' width='40%'  cellspacing='1' cellpadding='5'><tr>";
echo "<th align='center'  style='font-family:Arial bold;font-size:13px;line-height:22px;'>Bus-ID</th>";
echo "<th align='center'  style='font-family:Arial bold;font-size:13px;line-height:22px;'>ParmName </th> ";
 echo "<th align='center' style='font-family:Arial bold;font-size:13px;line-height:22px;'>  value</th></tr>";
while (odbc_fetch_row($rs1))
  {
  $BusType=odbc_result($rs1,"BusType");
  $ParmName=odbc_result($rs1,"ParmName");
  $value=odbc_result($rs1,"value");
 


 echo "<tr><td width='12'>  $BusType</td>";
 echo "<td width='12'>  $ParmName</td>";
  echo "<td width='12'>  $value</td></tr>";
  }
echo "</table>";
 
  
  
odbc_close($conn); 
?>
                    </div>                          
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
