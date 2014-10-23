<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Andrew McFUCKYEEEAAAAAHHH! Home</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<script type="text/javascript" src="scripts/content_loader.js"></script>
<script type="text/javascript">
	$(function(){
		//determine what content is to be loaded depending on url
		var $url = document.URL;
		var $content = "";
		
		if (window.location.hash){
			$content = window.location.hash;
		} else {
			$content = 'home';	
		}
		
		LOADER($content);
	});

</script>

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
        	<a href="index.php"><img src="images/logo_header.png" alt="Logo of Andrew McCluckie" width="160" height="65" /></a>
        	<ul>
            	<li><a href="#">Web and mobile</a></li>
            	<li><a href="#">Print</a></li>
            	<li><a href="#">Identity</a></li>
            	<li><a href="#">3D</a></li>
            	<li><a href="#">Photography</a></li>
            </ul>
            <p id="copyright_notice">&copy; 2011 Andrew M<sup>c</sup>Cluckie</p>
        </div><!--End nav_left-->
        
      <div id="header">
        	<ul id="header_links">
            	<li><a href="#">About</a></li>
            	<li><a href="#">Contact</a></li>
            	<li><a href="#">Admin</a></li>
            </ul>
        </div>  <!--End header-->

      <div id="content">
   		<h1>Projects</h1>
        	<ul id="project_filter">
            	<li><a href="#web" class="filter_active button_inline">web</a></li>
            	<li><a href="#mobile">mobile</a></li>
            	<li><a href="#print">print</a></li>
            	<li><a href="#identity">identity</a></li>
            	<li><a href="#3d">3d</a></li>
            </ul>
       		
			<ul id="intro_projects">
            	<?php
				
				
				?>
              	<li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here too much guff man innit?</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
                <li>
                    <h2>Project Title</h2>
                    <img src="images/project_holder.gif" alt="Project thumbnail" width="160" height="108" />
            		<p>A brief description of the project here</p>
                    <a href="#" class="button_inline">View web projects</a>
                </li>
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
