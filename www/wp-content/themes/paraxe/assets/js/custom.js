jQuery(document).ready( function () {

	//For Menu Bar
	jQuery('#site-navigation li').find('ul').hide();
		jQuery('#site-navigation li').hover(
			function(){
				
				jQuery(this).find('> ul').slideDown('fast');
			},
			function(){
				jQuery(this).find('ul').hide();
			});	
		
		jQuery('.menu-toggle').toggle(function() {
				jQuery('#site-navigation ul.menu').slideDown();
				jQuery('#site-navigation div.menu').fadeIn();
			},
			function() {
				jQuery('#site-navigation ul.menu').hide();
				jQuery('#site-navigation div.menu').hide();
		});
	
	//Hide showcase items for waypoint to work
	/*
jQuery('.showcase').fadeOut('fast')
	jQuery('article.grid2').fadeOut();
	jQuery('#home-title').fadeOut();
	jQuery('.pagination').fadeOut();
*/
	
	});//end ready
	
	
	jQuery(function () {
        jQuery.stellar({
            horizontalScrolling: false,
            verticalOffset: 40
        });
    });
	//Waypoint Animation
	/*
jQuery(function($) {
 
		$('#showcase').waypoint(function() {
			$('.showcase').fadeIn(1500);
		},
		{
			offset: '80%',
			triggerOnce: true
		});
		$('article.grid2').waypoint(function() {
			$('article.grid2').fadeIn(1500);
		},
		{
			offset: '80%',
			triggerOnce: true
		});
		$('#home-title').waypoint(function() {
			$('#home-title').fadeIn(1500);
		},
		{
			offset: '80%',
			triggerOnce: true
		});
		$('.pagination').waypoint(function() {
			$('.pagination').fadeIn(1500);
		},
		{
			offset: '90%',
			triggerOnce: true
		});
	 
	});
*/