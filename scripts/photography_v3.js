$(document).ready(function(){
	/* Thiscode will work in conjunction with the PHP to submit the requests to itself. Thumbnails and large/main images must have matching filenames
	and must be stored in adjacent directories - make sure the directories match the code
	*/
	
	/* AJAX function to load in the relevant 'set' of images. Passes request to the PHP function in this same page and returns the relevant html */
	var setLoader = function(selection){ 
		var $default = selection || 'lot_1'; // Sets default image directory if no selection has been made i.e on initial load
		var $target = $('#photo_viewer'); // Target element to load content into
		var $content = ''; // Initialise variable to store returned html
		/* Make the AJAX call */
		$.ajax({ 
			type : "GET",  
			url : 'photography.php?set=' + $default, // URL references self but with PHP query variable *************|||||||||||||\\\\\\\\\ be sure to RESET THE PATH when finished with dev work
			dataType : "html",  
			success : function( data ) {  // Return the PHP query result
				$content = $(data).find('#photo_viewer').children(); // Grab the relevent content from the returned html
				$($target).empty().append($content).hide().fadeIn(); // Clear the target content, append the query results and insert into DOM
			}
		});

	}; // END LOADER FUNC
	
	/* Function to handle the 'set' navigation */
	var linkHandler = function(){
		$('#phot_links').on('click', 'a',  function(e){
			e.preventDefault(); // Disable anchor default behaviour
			$selected = $(this).attr('href'); // Grab the set selection from the links' href property
			setLoader($selected); // Run the AJAX load function and pass the selection to it
		}); // END CLICK FUNC
	};
	
	linkHandler();
	
	/* Function for the behaviour of the image thumbnails to load the main image */
	/* Use live as after the initial load all elements are generated dynamically and do not exist in DOM at time of js script execution */
	
	/////////////// This function could be more efficient
	
	$('#photo_thumbs_wrapper').find('a').live('click', function(e){
						$(this).parent().find('img.photo_thumbs_active').removeClass('photo_thumbs_active');
						$(this).find('img').addClass('photo_thumbs_active');
						var $imgUrl = ''; // used to store the image path
						//var $imgName = ''; // currently not used
						e.preventDefault();
						$imgUrl = $(this).find('img').attr('src').split('/'); // Split image path so we can grab the filename portion
						/* Swap-out the /thumb/ fragment for the /large/ directory to get main image and pass to main image loader below*/									
						image_loader($imgUrl[0] + '/large/' + $imgUrl[2]); 
	});
	
	/* Function to handle loading of main image based on thumbnail selection */
	var image_loader = function(name){
		$('#main_photo').fadeOut(200, function(){ // Ditch the current main image
			$(this).attr('src', name).load(function() { // load the new image with callback func to check image dimensions
				pic_real_width = this.naturalWidth;   // Note: $(this).width() will not
				pic_real_height = this.naturalHeight; // work for in memory images.
				$(this).hide().animate({width: pic_real_width, height: pic_real_height}, 50).fadeIn(200); // Adjust the new image size
			});						  
										  
		});
	} //END IMAGE LOADER


});