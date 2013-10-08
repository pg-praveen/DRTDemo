 <center>
<body width="98%"  style="min-width:980px;  padding:0; border:0; margin:0; background:#D3D8E8;">

<script type="text/javascript">
function show123()
{
var s1=document.getElementById("mid").value;
 
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
	
	if (xmlhttp.responseText ==100 )
	{
	alert('Something went wrong with the Database.......!!!');
	}
	else
	{
	document.getElementById("d1").innerHTML=xmlhttp.responseText;
	
	}
    }
  }
xmlhttp.open("GET","topnav.php?q="+s1+"",true);
xmlhttp.send();
}
</script>

<table width="100%" cellpadding="0px" cellspacing="0px"  style="background-color:#DFF2FD; border-color:skyblue; " >
    <tr>
    <td>
<img src="../clever0.jpg" alt="Clever Devices Logo" title="Clever Devices" />
<marquee style='font-size:14px; color:blue;' 'behavior='scroll' direction='left' scrollamount='3'>
<b>' America's leader in transit technology '  **</b>
</marquee>
<?php
//$image = "../cd/clever3.jpg";  
//Echo "<br><img src=".$image." Style=width:1300px;height:120px;>"
?>
   </td>
   </tr>
</table>
   
   




 
<tr width="100%" style="background-color:#017DC3;  position:relative; min-width:100%; ">
<td width="100%">
<table id="sddm" width="100%"  cellspacing="0" cellpadding="0" border="1" style="border-color:black; cellpadding:0px; margin:0px; cellspacing:0px;  height:30px;  min-width:100%;">
<tr width="100%"  style="font-size:12px;color:#069; font-weight:bold; font-family:arial;">

<td width="16%"  style="background-color:skyblue" align="center" >
<input type="button"  align="right"  onclick="show123();" value='customer'  />
</td>

<td width="16%"  style="background-color:skyblue" align="center"   >
 <a href="../peerview.php">Peer Review checks</a>
</td>

<td width="16%"  style="background-color:skyblue" align="center"   >
 <a href="../addressbook6.php">Parameters</a>
</td>

<td width="16%"  style="background-color:skyblue" align="center"   >
<a href="../routes63.php">Issues</a>
</td>
<td width="16%"  style="background-color:skyblue" align="center"   >
 <a href="../addressbook6.php">Vehicle Parameters</a>
</td>
 
 </tr>
</table>

<div id ="d1"  method="GET" >
select value


</div>

</td>
</tr>
 