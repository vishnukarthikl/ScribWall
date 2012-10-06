<?php
session_start();
$_SESSION['user']="";
echo "You have been successfully logged out";
?>
<script>setTimeout("window.location='index.php';",2000);</script>
