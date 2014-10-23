<?php
$size = getimagesize("images/" . 'sub_sessions_poster_main.jpg');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

	echo '<p>size=' . $size[0] . ' ' . $size[1] . '</p>';
	
	?>
</body>
</html>