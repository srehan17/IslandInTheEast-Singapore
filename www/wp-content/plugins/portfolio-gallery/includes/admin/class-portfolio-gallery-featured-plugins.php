<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Portfolio_Gallery_Featured_Plugins{
	/**
	 * Prints Featured Plugins page 
	 */
	public function show_page( ){
		include( PORTFOLIO_GALLERY_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'portfolio-gallery-admin-featured-plugins.php' );
	}
}