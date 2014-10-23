<?php
	$url = $_GET["url"];
	$handle = fopen($url, "rb"); //Opens a file or url r = read and rb means open as a binary file
	$content = stream_get_contents($handle);
	fclose($handle);
	echo $content;
?>