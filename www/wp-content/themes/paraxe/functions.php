<?php
/**
 * Paraxe functions and definitions
 *
 * @package Paraxe
 */


if ( ! function_exists( 'paraxe_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function paraxe_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'paraxe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	 global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'paraxe' ),
		'footer' => __( 'Footer Menu', 'paraxe' ),
		'top' => __( 'Top Menu', 'paraxe' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'image', 'video' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'paraxe_custom_background_args', array(
		'default-color' => '000000',
		'default-image' => '',
	) ) );
	
	add_theme_support('title-tag');
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
	
	//Register custom thumbnail sizes
	add_image_size('paraxe_grid3',600,430,true); //For the Grid3 layout
	
	//Declare WooCommerce Support
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-lightbox' );
	
}
endif; // paraxe_setup
add_action( 'after_setup_theme', 'paraxe_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function paraxe_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'paraxe' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'sidebar-primary',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'paraxe' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'paraxe' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'paraxe' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'paraxe' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	
}
add_action( 'widgets_init', 'paraxe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function paraxe_scripts() {

	//Load Default Stylesheet
	wp_enqueue_style( 'paraxe-style', get_stylesheet_uri() );
	
	//Load Google Fonts
	wp_enqueue_style('paraxe-fonts', '//fonts.googleapis.com/css?family=Ubuntu:400,500,700|Open+Sans:300,700,400');
	
	//Load Font Awesome CSS
	wp_enqueue_style('font-awesome', get_template_directory_uri()."/assets/frameworks/font-awesome/css/font-awesome.min.css");
	
	//Load Bootstrap CSS
	wp_enqueue_style('bootstrap-style',get_template_directory_uri()."/assets/frameworks/bootstrap/css/bootstrap.min.css");
	
	//Load Theme Structure File. Contains Orientation of the Theme.
	wp_enqueue_style('paraxe-theme-structure', get_template_directory_uri()."/assets/css/main.css");

	//Load the File Containing Color/Font Information
	wp_enqueue_style('paraxe-theme-style', get_template_directory_uri()."/assets/css/theme.css");
	
	//Load Tooltipster Plugin Style and Skin
	//wp_enqueue_style('tooltipster-style', get_template_directory_uri()."/assets/css/tooltipster.css");
	//wp_enqueue_style('tooltipster-skin', get_template_directory_uri()."/assets/css/tooltipster-shadow.css");
	
	//Load Bootstrap JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/frameworks/bootstrap/js/bootstrap.min.js", array('jquery'));

	//Load Bx Slider Js 
	//wp_enqueue_script('bxslider-js', get_template_directory_uri()."/assets/js/bxslider.min.js", array('jquery'));

	//Tooltipster JS
	//wp_enqueue_script('tooltipster-js', get_template_directory_uri()."/assets/js/tooltipster.js", array('jquery'));
	
	//stellar.js - for parallax effects
	wp_enqueue_script('stellar-js', get_template_directory_uri()."/assets/js/stellar.js", array('jquery'));
	
	
	//Tooltipster JS
	//wp_enqueue_script('waypoint-js', get_template_directory_uri()."/assets/js/waypoints.js", array('jquery'));

	//Load Theme Specific JS
	wp_enqueue_script('custom-js', get_template_directory_uri()."/assets/js/custom.js", array('jquery','hoverIntent'));


	//Load Navigation js. This is Responsible for Converting the Main Menu into Responsive, when the browser width is switched.
	wp_enqueue_script( 'paraxe-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	//Comes with _s Framework.
	wp_enqueue_script( 'paraxe-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	//For the Default WordPress Comment's Reply System
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	//Declare support for Woo Commerce
	add_theme_support('woocommerce');
}
add_action( 'wp_enqueue_scripts', 'paraxe_scripts' );

/*
 *	This function Contains All The scripts that Will be Loaded in the Theme Header including Slider, Custom CSS, etc.
 */
function paraxe_initialize_header() {
	
	
	//Place all Javascript Here
	echo "<script>";
	
	
	
	echo "</script>";
	//Java Script Ends
	
	//CSS Begins
	echo "<style>";
	
	if ( true ): //for Future Purpose 
		if (get_theme_mod('paraxe_main_parallax_enable'))  :	
			echo ".parallax-zone .parallax-item { background: url(".esc_url(get_theme_mod('paraxe_parallax_img'))."); }";
			if(get_theme_mod('paraxe_parallax_img2') ) :
				echo "@media screen and (max-width: 991px) { .parallax-zone .parallax-item { background: url(".esc_url(get_theme_mod('paraxe_parallax_img2'))."); }}";
			endif;
			if( get_theme_mod('paraxe_parallax_img3') ):
				echo "@media screen and (max-width: 600px) {.parallax-zone .parallax-item { background: url(".esc_url(get_theme_mod('paraxe_parallax_img3'))."); }}";
			endif;
		endif;
		
		if ( !get_theme_mod('paraxe_parallax_title') && !get_theme_mod('paraxe_parallax_desc')) :
			echo ".parallax-item { min-height: 400px; }";
		endif;
	
	else :
		echo ".parallax-zone .parallax-item { background: url(".get_template_directory_uri()."/assets/images/default-parallax.jpg); }";
		
	endif;	
	
	// Echo the Custom CSS Entered via Theme Options
	echo esc_html(get_theme_mod('paraxe_custom_css'));	
	
	if (is_front_page()) :
		echo ".header-title { border: none; }";
	endif;
	
	if ( get_theme_mod('paraxe_hide_title_tagline') ) :
		echo "#masthead .site-branding #text-title-desc { display: none; }";
	endif;
	
	echo "</style>";
	//CSS Ends
	
	
}
add_action('wp_head', 'paraxe_initialize_header');

/**
 * Enqueue Scripts for Admin
 */
function seller_custom_wp_admin_style() {
        wp_enqueue_style( 'seller-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'seller_custom_wp_admin_style' );



/*
 * Pagination Function. Implements core paginate_links function.
 */
function paraxe_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}
if (class_exists('woocommerce')) {
	/**
	 * Set Default Thumbnail Sizes for Woo Commerce Product Pages, on Theme Activation
	 */
	global $pagenow;
	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) 			add_action( 'init', 'paraxe_woocommerce_image_dimensions', 1 );
	/**
	 * Define image sizes
	 */
	function paraxe_woocommerce_image_dimensions() {
	  	$catalog = array(
			'width' 	=> '600',	// px
			'height'	=> '600',	// px
			'crop'		=> 1 		// true
		);
		$single = array(
			'width' 	=> '600',	// px
			'height'	=> '600',	// px
			'crop'		=> 1 		// true
		);	 
		$thumbnail = array(
			'width' 	=> '250',	// px
			'height'	=> '250',	// px
			'crop'		=> 0 		// false
		);	 
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
}

function paraxe_excerpt_length( $length ) {
		return 35;
}
add_filter( 'excerpt_length', 'paraxe_excerpt_length' );

function paraxe_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'paraxe_excerpt_more' );

/*
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';