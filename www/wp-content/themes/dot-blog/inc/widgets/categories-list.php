<?php

/**
 * Widget : Dot_Blog_Categories_List
 */
class Dot_Blog_Categories_List extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_categories version-ii',
			'description'                 => __( 'Categories List', 'dot-blog' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'dot-blog-categories-list', __( 'Dot - Categories', 'dot-blog' ), $widget_ops );
	}

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories', 'dot-blog' ) : $instance['title'], $instance, $this->id_base );

		$c = ! empty( $instance['count'] ) ? '1' : '0';

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}

		$cat_args = array(
			'orderby'      => 'name',
			'show_count'   => $c,
			'hierarchical' => false,
		);

		?>
		<ul>
			<?php
			$cat_args['title_li'] = '';
			wp_list_categories( apply_filters( 'widget_categories_args', $cat_args ) );
			?>
		</ul>
		<?php


		echo $args['after_widget'];
	}


	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['count'] = ! empty( $new_instance['count'] ) ? 1 : 0;

		return $instance;
	}


	public function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title    = sanitize_text_field( $instance['title'] );
		$count    = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'dot-blog' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>

		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'count' ); ?>"
			       name="<?php echo $this->get_field_name( 'count' ); ?>"<?php checked( $count ); ?> />
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php esc_html_e( 'Show post counts', 'dot-blog' ); ?></label><br/>
		</p>
		<?php
	}

}
