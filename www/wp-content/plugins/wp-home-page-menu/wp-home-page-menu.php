<?php
/*
Plugin Name:       WP Home Page Menu
Plugin URI:        http://freewptp.com/plugins/wp-home-page-menu/
Description:       This plugin displays home page menu in the navigation bar which can be configured from the admin area.
Version:           2.0
Author:            Free WP TP
Author URI:        http://freewptp.com
License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path:       /languages
Text Domain:       wp-home-page-menu

WP Home Page Menu plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

WP Home Page Menu plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WP Home Page Menu plugin. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

/**
 * Changelog :
 * 1.0 - Intial release.
 */

/**
 * The file responsible for starting the WP Home Page Menu plugin
 *
 * The WP Home Page Menu is a plugin that can be used
 * to display home page menu in the navigation bar. This particular file is responsible for
 * including the necessary dependencies and starting the plugin.
 *
 * @package WPHPM
 */


/**
 * If this file is called directly, then abort execution.
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-home-page-menu-activator.php
 */
function activate_wp_home_page_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-home-page-menu-activator.php';
	WP_Home_Page_Menu_Activator::activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-home-page-menu-deactivator.php
 */
function deactivate_wp_home_page_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-home-page-menu-deactivator.php';
	WP_Home_Page_Menu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_home_page_menu' );
register_deactivation_hook( __FILE__, 'deactivate_wp_home_page_menu' );


/**
 * Include the core class responsible for loading all necessary components of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-home-page-menu.php';

/**
 * Instantiates the WP Home Page Menu class and then
 * calls its run method officially starting up the plugin.
 */
function run_wp_home_page_menu() {
	$ewpd = new WP_Home_Page_Menu();
	$ewpd->run();
}

/**
 * Call the above function to begin execution of the plugin.
 */
run_wp_home_page_menu();