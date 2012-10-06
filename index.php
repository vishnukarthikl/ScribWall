<?php
session_start();
if(isset($_SESSION['user']))
{
    $user=$_SESSION['user'];
    if($user!="")
	   header('Location: home.php');
    
}

?>
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
function check()
{
	if(document.getElementById('name').value=="")
		{document.getElementById("status").innerHTML="Enter the user name";return false;}
	else if(document.getElementById('pass').value=="")
		{document.getElementById("status").innerHTML="Enter the password";return false;}
	else{return true;}
}

function redirect()
{
window.location="register.php";
}

</script>

<style type="text/css">
<!--
#placeButton{
	margin-left:40%;
	
		
	}

#button {
	right: 50%;
}
.button {
	background-color: #000;
	font-family: "Comic Sans MS", cursive;
	color: #FFF;
	position: relative;
	top: auto;
	visibility: visible;
	border: thin outset #F00;
}
.button:hover
{
	background:#F00;
}
#status{
	margin-left:40%;
	margin-right:30%;
	font:"Comic Sans MS", cursive;
	color:#000;
	font-weight:bolder;
	}
body{
	background-color:#F00;
	
	}
#login{
	
	background:#FFF;
	margin-left:30%;
	margin-right:30%;
	
	}

-->
</style>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Log in</title>

</head>

<body>

<div id="container">
    	<!-- header -->
        <div id="logo"><a href="#">ScribWall</a></div>
        <div id="menu"><font size="4" align="center" ></font></div>
        <!--end header -->     
        <!-- main -->
        
            <!--text-->
            <div id="text">
            <div id="main">
         <form id="form1" name="form1" action="process.php"  method="post" onSubmit="return check()" >
    <table align="center" aligh="center" >
    <tr>
	<th width="72" >Name: </th>
   	<td width="140" ><input type="text" name="user" id="user" maxlength="30" /></td>
    </tr>
    <tr>
	<th>Password: </th>
	<td><input type="password" name="pass" id="pass" maxlength="30" /></td>
    </tr>
    </table>
    <br /><div id="status"><?php if(isset($_GET['status']))
	{
		echo "Log in failure";	
	}
	?>
</div><br />
  <div id="placeButton" >
  <input type="submit" class="button"  align="center" value="login !!"  />
  <input type="button" class="button"  align="center" value="New user ?" onClick="redirect();" />
  </div>
  <br />
</form>        
            
            </div>
            <!--end text-->      
        </div>
    <!-- end main -->
    <!-- footer -->
    <div id="footer"></div>
    <!-- end footer -->
</div>


</body>
</html>