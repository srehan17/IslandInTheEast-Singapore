<?php
/**
 * Highthemes General Helper Functions
 * twitter : http://twitter.com/theHighthemes
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Converts a HEX value to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 *
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function dot_blog_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}


/*
 * Class Name: Dot_Blog_Nav_Walker
 * Author URI: https://github.com/wp-bootstrap
*/
if ( ! class_exists( 'Dot_Blog_Nav_Walker' ) ) {

	class Dot_Blog_Nav_Walker extends Walker_Nav_Menu {

		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\" >\n";
		}

		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
			} else {
				$class_names = $value = '';
				$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[]   = 'menu-item-' . $item->ID;
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				if ( $args->has_children ) {
					$class_names .= ' dropdown';
				}
				if ( in_array( 'current-menu-item', $classes, true ) ) {
					$class_names .= ' active';
				}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $value . $class_names . '>';
				$atts = array();
				if ( empty( $item->attr_title ) ) {
					$atts['title'] = ! empty( $item->title ) ? strip_tags( $item->title ) : '';
				} else {
					$atts['title'] = $item->attr_title;
				}
				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
				$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
				// If item has_children add atts to a.
				if ( $args->has_children && 0 === $depth ) {
					$atts['href']          = '#';
					$atts['data-toggle']   = 'dropdown';
					$atts['class']         = 'dropdown-toggle';
					$atts['aria-haspopup'] = 'true';
				} else {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				}
				$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}
				$item_output = $args->before;

				if ( ! empty( $item->attr_title ) ) :
					$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
					if ( false !== $pos ) :
						$item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
					else :
						$item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
					endif;
				else :
					$item_output .= '<a' . $attributes . '>';
				endif;
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
				$item_output .= $args->after;
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}

		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return;
			}
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
			}
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		public static function fallback( $args ) {
			if ( current_user_can( 'edit_theme_options' ) ) {
				/* Get Arguments. */
				$container       = $args['container'];
				$container_id    = $args['container_id'];
				$container_class = $args['container_class'];
				$menu_class      = $args['menu_class'];
				$menu_id         = $args['menu_id'];
				if ( $container ) {
					echo '<' . esc_attr( $container );
					if ( $container_id ) {
						echo ' id="' . esc_attr( $container_id ) . '"';
					}
					if ( $container_class ) {
						echo ' class="' . sanitize_html_class( $container_class ) . '"';
					}
					echo '>';
				}
				echo '<ul';
				if ( $menu_id ) {
					echo ' id="' . esc_attr( $menu_id ) . '"';
				}
				if ( $menu_class ) {
					echo ' class="' . esc_attr( $menu_class ) . '"';
				}
				echo '>';
				echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_attr( 'Add a menu', '' ) . '</a></li>';
				echo '</ul>';
				if ( $container ) {
					echo '</' . esc_attr( $container ) . '>';
				}
			}
		}
	}
}


/**
 * After theme setup settings
 */
function dot_blog_theme_setup() {
	global $content_width, $pagenow;

	/* Set the $content_width for things such as video embeds. */
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}

	/* Add theme support for automatic feed links. */
	add_theme_support( 'automatic-feed-links' );

	/* Enable support for Post Thumbnails on posts and pages.*/
	add_theme_support( 'post-thumbnails' );

	/* Custom Headers */
	$defaults = array(
		'default-image'          => get_template_directory_uri() . '/images/page_header_bg.jpg',
		'width'                  => 1600,
		'height'                 => 200,
		'flex-height'            => false,
		'flex-width'             => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );

	/* Enable support for Custom Logo. */
	add_theme_support( 'custom-logo' );

	/* Set the image size by cropping the image */
	add_image_size( 'dot-blog-post-large', 940, 9999, true );
	add_image_size( 'dot-blog-post-medium', 616, 340, true );
	add_image_size( 'dot-blog-post-small', 295, 160, true );
	add_image_size( 'dot-blog-small-thumbnail', 72, 72, true );


	/* Generate title tag */
	add_theme_support( 'title-tag' );

	/* Add nav menus  */
	add_action( 'init', 'dot_blog_register_menus' );

	/* Add widgets area */
	add_action( 'widgets_init', 'dot_blog_register_sidebars' );


	/*
	 * change the default.po file with poedit to create .mo file
	 * The .mo file must be named based on the locale exactly.
	 */
	load_theme_textdomain( 'dot-blog', get_template_directory() . '/languages' );

}

add_action( 'after_setup_theme', 'dot_blog_theme_setup' );


/**
 * Registers an editor stylesheet for the theme.
 */
function dot_blog_theme_add_editor_styles() {
	add_editor_style( array(
		'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700',
		'custom-editor-style.css'
	) );
}

