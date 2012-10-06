<?php
session_start();
$user=$_SESSION['user'];
if($user=="")
	header('Location: notlogged.php');
?>
<style type="text/css">
.button {
	background-color: #000;
	font-family: "Comic Sans MS", cursive;
	color: #FFF;
	visibility: visible;
	border: thin outset #F00;
}

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" />
	<title><?php echo "Home-".$user; ?></title>
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


$result=mysql_query("SELECT *
FROM `user_details`
WHERE `user` = '{$user}' LIMIT 1");
while($row=mysql_fetch_array($result))
{
	echo "Hello ".$row['user'];
	
}
echo "<br /><hr />";
?>
<script type="text/javascript">
  function check()
    {
       
        if(document.getElementById("shout").value=="")
        {
            document.getElementById("stat").innerHTML="</p><font color='red'>Enter something<font>";
            return false;
        }
        else
        return true;        
    }

</script>
<script type="text/javascript" language="javascript"> 
function hideDiv1() { 
if (document.getElementById) { // DOM3 = IE5, NS6 
document.getElementById('hideshow1').style.visibility = 'hidden'; 
} 
else { 
if (document.layers) { // Netscape 4 
document.hideshow1.visibility = 'hidden'; 
} 
else { // IE 4 
document.all.hideshow1.style.visibility = 'hidden'; 
} 
} 
}

function showDiv1() { 
if (document.getElementById) { // DOM3 = IE5, NS6 
document.getElementById('hideshow1').style.visibility = 'visible'; 
} 
else { 
if (document.layers) { // Netscape 4 
document.hideshow1.visibility = 'visible'; 
} 
else { // IE 4 
document.all.hideshow1.style.visibility = 'visible'; 
} 
} 
} 

</script>
<div id="edit">
What's on your mind?
</div>
<div id="update" >
<form id="form1" name="form1" action="update.php"  method="post" onSubmit="return check()" >
<input type="text" name="shout" id="shout" maxlength="50" /><p>
<input type='submit' class='button'  value='shout'  /></p>
<div id="stat"></div>
</div>
</form>
<!-- all the shouts--!>
<?php

$result=mysql_query("SELECT *
FROM `user_details`
WHERE `user` = '{$user}' LIMIT 1");
while($row=mysql_fetch_array($result))
{
	$id=$row['id'];
	
}
$result=mysql_query("SELECT * 
FROM  `wall` 
WHERE poster ='$id' ORDER BY  `wall`.`wallid` DESC ");
echo "<hr>";
while($row=mysql_fetch_array($result))
{
	echo $row['update']."<br>";
    	echo "<font color=gray size=1>".$row['timestamp']."  IST</font>&nbsp &nbsp";
        echo "<a href='deletewall.php?wallid="."$row[wallid]'".">delete</a>";
        echo "&nbsp&nbsp <a href='comment.php?wall=$row[wallid]&commenter=$user'>comment</a>";
       echo "<hr>";
       $result1=mysql_query("SELECT `wallcomment`.`commentid`,`user_details`.`user` , `user_details`.`id` , `wallcomment`.`comment` , `wallcomment`.`timestamp`
FROM `wallcomment` , `wall` , `user_details`
WHERE `wall`.`wallid` = `wallcomment`.`wallid`
AND `wallcomment`.`commenterid` = `user_details`.`id` and `wallcomment`.`wallid`=`wall`.`wallid` and `wall`.`wallid`=$row[wallid] order by `wallcomment`.`commentid` ASC");
                while($row1=mysql_fetch_array($result1))
                {
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href=profile.php?id=$row1[id]>".$row1['user']." : </a>";
                    echo "$row1[comment]<br />";
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color=gray size=1>".$row1['timestamp']."</font>";
                    echo "&nbsp&nbsp&nbsp"."<a href='deletecomment.php?id=$row1[commentid]'>delete</a>";
                    echo "<br />";
                    echo "<hr />";
                }
       echo "<p>&nbsp</p>";
       echo "<p>&nbsp</p>";
      
	
}
?>

<!--end shouts--!>
<a href="javascript:showDiv1()">view messages</a>
<div id="hideshow1" style="visibility:hidden" >
<div id="fade">
	<div class="popup_block">
		<div class="popup">
        <a href="javascript:hideDiv1()"><img src="images/icon_close.png" class="cntrl" /></a>
        <font size="4">Messages</font><p></p>
        <div id="messageshow"></div>
      
  
        
        <?php
        
        $result=mysql_query("select id from user_details where user='$user'");
        while($row=mysql_fetch_array($result))
        {
              $to=$row['id'];	
        }
        //$from=0;
        $result=mysql_query("SELECT * FROM  `message` where `message`.`to`=$to ORDER BY  `message`.`to` ASC ");
        while($row=mysql_fetch_array($result))
        {
                $from=$row['from'];
                $resource=mysql_query("SELECT user from `network`.`user_details` where id=$from");
                while($row1=mysql_fetch_array($resource))
                {
                  	echo "<font color='red'>From: </font>".$row1['user']."<br>";	
                 }
          	
            	echo "<font color='red'>Subject: </font>".$row['subject']."<br>";
                echo "<font color='red'>Message: </font>".$row['body']."<br>";
                echo "<font color=gray size=1>".$row['timestamp']."  IST</font>&nbsp &nbsp";
                echo "<a href='sendmessage.php?from=".$row['to']."&to=".$row['from']."&sub=RE:".$row['subject']."'>reply</a>";
                echo "<hr>";
                
        }
        ?>
        </div>
    </div>
</div>
</div>




<a href="logout.php">logout</a>
<p>
<p>
<script>
function checkinfo()
  {
    if(document.getElementById("info").value=="")
    {
        document.getElementById("infostatus").innerHTML="</p><font color='red'>Enter something in info <font>";
        return false;
    }
    return true;
        
  }
</script>
Edit Profile
<br />
<font color="black">Info:</font>
<br />
<div id="result">
<?php 
if(isset($_GET['status']))
{
    if($_GET['status']=='done')
    echo "<font color='red'>Update successful<font>.<br />";
}
?></div>
<form id="form2" name="form2" action="updateinfo.php"  method="post" onSubmit="return checkinfo()" >
<textarea  name="info" id="info" maxlength="150" cols="40" rows="5"><?php
$result=mysql_query("SELECT info
FROM  `user_details` where user='$user' ");
while($row=mysql_fetch_array($result))
{
	echo $row['info'];
       
	
}
 ?></textarea><p>
<input type='submit' class='button'  value='update'  /></p>
<div id="infostatus"></div>
</form>
<hr />
</p>

<?php

echo "<br><font color='black'>Users present: </font><br>";
$result1=mysql_query("SELECT *
FROM `user_details`");
while($row=mysql_fetch_array($result1))
{
	echo "<a href=profile.php?id="."$row[id]".">".$row['user']."</a><br>";

}
?>
            
            
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