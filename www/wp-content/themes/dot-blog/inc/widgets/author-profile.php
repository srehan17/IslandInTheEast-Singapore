<?php

/**
 * Widget : Dot_Blog_Author_Profile
 *
 */
class Dot_Blog_Author_Profile extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'profile-widget version-ii hidden-sm hidden-sx',
			'description'                 => __( 'Author profile brief widget used in single post sidebar', 'dot-blog' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'dot-blog-author-profile', __( 'Dot - Author Profile ( Light )', 'dot-blog' ), $widget_ops );
		$this->alt_option_name = 'dot_blog_author_profile';

	}


	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$cur_author = get_userdata( get_the_author_meta( 'ID' ) );

		$author_name = $cur_author->first_name . ' ' . $cur_author->last_name;
		$author_bio  = $cur_author->user_description;
		?>
		<?php echo $args['before_widget']; ?>
		<div class="profile-pic">
			<a href="<?php echo esc_url( get_author_posts_url( $cur_author->ID ) ); ?>"><?php echo get_avatar( $cur_author->ID, 179 ); ?></a>
		</div>
		<h3><a href="<?php echo esc_url( get_author_posts_url( $cur_author->ID ) ); ?>"><?php echo esc_html( $author_name ); ?></a></h3>
		<p><?php echo wp_kses_post($author_bio); ?></p>
		
		<?php echo $args['after_widget']; ?>
		<?php
	}

}
