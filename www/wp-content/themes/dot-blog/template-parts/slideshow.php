<?php
$cat_id    = get_theme_mod( 'dot_blog_home_slider_cat' , 1);
$cat_desc = category_description( $cat_id );

$args    = array(
	'post_type'      => 'post',
	'cat'            => $cat_id,
	'posts_per_page' => get_theme_mod( 'dot_blog_slider_count', 10 ),
);
$p_query = new WP_Query( $args );
?>
<div class="home-box">
	<section class="slideshow">
		<?php
		if ( $p_query->have_posts() ):
			while ( $p_query->have_posts() ): $p_query->the_post();
				?>
				<!-- slide of the page -->
				<div class="slide" style="background-image: url(<?php the_post_thumbnail_url( 'full' ) ?>);">
					<div class="align-holder">
						<div class="align">
							<div class="container">
								<div class="row">
									<header class="header col-xs-12 col-sm-8 col-sm-offset-2 text-center">
										<div class="title-box"><strong class="title"><?php dot_blog_show_cat_name( get_the_ID() ); ?></strong>
										</div>
										<?php if ( ! empty( $cat_desc ) )
											echo '<h1>' . esc_html(strip_tags($cat_desc)) . '</h1>' ?>
										<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'continue reading', 'dot-blog' ); ?></a>
									</header>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- slide of the page end -->
				<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</section>

	<!-- switcher of the page -->
	<div class="switcher">
		<div class="center-block">
			<!-- switcher mask of the page -->
			<div class="switcher-mask">
				<!-- switcher slide of the page -->
				<?php
				if ( $p_query->have_posts() ):
					while ( $p_query->have_posts() ): $p_query->the_post();
						?>
						<div class="slide">
							<div class="switcher-slide">
								<div class="slide-holder">
									<?php if( has_post_thumbnail() ) : ?>
										<div class="img-holder"><?php the_post_thumbnail( 'dot-blog-post-small' ); ?></div>
									<?php endif; ?>
									<h2><a href="<?php the_permalink(); ?>"><?php
											$title = get_the_title();
											if(strlen($title) > 50){
												$title = wp_trim_words($title, 10);
											}
											echo esc_html($title); ?></a></h2>
									<time
										datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
								</div>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
				<!-- switcher slide of the page end -->
			</div>
			<!-- switcher mask of the page end -->
		</div>
	</div>
	<!-- slide of the page end -->
</div>
<!-- twocolumns of the page -->