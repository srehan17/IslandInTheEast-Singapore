<?php
/**
 * paraxe Theme Customizer
 *
 * @package paraxe
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function paraxe_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'paraxe' ),
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'paraxe_logo' , array(
	    'default'     => '',
	    'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'paraxe_logo',
	        array(
	            'label' => __('Upload Logo','paraxe'),
	            'section' => 'title_tagline',
	            'settings' => 'paraxe_logo',
	            'priority' => 5,
	        )
		)
	);
			
	//Replace Header Text Color with, separate colors for Title and Description
	//Override paraxe_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('header_textcolor');
/*
	$wp_customize->add_setting('paraxe_site_titlecolor', array(
	    'default'     => '#3a85ae',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'paraxe_site_titlecolor', array(
			'label' => __('Site Title Color','paraxe'),
			'section' => 'colors',
			'settings' => 'paraxe_site_titlecolor',
			'type' => 'color'
		) ) 
	);
*/
	
	//Settings For Logo Area
	
	$wp_customize->add_setting(
		'paraxe_hide_title_tagline',
		array( 'sanitize_callback' => 'paraxe_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'paraxe_hide_title_tagline', array(
		    'settings' => 'paraxe_hide_title_tagline',
		    'label'    => __( 'Hide Title and Tagline.', 'paraxe' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	
	function paraxe_title_visible( $control ) {
		$option = $control->manager->get_setting('paraxe_hide_title_tagline');
	    return $option->value() == false ;
	}
	
	// PARALLAX
	
	$wp_customize->add_section(
	    'paraxe_sec_parallax_options',
	    array(
	        'title'     => __('Parallax Header','paraxe'),
	        'priority'  => 40,
	    )
	);
	
	
	$wp_customize->add_setting(
		'paraxe_main_parallax_enable',
		array( 'sanitize_callback' => 'paraxe_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'paraxe_main_parallax_enable', array(
		    'settings' => 'paraxe_main_parallax_enable',
		    'label'    => __( 'Enable Parallax.', 'paraxe' ),
		    'description' => __('For Best Results, choose a Parallax Image which does not contain any textual information. If you Do not choose Separate Images for Smartphones and Tablets, then Desktop Image will be used for Both.','paraxe'),
		    'section'  => 'paraxe_sec_parallax_options',
		    'type'     => 'checkbox',
		)
	);	
			
	$wp_customize->add_setting(
		'paraxe_parallax_img',
		array( 'sanitize_callback' => 'esc_url_raw' )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'paraxe_parallax_img',
	        array(
	            'label' => __( 'Parallax Image (Desktop)', 'paraxe' ),
	            'description' => __('Recommended Width: 1200px. Recommended Height: 400 to 600px, depending on the content size.','paraxe'),
	            'section' => 'paraxe_sec_parallax_options',
	            'settings' => 'paraxe_parallax_img',			       
	        )
		)
	);
	
	$wp_customize->add_setting(
		'paraxe_parallax_img2',
		array( 'sanitize_callback' => 'esc_url_raw' )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'paraxe_parallax_img2',
	        array(
	           'label' => __( 'Parallax Image (Tablets)', 'paraxe' ),
	            'description' => __('Recommended Width: 991px. Recommended Height: 400 to 600px, depending on the content size.','paraxe'),
	            'section' => 'paraxe_sec_parallax_options',
	            'settings' => 'paraxe_parallax_img2',			       
	        )
		)
	);
	
	$wp_customize->add_setting(
		'paraxe_parallax_img3',
		array( 'sanitize_callback' => 'esc_url_raw' )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'paraxe_parallax_img3',
	        array(
	            'label' => __( 'Parallax Image (Smartphones)', 'paraxe' ),
	            'description' => __('Recommended Width: 400-600px. Recommended Height: 400 to 600px, depending on the content size.','paraxe'),
	            'section' => 'paraxe_sec_parallax_options',
	            'settings' => 'paraxe_parallax_img3',			       
	        )
		)
	);
	
	
	
	
	$wp_customize->add_setting(
		'paraxe_parallax_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'paraxe_parallax_title', array(
		    'settings' => 'paraxe_parallax_title',
		    'label'    => __( 'Title','paraxe' ),
		    'section'  => 'paraxe_sec_parallax_options',
		    'type'     => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'paraxe_parallax_desc',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'paraxe_parallax_desc', array(
		    'settings' => 'paraxe_parallax_desc',
		    'label'    => __( 'Description','paraxe' ),
		    'section'  => 'paraxe_sec_parallax_options',
		    'type'     => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'paraxe_parallax_btn',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'paraxe_parallax_btn', array(
		    'settings' => 'paraxe_parallax_btn',
		    'label'    => __( 'Button Text','paraxe' ),
		    'section'  => 'paraxe_sec_parallax_options',
		    'type'     => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'paraxe_parallax_url',
		array( 'sanitize_callback' => 'esc_url_raw' )
	);
	
	$wp_customize->add_control(
			'paraxe_parallax_url', array(
		    'settings' => 'paraxe_parallax_url',
		    'label'    => __( 'Target URL','paraxe' ),
		    'section'  => 'paraxe_sec_parallax_options',
		    'type'     => 'url',
		)
	);
			
	
	
	
	
	if (class_exists('WP_Customize_Control')) {
		class paraxe_WP_Customize_Upgrade_Control extends WP_Customize_Control {
	        /**
	         * Render the control's content.
	         */
	        public function render_content() {
	             printf(
	                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
	                $this->label,
	                $this->description
	            );
	        }
	    }
	}
	
	
	
	//Upgrade
	$wp_customize->add_section(
	    'paraxe_sec_upgrade',
	    array(
	        'title'     => __('Discover Paraxe Pro','paraxe'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'paraxe_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new paraxe_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'paraxe_upgrade',
	        array(
	            'label' => __('More of Everything','paraxe'),
	            'description' => __('Paraxe Pro Version has more of Everything. More New Features, More Options, More Fonts, More Layouts, Configurable Parallax & Slider, Inbuilt Advertising Options, More Widgets, and a lot more options and comes with Dedicated Support. To Know More about the Pro Version, click here: <a href="http://rohitink.com/product/paraxe-pro/">Upgrade to paraxe Plus</a>.','paraxe'),
	            'section' => 'paraxe_sec_upgrade',
	            'settings' => 'paraxe_upgrade',			       
	        )
		)
	);
		
	
	class paraxe_Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	$wp_customize-> add_section(
    'paraxe_custom_codes',
    array(
    	'title'			=> __('Custom CSS','paraxe'),
    	'description'	=> __('Enter your Custom CSS to Modify design.','paraxe'),
    	'priority'		=> 41,
    	)
    );
    
	$wp_customize->add_setting(
	'paraxe_custom_css',
	array(
		'default'		=> '',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);
	
	$wp_customize->add_control(
	    new paraxe_Custom_CSS_Control(
	        $wp_customize,
	        'paraxe_custom_css',
	        array(
	            'section' => 'paraxe_custom_codes',
	            

	        )
	    )
	);
	
	function paraxe_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	
	
	// Social Icons
	$wp_customize->add_section('paraxe_social_section', array(
			'title' => __('Social Icons','paraxe'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','paraxe'),
					'facebook' => __('Facebook','paraxe'),
					'twitter' => __('Twitter','paraxe'),
					'google-plus' => __('Google Plus','paraxe'),
					'instagram' => __('Instagram','paraxe'),
					'rss' => __('RSS Feeds','paraxe'),
					'flickr' => __('Flickr','paraxe'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'paraxe_social_'.$x, array(
				'sanitize_callback' => 'paraxe_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'paraxe_social_'.$x, array(
					'settings' => 'paraxe_social_'.$x,
					'label' => __('Icon ','paraxe').$x,
					'section' => 'paraxe_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'paraxe_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'paraxe_social_url'.$x, array(
					'settings' => 'paraxe_social_url'.$x,
					'description' => __('Icon ','paraxe').$x.__(' Url','paraxe'),
					'section' => 'paraxe_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function paraxe_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'flickr',
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function paraxe_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function paraxe_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function paraxe_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}
	
	
}
add_action( 'customize_register', 'paraxe_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function paraxe_customize_preview_js() {
	wp_enqueue_script( 'paraxe_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'paraxe_customize_preview_js' );
