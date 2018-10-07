<?php

/**
 * The WP Home Page Menu Admin defines all functionality for the dashboard
 * of the plugin.
 *
 * This class defines the meta box used to display the post meta data and registers
 * the style sheet responsible for styling the content of the meta box.
 *
 * @package WPHPM
 * @since    1.0.0
 */
class WP_Home_Page_Menu_Admin {

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
	 * are we network activated?
	 */
	private $networkactive;

	/**
	 * Initializes this class and stores the current version of this plugin.
	 *
	 * @param    string    $version    The current version of this plugin.
	 */
	public function __construct( $version ) {
		$this->version = $version;
		$this->options = get_option( 'wp_home_page_menu' );
		$this->networkactive = ( is_multisite() && array_key_exists( plugin_basename( __FILE__ ), (array) get_site_option( 'active_sitewide_plugins' ) ) );
	}

	/**
	 * PHP 4 Compatible Constructor
	 *
	 */
	function WP_Home_Page_Menu_Admin() {
		$this->__construct();
	}

	/**
	 * Loads plugin javascript and stylesheet files in the admin area
	 *
	 */
	function wp_home_page_menu_load_admin_assets(){

		wp_register_script( 'wp-home-page-menu-scripts', plugins_url( '/js/wp-home-page-menu-admin.js', __FILE__ ), array( 'jquery' ), '1.0', true  );

		wp_localize_script( 'wp-home-page-menu-scripts', 'wp_home_page_menu', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		) );

