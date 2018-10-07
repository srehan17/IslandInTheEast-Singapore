<?php

/*
 Plugin Name: BootStrap Menus Plugin
Plugin URI: http://github.com/rhildred/gitwordpress/
Description: Added Bootstrap menus in a plugin so that it could be combined with any theme
Author: Rich Hildred
Version: 1.0
Author URI: http://syndicateme.net/
*/

require_once 'wp_bootstrap_navwalker.php';

class BootStrapMenusPlugin{
	static public function displayMenu()
	{
   		echo '<div class="collapse navbar-collapse navbar-top-collapse">';
        wp_nav_menu( array(
                'menu'              => 'main_menu',
                'theme_location'    => 'Primary Menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        		'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
    	echo '</div><!-- /.navbar-collapse -->'; 
	}
}

add_theme_support( 'menus' );