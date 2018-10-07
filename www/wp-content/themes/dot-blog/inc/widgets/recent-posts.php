<?php

/**
 * Widget : Dot_Blog_Recent_Posts
 *
 */
class Dot_Blog_Recent_Posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'recent-posts-widget',
			'description'                 => __( 'Your site&#8217;s most recent Posts.', 'dot-blog' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'dot-blog-recent-posts', __( 'Dot - Recent Posts', 'dot-blog' ), $widget_ops );
		$this->alt_option_name = 'dot_blog_recent_posts';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'dot-blog' );

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_cats = isset( $instance['show_cats'] ) ? $instance['show_cats'] : false;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

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
							<?php if ( $show_date ) : ?>
								<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><?php echo get_the_date(); ?></time>
							<?php endif; ?>
								<?php if ( $show_cats ) : ?>
									<strong class="tag hot"><?php dot_blog_show_cat_name( get_the_ID() ); ?></strong>
								<?php endif; ?>
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
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_cats'] = isset( $new_instance['show_cats'] ) ? (bool) $new_instance['show_cats'] : false;

		return $instance;
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_cats = isset( $instance['show_cats'] ) ? (bool) $instance['show_cats'] : false;
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'dot-blog' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>"/></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'dot-blog' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1"
			       value="<?php echo esc_attr($number); ?>" size="3"/></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>"/>
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Display post date?', 'dot-blog' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_cats ); ?> id="<?php echo $this->get_field_id( 'show_cats' ); ?>" name="<?php echo $this->get_field_name( 'show_cats' ); ?>"/>
			<label for="<?php echo $this->get_field_id( 'show_cats' ); ?>"><?php esc_html_e( 'Display post cat?', 'dot-blog' ); ?></label></p>
		<?php
	}
}
