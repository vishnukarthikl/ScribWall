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
$timestamp=date('l jS \of F Y h:i:s A');
$result=mysql_query("SELECT id
FROM  `user_details` 
WHERE user =  '$user'");
while($row=mysql_fetch_array($result))
{
	$from=$row['id'];
	
}

$to=$_POST['to'];
$sub=$_POST['sub'];
$message=$_POST['message'];
echo $from."<br />";
echo $to."<br />";
echo $sub."<br />";
echo $message."<br />";
echo $timestamp."<br />";
$result=mysql_query("INSERT INTO `network`.`message` (`from`, `to`, `subject`, `body`, `timestamp`) VALUES ('$from', '$to', '$sub', '$message', '$timestamp');");
header("Location: home.php?status=message");
?>