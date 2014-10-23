<?php 
$errors = '';
$myemail = 'andy@amc21.co.uk';//<-----Put Your email address here.

if(isset($_POST['submitted']) ) {
				
	function spam_scrubber($value) {
			$very_bad = array('to:', 'cc:', 'bcc:', 'content-type:', 'mime-version', 'multipart-mixed:', 'content-transfer-encoding:');
			
			foreach ( $very_bad as $v ) {
				if (stripos($value, $v) !== false) return ''; // loops through the array and checks against the input string
			}
			
			//replace any new line characters with a space
			//looks for characters in 1st arg in the 3rd arg and replaces with the 2nd arg
			$value = str_replace(array("\r", "\n", "%0a", "%0d"), ' ', $value);
			
			//return value and complete function
			return trim($value);
	}// end spam scrubber

	// clean the form
	// calls the function for each array element in POST
	$scrubbed = array_map('spam_scrubber', $_POST);

	if(!empty($scrubbed['name']) && !empty($scrubbed['email']) && !empty($scrubbed['message']) ) {
		$body = "Name: {$scrubbed['name']}
			 \n\nComments: {$scrubbed['message']}";
		$body = wordwrap($body, 70);
		
		//send the mail
		mail($myemail, 'Contact form submission', $body, "From: {$scrubbed['email']}");
		echo '<p>Thank you for your email.</p>';
		
		//clear POST so its not sticky
		$_POST = array();
		
	} else {
		echo '<p class="form_error">It appears you have missed something out. Please fill-out the form completely.</p>';
	}
	
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>


</body>
</html>