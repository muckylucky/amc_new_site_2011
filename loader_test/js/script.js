
var loadPage = function($url){
	var defaultPage = 'home';
	var $container = $('#content');
	var $loader = '<div id="loader"><h3>Loading content...</h3></div>';
	
			$($container).slideUp().empty().append($loader);
            $.ajax({ 
				type : "GET",  
                url : $url,
                dataType : "html",  
                success : function( data ) {  
					var content_html = $(data).find('#content').children();
					var $title = $(data).find('title');
					$('#loader').fadeOut(function(){
													$($container).append(content_html).hide().slideDown();			
										}).remove();
                } 
			});
		
	};

var alerter = function(page, category, project){
		var defaultPage = 'home';
		var $container = $('#content'); //target destination for our content
		var $loader = '<div id="loader"><h3>Loading content...</h3></div>';
		
		//cycle through parameters and count how many are set
		var i, vars = 0; 
		for (i=0; i < arguments.length; i+=1) {
			vars = i;
		}
		
		//switch statement to target loader
		switch(vars){
			case 0:
			url = '../' + page + '.php';
			//loadPage(url);
			break;
			case 1:
			url = '../' + page + '.php' + '?cat=' + category;
			//loadPage(url);
			break;
			case 2:
			url = '../' + 'project_page.php?id=' + project;
			//loadPage(url);
			break;
		}
		
		console.log(url);
		$($container).slideUp().empty().append($loader);
            $.ajax({ 
				type : "GET",  
                url : url,
                dataType : "html",  
                success : function( data ) {  
					var content_html = $(data).find('#content').children();
					var $title = $(data).find('title');
					$('#loader').fadeOut(function(){
													$($container).append(content_html).hide().slideDown();			
										}).remove();
                } 
		});
		
};

var urlParser = function($url){ // this should be renamed to url parser and create a seperate loader function
	var url = $url;
	var $cat;
	if (url.indexOf('?') > -1) {
		$cat = url.split('?');
		$page = $cat[0];
		$cat = $cat[1].slice(4);
			if(url.indexOf('id=') > -1) {
				$cat = $cat.split('&');
				$cat = $cat[0];
				$id = url.split('&id=');
				$id = $id[1];
				alerter($page, $cat, $id);
				return false;
			}
		alerter($page, $cat);
		return false;
	}
	alerter(url);

				

};

$(document).ready(function(){
	$('#nav_left').find('a').click(function(){
		var $url = $(this).attr('href').slice(1);
		urlParser($url);
	});
});