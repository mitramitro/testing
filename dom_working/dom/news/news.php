<?php
include("simple_html_dom.php");
$html = file_get_html('http://news.cnet.com/');




foreach($html->find('strong.assetHed a') as $e) 
{
    $heading[]=$e->innertext;
}

foreach($html->find('div.assetBody a img') as $e) 
{
    $image[]=$e->src;
}
foreach($html->find('div.assetText p') as $e) 
{
    $body[]=$e->plaintext;
}
echo "<pre>";
print_r($heading);
print_r($image);
print_r($body);
die;

$con=mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("dom",$con);

echo $count=count($image);
	 for($i=0;$i<$count;$i++)
	 {
		 //echo "<br>";
		 echo $heading1=$heading[$i].'<br/>';
		 echo $heading3=addslashes($heading[$i]);
		 echo $heading2=stripslashes($heading3).'<br/>';
		 exit;
		
		 $image1=$image[$i];
		 @$body1=addslashes($body[$i]);
		 //echo "<br>";
		 echo "<br>";
		echo $sql="insert into news (header,image,body) values('$heading1','$image1','$body1')";
		echo $query=mysql_query($sql);
    }
//$sql="insert into news (header,image,body) values()"





mysql_close($con);




	
	
?>