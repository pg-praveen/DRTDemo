 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Database Review Tool</title>
</head>

<body>
<script type="text/javascript">
function show123()
{
var s1=document.getElementById("mid").value;
 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, index
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
	document.getElementById("parm").innerHTML=xmlhttp.responseText;
	
	}
    }
  }
xmlhttp.open("GET","prdochecks.php?q="+s1+"",true);
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
                       		 
							 <select name="lto" id ="mid" onchange="show123();">
  <option class="mar" value="0">SELECT</option>
  <option value="1">Missing TAGeoID</option>
  <option value="2" selected >UnAssigned Dest Code</option>
  <option value="3">Missing Route Audio</option>
  <option value="4">Missing DestCode</option>
  <option value="5">Routes with missing patterns</option>
  <option value="6">Verified routes with no stops</option>
   <option value="7">Bus Time stop text missing</option>
                            </select>&nbsp;
							 
							 
							 
							 <div id="parm">			 



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
