<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Web Projects</title>

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
</head>

<body>
	<div id="wrapper">
      <div id="content">
			<ul id="intro_projects">
            	<?php
				//ini_set('display_errors', '1');

					require_once ('includes/mysqli_connect.php'); // Connect to the db.
					//	$item = $_GET['item']; //request the variable sent from the javascript and assign to new variable
					if (isset($_GET['cat'])){
						$cat = $_GET['cat'];
						$cat = '%' . $cat . '%';
						//$q = "SELECT id, title, class, shortDescr, category, thumb FROM projects_web WHERE skillset LIKE '$cat' ";
						$q = "SELECT id, title, shortDescr, thumb, date FROM projects_web WHERE skillset LIKE '$cat' ORDER BY  `projects_web`.`date` DESC";
					
					} else if (!isset($_GET['cat'])){
						$q = "SELECT id, title, class, shortDescr, category, date, thumb FROM projects_web ORDER BY date DESC";
					}
					
			  		$r = mysqli_query ($dbc, $q); // Run the query.
			  		$row = mysqli_fetch_array($r, MYSQLI_ASSOC); //Construct array of items
					while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
						echo '<li><h2>' . $row['title'] . '</h2>';
						echo '<a href="project_page.php?cat=web&id=' . $row['id'] . '"><img src="images/' . $row['thumb'] . '" alt="Project thumbnail" width="160" height="108" /></a>';
						echo '<p>' . $row['shortDescr'] . '</p>';
						echo '<a href="project_page.php?cat=web&id=' . $row['id'] . '" class="button_inline intro_link">View project</a>';
						echo '</li>';
					}
				?>
            </ul>
        </div><!--End Content-->
		<div class="clearfix"></div>
	</div><!-- END WRAPPER -->
</body>
</html>
