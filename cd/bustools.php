<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Database Review Tool</title>
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
	                          <li><a href="../cd/prchecks.php">Issues</a></li>
                                <li><a href="../cd/bustypes.php"> Vehicles</a></li>
                                <li><a href="../cd/peerview.php">PeerReview</a></li>
                                <li><a href="../cd/addressbook6.php">Parameters</a></li>
                                <li><a href="../cd/bustools.php">Customer</a></li>
                                <li><a href="../cd/index.php">Home</a></li>
                            </ul>
                        </div>
						
						
						
						
						
						
						
						
						
                        <div id="text">
                       		
							
							
							 <?php
// include("../cd/upload1.php");
 
 //$conn = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$path", $user, $password);
$conn=odbc_connect('ODBCsource','','');
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
