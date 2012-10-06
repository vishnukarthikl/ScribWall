<?php
session_start();
$user=$_SESSION['user'];
if($user=="")
	header('Location: notlogged.php');
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<style type="text/css">
.button {
	background-color: #000;
	font-family: "Comic Sans MS", cursive;
	color: #FFF;
	visibility: visible;
	border: thin outset #F00;
}

</style>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Message</title>
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
               <form id="form1" name="form1" action="processmessage.php"  method="post" onsubmit="check();" >
<table aligh="middle">
<tr>
	<th width="59">Subject: </th>
   	<td width="499"><input type="text" name="sub" id="sub" maxlength="30"  value="<?php echo $_GET['sub']; ?>" />
</tr>
<tr>
	<th>Message: </th>
	<td><textarea id="message" name="message" rows="5" cols="30"></textarea></td>
</tr>
</table>
  <br />
  <input type='hidden' name='to' id='to' value='<?php echo $_GET['to']; ?>' />
  <input type='hidden' name='from' id='from' value='<?php echo $_GET['from']; ?>' />
  <input type="submit" value="send" id="button" />
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