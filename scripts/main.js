$(document).ready(function(){
	/* Hand-rolled by Andrew McCluckie */		   

	/* Tooltip Function */
	
	function toolTip(){
		
			var toolTips = $('.hover');
			var tips = $('.hover_content');
			var offsetX = 10;
     		var offsetY= -tips.height() - 50;
			var id =0;
			tips.hide();
			
			toolTips.each(function(i){
					$(this).attr('id', 'tool_' + i);			   
			});
			
			tips.each(function(i){
					$(this).attr('id', 'tip_' + i);			   
			});
			
			toolTips.mouseover(function(event){
					id = $(this).attr('id').slice(5);
					$(tips[id]).css('top', event.pageY + offsetY).css('left', event.pageX + offsetX).fadeIn();
									
			}).mousemove(function(event){
					$(tips[id]).css('top', event.pageY + offsetY).css('left', event.pageX + offsetX);
				
				}).mouseout(function(){
						$(tips[id]).fadeOut(100);
					});
			
			
		
		}
		
	toolTip();
		
		
	function expander(){ 
			if($('.expander').length){ 
				var expanders = $('.expander');
				var expandables = $('.expand_content');
				
				expandables.hide();
				
				expanders.each(function(i){
					$this = $(this);
					var text = $this.text();
					$this.text('');
					$this.prepend('<a href="#' + i + '"><span class="expand_icon"></span>' + text + '</a>');
				});
				
				expandables.each(function(i){
					$this = $(this);
					$this.attr('id', 'exp_' + i);
										  
				});
				
				expanders.children('a').click(function(){
							var id = this.hash.slice(1);
							var content = expandables[id];
							if ($(content).is(':hidden')){
								$(content).slideDown();	
								$(this).children('span').removeClass('expand_icon').addClass('expand_icon_hover');
							} else if ($(content).is(':visible')){
								$(content).slideUp();
								$(this).children('span').removeClass('expand_icon_hover').addClass('expand_icon');
							}
							
							
							return false;
				});
			
			}
		
	}
	expander();
	
	$(function(){	
		/* Back to top function */
		var backtop = $('<a id="backtotop" href="#top" title="Take me back!"></a>'); //Build the link
		var top_link = $('<a name="top"></a>').prependTo('body'); //Build & deploy the anchor
		
		window.onscroll = function(e){
			//check amount of scrollspace above page AND to see if element has already been added to avoid multiple instances
			if ($(window).scrollTop() > 200 && $('.test:not(backtotop)')){
				if ($(backtop).is(':hidden')){
					backtop.appendTo('body').hide().fadeIn('slow');
				}
			} else if ($(window).scrollTop() < 400){
				backtop.fadeOut('fast');	
			}
		};
		backtop.click(function() {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
        return false;
    	});
	});
	
	
	/* Contact form function */
	
	
	$('#about').hide();
	$('#contact').hide();
	
	var contactForm = function(){
			$('.error').hide();
			$("#email_submit").click(function() {
			  // validate and process form here
		
					  $('.error').hide();
					  var name = $("input#name").val();
						if (name == "") {
							$("#name_error").show();
							$("input#name").focus();
							return false;
						}
						var email = $("input#email").val();
						
						if (email == "") {
							$("#email_error").show();
							$("input#email").focus();
							return false;
						}
						var message = $("#message").val();
						
						if (message == "") {
							$("#message_error").show();
							$("input#message").focus();
							return false;
						}
						
						
												
					  var dataString = 'name='+ name + '&email=' + email + '&message=' + message;
					  $.ajax({
							type: "POST",
							url: "email_handler.php",
							data: dataString,
							success: function() {
									  $('#emailer').hide();
									  $('#contact h2').text("Thank you for your message!")
									  .hide()
									  .fadeIn(500);
									}
					  });
					  return false;
    		});

		
	};
	
	if ($('#email_submit').length) {
			contactForm();
	}
	
	//Function to handle the show/hide of the 3 top sections
	var topExpander = function(target){
		var maskHeight = $(document).height();			//Set mask width to browser window
		var maskWidth = $(window).width();				//You get the idea
		var mask = $('#mask');
		$target = target;
		var offset = $($target).height() + 40;
		if ( $(mask).is(':hidden') ) {
			$(mask).css({'width':maskWidth,'height':maskHeight, 'top':offset, 'left':0}).fadeTo(300, 0.6);
			$('.top_close').css('top', offset);
		} else if ( $(mask).is(':visible') ) {
			$(mask).fadeOut(300);	
		}
		
		$('' + $target + '').slideToggle(400, function(){
									   
		});
		
	}
	
	$('.top_close').click(function(){
		var $link = $(this).attr('href'); // use the href which matches the target divs ID
		topExpander($link);		
		return false;
	});
	
	$('#header_links').find('a').click(function(){
		var $link = $(this).attr('href'); // use the href which matches the target divs ID
		topExpander($link);		
		return false;
	});
	
	/* Get latest tweet function */
			
	function getTweets(){
		var results = document.getElementById("latest_tweet");
		results.innerHTML = "Loading...";
		
		var username = 'mccluckie';
		//Prep the Twitter url so it can be passed as a GET parameter
		var twitter_url = escape("http://api.twitter.com/1/statuses/user_timeline.json?screen_name=" + username);
		
		//Do the AJAX call
		$.ajax({
			url: "stream_open_2.php?url=" + twitter_url,
			//Callback on success
			success: function(d, status, req){ //d = tweet information
				//Convert the JSON result to an array of tweets
				var tweets = eval('(' + d + ')');
				showTweets(tweets);
			}, 
			//Error handler
			error: function(){
				var results = document.getElementById("latest_tweet");
				results.innerHTML = 'An error occured. Tweets could not be loaded<br>'+status+ ': ' + err;
			}
		});
	}
	getTweets();											  
	function showTweets(tweets){
		var results = document.getElementById("latest_tweet");
		results.innerHTML = "";
		
		if(tweets.length <=0){
			results.innerHTML += 'User not found. Please go back and try again.';	
		} else {
				results.innerHTML +=  '<span class="quotes">&quot;</span>' + tweets[0].text + '<span class="quotes">&quot;</span>'; //insert quotes
				$(results).wrap('<a href="http://twitter.com/#!/mccluckie"></a>');	
		}
		
	}
	


	
});

