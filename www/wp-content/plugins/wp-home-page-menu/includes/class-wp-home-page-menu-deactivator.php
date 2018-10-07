<?php

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @link       http://freewptp.com
 * @since      1.0.0
 * @package    WPHPM
 * @subpackage WPHPM/includes
 * @author     Free WPTP <freewptp@gmail.com>
 */
class WP_Home_Page_Menu_Deactivator {

	/**
	 * Short Description.
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		$options = get_option( 'wp_home_page_menu' );
		if ( isset( $options['dismiss_admin_notices'] ) ) {
			unset( $options['dismiss_admin_notices'] );
			update_option( 'wp_home_page_menu', $options );
		}
	}
}