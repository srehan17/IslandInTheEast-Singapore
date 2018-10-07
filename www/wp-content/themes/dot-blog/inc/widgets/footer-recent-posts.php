<?php

/**
 * Widget : Dot_Blog_Footer_Recent_Posts
 *
 */
class Dot_Blog_Footer_Recent_Posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'footer-recent-posts-widget',
			'description'                 => __( 'Your site&#8217;s Recent/Popular Posts.', 'dot-blog' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'dot-blog-footer-recent-posts', __( 'Dot - Footer Popular/Recent Posts', 'dot-blog' ), $widget_ops );
		$this->alt_option_name = 'dot_blog_footer_recent_posts';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$popular_posts = isset( $instance['popular_posts'] ) ? $instance['popular_posts'] : false;

		if( ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			if( $popular_posts === true ) {
				$title = __( 'Popular Posts', 'dot-blog' );
			} else {
				$title = __( 'Recent Posts', 'dot-blog' );
			}
		}

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );


		if ( ! $number ) {
			$number = 5;
		}

		if( $popular_posts === true ) {

			$r = new WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'orderby'             => 'comment_count',
			) ) );

		} else {

			$r = new WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
			) ) );

		}


		if ( $r->have_posts() ) :
			?>
			<?php echo $args['before_widget']; ?>
			<?php if ( $title ) {
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		} ?>
			<ol>
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
					<li>
						<h4>
							<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
						</h4>
						<span class="post-tag">
							<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><?php echo get_the_date(); ?></time>
						</span>
					</li>
				<?php endwhile; ?>
			</ol>
			<?php echo $args['after_widget']; ?>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;
	}

	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['popular_posts'] = isset( $new_instance['popular_posts'] ) ? (bool) $new_instance['popular_posts'] : false;


		return $instance;
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$popular_posts = isset( $instance['popular_posts'] ) ? (bool) $instance['popular_posts'] : false;

		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'dot-blog' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
		</p>

		<p><label
				for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'dot-blog' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>"
			       name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1"
			       value="<?php echo esc_attr($number); ?>" size="3"/></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $popular_posts ); ?> id="<?php echo $this->get_field_id( 'popular_posts' ); ?>" name="<?php echo $this->get_field_name( 'popular_posts' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'popular_posts' ); ?>"><?php esc_html_e( 'Display popular posts?', 'dot-blog' ); ?></label></p>
		<?php
	}
}
