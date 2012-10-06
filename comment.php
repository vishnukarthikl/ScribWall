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
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Comment</title>
    <style type="text/css">
.button {
	background-color: #000;
	font-family: "Comic Sans MS", cursive;
	color: #FFF;
	visibility: visible;
	border: thin outset #F00;
    
}
.button:hover{
    background-color: red;
}
</style>
<script>
function check()
{
    if(document.getElementById("message").value=="")
        {
            document.getElementById("status").innerHTML="Enter something";
            return false;
        }
        return true;
    
}
</script>
</head>

<body>
<body>
<div id="container">
    	<!-- header -->
        <div id="logo"><a href="#">ScribWall</a></div>
        <div id="menu"><font size="4" align="center" ></font></div>
        <!--end header -->     
        <!-- main -->
        <div id="main">
            <!--text-->
            <div id="text">
                <form id="form1" name="form1" action="processcomment.php"  method="post" onsubmit="return check();" >    
                <table align="middle">
                <tr>

                <th>Comment: </th>
	<td><textarea id="message" name="message" rows="5" cols="30"></textarea></td>
</tr>
</table>
  <br />
  <input type='hidden' name='wallid' id='to' value='<?php echo $_GET['wall']; ?>' />
  <input type='hidden' name='commenter' id='commenter' value='<?php echo $_GET['commenter']; ?>' />
  <input type="submit" value="comment" id="button" />
  <br />
</form>
<p></p>
<div id="status" align="middle"></div>            



       
            
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