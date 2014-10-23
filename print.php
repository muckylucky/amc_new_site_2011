<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Print Projects</title>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
</head>

<body>
	<div id="wrapper"><!-- END CONTENT -->
        <div id="nav_left">
        	<a href="index.php"><img src="images/logo_header.png" alt="Logo of Andrew McCluckie" width="160" height="65" id="logo_header" /></a>
        	<ul>
            	<li><a href="#">About</a></li>
            	<li><a href="#">Work</a></li>
            	<li><a href="#">Photography</a></li>
            	<li><a href="#">Contact</a></li>
            </ul>
        </div><!--End nav_left-->
        
        <div id="header">
        	<ul id="header_links">
            	<li><a href="#">linky</a></li>
            	<li><a href="#">linky</a></li>
            	<li><a href="#">linky</a></li>
            </ul>
        </div>  <!--End header-->

      <div id="content">
   		<h1>Print Projects</h1>
       		
			<ul id="intro_projects">
            	<?php
					require_once ('includes/mysqli_connect.php'); // Connect to the db.
					//	$item = $_GET['item']; //request the variable sent from the javascript and assign to new variable
					$q = "SELECT id, title, class, shortDescr, category, thumb FROM projects_print;";
			  		$r = mysqli_query ($dbc, $q); // Run the query.
			  		$row = mysqli_fetch_array($r, MYSQLI_ASSOC); //Construct array of items
					
					while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
						echo '<li><h2>' . $row['title'] . '</h2>';
						echo '<a href="project_page.php?cat=' . $row['category'] . '&id=' . $row['id'] . '"><img src="images/' . $row[thumb] . '" alt="Project thumbnail" width="160" height="108" /></a>';
						echo '<p>' . $row[shortDescr] . '</p>';
						echo '<a href="project_page.php?cat=' . $row['category'] . '&id=' . $row['id'] . '" class="button_inline intro_link">View project</a>';
						echo '</li>';
					}

				?>
            </ul>
        </div><!--End Content-->
		<div class="clearfix"></div>
        <div id="footer">
        	<h1>BJBkbjkbjkb</h1>
        </div><!--End footer-->
        
	</div><!-- END WRAPPER -->
<div id="mask"></div>
</body>
</html>
