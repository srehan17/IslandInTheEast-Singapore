<!-- main container of all the page elements -->
<div id="wrapper">
	<!-- header of the page -->
	<header id="header" class="version-i">
			<div class="container">
				<div class="row">
					<!-- logo of the page -->
					<div class="site-branding">
						<?php
						if ( get_theme_mod( 'custom_logo' ) == '' ) {
							if ( get_custom_logo() == "" || is_customize_preview() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							endif;
						} else {
							dot_blog_the_custom_logo();
						}
						?>

					</div><!-- .site-branding -->

					<a id="aside-menu-btn" class="pull-right" href="#sidr"><i class="fa fa-reorder"></i></a>

					<div class="nav-holder">
						<nav id="navigation-sf">
							<?php
							wp_nav_menu( array(
								'theme_location'  => 'main-nav',
								'container'       => 'div',
								'container_class' => 'main-nav',
								'menu_class'      => 'sf-menu',
								'echo'            => true,

							) );
							?>
						</nav>
					</div>

				</div>
			</div>
	</header>
	<!-- header of the page end -->