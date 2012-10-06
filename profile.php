<?php
session_start();
$user=$_SESSION['user'];


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
	<title>Profile</title>
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
            
            <?php
            if(isset($_GET['id']))
            {
                $profile=$_GET['id'];
            $result=mysql_query("SELECT *
            FROM `user_details`
            WHERE `id` = {$profile} LIMIT 1");
            while($row=mysql_fetch_array($result))
            {
            echo "<font color='red'>User name : </font>";
        	echo $row['user']."<br>";
            echo "<font color='red'>Info : </font>";
           	echo $row['info']."<br>";
            echo "<font color='red'>Updates : </font>";
        	
            }
          

$result=mysql_query("SELECT *
FROM `user_details`
WHERE `user` = '{$profile}' LIMIT 1");
while($row=mysql_fetch_array($result))
{
	$id=$row['id'];
	
}
$result=mysql_query("SELECT * 
FROM  `wall` 
WHERE poster ='$profile' ORDER BY  `wall`.`wallid` DESC ");
echo "<hr>";
while($row=mysql_fetch_array($result))
{
	echo $row['update']."<br>";
    	echo "<font color=gray size=1>".$row['timestamp']."  IST</font>";
        echo "&nbsp&nbsp <a href='comment.php?wall=$row[wallid]&commenter=$user'>comment</a>";
       echo "<hr>";
        $result1=mysql_query("SELECT `wallcomment`.`commentid`, `user_details`.`user` , `user_details`.`id` , `wallcomment`.`comment` , `wallcomment`.`timestamp`
                                FROM `wallcomment` , `wall` , `user_details`
                                WHERE `wall`.`wallid` = `wallcomment`.`wallid`
                                AND `wallcomment`.`commenterid` = `user_details`.`id` and `wallcomment`.`wallid`=`wall`.`wallid` and `wall`.`wallid`=$row[wallid]");
                while($row1=mysql_fetch_array($result1))
                {
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href=profile.php?id=$row1[id]>".$row1['user']." : </a>";
                    echo "$row1[comment]<br />";
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color=gray size=1>".$row1['timestamp']."</font>";
                   
                    if($row1['user']==$user)
                    {
                         echo "&nbsp&nbsp&nbsp"."<a href='deletecomment.php?id=$row1[commentid]'>delete</a>";
                    }
                    echo "<hr />";
                   
                }
       echo "<p>&nbsp</p>";
       echo "<p>&nbsp</p>";
	
}

            }
            ?>
<script>
    function check()
    {
        if(document.getElementById("sub").value=="")
            {
                document.getElementById("statmessage").innerHTML="</br>Enter subject";
                return false;
            }
        else if(document.getElementById("message").value=="")
            {
                document.getElementById("statmessage").innerHTML="</br>Enter message";
                return false;
            }
        else
            return true;
            
        
    }
    function show()
    {

             document.getElementById("messageshow").innerHTML="<form id='form1' name='form1' action='processmessage.php'  method='post' onSubmit='return check();' ><table aligh='middle'><tr>	<th width='59'>Subject: </th>   	<td width='499'><input type='text' name='sub' id='sub' maxlength='30' /></tr><tr>	<th>Message: </th>	<td><textarea id='message' name='message' rows='5' cols='30'></textarea></td></tr></table>  <br /><input type='hidden' name='to' id='to' value='<?php echo $profile; ?>' />  <input type='submit' value='send' id='button' />  <br /></form>";   
    }
</script>
<a onclick="show()">send message</a>
<div id="messageshow"></div>            
<div id="statmessage"></div>            
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