<?php 
$leftmenu="myspace";
include ("../design1/dstart-secure.php"); 
//start from here     ?>

<script language="JavaScript" type="text/javascript">
function validateForm()
{
var a=document.forms["form1"]["fname"].value
var b=document.forms["form1"]["lname"].value

var c=document.forms["form1"]["cname"].value
var d=document.forms["form1"]["desc"].value
var e=document.forms["form1"]["desig"].value
var f=document.forms["form1"]["mob1"].value
var g=document.forms["form1"]["mob2"].value
var h=document.forms["form1"]["off1"].value
var i=document.forms["form1"]["off2"].value
var j=document.forms["form1"]["email"].value
var k=document.forms["form1"]["email1"].value

if (a==null || a=="")
  {
  alert("First Name cannot be left blank");
  return false;
  }
if (b==null || b=="")
  {
  alert("Last Name cannot be left blank");
  return false;
  }
  
if (c==null || c=="")
  {
  alert("Company Name cannot be left blank");
  return false;
  }
if (d==null || d=="")
  {
  alert("Description cannot be left blank");
  return false;
  }
if (e==null || e=="")
  {
  alert("Designation cannot be left blank");
  return false;
  }
if (f==null || f=="")
  {
  alert("Mobile No. cannot be left blank");
  return false;
  }  
if( isInteger(f)==false)
{
	 alert("Mobile No.should be number");
  return false;
}
if( isInteger(g)==false)
{
	 alert("Mobile No.should be number");
  return false;
}
if (h==null || h=="")
  {
  alert("Office No. cannot be left blank");
  return false;
  }  
if( isInteger(h)==false)
{
	 alert("Office No.should be number");
  return false;
}
if( isInteger(i)==false)
{
	 alert("Office No.should be number");
  return false;
}
if (j==null || j=="")
  {
  alert("EmailID cannot be left blank");
  return false;
  }  
if(isEMAIL(j)==false)
{
 alert("Email-ID is not valid!!!");
  return false;
}

}
function isInteger(s)
{
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function isEMAIL(m)
{
var atpos=m.indexOf("@");
var dotpos=m.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=m.length)
  {
  
  return false;
  }
}

</script>


<table width="40%" align="center" frame="box" cellspacing="1" cellpadding="3">
</center>

<form name="form1" method="post" action="addc.php" onsubmit="return validateForm();" >
<tr>
<td colspan="3"><strong>Add New Contact:-</strong></td>
</tr>

<tr>
<td><b style="color:red;">*</b>First Name</td>
<td>:&nbsp;&nbsp;&nbsp;<select name="prefix" ><option value="0" >Mr.</option><option value="1" >Mrs.</option><option value="2" >Miss.</option></select></td>
<td><input name="fname" type="text"></td>
</tr>

<tr>
<td><b style="color:red;">*</b>Last Name </td>
<td>:</td>
<td><input name="lname" type="text"></td>
</tr>




<tr>
<td><b style="color:red;">*</b>Company Name</td>
<td>:</td>
<td><input name="cname" type="text"></td>
</tr>


<tr>
<td><b style="color:red;">*</b>Description</td>
<td>:</td>
<td><input name="desc" type="text"></td>
</tr>

<tr>
<td><b style="color:red;">*</b>Designation</td>
<td>:</td>
<td><input name="desig" type="text"></td>
</tr>

<tr>
<td><b style="color:red;">*</b>Mobile No.</td>
<td>:</td>
<td><input name="mob1" type="text"></td>
</tr>
<tr>
<td>Mobile NO.2</td>
<td>:</td>
<td><input name="mob2" type="text"></td>
</tr>
<tr>
<td><b style="color:red;">*</b>Office No.</td>
<td>:</td>
<td><input name="off1" type="text"></td>
</tr>
<tr>
<td>Fax No.</td>
<td>:</td>
<td><input name="off2" type="text"></td>

</tr>

<tr>
<td><b style="color:red;">*</b>Email ID 1</td>
<td>:</td>
<td><input name="email" type="text"></td>
</tr>
<tr>
<td>Email ID 2</td>
<td>:</td>
<td><input name="email1" type="text"></td>
</tr>
<tr>
<td>Access</td>
<td>:</td>
<td><select name="share" ><option value=1 >Shared</option><option value=0 >Private</option></select></td>
 </tr>
 <tr>
 <td></td>
 <td></td>
 <td><strong><input type="submit" name="Submit" value="ADD Contact>>"></td></strong>
 </tr>
</form>

</table>


<?php
//end here
include ("../design1/dend.php"); ?>