		// Enqueued script with localized data.
		wp_enqueue_script( 'wp-home-page-menu-scripts' );
	}

	/**
	 * Add a link to the settings page to the plugins list
	 *
	 * @param array  $links array of links for the plugins, adapted when the current plugin is found.
	 * @param string $file  the filename for the current plugin, which the filter loops through.
	 *
	 * @return array $links
	 */
	function wp_home_page_menu_settings_link($links, $file) {

		if ( false !== strpos( $file, 'wp-home-page-menu' ) ) {
			$mylinks = array(
				'<a href="http://freewptp.com/forum/wordpress-plugins-forum/wp-home-page-menu/">' . __( 'Get Support', 'wp-home-page-menu' ) . '</a>',
				'<a href="options-general.php?page=wp_home_page_menu">' . __( 'Settings', 'wp-home-page-menu' ) . '</a>'
			);
			$links = array_merge( $mylinks, $links );
		}
		return $links;
	}

	/**
	 * Displays plugin configuration notice in admin area
	 *
	 */
	function wp_home_page_menu_setup_notice(){

		if ( strpos( get_current_screen()->id, 'settings_page_wp_home_page_menu' ) === 0 )
			return;

		$hascaps = $this->networkactive ? is_network_admin() && current_user_can( 'manage_network_plugins' ) : current_user_can( 'manage_options' );

		if ( $hascaps ) {
			echo '<div class="notice notice-info is-dismissible wp-home-page-menu"><p>' . sprintf( __( 'To configure <em>WP Home Page Menu plugin</em> please visit its <a href="%1$s">configuration page</a> and to get plugin support contact us on <a href="%2$s">plugin support forum</a> or <a href="%3$s">contact us page</a>.', 'wp-home-page-menu'), 'options-general.php?page=wp_home_page_menu', 'http://freewptp.com/forum/wordpress-plugins-forum/wp-home-page-menu/', 'http://freewptp.com/contact/' ) . '</p></div>';
		}
	}

	/**
	 * Handles plugin notice dismiss functionality using AJAX
	 *
	 */
	function wp_home_page_menu_notice_dismiss() {

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			$options = $this->options;
			$options['dismiss_admin_notices'] = 1;
			update_option( 'wp_home_page_menu', $options );
		}

		die();
	}

	/* Registers menu item */
	function wp_home_page_menu_admin_menu_setup(){
		add_submenu_page( 'options-general.php', __( 'WP Home Page Menu Settings', 'wp-home-page-menu' ), __( 'WP Home Page Menu', 'wp-home-page-menu' ), 'manage_options', 'wp_home_page_menu', array( $this, 'wp_home_page_menu_admin_page_screen' ) );
	}

	/* Displays plugin admin page content */
	function wp_home_page_menu_admin_page_screen() { ?>
		<div class="wrap">
			<form id="wp_home_page_menu_options" action="options.php" method="post">
				<?php
					settings_fields( 'wp_home_page_menu' );
					do_settings_sections( 'wp_home_page_menu' );
					submit_button( 'Save Options', 'primary', 'wp_home_page_menu_options_submit' );
				?>
				<div id="after-submit">
					<p>
						<?php esc_html_e( 'Like WP Home Page Menu?', 'wp-home-page-menu' ); ?> <a href="https://wordpress.org/support/view/plugin-reviews/wp-home-page-menu/" target="_blank"><?php _e( 'Give us a rating', 'wp-home-page-menu' ); ?></a>
					</p>
					<p>
						<?php esc_html_e( 'Need Help or Have Suggestions?', 'wp-home-page-menu' ); ?> <?php _e( 'contact us on', 'wp-home-page-menu' ); ?> <a href="http://freewptp.com/forum/wordpress-plugins-forum/wp-home-page-menu/" target="_blank"><?php esc_html_e( "Plugin support forum", 'wp-home-page-menu' ); ?></a> <?php esc_html_e( "or", 'wp-home-page-menu' ); ?> <a href="http://freewptp.com/contact/" target="_blank"><?php esc_html_e( 'Contact us page', 'wp-home-page-menu' ); ?></a>
					</p>
					<p>
						<?php esc_html_e( 'Access Plugin Documentation on', 'wp-home-page-menu' ); ?> <a href="http://freewptp.com/plugins/wp-home-page-menu/" target="_blank">http://freewptp.com/plugins/wp-home-page-menu/</a>
					</p>
				</div>
			 </form>
		</div>
		<?php
	}

	/* Registers settings */
	function wp_home_page_menu_settings_init(){

		add_settings_section( 'wp_home_page_menu_section', __( 'WP Home Page Menu Settings', 'wp-home-page-menu' ),  array( $this, 'wp_home_page_menu_section_desc' ), 'wp_home_page_menu' );

		add_settings_field( 'wp_home_page_menu_enable', __( 'Enable Home Page Menu : ', 'wp-home-page-menu' ),  array( $this, 'wp_home_page_menu_enable' ), 'wp_home_page_menu', 'wp_home_page_menu_section' );
		add_settings_field( 'wp_home_page_menu_locations', __( 'Choose Menu Locations : ', 'wp-home-page-menu' ),  array( $this, 'wp_home_page_menu_locations' ), 'wp_home_page_menu', 'wp_home_page_menu_section' );
		add_settings_field( 'wp_home_page_menu_label', __( 'Home Page Menu Label : ', 'wp-home-page-menu' ),  array( $this, 'wp_home_page_menu_label' ), 'wp_home_page_menu', 'wp_home_page_menu_section' );
		add_settings_field( 'wp_home_page_menu_title', __( 'Home Page Menu Title : ', 'wp-home-page-menu' ),  array( $this, 'wp_home_page_menu_title' ), 'wp_home_page_menu', 'wp_home_page_menu_section' );
		add_settings_field( 'wp_home_page_menu_classes', __( 'Home Page Menu Classes : ', 'wp-home-page-menu' ),  array( $this, 'wp_home_page_menu_classes' ), 'wp_home_page_menu', 'wp_home_page_menu_section' );
		add_settings_field( 'wp_home_page_menu_enable_pages_menu', __( 'My Site Uses Pages Menu? : ', 'wp-home-page-menu' ),  array( $this, 'wp_home_page_menu_enable_pages_menu' ), 'wp_home_page_menu', 'wp_home_page_menu_section' );

		register_setting( 'wp_home_page_menu', 'wp_home_page_menu' );

	}

	/* Displays plugin description text */
	function wp_home_page_menu_section_desc(){
		echo "<p>" . __( 'Configure the WP Home Page Menu plugin settings displayed below on this page to enable or disable the home page menu in your site navigation bar.', 'wp-home-page-menu' )."</p>";
	}

	/* wp home page menu enable field output */
	function wp_home_page_menu_enable() {

		$options = $this->options;

		$options['wp_home_page_menu_enable'] = isset($options['wp_home_page_menu_enable']) ? $options['wp_home_page_menu_enable'] : 0;
		$html = '<input type="checkbox" id="wp_home_page_menu_enable" name="wp_home_page_menu[wp_home_page_menu_enable]" value="1" ' . checked( 1, $options['wp_home_page_menu_enable'], false) . '/>';
		$html .= '<label for="wp_home_page_menu_enable"> ' . __( 'Enable', 'wp-home-page-menu' ) . '</label>';

		echo $html;

	}

	/* wp home page menu choose locations field output */
	function wp_home_page_menu_locations() {

		$options = $this->options;
		$html = '';
		$menus = get_registered_nav_menus();

		if ( ! empty( $menus ) ) {

			if ( empty( $options ) ) {
				$location = array_keys( $menus );
				$options['wp_home_page_menu_locations'][ $location[0] ] = $location[0];
				update_option( 'wp_home_page_menu', $options );
			}

			if ( isset( $options['wp_home_page_menu_locations']['initial'] ) ) {
				unset( $options['wp_home_page_menu_locations']['initial'] );
				$location = array_keys( $menus );
				$options['wp_home_page_menu_locations'][ $location[0] ] = $location[0];
				update_option( 'wp_home_page_menu', $options );
			}

			foreach ( $menus as $location => $description ) {

				$check_value = isset( $options['wp_home_page_menu_locations'][ $location ] ) ? $options['wp_home_page_menu_locations'][ $location ] : 0;
				$html .= '<input type="checkbox" id="wp_home_page_menu_locations' . $location . '" name="wp_home_page_menu[wp_home_page_menu_locations]['.$location.']" value="'.$location.'" ' . checked( $location, $check_value, false ) . '/>';
				$html .= '<label for="wp_home_page_menu_locations' . $location . '"> ' . $description . '</label><br />';
			}
		} else {
			$html = __( 'No navigation menu registered on your site.', 'wp-home-page-menu' );
		}
		echo $html;

	}

	/* wp home page menu label field output */
	function wp_home_page_menu_label() {

		$options = $this->options;
		$options['wp_home_page_menu_label'] = isset( $options['wp_home_page_menu_label'] ) ? $options['wp_home_page_menu_label'] : __( 'Home', 'wp-home-page-menu' );
		$html = '<input type="text" id="wp_home_page_menu_label" name="wp_home_page_menu[wp_home_page_menu_label]" value="' . $options['wp_home_page_menu_label'] . '" size="50" />';
		echo $html;
	}

	/* wp home page menu title field output */
	function wp_home_page_menu_title() {

		$options = $this->options;
		$options['wp_home_page_menu_title'] = isset( $options['wp_home_page_menu_title'] ) ? $options['wp_home_page_menu_title'] : __( 'Home', 'wp-home-page-menu' );
		$html = '<input type="text" id="wp_home_page_menu_title" name="wp_home_page_menu[wp_home_page_menu_title]" value="' . $options['wp_home_page_menu_title'] . '" size="50" />';
		echo $html;
	}

	/* wp home page menu classes field output */
	function wp_home_page_menu_classes() {

		$options = $this->options;
		$options['wp_home_page_menu_classes'] = isset( $options['wp_home_page_menu_classes'] ) ? $options['wp_home_page_menu_classes'] : 'home-menu';
		$html = '<input type="text" id="wp_home_page_menu_classes" name="wp_home_page_menu[wp_home_page_menu_classes]" value="' . $options['wp_home_page_menu_classes'] . '" size="50" />';
		echo $html;
	}

	/* wp home page menu pages field output */
	function wp_home_page_menu_enable_pages_menu() {

		$options = $this->options;
		$options['wp_home_page_menu_enable_pages_menu'] = isset( $options['wp_home_page_menu_enable_pages_menu'] ) ? $options['wp_home_page_menu_enable_pages_menu'] : 0;
		$html = '<input type="checkbox" id="wp_home_page_menu_enable_pages_menu" name="wp_home_page_menu[wp_home_page_menu_enable_pages_menu]" value="1" ' . checked( 1, $options['wp_home_page_menu_enable_pages_menu'], false ) . '/>';
		$html .= '<label for="wp_home_page_menu_enable_pages_menu"> ' . __( 'Yes', 'wp-home-page-menu' ) . '</label>';

		echo $html;
	}

}