add_action( 'admin_init', 'dot_blog_theme_add_editor_styles' );

/**
 * Add sidebars
 */
function dot_blog_register_sidebars() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'dot-blog' ),
			'id'            => 'dot-sidebar',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-head"><h3 class="widget-title">',
			'after_title'   => '</h3></header>'

		) );

	register_sidebar(
		array(
			'name'          => __( 'Sidebar Single', 'dot-blog' ),
			'id'            => 'dot-single-sidebar',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-head"><h3 class="widget-title">',
			'after_title'   => '</h3></header>'

		) );

	register_sidebar(
		array(
			'name'          => __( 'Sidebar Page', 'dot-blog' ),
			'id'            => 'dot-page-sidebar',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-head"><h3 class="widget-title">',
			'after_title'   => '</h3></header>'

		) );

	register_sidebar(
		array(
			'name'          => __( 'Contact Page Sidebar', 'dot-blog' ),
			'id'            => 'dot-page-contact',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-head"><h3 class="widget-title">',
			'after_title'   => '</h3></header>'
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Search Sidebar', 'dot-blog' ),
			'id'            => 'dot-search-sidebar',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-head"><h3 class="widget-title">',
			'after_title'   => '</h3></header>'

		) );

	register_sidebar(
		array(
			'name'          => __( 'Archive Sidebar', 'dot-blog' ),
			'id'            => 'dot-archive-sidebar',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-head"><h3 class="widget-title">',
			'after_title'   => '</h3></header>'

		) );

	register_sidebars(
		4,
		array(
			'name'          => __( 'Footer area %d', 'dot-blog' ),
			'id'            => 'dot-sidebar-footer',
			'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
}

/**
 * Register the navigation menua
 */
function dot_blog_register_menus() {
	register_nav_menu( 'main-nav', __( 'Main Navigation', 'dot-blog' ) );
}

/**
 * Needed scripts & styles
 */
function dot_blog_scripts_styles() {

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Needed scripts
	wp_enqueue_script( 'dot-blog-plugins', DOT_BLOG_THEME_JS_URL . 'plugins.js',
		array( 'jquery' ), '', true );
	wp_enqueue_script( 'dot-blog-js', DOT_BLOG_THEME_JS_URL . 'custom.js',
		array( 'jquery' ), '', true );

	/**
	 * Coming soon launch date
	 */
	$dot_blog_comming_soon_init = array(
		'coming_soon_date' => get_theme_mod( 'dot_blog_coming_soon_date',
			'10/10/2020' ),
	);
	wp_localize_script( 'dot-blog-js', 'dot_blog_comming_soon_init',
		$dot_blog_comming_soon_init );


	// Needed css files
	wp_enqueue_style( 'bootstrap', DOT_BLOG_THEME_STYLES_URL . 'bootstrap.min.css' );
	wp_enqueue_style( 'dot-blog-style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', DOT_BLOG_THEME_STYLES_URL . 'responsive.css' );
	wp_enqueue_style( 'slick', DOT_BLOG_THEME_STYLES_URL . 'slick.css' );
	wp_enqueue_style( 'font-awesome', DOT_BLOG_THEME_STYLES_URL . 'font-awesome.min.css' );

	// Google Fonts
	wp_enqueue_style( 'dot-blog-google-fonts',
		'//fonts.googleapis.com/css?family=Merriweather:300,400,700|Poppins:400,300,500,600,700' );


}

add_action( 'wp_enqueue_scripts', 'dot_blog_scripts_styles' );


/**
 * Category List
 */
function dot_blog_show_cat_list( $post_id ) {

	$categories     = get_the_category( $post_id );
	$categories_len = count( $categories );
	$i              = 0;
	foreach ( $categories as $category ) {
		$i ++;
		if ( $i == $categories_len ) {
			echo '<a href="' . get_category_link( $category->term_id ) . '">'
			     . esc_html( $category->cat_name ) . '</a> ';
		} else {
			echo '<a href="' . get_category_link( $category->term_id ) . '">'
			     . esc_html( $category->cat_name ) . '</a> , ';
		}
	}
}

/**
 * Category Name
 */
function dot_blog_show_cat_name( $post_id ) {

	$categories     = get_the_category( $post_id );
	$categories_len = count( $categories );
	$i              = 0;
	foreach ( $categories as $category ) {
		$i ++;
		if ( $i == $categories_len ) {
			echo esc_html( $category->cat_name );
		} else {
			echo esc_html( $category->cat_name ) . ' , ';
		}
	}
}

/**
 * Change default excerpt read more style
 */
if ( ! function_exists( 'dot_blog_excerpt_more' ) && ! is_admin() ) {
	function dot_blog_excerpt_more( $more ) {
		return '&hellip;';
	}

	add_filter( 'excerpt_more', 'dot_blog_excerpt_more' );
}


/**
 * Excerpt Length
 */
if ( ! function_exists( 'dot_blog_excerpt_length' ) && ! is_admin() ) {

	function dot_blog_excerpt_length( $length ) {
		return absint( get_theme_mod( 'dot_blog_excerpt_length', 20 ) );
	}

}
add_filter( 'excerpt_length', 'dot_blog_excerpt_length', 999 );

/**
 * Breadcrumb
 */
function dot_blog_breadcrumb() {
	echo '<a href="';
	echo esc_url( home_url( '/' ) );
	echo '">';
	_e( 'Home', 'dot-blog' );
	echo "</a>";
	if ( is_category() || is_single() ) {
		echo "<span>&#62;</span>";
		the_category( ' &bull; ' );
		if ( is_single() ) {
			echo "<span>&#62;</span>";
			the_title();
		}
	} elseif ( is_page() ) {
		echo "<span>&#62;</span>";
		echo the_title();
	} elseif ( is_author() ) {
		echo "<span>&#62;</span>" . esc_html__( 'Author', 'dot-blog' );
	} elseif ( is_tag() ) {
		echo "<span>&#62;</span>" . esc_html__( 'tag', 'dot-blog' );
	} elseif ( is_404() ) {
		echo "<span>&#62;</span>" . esc_html__( '404', 'dot-blog' );
	} elseif ( is_search() ) {
		echo "<span>&#62;</span>" . esc_html__( 'Search Results for...', 'dot-blog' );
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}

/**
 * Related Posts
 */
if ( ! function_exists( 'dot_blog_related_posts' ) ) {

	function dot_blog_related_posts() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => get_theme_mod( 'dot_blog_related_posts_count',
				2 )
		);
		// Related by categories
		if ( get_theme_mod( 'dot_blog_related_posts', 'categories' )
		     == 'categories'
		) {

			$cats = get_post_meta( $post->ID, 'related-cat', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID,
					array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'dot_blog_related_posts' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-tag', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID,
					array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query;

		return $query;
	}

}

/**
 * Comments template
 */
if ( ! function_exists( 'dot_blog_custom_comment' ) ) {
	function dot_blog_custom_comment( $comment, $args, $depth ) {
		?>
		<div class="commentlist-item">
		<div <?php comment_class( 'commentlist-item-wrap' ); ?> id="comment-<?php comment_ID() ?>">
			<div class="avatar-holder">
				<?php if ( $args['avatar_size'] != 0 ) {
					echo get_avatar( $comment, $args['avatar_size'], '', '',
						'' );
				} ?>
			</div>
			<div class="commentlist-holder">
				<p class="meta">
					<strong class="name"><?php ( $comment->comment_author_url == 'http://Website' || $comment->comment_author_url == '' ) ? comment_author() : comment_author_link(); ?></strong>
					<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
						<time datetime="<?php comment_date(); ?>"><?php printf( __( '%1$s - %2$s', 'dot-blog' ), get_comment_date( get_option( "date_format" ) ), get_comment_time() ) ?></time>
					</a>
				</p>


				<?php
				if ( $comment->comment_approved == '0' ) {
					echo '<strong><em>' . esc_html__( 'Your comment is awaiting moderation.', 'dot-blog' ) . '</em></strong>';
				}
				?>
				<?php comment_text() ?>
				<p><?php comment_reply_link( array_merge( $args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ) ?></p>
			</div>
		</div>
		<?php
	}

}

/**
 * Comment Form
 */
add_filter( 'comment_form_defaults', 'dot_blog_comment_form_defaults', 11 );
function dot_blog_comment_form_defaults( $defaults, $post_id = null ) {

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$defaults['label_submit'] = __( 'Submit', 'dot-blog' );
	$defaults['logged_in_as'] = '<p>' . sprintf(
			__( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>',
				'dot-blog' ),
			get_edit_user_link(),
			/* translators: %s: user name */
			esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.',
				'dot-blog' ), $user_identity ) ),
			$user_identity,
			wp_logout_url( apply_filters( 'the_permalink',
				get_permalink( $post_id ) ) )
		) . '</p>';

	$defaults['comment_notes_before'] = '';
	$defaults['title_reply_before']
	                                  = '<header class="header"><h3 id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after']    = '</h3><p>'
	                                    . __( 'it\'s easy to post a comment',
			'dot-blog' ) . '</p></header>';
	$defaults['comment_field']
	                                  = '<div class="comment-form-comment"><label for="comment">'
	                                    . _x( 'Comment *', 'noun', 'dot-blog' )
	                                    .
	                                    '</label><textarea placeholder="'
	                                    . __( 'your comment here', 'dot-blog' )
	                                    . '" id="comment" name="comment" cols="45" rows="8" aria-required="true">'
	                                    .
	                                    '</textarea></div>';

	return $defaults;
}

