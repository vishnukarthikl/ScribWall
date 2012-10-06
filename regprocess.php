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
	

$user=htmlspecialchars($_POST['username']);
$user=htmlentities($user);
$first=htmlspecialchars($_POST['first']);
$first=htmlentities($first);
$last=htmlspecialchars($_POST['last']);
$last=htmlentities($last);
$address=htmlspecialchars($_POST['address']);
$address=htmlentities($address);
$city=htmlspecialchars($_POST['city']);
$city=htmlentities($city);
$state=htmlspecialchars($_POST['state']);
$state=htmlentities($state);
$country=htmlspecialchars($_POST['country']);
$country=htmlentities($country);
$phone=htmlspecialchars($_POST['phone']);
$phone=htmlentities($phone);
$pass=htmlspecialchars($_POST['password']);
$pass=htmlentities($pass);
$dob=htmlspecialchars($_POST['dob']);
$dob=htmlentities($dob);
$email=htmlspecialchars($_POST['email']);
$email=htmlentities($email);



#mysql_query("INSERT INTO user ( id, user, pass ) VALUES ( NULL, '$name', '$pass'); ");
$result=mysql_query("INSERT INTO `network`.`user_details` (`id`, `user`, `first`, `last`, `pass`, `email`, `dob`, `address`, `phone`, `info`, `city`, `state`, `country`) VALUES (NULL, '$user', '$first', '$last', '$pass', '$email', '$dob', '$address', '$phone', 'NULL', '$city', '$state', '$country');");
$result=mysql_query("UPDATE user_details SET pass = MD5('$pass') where user='$user';");
if($result)
    echo "done";
    else
    echo "not";
?>
<script type="text/javascript">
function loading()
{
document.getElementById('status').innerHTML="\t Your account has been created\n you will be redirected in a few seconds";
setTimeout("window.location='index.php';",2000);
}
</script>

<style type="text/css">
#status{
	margin-left:30%;
	margin-bottom:50%;
	margin-right:30%;
	margin-top:10%;
	height:40px;
	background-color:#FFF;
	font:"Comic Sans MS", cursive;
	color:#000;
	}
</style>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>^^</title>
</head>

<body onLoad="loading();" bgcolor="#333333"">
<div id="status" ></div>
</body>
</html>