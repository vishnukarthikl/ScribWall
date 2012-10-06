<?php 
$connection=mysql_connect("localhost","root","i7");
if(!$connection)
	{
		die("Database Failure ".mysql_error());
	}
$db_select=mysql_select_db("network",$connection);
	{
		if(!$db_select)
		{
			die("Database selection error ".mysql_error());
		}
	}


?>
<script type="text/javascript">
function validate()
{
	var status;
	if(document.getElementById("username").value=="")
		{document.getElementById("status").innerHTML="Enter the username"; return false;}
    if(document.getElementById("first").value=="")
		{document.getElementById("status").innerHTML="Enter first name"; return false;}
    if(document.getElementById("last").value=="")
		{document.getElementById("status").innerHTML="Enter last name"; return false;}
	if(document.getElementById("password").value=="")
		{document.getElementById("status").innerHTML="Enter the password"; return false;}
	if(document.getElementById("cpassword").value!=document.getElementById("password").value)
		{document.getElementById("status").innerHTML="The passwords do not match"; return false;}
    if(document.getElementById("dob").value=="")
		{document.getElementById("status").innerHTML="Enter a valid dob "; return false;}
    if(document.getElementById("address").value=="")
		{document.getElementById("status").innerHTML="Enter address"; return false;}
    if(document.getElementById("city").value=="")
		{document.getElementById("status").innerHTML="Enter city"; return false;}
    if(document.getElementById("state").value=="")
		{document.getElementById("status").innerHTML="Enter state"; return false;}
        
    if(document.getElementById("country").value=="")
		{document.getElementById("status").innerHTML="Enter country"; return false;}
    if(document.getElementById("phone").value=="")
		{document.getElementById("status").innerHTML="Enter phone no"; return false;}
  	if(document.getElementById("email").value=="")
		{document.getElementById("status").innerHTML="Enter a valid email id"; return false;}
	 {return true;}
}

</script>

<style type="text/css">
#register{
	margin-left:40%;
	
	}
.button {
	background-color: #000;
	font-family: "Comic Sans MS", cursive;
	color: #FFF;
	position: relative;
	top: auto;
	visibility: visible;
	border: thin outset #F00;
	left: 40;
}

.button:hover
{
	background:#F00;
}

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Register</title>
</head>

<body>
<body>
<div id="container">
    	<!-- header -->
        <div id="logo"><a href="index.php">ScribWall</a></div>
        <div id="menu"><font size="4" align="center" ></font></div>
        <!--end header -->     
        <!-- main -->
        <div id="main">
            <!--text-->
            <div id="text">
            <h3 align="center"><font color="red" size="5">Register</font></h3>
<form id="formRegister" name="formRegister" action="regprocess.php" method="post" onSubmit="return validate()" >
<table id="register">
<tr>
	<th width="93">User name:</th><td width="158"><input type="text" id="username" name="username"/></td>
</tr>
<tr>
	<th width="93">First name:</th><td width="158"><input type="text" id="first" name="first"/></td>
</tr>
<tr>
	<th width="93">last name:</th><td width="158"><input type="text" id="last" name="last"/></td>
</tr>
<tr>
    <th>Password: </th><td><input type="password" id="password" name="password" /></td>
</tr>
<tr>
    <th>confirm pass: </th><td><input type="password" id="cpassword" name="cpassword" /></td>
</tr>
<tr>
    <th>Dob(YYYY-MM-DD):</th><td><input type="text" id="dob" name="dob" /></td>
</tr>
<tr>
    <th>Address</th><td><input type="text" id="address" name="address" /></td>
</tr>
<tr>
    <th>City</th><td><input type="text" id="city" name="city" /></td>
</tr>
<tr>
    <th>State</th><td><input type="text" id="state" name="state" /></td>
</tr>
<tr>
    <th>Country</th><td><input type="text" id="country" name="country" /></td>
</tr>


<tr>
	<th width="93">Phone number:</th><td width="158"><input type="text" id="phone" name="phone"/></td>
</tr>
<tr>
    <th>E-mail </th><td><input type="text" id="email" name="email" /></td>
</tr>
<tr>
  <td height="40"><input type="submit" class="button" value="register" align="middle" /></td>
  <td><input type="reset" class="button" value="reset"  align="middle"/></td>

</tr>
</table>
</form>
<font color="red">
<div id="status" align="center"></div></div>
</font>
            <!--end text-->      
        </div>
    <!-- end main -->
    <!-- footer -->
    <div id="footer"></div>
    <!-- end footer -->
</div>


</body>
</html>