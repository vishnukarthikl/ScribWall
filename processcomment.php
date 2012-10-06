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
$wall=$_POST['wallid'];

$comment=$_POST['message'];
$timestamp=date('l jS \of F Y h:i:s A');
$result=mysql_query("SELECT id
FROM  `user_details` 
WHERE user =  '$user'");
while($row=mysql_fetch_array($result))
{
	$commenter=$row['id'];
	
}
echo $wall."</br>";
echo $commenter."</br>";
echo $comment."</br>";
echo $timestamp."</br>";
$result=mysql_query("INSERT INTO `network`.`wallcomment` (
`commentid` ,
`wallid` ,
`commenterid` ,
`comment` ,
`timestamp`
)
VALUES (
NULL , '$wall', '$commenter', '$comment', '$timestamp');");
if($result)
{
    
    header("Location: index.php");   
}
else
{
    echo "not";
}
?>