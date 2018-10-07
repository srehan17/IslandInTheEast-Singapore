<?php
get_header();
$single_class = 'post-block single-post';
?>
	<!-- Container of the page -->
	<div class="container">
		<div class="row">
			<!-- Content of the page -->
			<article id="content" class="<?php echo dot_blog_the_sidebar_alignment('content'); ?>">
				<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<!-- Post Block of the page -->
					<div id="post-<?php the_ID(); ?>" <?php post_class( $single_class) ?>>
						<div class="post-holder">
							<?php get_template_part( 'template-parts/format', 'standard' ); ?>
						</div>
						<footer class="post-footer">
							<strong class="text"><span class="icon ico-user"></span><?php the_author_posts_link(); ?></strong>
							<strong class="text comment-count"><span class="icon ico-comment"></span><a href="<?php echo get_comments_link(); ?>"><?php comments_number( '0', '1',
										'%' ); ?><?php esc_html_e( ' Comments', 'dot-blog' ); ?></a></strong>
							<?php if( has_tag() ) : ?>
								<strong class="text"><span class="icon ico-tag"></span><?php the_tags( esc_html__('Tags: ', 'dot-blog'), ', ', '' ); ?> </strong>
							<?php endif; ?>
						</footer>
						<?php
						if ( is_singular() ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="screen-reader-text">' . __( 'Next post:', 'dot-blog' ) . '</span> ' .
								               '<span class="post-title">%title</span> ' .
								               '<span class="meta-nav meta-nav-right" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>',
								'prev_text' => '<span class="meta-nav meta-nav-left" aria-hidden="true"><i class="fa fa-chevron-left"></i></span> ' .
								               '<span class="screen-reader-text">' . __( 'Previous post:', 'dot-blog' ) . '</span> ' .
								               '<span class="post-title">%title</span>',
							) );
						}
						?>

					</div>
					<!-- Post Block of the page end -->
				<?php endwhile; ?>
				<!-- Widget of the page -->
				<?php
				$cur_author = get_userdata( get_the_author_meta( 'ID' ) );
				if ( get_the_author_meta( 'description' ) != '' ):
				?>
				<div class="widget widget-block">
					<div class="alignleft">
						<a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>"><?php echo get_avatar( $cur_author->ID, 134 ); ?></a>
					</div>
					<div class="text-holder">
						<header>
							<h2>
								<a href="<?php echo esc_url( get_author_posts_url( $cur_author->ID ) ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a>
							</h2>
							<?php if ( '' != get_the_author_meta( 'user_url' ) ) : ?>
								<span class="subtitle">
									<a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>"><?php echo get_the_author_meta( 'user_url' ); ?></a>
								</span>
							<?php endif; ?>
						</header>
						<p><?php echo nl2br( get_the_author_meta( 'description' ) ); ?></p>
					</div>
				</div>
				<?php endif;?>
				<!-- Widget of the page end -->

				<?php
				$related_posts = dot_blog_related_posts();
				if ( $related_posts->have_posts() ): ?>
						<!-- Post Block of the page -->
						<section class="posts-blocks extra no-print">
							<header class="header">
								<h2><?php esc_html_e('Related Posts','dot-blog') ?></h2>
								<p><?php esc_html_e('You may like these post too', 'dot-blog'); ?></p>
							</header>
							<?php
							while ( $related_posts->have_posts() ) : $related_posts->the_post();
							?>
							<div class="post-block single-post-block">
								<div class="post-holder">
									<div class="img-holder">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('dot-blog-post-large'); ?></a>
									</div>
									<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><span class="time-over"><?php the_time( get_option( 'date_format' ) ); ?> - <?php dot_blog_show_cat_list( get_the_ID() ) ?></span></time>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>
							</div>
							<?php
							endwhile;
							?>
						</section>
						<!-- Post Block of the page end -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>

			</article>
			<?php endif; ?>
			<!-- Content of the page end -->
			<!-- Sidebar of the page -->
			<aside id="sidebar" class="<?php echo dot_blog_the_sidebar_alignment('sidebar'); ?>">
				<?php
				if ( is_active_sidebar('dot-single-sidebar') ) {
					dynamic_sidebar( 'dot-single-sidebar' );
				} else {
					dynamic_sidebar( 'dot-sidebar' );
				}
				?>
			</aside>
			<!-- Sidebar of the page end -->
		</div>
	</div>
</main>
<?php
get_footer();
