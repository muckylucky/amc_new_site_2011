function popup(){
	var modals = $('#content').find('.popup_content'); //Store all pop-up content into array
	var triggers = $('#content').find('.popup_trigger'); //Same with their respective links
	
	$(modals).remove().appendTo('body');
	/*Run through each link in array and assign unique ID via the hash in href */
	/* Note that while popups do not have to be directly after their respective links, the links & popups MUST be in the same order to match-up */
	triggers.each(function(i){
		var $this = $(this);
		$this.attr('href', '#' + i);
		
	});
	
	/*run through each pop-up and assign unique ID to match respective links above ^^ */
	modals.each(function(i){
		var $this = $(this);
		$this.hide().attr('id', 'content_' + i);
		
	});
	
	
	/*initiate link click behaviour */
	triggers.click(function(e){
		e.preventDefault();
		var id = this.hash.slice(1); 					//use hash function to grab unique id to reference with popup content
		var maskHeight = $(document).height();			//Set mask width to browser window
		var maskWidth = $(window).width();				//You get the idea
		var winH = $(window).height();  				//Will use this to determine mid-point on screen for popup
		var winW = $(window).width(); 					//Same for width
		var offset = $(window).scrollTop();				//Get the offset if window is scrolled
	
		$('#mask').css({'width':maskWidth,'height':maskHeight, 'top':0, 'left':0})		//Set height and width to mask to fill up the whole screen
						.fadeTo(100, 1)
						.fadeTo(300, 0.6, function(){
											/*Callback function to bring in popup after mask has finished animating */ 																				
										   $('#content_' + id).append('<a href="#" id="modal_close"></a>').css({'top': winH/2-($('#content_' + id).height()/2) + offset , 'left': winW/2-($('#content_' + id).width()/2)}).fadeIn(200); 
									})
						.live('click', function() { //Object not 'live' yet so use bind to add click behaviour
										$(this).fadeOut(200);
										$('#content_' + id).fadeOut(100); // !!Use fadeOut NOT Remove, otherwise cannot re-use function
							});
						
		
		$('#modal_close').live('click', function(e){
							$(this).parent().fadeOut(100);
							$('#mask').fadeOut(200);
							return false;
		});	
	
	
	}); // End CLICK Function
	
	
} // End Function
		
		
		

////////////////////////////Project filter higlight function

var filter_highlight = function(clicked) {
	var $clicked =  clicked || 0;
	var filter = $('#project_filter').length ? $('#project_filter') : $('#phot_links');
	var links = filter.find('a');
	links.removeClass('filter_active');
	//links = $(links[$clicked]);
	$(links[$clicked]).addClass('filter_active');
}
/*
var skillset_colour = function(){
	var text = [];
	$('#project_skillset li').each(function(){
		text = $(this).text().toLowerCase();
		switch (text) {
				case 'design':
						$(this).addClass('design');
						break;
				case 'html':
						$(this).addClass('html');
						break;
				case 'jquery':
						$(this).addClass('jQuery');
						break;
				case 'php':
						$(this).addClass('php');
						break;
				case 'xml':
						$(this).addClass('xml');
						break;					
				case 'mobile':
						$(this).addClass('mobile');
						break;				
			}
	});
}
*/


////////////////////////////Project carousel widget
var project_widget = function(){
	var imgs = $('#widget_inner').find('img');
	var widget_nav = $('#widget_nav').find('a');
	var wInner = $('#widget_inner');
	var targetHeight = $('#widget_inner').find('img').height();
	var total = imgs.length;
	var counter = 0;
	var delay = 4000;
	var interrupt = false;
	var animating = false;
	//var rotate_content = setInterval(rotate, delay, counter);
	var current = imgs[0];
	var target = imgs[counter + 1];
	
	$(imgs).not(":first").hide();
	
	$(widget_nav[0]).css('background', 'url(../images/project_widget_nav_on.png) 0 0 no-repeat');
	
	//loop through images and assign stack-height/z-index
	for (i=0; i< total; i++){ 
		var new_index = (total - i);
		$(imgs[i]).css("z-index", new_index);
		$(widget_nav[i]).attr('id', 'wnav_' + i);
	}
	
	
	function rotate(){
		if (interrupt === false){
				if(counter + 1 < total){
					   current = $(imgs[counter]);
					   target = $(imgs[counter +1]);
					   fader(current, target);
					   counter++;
				} else if (counter = total){
					   current = $(imgs[counter -1]);
					   counter = 0;
					   target = $(imgs[counter]);
					   fader(current, target);
					  
				}
		}
	} // end rotate function
	
	function fader(){
		current.fadeOut(function(){
				animating = true;
				$(widget_nav).css('background', 'url(../images/project_widget_nav_off.png) 0 0 no-repeat');
				$(widget_nav[counter]).css('background', 'url(../images/project_widget_nav_on.png) 0 0 no-repeat');
				target.fadeIn(function(){
					targetHeight = parseInt( $(target).attr('height') ); //****WARNING must convert targetHeight from string to integer before adding the 10 buffer amount
					$(wInner).height(targetHeight + 10);
					animating = false;
				});
		});
		
	}
		
	//Handle the widget navigation
	$(widget_nav).click(function(){
		var clicked = $(this).attr('id').slice(5);
		interrupt = true;
		clearInterval(rotate_content);
		current = $('#widget_inner').find('img:visible');
		counter = clicked;
		target = $(imgs[clicked]);
		fader(current, target);
	});
	
	setTimeout(rotate, delay, counter);
}

