<?php 
require_once('config.php');
$email=$_GET['email'];
$query="select * from register where email='$email'";
$sql=mysql_query($query);

if(mysql_num_rows($sql)==1)
{
	echo $email."&nbsp;"." Already Exists";
}
else
{
	echo $email."&nbsp;"."is ready to use";
}



?>