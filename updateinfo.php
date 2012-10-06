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
$info=$_POST['info'];
$result=mysql_query("UPDATE  `network`.`user_details` SET  `info` =  '$info' WHERE  `user_details`.`user` ='$user' LIMIT 1 ");
header("Location: home.php?status=done");
?>