var loadContent = function(url, clicked){
		var defaultPage = 'home.php';
		var $container = $('#content'); //target destination for our content
		var $loader = '<div id="loader"><h3>Loading content...</h3></div>';
		$($container).fadeOut().empty().append($loader);
            $.ajax({ 
				type : "GET",  
                url : url,
                dataType : "html",  
                success : function( data ) {  
					var content_html = $(data).find('#content').children();
					var $title = $(data).find('title');
					var widget = $(data).find('#project_widget');
					// Run the popup  function on the home page
					$('#loader').fadeOut(function(){
											$($container).append(content_html).hide().fadeIn();
											filter_highlight(clicked);
											//skillset_colour();
											if (url === 'home.php') {
												popup();
											}

											if ( widget.length > 0 ) {
												project_widget();	
											}
					}).remove();
                } 
		});
		
};



$(document).ready(function(){
	
	/* Get the useragent in case we need to code exceptions for stoopid IE */
	var userAgent = navigator.userAgent.toLowerCase();
	var isIE8 = (userAgent.indexOf('msie 8') != -1 || userAgent.indexOf('msie 7') != -1) ? true : false;
	var nav_history = [];
	loadContent('home.php');
	nav_history.unshift('home.php');
	$('#nav_left').find('a').click(function(){
		var $url = $(this).attr('href');
		$('#nav_left').find('a').removeClass('active_nav');
		$(this).addClass('active_nav');
		nav_history.unshift($url);
		loadContent($url);
		return false;
	});
	
	// Project filter loader function
	$('#project_filter').find('a').live('click', function(e){ //this page doesn;t exist until loaded by php so use LIVE
				var filter_links = $('#project_filter').find('a');
				for (i=0; i < filter_links.length; i++) {
					$(filter_links[i]).attr('id', 'filter_' + i);	
				}
				var clicked = $(this).attr('id').slice(7);
				var $url = $(this).attr('href');
				loadContent($url, clicked);
				return false;
	});
	
	
	// Project viewer function
	$('#intro_projects').find('a').live('click', function(e){ 
			var $url = $(this).attr('href');
			loadContent($url);
			return false;
	});
	
	//Project back button
	$('#project_back').live('click', function(){
		$(this).attr('href', nav_history[0]);
		loadContent(nav_history[0]);
		return false;
	});

	
	//Email form handler


////////////////////////////////PHOTOGRAPHY

	/* Thiscode will work in conjunction with the PHP to submit the requests to itself. Thumbnails and large/main images must have matching filenames
	and must be stored in adjacent directories - make sure the directories match the code
	*/
	
	/* AJAX function to load in the relevant 'set' of images. Passes request to the PHP function in this same page and returns the relevant html */
	var setLoader = function(selection, clicked){ 
		var $default = selection || 'lot_1'; // Sets default image directory if no selection has been made i.e on initial load
		var $target = $('#photo_viewer'); // Target element to load content into
		var $content = ''; // Initialise variable to store returned html
		/* Make the AJAX call */
		$.ajax({ 
			type : "GET",  
			url : 'photography/photography.php?set=' + $default, // URL references self but with PHP query variable *************|||||||||||||\\\\\\\\\ be sure to RESET THE PATH when finished with dev work
			dataType : "html",  
			success : function( data ) {  // Return the PHP query result
				filter_highlight(clicked);
				$content = $(data).find('#photo_viewer').children(); // Grab the relevent content from the returned html
				$($target).empty().append($content).hide().fadeIn(); // Clear the target content, append the query results and insert into DOM
			}
		});

	}; // END LOADER FUNC
	
	/* Function to handle the 'set' navigation */
	var linkHandler = function(){
		$('#phot_links').find('a').live('click', function(e){
			e.preventDefault(); // Disable anchor default behaviour
			var filter_links = $('#phot_links').find('a');
				for (i=0; i < filter_links.length; i++) {
					$(filter_links[i]).attr('id', 'filter_' + i);	
				}
			var $clicked = $(this).attr('id').slice(7);
			var $selected = $(this).attr('href'); // Grab the set selection from the links' href property
			setLoader($selected, $clicked); // Run the AJAX load function and pass the selection to it
		}); // END CLICK FUNC
	};
	
	linkHandler();
	
	/* Function for the behaviour of the image thumbnails to load the main image */
	/* Use live as after the initial load all elements are generated dynamically and do not exist in DOM at time of js script execution */
	
	/////////////// This function could be more efficient
	
	$('#photo_thumbs_wrapper').find('a').live('click', function(e){
						e.preventDefault();
						$(this).parent().find('img.photo_thumbs_active').removeClass('photo_thumbs_active');
						$(this).find('img').addClass('photo_thumbs_active');
						var $imgUrl = ''; // used to store the image path
						//var $imgName = ''; // currently not used
						$imgUrl = $(this).find('img').attr('src').split('/'); // Split image path so we can grab the filename portion
						/* Swap-out the /thumb/ fragment for the /large/ directory to get main image and pass to main image loader below*/									
						image_loader('photography/' + $imgUrl[1] + '/large/' + $imgUrl[3]); 
	});
	
	/* Function to handle loading of main image based on thumbnail selection */
	var image_loader = function(name){
		$('#main_photo').fadeOut(200, function(){ // Ditch the current main image
			$(this).attr('src', name).load(function() { // load the new image with callback func to check image dimensions
			
			/*IE8 and lower does not recognise naturalWidth so ignore this part for them */
			if(!isIE8) {
				pic_real_width = this.naturalWidth;   // Note: $(this).width() will not
				pic_real_height = this.naturalHeight; // work for in memory images.
				$(this).hide().animate({width: pic_real_width, height: pic_real_height}, 50).fadeIn(200); // Adjust the new image size
			} else {
				// this part for dumbass IE8 and below
				$(this).hide().fadeIn(200);
			}
			
			});						  
										  
		});
	} //END IMAGE LOADER

});
