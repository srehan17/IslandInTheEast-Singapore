<?php
get_header();
?>

	<!-- Page Error of the page -->
	<div class="page-error container">
		<div class="row">
			<div class="heading-holder col-xs-12 text-center">
				<h1><?php esc_html_e('4', 'dot-blog'); ?><span class="text-color"><?php esc_html_e('0', 'dot-blog'); ?></span><?php esc_html_e('4', 'dot-blog'); ?> <br><span class="text-small"><?php esc_html_e('error', 'dot-blog'); ?></span></h1>
				<p><?php esc_html_e('The page your are looking for cannot be found.', 'dot-blog'); ?></p>
				<strong class="text-block"><?php esc_html_e('Try Serching here....', 'dot-blog'); ?></strong>
				<div class="widget widget_search">
					<?php get_search_form(); ?>
				</div>
				<strong class="text-block"><?php esc_html_e('or','dot-blog'); ?></strong>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default"><?php esc_html_e('Go back to home', 'dot-blog'); ?></a>
			</div>
		</div>
	</div>
	<!-- Page Error of the page end -->

<?php
get_footer();
