 <center>

<div id="container" style="width:800px;">

    

    <div id="top" style="width:800px; height:20%; float:top;">
            Your top
			<?php
             $image = "../cd/clever0.jpg";  
             Echo "<br><img src=".$image." Style=width:800px;height:90px;>"
             ?>		
    </div>
   
    <div id="top2" style="width:800px; height:20%; float:top;">
            Your top2
			<?php
             $image = "../cd/clever0.jpg";  
             Echo "<br><img src=".$image." Style=width:800px;height:90px;>"
             ?>		
    </div>
   
   
   
   
   
    <div id="sidebar" style="width:250px; height:100%; float:left;">
            Your sidebar
 <br><input type="button"    align="left"  onClick="location.href='peerview.php'" value='Peer Review ' style="font-face: 'Comic Sans MS'; width:150px; font-size: larger; color: teal; background-color: #FFFFC0; border: 3pt ridge lightgrey"><br><br><br>
 <input type="button"  align="left"  onClick="location.href='addressbook6.php'" value='Parameter Checks' style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #FFFFC0; border: 3pt ridge lightgrey"><br><br><br>
 <input type="button"  align="left"  onClick="location.href='prchecks.php'" value='Verification Results' style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #FFFFC0; border: 3pt ridge lightgrey">


	</div>
    
	









	
	
	
	<div id="content" style="width:500px; height:100%; align:center; float:left;">
            Your Content
			   <?php
 //ECHO"<b style='font-family:Arial bold;font-size:20px;line-height:10px;'>CLEVER DEVICES</b><br>";
$conn=odbc_connect('ODBCsource','','');
if (!$conn)
  {exit("Connection Failed: " . $conn);}

$sql3="SELECT Customers.Name as name, Customers.Address1Line1, Customers.City1, Customers.State1, Customers.Zip1, Customers.ContactName1, Customers.Phone1
FROM Customers;";
$rs3=odbc_exec($conn,$sql3);
if (!$rs3)
  {exit("Error in SQL");}
echo"<b> <br>TRANSIT AUTHORITY</b>";
echo"<br><b> .</b>";
echo "<table border='1' width='100%'  cellspacing='0' cellpadding='5'><tr>";
echo "<th align='center'  bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:10px;'>Customer Name</th>";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:10px;'>Address  </th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:10px;'>City</th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:10px;'>Zip</th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:10px;'>ContactName</th> ";
echo "<th align='center' bgcolor='#A0CFEC'style='font-family:Arial bold;font-size:13px;line-height:10px;'>Phone</th></tr>";
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
<?php
 
?>