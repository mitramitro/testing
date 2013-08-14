<?php
	 
 @mysql_connect('localhost','root','') OR Die('could not connect with mysql');
 mysql_select_db('casino') OR Die('could not select the database');
 
	 
	$q = strtolower($_GET["q"]);
	if (!$q) return;

 	   
	  $query="select * from casino_newsletter";

	$arr = array();
	$rs = mysql_query($query);
	
	
	  $count=mysql_num_rows($rs);
	 
	$i=0;
	$str="";
	echo "[";

	while($obj = mysql_fetch_array($rs)) {

		 

	   if($i < $count-1){

		$str=",";

	   } else {

		$str="";

	   }
	
	
	 echo '{'.'"id"'.':'.'"'.$obj['email'].'"'.','.'"name"'.':'.'"'.$obj['email'].'"}'.$str;
	   $i++;

	}
	echo "]";

?>
