<?php
get_header();
?>
	<!-- main of the page -->
	<main id="main">
		<div id="twocolumns">
			<div class="container">
				<div class="row">
					<!-- Content of the page -->
					<div id="content" class="<?php echo dot_blog_the_sidebar_alignment('content'); ?>">
						<?php
						if ( have_posts() ) :
							get_template_part( 'template-parts/home', 'posts' );

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'dot-blog' ),
								'next_text'          => __( 'Next page', 'dot-blog' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dot-blog' ) . ' </span>',
							) );
						?>

						<?php
						else :
							get_template_part('template-parts/content','noun');
						endif; ?>
					</div>
					<!-- Content of the page end -->
					<!-- Sidebar of the page -->
					<aside id="sidebar" class="<?php echo dot_blog_the_sidebar_alignment('sidebar'); ?>">
						<?php dynamic_sidebar( 'dot-sidebar' ); ?>
					</aside>
					<!-- Sidebar of the page end -->
				</div>
			</div>
		</div>
		<!-- twocolumns of the page end -->
	</main>
	<!-- main of the page end -->
<?php
get_footer();
