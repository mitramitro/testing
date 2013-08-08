<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

if (mysql_select_db("dom",$con))
  {
  echo "Database selected";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
  $sql="SELECT * FROM header";
  $query=mysql_query($sql);
  $fetch=mysql_fetch_array($query);
  print_r($fetch);
  ?>
  
<h1></h1>

</body>
</html>