<?php 
session_start();
//include("simple_html_dom.php");
//$html = file_get_html('http://ccna-latest-news.blogspot.in/');

function data()
{
	
	include_once("simple_html_dom.php");
	$html = file_get_html('http://ccna-latest-news.blogspot.in/');
	
		
			foreach($html->find('h3 a') as $value)
			{
				$heading[]=$value->innertext;
			}
			return $heading;
}
function image()
{
	include_once("simple_html_dom.php");
	$html = file_get_html('http://ccna-latest-news.blogspot.in/');
			
	foreach($html->find('div.separator a img') as $data )
	{
 		$imagedata[]=$data->src;
	}
	return $imagedata;
}
function description()
{
	include_once("simple_html_dom.php");
	$html = file_get_html('http://ccna-latest-news.blogspot.in/');
			
	foreach($html->find('div.post-outer div div') as $des )
			{
		   		$description[]=$des->plaintext;
			}
		return $description;
}
echo "<pre>";
$des=description();
$des1[]=$des[2];
$des1[]=$des[13];
$des1[]=$des[23];
//print_r($des1);
//die;
$con = mysql_connect("localhost","root","");
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
  
  		
			$imagedata=image();
			//die;
			$head=data();
			//$descriptiondata=description();
			//print_r($descriptiondata);
			
			//print_r($head);
			$count=count($head);
			for($i=0;$i<$count;$i++)
			{
					$newsheading=$head[$i];
					
					$des2=$des1[$i];
					$imagedata1=@$imagedata[$i];
					//die;
				echo $sql="INSERT INTO header (newsheading,image,description) 				values('$newsheading','$imagedata1','$des2')";
				mysql_query($sql);
			}
  		//echo $heading=data();
		//echo $data1=$heading;
		//echo $sql="INSERT INTO header (newsheading,image,description) values('$data1','','')";
		//mysql_query($sql); 
		
   /*foreach($html->find('div.date-outer') as $value)
   {
	 	echo $heading=$value->innertext; 
		echo $sql="INSERT INTO header (newsheading) values('$heading')";
		mysql_query($sql); 
    }*/
   
 /* foreach($html->find('h3 a') as $value)
	{
		echo $heading=$value->innertext."<br>";
		//$_SESSION['head']=$heading;
		 //echo $sql="INSERT INTO header (newsheading,'image') values('$heading','')";
		 //mysql_query($sql);
	}*/
	
 /*foreach($html->find('div.separator a img') as $data1 )
 {
	 //echo $heading=$value->innertext;
 	  echo $image=$data1->src;
	echo $sql="INSERT INTO header (newsheading,image) values('','$image')";
	mysql_query($sql);
 }*/

/* foreach($html->find('h3 a') as $value)
	{
		
			
		    $heading=$value->innertext."<br>";
			 
			foreach($html->find('div.separator a img') as $data )
				{
 			 		echo $image=$data->src."<br>";
				}
			
			//echo "<pre>";
			foreach($html->find('div.post-outer div div') as $des )
			{
		   		 echo $description=$des->plaintext."<br>";
			}
			 
			//print_r($html->find('div#post-body-3465364642789811315'));
			
			//echo $sql="INSERT INTO header (newsheading,image,description) values('$heading','$image','$description')";
			//mysql_query($sql);
	}*/
 
/* foreach($html->find('div.date-outer') as $value)
 {
		//echo $value->innertext;
		//
		//foreach($html->find('h3 a') as $header)
		//
		//echo $header->innertext;
		//echo "<pre>";
		echo $html->find('h3 a',0)->innertext;
 }*/
 
mysql_close($con);


/*foreach($html->find('h3') as $value)
{
	$heading=$value->innertext;
	echo $heading;	
}*/
/*$con = mysql_connect("localhost","root","");
    mysql_select_db("dom", $con);
if(!$con)
{
	die(mysql_error());	
}
else
{
	
	foreach($html->find('h3 a') as $value)
	{
		echo "<pre>";
		echo $heading=$value->innertext;
		
		
	}
	echo $sql="INSERT INTO header (newsheading) values('$heading')";
}
mysql_close($con);*/
/*foreach($html->find('h3') as $e)
    echo $e->innertext . '<br>';*/

//$doc= new DOMDocument();
//$doc->load('http://www.nanowebtech.com');
//$para=$doc->getElementsByTagName("p"); 
//print_r($para);


?>