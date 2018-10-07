<?php $header_image = get_header_image(); ?>
<!-- Main of the page -->
<main id="main">
	<!-- Page Head of the page -->
	<header class="page-head" <?php echo 'style="background-image: url(' . esc_url( $header_image ) . ');"' ?>>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if ( is_404() ) : ?>
						<h1><?php esc_html_e( '404 Error', 'dot-blog' ); ?></h1>
					<?php elseif ( is_author() ) : ?>
						<h1><?php esc_html_e( 'Author Page', 'dot-blog' ); ?></h1>
					<?php elseif ( is_tag() ) : ?>
						<h1><?php esc_html_e( 'Tag Page', 'dot-blog' ); ?></h1>
					<?php elseif ( is_archive() ) : ?>
						<h1><?php esc_html_e( 'Archive Page', 'dot-blog' ); ?></h1>
					<?php elseif ( is_search() ) : ?>
						<h1><?php esc_html_e( 'Search Results', 'dot-blog' ); ?></h1>
					<?php elseif ( is_page() ) : ?>
						<h1><?php the_title(); ?></h1>
					<?php else : ?>
						<h1><?php esc_html_e( 'Blog', 'dot-blog' ); ?></h1>
					<?php endif; ?>
					<div class="breadcrumb"><?php dot_blog_breadcrumb(); ?></div>
				</div>
			</div>
		</div>
	</header>
	<!-- Page Head of the page end -->