add_filter( 'comment_form_default_fields',
	'dot_blog_form_default_field_comment', 10 );
function dot_blog_form_default_field_comment( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );

	unset( $fields['author'] );
	unset( $fields['email'] );
	unset( $fields['url'] );

	$fields['author']
		= '<div class="wrap"><div class="comment-form-author"><label for="comment_author_name">'
		  . _x( 'Your name *', 'noun', 'dot-blog' )
		  . '</label><input name="author" placeholder="' . ( $req
			? esc_attr__( 'enter your name here *', 'dot-blog' ) : '' )
		  . '" type="text" value="' . esc_attr( $commenter['comment_author'] )
		  . '" size="30" id="comment_author_name" /></div>';
	$fields['email']
		= '<div class="comment-form-email"><label for="comment_author_email">'
		  . _x( 'Your email *', 'noun', 'dot-blog' )
		  . '</label><input name="email" placeholder="' . ( $req
			? esc_attr__( 'enter your email address *', 'dot-blog' ) : '' )
		  . '" type="text" value="'
		  . esc_attr( $commenter['comment_author_email'] )
		  . '" size="30" id="comment_author_email" /></div></div>';


	return $fields;
}

/**
 * Sidebar alignment
 */
if ( ! function_exists( 'dot_blog_the_sidebar_alignment' ) ) {
	function dot_blog_the_sidebar_alignment( $type ) {

		$sidebar_alignment = get_theme_mod( 'dot_blog_sidebar_alignment',
			'right_sidebar' );

		if ( $sidebar_alignment == 'right_sidebar' ) {

			switch ( $type ) {
				case 'content':
					return 'col-xs-12 col-md-8';
					break;

				case 'sidebar':
					return 'col-xs-12 col-md-4';
					break;
			}

		} elseif ( $sidebar_alignment == 'left_sidebar' ) {

			switch ( $type ) {
				case 'content':
					return 'col-xs-12 col-md-8 pull-right';
					break;

				case 'sidebar':
					return 'col-xs-12 col-md-4 pull-left';
					break;
			}

		} else {

			switch ( $type ) {
				case 'content':
					return 'col-xs-12 col-md-12';
					break;

				case 'sidebar':
					return 'hidden';
					break;
			}

		}
	}
}


