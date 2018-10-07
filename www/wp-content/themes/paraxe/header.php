<?php
/**
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Paraxe
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php global $option_setting; ?>

<div id="top-bar">
	<div class="container">
			<div class="col-md-6 top-navigation">
				<?php  if (has_nav_menu('top'))
						 wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
			</div>
			
		
			<div id="social-icons" class="col-md-6">
				<?php get_template_part('social', 'tc'); ?>
			</div>
					
	</div><!--.container-->
</div><!--#top-bar-->
<div id="page" class="hfeed site">
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="site-branding col-lg-4 col-md-12">
				<?php if ( get_theme_mod('paraxe_logo') != "" ) : ?>
				<div id="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_theme_mod('paraxe_logo'); ?>"></a>
				</div>
				<?php endif; ?>
				<div id="text-title-desc">
					<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>	
		</div>
	
	
	<div id="top-nav" class="col-lg-8 col-md-12">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'paraxe' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'paraxe' ); ?></a>
				
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->	
	</div
	</div><!--.container-->
		
</header><!-- #masthead -->


	<?php get_template_part('parallax'); ?>
	<?php get_template_part('slider') ?>
	<?php get_template_part('showcase') ?>
	
	<div id="content" class="site-content container">