<?php

/**
 * The WP Home Page Menu Public defines all functionality of plugin
 * for the site front
 *
 * This class defines the meta box used to display the post meta data and registers
 * the style sheet responsible for styling the content of the meta box.
 *
 * @package WPHPM
 * @since    1.0.0
 */
class WP_Home_Page_Menu_Public {

	/**
	 * Global plugin option.
	 */
	 public $options;

	/**
	 * A reference to the version of the plugin that is passed to this class from the caller.
	 *
	 * @access private
	 * @var    string    $version    The current version of the plugin.
	 */
	private $version;

	/**
	 * Initializes this class and stores the current version of this plugin.
	 *
	 * @param    string    $version    The current version of this plugin.
	 */
	public function __construct( $version ) {
		$this->version = $version;
		$this->options = get_option( 'wp_home_page_menu' );
	}

	/**
	 * PHP 4 Compatible Constructor
	 *
	 */
	function WP_Home_Page_Menu_Public() {
		$this->__construct();
	}

	/* Adds home page menu in the navigation bar in the front end of site */
	function wp_home_page_menu_items( $items, $args ){

		$options = $this->options;

		if ( isset( $options['wp_home_page_menu_locations'] ) ) {

			if ( isset( $options['wp_home_page_menu_locations']['initial'] ) ) {
				unset( $options['wp_home_page_menu_locations']['initial'] );
				$options['wp_home_page_menu_locations'][ $args->theme_location ] = $args->theme_location;
				update_option( 'wp_home_page_menu', $options );
			}

			if ( isset( $options['wp_home_page_menu_locations'][ $args->theme_location ] ) ) {
				$home_class = isset( $options['wp_home_page_menu_classes'] ) ? $options['wp_home_page_menu_classes'] : 'home-menu';
				$home_class .= ( is_home() || is_front_page() ) ? ' current-menu-item' : '';
				$label = isset( $options['wp_home_page_menu_label'] ) ? $options['wp_home_page_menu_label'] : __( 'Home', 'wp-home-page-menu' );
				$title = isset( $options['wp_home_page_menu_title'] ) ? $options['wp_home_page_menu_title'] : __( 'Home', 'wp-home-page-menu' );
				$homelink = '<li class="' . $home_class . '"><a title="' . $title . '" href="' . home_url( '/' ) . '">' . $label . '</a></li>';
				$items = $homelink . $items;
			}
		}
		return $items;
	}

	/* Adds home page menu in the navigation bar in the front end of site */
	function wp_home_page_items( $args ){
		$options = $this->options;
		$label = isset( $options['wp_home_page_menu_label'] ) ? $options['wp_home_page_menu_label'] : __( 'Home', 'wp-home-page-menu' );
		$args['show_home'] = $label;
		return $args;
	}

}