/**
 * Socials
 */
if ( ! function_exists( 'dot_blog_site_socials' ) ) {
	function dot_blog_site_socials() {

		$social_blank = ( get_theme_mod( 'dot_blog_social_blank', true ) === true )
			? '_blank' : '_self';

		$facebook_url  = esc_url( get_theme_mod( 'dot_blog_social_facebook_link' ) );
		$twitter_url   = esc_url( get_theme_mod( 'dot_blog_social_twitter_link' ) );
		$google_url    = esc_url( get_theme_mod( 'dot_blog_social_google_plus_link' ) );
		$linkenin_url  = esc_url( get_theme_mod( 'dot_blog_social_linkedin_link' ) );
		$pinterest_url = esc_url( get_theme_mod( 'dot_blog_social_pinterest_link' ) );

		if ( $facebook_url != '' ) {
			echo '<li><a target = "' . $social_blank . '" href = "'
			     . $facebook_url
			     . '"><span class="icon ico-facebook" ></span></a></li>';
		}
		if ( $twitter_url != '' ) {
			echo '<li><a target = "' . $social_blank . '" href = "'
			     . $twitter_url
			     . '" ><span class="icon ico-twitter" ></span></a></li>';
		}
		if ( $google_url != '' ) {
			echo '<li><a target = "' . $social_blank . '" href = "'
			     . $google_url
			     . '" ><span class="icon ico-google-plus" ></span></a></li>';
		}
		if ( $linkenin_url != '' ) {
			echo '<li><a target = "' . $social_blank . '" href = "'
			     . $linkenin_url
			     . '" ><span class="icon ico-linkedin" ></span></a></li>';
		}
		if ( $pinterest_url != '' ) {
			echo '<li><a target = "' . $social_blank . '" href = "'
			     . $pinterest_url
			     . '" ><span class="icon ico-pinterest" ></span></a></li>';
		}
	}
}

if ( ! function_exists( 'dot_blog_the_custom_logo' ) ) {
	function dot_blog_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
}
