<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>


			<ul id="intro_projects">
            	<?php
					require_once ('includes/mysqli_connect.php'); // Connect to the db.
					//	$item = $_GET['item']; //request the variable sent from the javascript and assign to new variable
					if (isset($_GET['cat'])){
						$cat = $_GET['cat'];
						$cat = '%' . $cat . '%';
						echo $cat;
						$q = "SELECT id, category, class, skillset, title, shortDescr, FROM projects_web WHERE skillset LIKE '$cat';";
					
					} else if (!isset($_GET['cat'])){
						//$q = "SELECT id, category, title, shortDescr, skillset FROM test WHERE skillset LIKE '%mobile%';";
						//$q = "SELECT id, title, shortDescr FROM projects_web WHERE skillset LIKE '%mobile%';";
						$q = "SELECT id, title, category, skillset, shortDescr FROM projects_web  WHERE skillset LIKE '%mobile%'";
					}
					
			  		$r = mysqli_query ($dbc, $q); // Run the query.
			  		$row = mysqli_fetch_array($r, MYSQLI_ASSOC); //Construct array of items
					
					while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
						echo '<li><h2>' . $row['id'] . ' - ' . $row['title'] . '</h2>';
						echo '<p>' . $row[shortDescr] . '</p>';
						echo '<p>' . $row[skillset] . '</p>';
						echo '</li>';
					}

				?>
            </ul>

</body>
</html>