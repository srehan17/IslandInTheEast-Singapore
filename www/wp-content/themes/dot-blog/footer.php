<?php if ( get_theme_mod( 'dot_blog_social_status', 'off' ) == 'on' ): ?>
	<!-- Socials of the page -->
	<?php
	$socials_counter = 0;
	if ( get_theme_mod( 'dot_blog_social_facebook_link', '' ) != '' ) {
		$socials_counter ++;
	}
	if ( get_theme_mod( 'dot_blog_social_twitter_link', '' ) != '' ) {
		$socials_counter ++;
	}
	if ( get_theme_mod( 'dot_blog_social_google_plus_link', '' ) != '' ) {
		$socials_counter ++;
	}
	if ( get_theme_mod( 'dot_blog_social_linkedin_link', '' ) != '' ) {
		$socials_counter ++;
	}
	if ( get_theme_mod( 'dot_blog_social_pinterest_link', '' ) != '' ) {
		$socials_counter ++;
	}

	if( $socials_counter == 2 ) {
		$socials_grid_class = 'col-md-6 col-sm-12 col-xs-12';
	} elseif ( $socials_counter == 3 ) {
		$socials_grid_class = 'col-md-4 col-sm-12 col-xs-12';
	} elseif ( $socials_counter == 4 ) {
		$socials_grid_class = 'col-md-3 col-sm-6 col-xs-12';
	} elseif ( $socials_counter == 5 ) {
		$socials_grid_class = 'col-md-5 col-sm-12 col-xs-12';
	} else {
		$socials_grid_class = 'col-md-12';
	}
	?>
	<aside class="socials container-fluid">
		<div class="row">
			<?php if ( get_theme_mod( 'dot_blog_social_facebook_link', '' ) != '' ) : ?>
				<a class="facebook <?php echo esc_attr($socials_grid_class); ?>"
				   target="<?php echo ( get_theme_mod( 'dot_blog_social_blank' ) === true ) ? '_blank' : '_self'; ?>"
				   href="<?php echo esc_url(get_theme_mod( 'dot_blog_social_facebook_link', '' )); ?>">
					<span class="icon ico-facebook"></span>
					<span class="txt"><?php esc_html_e( 'FACEBOOK', 'dot-blog' ); ?></span>
				</a>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'dot_blog_social_twitter_link', '' ) != '' ) : ?>
				<a class="twitter <?php echo esc_attr($socials_grid_class); ?>"
				   target="<?php echo ( get_theme_mod( 'dot_blog_social_blank' ) === true ) ? '_blank' : '_self'; ?>"
				   href="<?php echo esc_url(get_theme_mod( 'dot_blog_social_twitter_link', '' )); ?>">
					<span class="icon ico-twitter"></span>
					<span class="txt"><?php esc_html_e( 'TWITTER', 'dot-blog' ); ?></span>
				</a>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'dot_blog_social_google_plus_link', '' ) != '' ) : ?>
				<a class="google <?php echo esc_attr($socials_grid_class); ?>"
				   target="<?php echo ( get_theme_mod( 'dot_blog_social_blank' ) === true ) ? '_blank' : '_self'; ?>"
				   href="<?php echo esc_url(get_theme_mod( 'dot_blog_social_google_plus_link', '' )); ?>">
					<span class="icon ico-google-plus"></span>
					<span class="txt"><?php esc_html_e( 'GOOGLE+', 'dot-blog' ); ?></span>
				</a>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'dot_blog_social_linkedin_link', '' ) != '' ) : ?>
				<a class="linkedin <?php echo esc_attr($socials_grid_class); ?>"
				   target="<?php echo ( get_theme_mod( 'dot_blog_social_blank' ) === true ) ? '_blank' : '_self'; ?>"
				   href="<?php echo esc_url(get_theme_mod( 'dot_blog_social_linkedin_link', '' )); ?>">
					<span class="icon ico-linkedin"></span>
					<span class="txt"><?php esc_html_e( 'LINKEDIN', 'dot-blog' ); ?></span>
				</a>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'dot_blog_social_pinterest_link', '' ) != '' ) : ?>
				<a class="pinterest <?php echo esc_attr($socials_grid_class); ?>"
				   target="<?php echo ( get_theme_mod( 'dot_blog_social_blank' ) === true ) ? '_blank' : '_self'; ?>"
				   href="<?php echo esc_url(get_theme_mod( 'dot_blog_social_pinterest_link', '' )); ?>">
					<span class="icon ico-pinterest"></span>
					<span class="txt"><?php esc_html_e( 'PINTEREST', 'dot-blog' ); ?></span>
				</a>
			<?php endif; ?>
		</div>
	</aside>
	<!-- Socials of the page end -->
<?php endif; ?>
<!-- aside of the page -->
<aside class="aside footer-area clearfix footer-dark">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'dot-sidebar-footer' ) ): ?>
				<div class="col col-md-3 col-sm-12">
					<?php dynamic_sidebar( 'dot-sidebar-footer' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'dot-sidebar-footer-2' ) ): ?>
				<div class="col col-md-3 col-sm-12">
					<?php dynamic_sidebar( 'dot-sidebar-footer-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'dot-sidebar-footer-3' ) ): ?>
				<div class="col col-md-3 col-sm-12">
					<?php dynamic_sidebar( 'dot-sidebar-footer-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'dot-sidebar-footer-4' ) ): ?>
				<div class="col col-md-3 col-sm-12">
					<?php dynamic_sidebar( 'dot-sidebar-footer-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</aside>
<!-- aside of the page end -->

<!-- footer of the page -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">

				<?php
				// Get the footer copyright text
				$footer_copyright_text = get_theme_mod( 'dot_blog_footer_copyright_text', '');
				echo wp_kses_post($footer_copyright_text) . sprintf( esc_html__( ' Theme by %1$s.', 'dot-blog' ), '<a href="https://highthemes.com/themes/dot-blog/" rel="nofollow">'.esc_html__('HighThemes','dot-blog').'</a>' );
				?>

			</div>
			<div class="col-xs-12 col-sm-6">
				<!-- Social Network of the page -->
				<ul class="social-networks">
					<?php dot_blog_site_socials(); ?>
				</ul>
				<!-- Social Network of the page end -->
			</div>
		</div>
	</div>
</footer>
<!-- footer of the page end -->
<!-- Back Top of the page -->
<span id="back-top" class="fa fa-angle-up"></span>
</div>
<?php wp_footer(); ?>
</body>
</html>