<?php
/**
 *  The theme main directories path
 */

define( 'DOT_BLOG_THEME_INC_DIR', get_template_directory() . '/inc/' );
define( 'DOT_BLOG_THEME_STYLES_URL', get_template_directory_uri() . '/styles/' );
define( 'DOT_BLOG_THEME_JS_URL', get_template_directory_uri() . '/scripts/' );
define( 'DOT_BLOG_THEME_IMG_URL', get_template_directory_uri() . '/images/' );
define( 'DOT_BLOG_THEME_I18N_URL', get_template_directory_uri() . '/languages/' );

/**
 * Theme Functions
 */
require_once( DOT_BLOG_THEME_INC_DIR . 'functions.php' );
require_once( DOT_BLOG_THEME_INC_DIR . 'customizer.php' );
require_once( DOT_BLOG_THEME_INC_DIR . 'widgets.php' );


// install plugins
require_once( DOT_BLOG_THEME_INC_DIR . 'install-plugins.php' );