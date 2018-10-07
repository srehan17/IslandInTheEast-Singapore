<?php if( is_single() ) : ?>

	<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><span class="time-over"><?php the_time( get_option( 'date_format' ) ); ?> - <?php dot_blog_show_cat_list( get_the_ID() ) ?></span></time>
	<h2><?php the_title(); ?></h2>
	<div class="text-left post-content">
		<?php the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dot-blog' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'dot-blog' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>

	</div>
	
<?php else: ?>

	<div class="text-wrap">
		<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?> - <?php dot_blog_show_cat_list( get_the_ID() ) ?></time>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
		<a class="link-more" href="<?php the_permalink(); ?>"><?php esc_html_e('read more', 'dot-blog') ?></a>
	</div>


<?php endif; ?>



