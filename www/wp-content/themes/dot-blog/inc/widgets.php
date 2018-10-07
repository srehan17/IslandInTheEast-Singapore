<?php
/**
 * Widgets
 * 
 * Main file for manage widget.     
 */
 
define( 'DOT_BLOG_WIDGETS_FOLDER', DOT_BLOG_THEME_INC_DIR . 'widgets/' );

$dot_blog_widgets = dot_blog_get_widgets();

foreach ( $dot_blog_widgets as $index => $widget ) {
	    	include_once DOT_BLOG_WIDGETS_FOLDER . $widget . '.php';
}
  
add_action( 'widgets_init', 'dot_blog_register_widgets' );

/**
 * Retrieve all widgets that are in the theme
 * @return array An array with all widgets name 
 */
function dot_blog_get_widgets() {
	$widgets = array();  

	$file_widgets = array(
		'author-profile.php',
		'categories-list.php',
		'footer-recent-posts.php',
		'popular-posts.php',
		'posts-tab.php',
		'recent-posts.php'
	);

	foreach ( $file_widgets as $file ) {
		$name = preg_replace( '/(.*).php/', '$1', $file );
		$widgets[] = $name;
	}
	
	return $widgets;			
}

/**
 * register all widgets of the theme
 * 
 * @since 1.0  
 */
function dot_blog_register_widgets()
{
    global $dot_blog_widgets;
	foreach ( $dot_blog_widgets as $widget ){
		$widget = str_replace('-', '_', $widget);
		$widget = 'dot_blog_' . $widget;
        register_widget( $widget );
	}	
}

?>