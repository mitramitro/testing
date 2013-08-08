<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?php

exec("ffmpeg -i Khiladi.mp4 -vcodec mjpeg -vframes 1 -an -f rawvideo -s 320x240 -ss 00:00:20 ab.jpg",$out);
echo '<pre>';
print_r($out);
// ffmpeg -i   =>command
// khiladi.mp  =>input video file
//320*240 => output file size(ab.jpg) 
// aa.jpg =>output file
// 00:00:20  =>time of snapshot
?>
</body>
</html>