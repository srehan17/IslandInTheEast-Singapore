<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div class="loader-holder">
	<div class="loader">
		<div class="side"></div>
		<div class="side"></div>
		<div class="side"></div>
		<div class="side"></div>
		<div class="side"></div>
		<div class="side"></div>
		<div class="side"></div>
		<div class="side"></div>
	</div>
</div>
<?php
get_template_part( 'template-parts/header', 'home' );
if ( is_front_page() && get_theme_mod( "dot_blog_slider_status", false )  ) {
	get_template_part( 'template-parts/slideshow' );

} else {

	get_template_part( 'template-parts/header', 'single' );
}


