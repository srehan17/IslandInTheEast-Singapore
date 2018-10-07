<?php

/**
 * Widget : Dot_Blog_Posts_Tab
 *
 */
class Dot_Blog_Posts_Tab extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'recent-posts-widget version-ii',
			'description'                 => __( 'Your site&#8217;s recent and popular Posts.', 'dot-blog' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'dot-blog-posts-tab', __( 'Dot - Tab ( recent/popular posts )', 'dot-blog' ), $widget_ops );
		$this->alt_option_name = 'dot_blog_posts_tab';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$recent_title = ( ! empty( $instance['recent_title'] ) ) ? $instance['recent_title'] : __( 'Recent Posts', 'dot-blog' );
		$pop_title    = ( ! empty( $instance['pop_title'] ) ) ? $instance['pop_title'] : __( 'Popular Posts', 'dot-blog' );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		$p = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'orderby'             => 'comment_count',
		) ) );

			?>
			<?php echo $args['before_widget']; ?>
			<header class="tab-head">
				<h3><a class="active" href="#tab1"><?php echo esc_html($recent_title); ?></a></h3>
				<h3><a href="#tab2"><?php echo esc_html($pop_title); ?></a></h3>
			</header>
			<div class="tab-content">
				<div id="tab1">
					<ul>
						<?php if ( $r->have_posts() ) : while ( $r->have_posts() ) : $r->the_post(); ?>
							<li>
								<?php if( has_post_thumbnail() ) : ?>
									<div class="alignleft"><?php the_post_thumbnail( 'dot-blog-small-thumbnail' ); ?></div>
								<?php endif; ?>
								<div class="descr">
									<h4><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h4>
									<span class="post-tag">
										<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><?php echo get_the_date(); ?></time>
									</span>
								</div>
							</li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
				<div id="tab2">
					<ul>
						<?php if ( $p->have_posts() ) : while ( $p->have_posts() ) : $p->the_post(); ?>
							<li>
								<?php if( has_post_thumbnail() ) : ?>
									<div class="alignleft"><?php the_post_thumbnail( 'dot-blog-small-thumbnail' ); ?></div>
								<?php endif; ?>
								<div class="descr">
									<h4><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h4>
									<span class="post-tag">
										<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><?php echo get_the_date(); ?></time>
									</span>
								</div>
							</li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>
			<?php echo $args['after_widget']; ?>
			<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['recent_title'] = sanitize_text_field( $new_instance['recent_title'] );
		$instance['pop_title']    = sanitize_text_field( $new_instance['pop_title'] );
		$instance['number']       = (int) $new_instance['number'];

		return $instance;
	}

	public function form( $instance ) {
		$recent_title = isset( $instance['recent_title'] ) ? esc_attr( $instance['recent_title'] ) : '';
		$pop_title    = isset( $instance['pop_title'] ) ? esc_attr( $instance['pop_title'] ) : '';
		$number       = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
		<p><label for="<?php echo $this->get_field_id( 'recent_title' ); ?>"><?php esc_html_e( 'Recent Tab Title:', 'dot-blog' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'recent_title' ); ?>"
			       name="<?php echo $this->get_field_name( 'recent_title' ); ?>" type="text"
			       value="<?php echo esc_html($recent_title); ?>"/>
		</p>

		<p><label for="<?php echo $this->get_field_id( 'pop_title' ); ?>"><?php esc_html_e( 'Popular Tab Title:', 'dot-blog' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'pop_title' ); ?>"
			       name="<?php echo $this->get_field_name( 'pop_title' ); ?>" type="text"
			       value="<?php echo esc_html($pop_title); ?>"/>
		</p>

		<p><label
				for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'dot-blog' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>"
			       name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1"
			       value="<?php echo esc_attr($number); ?>" size="3"/></p>

		<?php
	}
}
