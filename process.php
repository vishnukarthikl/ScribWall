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
$user=htmlspecialchars($_POST['user']);
$user=htmlentities($user);
$pass=htmlspecialchars($_POST['pass']);
$pass=htmlentities($pass);


$result=mysql_query("SELECT *
FROM `user_details` ");
while($row=mysql_fetch_array($result))
{
//	echo $row['user'];
	if(($row['user']==$user)&&($row['pass']==md5($pass)))
		{
		session_start();
		$_SESSION['user']=$user;
		header('Location: home.php');
		//echo $name;
		}
}
//header('Location: index.php');




?>
<script type="text/javascript">
window.location="index.php?status=0";
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Process</title>
</head>

<body>

</body>
</html>