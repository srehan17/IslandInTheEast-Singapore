<?php

/**
 * Theme Customizer
 */

function dot_blog_customize_register( $wp_customize ) {

	if ( ! class_exists( 'WP_Customize_Control' ) ) {
		return null;
	}


	class Dot_Blog_Customize_Category_Control extends WP_Customize_Control {

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-'
					                       . $this->id,
					'echo'              => 0,
					'show_option_none'  => __( '&mdash; Select &mdash;',
						'dot-blog' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(),
				$dropdown );

			?>
			<label class="customize-control-select">
				<span
					class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span
						class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<?php echo $dropdown; ?>

			</label>
			<?php
		}
	}

	class Dot_Blog_Customize_Users_Control extends WP_Customize_Control {

		public function render_content() {
			$dropdown = wp_dropdown_users(
				array(
					'name'              => '_customize-dropdown-users-'
					                       . $this->id,
					'echo'              => 0,
					'show_option_none'  => __( '&mdash; Select &mdash;',
						'dot-blog' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(),
				$dropdown );
			?>
			<label class="customize-control-select">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<?php echo $dropdown; ?>

			</label>
			<?php
		}
	}


	/**
	 * GENERAL SECTION
	 * --------------------------------------------------
	 */

	// section title
	$wp_customize->add_section(
		'general_section',
		array(
			'title'       => __( 'General Options', 'dot-blog' ),
			'description' => __( 'General settings can be set here.',
				'dot-blog' ),
		)
	);


	// settings
	$wp_customize->add_setting( 'dot_blog_related_posts_count', array(
			'default'           => 2,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_setting( 'dot_blog_related_posts', array(
			'default'           => 'categories',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_setting( 'dot_blog_excerpt_length', array(
			'default'           => 20,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_setting( 'dot_blog_sidebar_alignment', array(
			'default'           => 'right_sidebar',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	// controls
	$wp_customize->add_control( 'dot_blog_sidebar_alignment', array(
		'label'   => __( 'Sidebar Alignment', 'dot-blog' ),
		'section' => 'general_section',
		'type'    => 'select',
		'choices' => array(
			'no_sidebar'    => 'No Sidebar',
			'right_sidebar' => 'Right Sidebar',
			'left_sidebar'  => 'Left Sidebar',
		),
	) );
	$wp_customize->add_control( 'dot_blog_related_posts', array(
		'label'       => __( 'Related Posts', 'dot-blog' ),
		'description' => __( 'How to choose related posts', 'dot-blog' ),
		'section'     => 'general_section',
		'type'        => 'radio',
		'choices'     => array(
			'categories' => 'Categories',
			'tags'       => 'Tags',
		),
	) );
	$wp_customize->add_control( 'dot_blog_related_posts_count', array(
		'label'   => __( 'Number of related posts', 'dot-blog' ),
		'section' => 'general_section',
		'type'    => 'number',
	) );
	$wp_customize->add_control( 'dot_blog_excerpt_length', array(
		'label'       => __( 'Excerpt Length', 'dot-blog' ),
		'description' => __( 'Number of words to display in blog excerpt',
			'dot-blog' ),
		'section'     => 'general_section',
	) );


	/**
	 * HOME SLIDER SECTION
	 * --------------------------------------------------
	 */

	// section
	$wp_customize->add_section(
		'home_slider_section',
		array(
			'title'       => __( 'Home Slider', 'dot-blog' ),
			'description' => __( 'Home page slider settings', 'dot-blog' ),
		)
	);

	// settings
	$wp_customize->add_setting( 'dot_blog_slider_status', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_validate_boolean'
		)
	);
	$wp_customize->add_setting( 'dot_blog_slider_count', array(
			'default'           => 10,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_setting( 'dot_blog_home_slider_cat', array(
			'default'           => 1,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		)
	);


	$wp_customize->add_control( 'dot_blog_slider_status', array(
			'label'   => __( 'Show slideshow on front page?', 'dot-blog' ),
			'section' => 'home_slider_section',
			'type'    => 'checkbox',
		)
	);
	// controls
	$wp_customize->add_control( 'dot_blog_slider_count', array(
		'label'   => __( 'Number of slideshow items', 'dot-blog' ),
		'section' => 'home_slider_section',
		'type'    => 'number',
	) );
	$wp_customize->add_control( new Dot_Blog_Customize_Category_Control( $wp_customize,
			'dot_blog_home_slider_cat', array(
				'label'       => __( 'Category', 'dot-blog' ),
				'description' => __( 'Choose the category you want to display slideshow items from',
					'dot-blog' ),
				'section'     => 'home_slider_section',
			)
		)
	);


	/**
	 * SOCIALS SECTION
	 * --------------------------------------------------
	 */
	$wp_customize->add_section(
		'socials_section',
		array(
			'title'       => __( 'Socials', 'dot-blog' ),
			'description' => __( 'You can add your social media proflies here. They will be displayed in header and footer.',
				'dot-blog' ),
		)
	);

	// settings
	$wp_customize->add_setting( 'dot_blog_social_status',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 'off',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_setting( 'dot_blog_social_blank',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean'
		)
	);
	$wp_customize->add_setting( 'dot_blog_social_facebook_link', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_setting( 'dot_blog_social_twitter_link', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_setting( 'dot_blog_social_google_plus_link', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_setting( 'dot_blog_social_linkedin_link', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_setting( 'dot_blog_social_pinterest_link', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	// controls
	$wp_customize->add_control( 'dot_blog_social_status', array(
			'label'   => __( 'Socials bar?', 'dot-blog' ),
			'section' => 'socials_section',
			'type'    => 'radio',
			'choices' => array(
				'on'  => 'On',
				'off' => 'Off',
			),
		)
	);
	$wp_customize->add_control( 'dot_blog_social_blank', array(
			'label'   => __( 'New page?', 'dot-blog' ),
			'section' => 'socials_section',
			'type'    => 'checkbox',
		)
	);
	$wp_customize->add_control( 'dot_blog_social_facebook_link', array(
			'label'   => __( 'Facebook', 'dot-blog' ),
			'section' => 'socials_section',
		)
	);
	$wp_customize->add_control( 'dot_blog_social_twitter_link', array(
			'label'   => __( 'Twitter', 'dot-blog' ),
			'section' => 'socials_section',
		)
	);
	$wp_customize->add_control( 'dot_blog_social_google_plus_link', array(
			'label'   => __( 'Google Plus', 'dot-blog' ),
			'section' => 'socials_section',
		)
	);
	$wp_customize->add_control( 'dot_blog_social_linkedin_link', array(
			'label'   => __( 'Linked in', 'dot-blog' ),
			'section' => 'socials_section',
		)
	);
	$wp_customize->add_control( 'dot_blog_social_pinterest_link', array(
			'label'   => __( 'Pinterest', 'dot-blog' ),
			'section' => 'socials_section',
		)
	);


	/**
	 * FOOTER SECTION
	 * --------------------------------------------------
	 */
	$wp_customize->add_section(
		'footer_section',
		array(
			'title'       => __( 'Footer', 'dot-blog' ),
			'description' => __( 'Footer settings', 'dot-blog' ),
		)
	);

	// settings
	$wp_customize->add_setting( 'dot_blog_footer_copyright_text', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'dot_blog_sanitize_input'
		)
	);

	// controls
	$wp_customize->add_control( 'dot_blog_footer_copyright_text', array(
			'label'   => __( 'Footer copyright text', 'dot-blog' ),
			'section' => 'footer_section',
		)
	);


	/**
	 * STYLES SECTION
	 * --------------------------------------------------
	 */
	$wp_customize->add_section(
		'styling_section',
		array(
			'title'       => __( 'Styling', 'dot-blog' ),
			'description' => __( 'Change color scheme', 'dot-blog' ),
		)
	);

	// settings
	$wp_customize->add_setting( 'dot_blog_accent_color', array(
			'default'           => '#f5ab35',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'dot_blog_accent_color', array(
				'label'       => __( 'Select the accent color', 'dot-blog' ),
				'description' => __( 'Choose your favorite accent color',
					'dot-blog' ),
				'section'     => 'styling_section',
			)
		)
	);

}

add_action( 'customize_register', 'dot_blog_customize_register' );

function dot_blog_main_color_css() {
	$color_scheme_option = get_theme_mod( 'dot_blog_accent_color', '#f5ab35' );

	$rgb_accent = dot_blog_hex2rgb( $color_scheme_option );
	if ( ! empty( $color_scheme_option ) ) {
		$rgb_accent = dot_blog_hex2rgb( '#f5ab35' );
	}

	$css
		= '
		.widget::before,
		.widget.widget_search button,
		.widget.recent-posts-widget .tab-head a.active,
		.widget.recent-posts-widget .tab-head a.active:hover,
		.widget.recent-posts-widget .tab-head a.active:active,
		.widget.recent-posts-widget .tab-head a.active:focus,
		.widget.recent-posts-widget .tag.hot::before,
		.widget .social-networks.justify a::before,
		.widget ul.social-networks.justify a::before,
		.subscribe-form button,
		.post-block time .time-over,
		.masonry-blocks .block time .time-over:before,
		.image-slider .btn-prev:hover,
		.image-slider .btn-prev:focus,
		.image-slider .btn-prev:active,
		.image-slider .btn-next:hover,
		.image-slider .btn-next:focus,
		.image-slider .btn-next:active,
		.comment-form input[type="button"],
		.comment-form input[type="submit"],
		.comment-form button[type="button"],
		.comment-form button[type="submit"],
		.wpcf7-submit:hover,
		.btn-default:hover,
		.btn-default:focus,
		.btn-default:active,
		.switcher .slide.slick-current .slide-holder,
		.slideshow .title::before,
		.switcher .slide-holder:hover,
		.side-nav h2,
		.post-password-form input[type="submit"],
		.sf-menu li li a:hover,
		#aside-menu-btn:hover
		{
		  background-color: %1$s;
		}
		
		#back-top,
		#header .social-networks a:hover,
		.changer-opener .fa-cog,
		#header .social-networks a:focus,
		#header .social-networks a:active,
		.widget.contact-widget a:hover,
		.widget.contact-widget a:focus,
		.widget.contact-widget a:active,
		.widget.widget-block .social-networks a:hover,
		.widget.widget-block .social-networks a:active,
		.widget.widget-block .social-networks a:focus,
		.widget.widget_categories ul a:hover,
		.widget.widget_categories ul a:active,
		.widget.widget_categories ul a:focus,
		.widget.recent-posts-widget time a:hover,
		.widget.recent-posts-widget time a:active,
		.widget.recent-posts-widget time a:focus,
		.widget.profile-widget.version-ii .social-networks a:hover,
		.widget.profile-widget.version-ii .social-networks a:active,
		.widget.profile-widget.version-ii .social-networks a:focus,
		.aside .social-networks a:hover,
		.aside .social-networks a:active,
		.aside .social-networks a:focus,
		#footer a:hover,
		#footer a:focus,
		#footer a:active,
		.policy-nav a:hover,
		.policy-nav a:focus,
		.policy-nav a:active,
		.read-more,
		.masonry-blocks .info a:hover,
		.masonry-blocks .info a:focus,
		.masonry-blocks .info a:active,
		.commentlist-item .name a:hover,
		.commentlist-item .name a:focus,
		.commentlist-item .name a:active,
		.commentlist-item .comment-reply-link:hover,
		.commentlist-item .comment-reply-link:active,
		.commentlist-item .comment-reply-link:focus,
		.breadcrumb a:hover,
		.breadcrumb a:focus,
		.breadcrumb a:active,
		.single-postv2 .info a:hover,
		.single-postv2 .info a:focus,
		.single-postv2 .info a:active,
		.page-error h1 .text-color,
		h2 a:hover,
		h2 a:active,
		h2 a:focus,
		h1 a:hover,
		h1 a:active,
		h1 a:focus,
		h3 a:hover,
		h3 a:active,
		h3 a:focus,
		h4 a:hover,
		h4 a:active,
		h5 a:hover,
		h5 a:active,
		h5 a:focus,
		h6 a:hover,
		h6 a:active,
		h6 a:focus,
		a, 
		a:hover, 
		a:focus ,
  		.slideshow .header a,
		.cols-holder time a,
		.link-more:hover,
		.link-more:active,
		.link-more:focus,
		.music-holder .fa-music:hover,
		.music-holder .fa-music:active,
		.music-holder .fa-music:focus,
		.video-holder .ico-play:hover,
		.video-holder .ico-play:active,
		.video-holder .ico-play:focus,
		.page-error .comming-timer .countdown-amount,
		.widget.widget_tag_cloud a:hover,
		.footer-widget ul li a:hover,
		 .post-navigation a:hover {
		  color: %1$s; 
		}
		
		.widget .social-networks.justify li.active a,
		.widget ul.social-networks.justify li.active a,
		.widget .social-networks.justify a:hover,
		.widget .social-networks.justify a:active,
		.widget .social-networks.justify a:focus,
		.widget ul.social-networks.justify a:hover,
		.widget ul.social-networks.justify a:active,
		.widget ul.social-networks.justify a:focus,
		.post-block blockquote,
		.commentlist-item .avatar-holder::before,
		.slideshow .header a::after,
		.switcher,
		  border-color: %1$s; 
		}
		
		.post.sticky,
		.cols-holder .post.sticky {
			border-bottom-color: %1$s; 
		}
		
		.side-nav h2:before {
		  border-top-color: %1$s; 
		}
		
		.quote-holder blockquote:after {
		
		  background: rgba(%2$s, %3$s, %4$s, 0.8);
		}

	';

	wp_add_inline_style( 'dot-blog-style',
		sprintf( $css, $color_scheme_option, $rgb_accent['red'],
			$rgb_accent['green'], $rgb_accent['blue'] ) );
}

add_action( 'wp_enqueue_scripts', 'dot_blog_main_color_css', 11 );
function dot_blog_sanitize_input( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}