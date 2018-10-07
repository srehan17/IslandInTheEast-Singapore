<?php
/**
 * Template Name: Contact
 */
get_header();
?>
	<div class="page-wrap">
		<div class="container">
			<div class="row">
				<div id="page-<?php the_ID(); ?>" <?php post_class(dot_blog_the_sidebar_alignment('content')); ?>>
					<section class="page-content">
						<?php
						while ( have_posts() ) : the_post();

							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'dot-blog' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'dot-blog' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
							
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}

						endwhile;
						?>
					</section>
				</div>
				<div class="<?php echo dot_blog_the_sidebar_alignment('sidebar'); ?>">
					<?php
					if ( is_active_sidebar('dot-page-contact') ) {
						dynamic_sidebar( 'dot-page-contact' );
					} else {
						dynamic_sidebar( 'dot-sidebar' );
					}
					?>
				</div>
			</div>
		</div>
	</div>
	</main>
<?php
get_footer();
