<?php
session_start(); 
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(!isset($_GET['mobile'])){
	$_SESSION['is_mobile']= 'false';
	if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)) && ($_SESSION['is_mobile'] === 'false')){
		$_SESSION['is_mobile']= 'true';
		header( 'Location: http://www.amc21.co.uk/m/' ) ;

		}
	
} else if(isset($_GET['mobile']) && $_GET['mobile'] =='false'){
				$_SESSION['is_mobile']= 'false';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name='Keywords'  content='web design, mobile design, app design, touch design, london, freelance'/>
	<meta name='Description' content='Web and mobile designer and developer based in london - available for freelance projects.'/>

    <title>Andrew McCluckie -- [ London based digital designer for web, mobile and touch ]</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <script type="text/javascript" src="scripts/content_loader_new.js"></script>

<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="css/ie8.css" />
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/ie6.css" />
<![endif]-->
</head>

<body>
	<div id="wrapper" class="top_stuff">
    	<div id="about">
            <ul id="about_list">
                <li><a href="http://twitter.com/#!/mccluckie" title="Follow me on Twitter." class="twit">Follow me on Twitter</a></li>
                <li><a href="http://forrst.com/people/rubberducky" title="Find me on Forrst." class="forr">Find me on Forrst</a></li>
                <li><a href="http://www.linkedin.com/profile/view?id=20391639&trk=tab_pro" title="Linkedin profile." class="linkedIn">Linkedin profile</a></li>
                <li><a href="http://www.tumblr.com/tumblelog/mccluckie" title="Tumblr innit." class="tumblr">Tumblr profile</a></li>
                <li><a href="http://www.flickr.com/photos/mccluckie" title="Flickr profile." class="flick">Flickr profile</a></li>
            </ul>        	
            <p>Hi, I'm Andrew McCluckie and I've been a designer for a good few years and started specialising in web design four years ago.
               After honing my skills hand-coding html &amp; css and learning to deal with the nightmare of IE6 I moved onto learning jQuery.
               Over the past two years I have been learning more jQuery as well as raw javascript and PHP.</p>
            <p>Recently what's been fascinating me is development for mobile/touch devises and adaptive layouts using media queries. Earlier this year 
               I built my first native Android app using Phonegap and converted a previous site to become device independant.</p>
            <p>Other than that I'm 32 and have lived in London for the last 8 years. I enjoy going out and listening to house music, cooking and cycling.
               I am available for freelance work so feel free to hit contact and drop me an email.</p>
			<div class="clear"></div>
            <a href="#about" class="top_close">Close</a> 
        </div>
    	<div id="contact" class="top_stuff">
            <h2>Hit me!</h2>
            <form action="email_handler.php" method="post" id="emailer">
                    <fieldset>
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name"  />
                        <p class="error" id="name_error">Please enter your name.</p>
                        
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address"  />
                        <p class="error" id="email_error">Please enter a valid email address.</p>

                        <label for="message" id="message_label">Message:</label>
                        <textarea id="message" name="message" placeholder="Penny for your thoughts."></textarea>
                        <p class="error" id="message_error">Oh come on! You need to enter a message.</p>
                        
                        <input type="submit" value="Send message" id="email_submit" />
                        <input type="hidden" name="submitted" value="TRUE" />
                        
                    </fieldset>
 			</form>
            <a href="#contact" class="top_close">Close</a> 
		</div>

        <div id="nav_left">
        	<a href="home.php"><img src="images/logo_header.png" alt="Logo of Andrew McCluckie" width="160" height="65" id="logo_header" /></a>
        	<ul>
            	<li><a href="web.php">Web and mobile</a></li>
            	<li><a href="print.php">Print</a></li>
            	<li><a href="identity.php">Identity</a></li>
            	<li><a href="3d.php">3D</a></li>
            	<li><a href="photography/photography.php">Photography</a></li>
            </ul>
<p id="copyright_notice">&copy; 2011 Andrew M<sup>c</sup>Cluckie</p>
        </div><!--End nav_left-->
        
      <div id="header">
        	<ul id="header_links">
            	<li><a href="#about" id="about_button">About</a></li>
            	<li><a href="#contact" id="contact_button">Contact</a></li>
            	<!--<li><a href="includes/admin.php" id="admin_button">Admin</a></li>-->
            </ul>
      </div>  <!--End header-->

      <div id="content">

      </div><!--End Content-->
    
    	<div class="clearfix"></div>
        <div id="footer">
            <div id="footer_inner">
                <div class="footerCol">
                    <h3>Follow me!</h3>
                    <ul>
                        <li><a href="http://twitter.com/#!/mccluckie" title="Follow me on Twitter." class="twit">Follow me on Twitter</a></li>
                        <li><a href="http://forrst.com/people/rubberducky" title="Find me on Forrst." class="forr">Find me on Forrst</a></li>
                        <li><a href="http://www.linkedin.com/profile/view?id=20391639&trk=tab_pro" title="Linkedin profile." class="linkedIn">Linkedin profile</a></li>
                        <li><a href="http://www.tumblr.com/tumblelog/mccluckie" title="Tumblr innit." class="tumblr">Tumblr profile</a></li>
                        <li><a href="http://www.flickr.com/photos/mccluckie" title="Flickr profile." class="flick">Flickr profile</a></li>
                    </ul>
                </div>
                
                <div class="footerCol">
					<h3>Skills</h3>
                    <ul>
                    	<li>Javascript</li>
                    	<li>jQuery/jQuery mobile/jqtouch</li>
                    	<li>PHP</li>
                    	<li>MySQL</li>
                    	<li>XML</li>
                    	<li>AJAX</li>                
                	</ul>
                </div>

                <div class="footerCol">
                	<h3>Latest wisdom</h3>
                    <p id="latest_tweet"></p>
				</div>
                                
            </div>
        </div><!--End footer-->
        
	</div><!-- END WRAPPER -->
<div id="mask"></div>
</body>
</html>
