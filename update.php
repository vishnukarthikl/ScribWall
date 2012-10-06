<?php


session_start();
if(isset($_SESSION['user']))
{
    $user=$_SESSION['user'];
  
}


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


date_default_timezone_set('Asia/Calcutta');
$shouter=$user;
$shout=htmlspecialchars($_POST['shout']);
$shout=htmlentities($shout);
$time=date('l jS \of F Y h:i:s A');
echo $time."</br>";
$result=mysql_query("SELECT * FROM  `user_details` where user='$user' ");
while($row=mysql_fetch_array($result))
{
    $id=$row['id'];	
}
echo $id;
$result=mysql_query("INSERT INTO  `network`.`wall` (
`wallid` ,
`poster` ,
`update` ,
`timestamp`
)
VALUES (
NULL ,  '$id',  '$shout',  '$time'
);");


header('Location: home.php');

?>


