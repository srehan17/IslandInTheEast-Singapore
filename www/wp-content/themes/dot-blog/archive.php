<?php
get_header();
?>

	<!-- main of the page -->
	<main id="main">
		<div id="twocolumns">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="main-header">
							<?php the_archive_title( '<strong class="title">', '</strong>' ); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Content of the page -->
					<div id="content" class="<?php echo dot_blog_the_sidebar_alignment( 'content' ); ?>">
						<?php get_template_part( 'template-parts/home', 'posts' ); ?>

						<?php
						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'dot-blog' ),
							'next_text'          => __( 'Next page', 'dot-blog' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dot-blog' ) . ' </span>',
						) );
						?>
					</div>
					<!-- Content of the page end -->
					<!-- Sidebar of the page -->
					<aside id="sidebar" class="<?php echo dot_blog_the_sidebar_alignment( 'sidebar' ); ?>">
						<?php
						if ( is_active_sidebar('dot-archive-sidebar') ) {
							dynamic_sidebar( 'dot-archive-sidebar' );
						} else {
							dynamic_sidebar( 'dot-sidebar' );
						}
						?>
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
