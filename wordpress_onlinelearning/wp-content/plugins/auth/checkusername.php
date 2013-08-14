<?php
require_once('config.php');
$username=$_GET['username'];
$query="select * from register where username='$username'";
$sql=mysql_query($query);
if(mysql_num_rows($sql)>0)
{
	echo $username."&nbsp;"." Already Exists";
}
else
{
	echo $username."&nbsp;"."is ready to use";
}
?>