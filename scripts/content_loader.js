//Content Loader Script



var LOADER = function(content){  
	var $content = content;
	var $container = $('#content');
	var $loader = '<div id="loader"><h3>Loading content...</h3></div>';
	
	var $loadcontent = function() {  
			$($container).slideUp().empty().append($loader);
            $.ajax({ 
				type : "GET",  
                url : $content + '.php',
                dataType : "html",  
                success : function( data ) {  
					var content_html = $(data).find('#content').children();
					var $title = $(data).find('title');
					$('#loader').fadeOut(function(){
													$($container).append(content_html).hide().slideDown();			
										}).remove();
                } 
			});
		
	}();
	


};



$(document).ready(function(){
	// Handle the main LHS navigation //
	$('#nav_left a').click(function(){
		var $this = $(this);
		var $activeLink = '<span id="active_nav"></span>';
		$content = this.hash.slice(1);
		LOADER($content);
			if($activeLink.length){
				$('#active_nav').fadeOut(function(){
								$this.wrap($activeLink).hide().fadeIn();				 
							});	
			} else {
				$this.wrap($activeLink).hide().fadeIn();
			}
		return false;
	});
	
	
	var $filterContent = function(cat){
			var $cat = cat;
			var holder = $('#intro_projects').length ? $('#intro_projects') : $('#content');
			//var $introP = '<div id="intro_projects"></div>';
			$(holder).empty().append('<div id="loader"><h3>Loading content...</h3></div>');
			if (holder =  $('#content')){
				$('#content').append('<ul id="intro_projects"></ul>');
			}
			$.ajax({ 
				type : "GET",  
                url : 'web.php?cat=' + $cat,
                dataType : "html",  
                success : function( data ) {  
					var content_html = $(data).find('#intro_projects').children('li');
					console.log(content_html);
					$('#loader').fadeOut(function(){
											
													$('#intro_projects').append(content_html).hide().fadeIn();			
										}).remove();
                } 
			});


			return false;
	}
	
	var $selectProject = function(id){
			var $id = id;
			$('#content').empty().append('<div id="loader"><h3>Loading content...</h3></div>');
			            
			$.ajax({ 
				type : "GET",  
                url : 'project_page.php?id=' + $id,
                dataType : "html",  
                success : function( data ) {  
					var content_html = $(data).find('#project_holder');
					$('#loader').fadeOut(function(){
													$('#content').append(content_html).hide().fadeIn();			
										}).remove();
                } 
			});

			return false;
	}
	
	
	$('#project_filter').find('a').live('click', function(e){ //this page doesn;t exist until loaded by php so use LIVE
		var $target = $(this).attr('href').slice(0, -5);
		$(this).parent().siblings().find('a').removeClass('filter_active');
		$(this).addClass('filter_active');
		$filterContent($target);
		return false;
	});
	
	//NEED SOME KIND OF RESET FUNCTION FOR THE BACK BUTTON
	$('#intro_projects').find('a').live('click', function(e){
		var $id = $(this).attr('href').split('id=');
		$id = $id[1];
		$selectProject($id);
		return false;
	});
	
			
	$('#project_back').live('click', function(e){
		$filterContent('web');
		return false;
	});
});

