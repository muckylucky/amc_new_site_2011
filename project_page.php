<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $row['title']; ?></title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
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
	  <?php
	  	  ini_set('display_errors', '1');

          require_once ('includes/mysqli_connect.php'); // Connect to the db.
          //	$item = $_GET['item']; //request the variable sent from the javascript and assign to new variable
		  $table = '';
		  
		  if (isset($_GET['cat']) ) {
			$cat = ($_GET['cat']);
			switch ($cat) {
				case 'web':
						$table = 'projects_web';
						break;
				case 'identity':
						$table = 'projects_identity';
						break;
				case '3d':
						$table = 'projects_3d';
						break;
				case 'print':
						$table = 'projects_print';
						break;
				default:
						$table = 'projects_web';
						break;
			}
		  }
		  
          if (isset($_GET['id']) ) {
              $id = $_GET['id'];
              $q = "SELECT title, class, skillset, longDescr, link, images FROM " . $table . " WHERE id ='$id'";
			  echo $q;
          
          } else if (!isset($_GET['cat'])){
              echo '<H2>You have accessed this page in error.</h2>';
              echo '<a href="http://www.amc1.co.uk" class="standard_button">&lt;&lt; Take me home!</a>';
          }
		  
          $r = mysqli_query ($dbc, $q); // Run the query.
          $row = mysqli_fetch_array($r, MYSQLI_ASSOC); //Construct array of items
		  $current_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

		  
		  //Build the page content
		  echo '<div id="project_holder">';
		  echo 		'<h1>' . $row['title'] . '</h1>';
		  echo '<a href="' . $current_url . '" id="project_back" title="Back to all projects"></a>';

		  // write-out the skillset list
		  $skillz =  $row['skillset'];
		  if ($skillz){
		
				$skillz = explode(', ', $skillz);
				echo 		'<ul id="project_skillset">'; 
				
				foreach ($skillz as $skill) {
					  echo 	'<li>' . strtoupper($skill) . '</li>';  
				}
				
				echo 		'</ul>';
		  }
				
		  //Check for content kind whether single/multi image or html
		  $class = $row['class'];
		  if ($class == 'html') {
			  
				  echo '<iframe src="' . $row['link'] . '" id="project_html">';
				  echo '</iframe>';
				  echo '<p>' . $row['longDescr'] . '</p>';
			  
		  } elseif ($class == 'single') {
			  	  $size = getimagesize("images/" . $row['images']);
				  echo '<img id="project_img" src="images/' . $row['images']. '" width="' . $size[0] . '" height="' . $size[1] . '"/>';
				  echo '<p>' . $row['longDescr'] . '</p>';
				  
				  //Check for external link and create it if one exists
				  if ($row['link']){
					  
					  echo '<a href="' . $row['link'] . '" class="project_link">Take me to the site</a>';
					  
		  		  }
				  
		  } elseif ($class == 'multi') {
			  
			  	  $images = explode(', ', $row['images']); // create array of images
			  	  $size = getimagesize("images/" . $images[0]);
			  	  echo '<div id="project_widget">'; // build the image viewer
			  	  echo 		'<div id="widget_inner">';
				  echo 				'<img class="project_images" src="images/' . $images[0] . '" width="' . $size[0] . '" height="' . $size[1] . '"/>';
				  
				  // loop thorugh and output the images
				  foreach ($images as $key => $image) {
					  if ($key != 0 ) { // omit first image as we already have it in place
					    $newSize = getimagesize("images/" . $image);
						echo '<img class="project_images" src="images/' . $image . '" width="' . $newSize[0] . '" height="' . $newSize[1] . '"/>';
					  }					  
				  }
				  echo '</div>';
				  if (count($images) > 1) {
				  // build the navigation
				  		  echo '<ul id="widget_nav">';
						  foreach ($images as $key => $image) {
							  echo '<li><a class="widget_nav"></a></li>'; // output the widget nav
						  }
				  		  echo '</ul>';
				 }
				  
				  echo '</div>';

				  echo '<p>' . $row['longDescr'] . '</p>';
				  
				  //Check for external link and create it if one exists
				  if ($row['link']){
					  
					  echo '<a href="' . $row['link'] . '" class="project_link">Take me to the site</a>';
					  
				  }
		  }
		  

		  
		  echo '</div>';

      ?>
   		
        	
            	
            
       		
        </div><!--End Content-->
		<div class="clearfix"></div>
        <div id="footer">
        	<h1>BJBkbjkbjkb</h1>
        </div><!--End footer-->
        
	</div><!-- END WRAPPER -->
<div id="mask"></div>
</body>
</html>
