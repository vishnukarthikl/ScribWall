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
    
$todelete=$_GET['id'];
mysql_query("DELETE FROM `network`.`wallcomment` WHERE `wallcomment`.`commentid` ='$todelete' LIMIT 1 ");
header('Location: home.php');

?>