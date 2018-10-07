<?php if ( is_search() ) : ?>
	<div class="no-result no-search-result col-md-12">
		<h3><?php esc_html_e( 'Nothing Found', 'dot-blog' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dot-blog' ); ?></p>
		<div class="widget widget_search"><?php get_search_form(); ?></div>
	</div><!-- .post-area  -->
<?php else : ?>
	<div class="no-result col-md-12">
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'dot-blog' ); ?></p>
		<div class="widget widget_search"><?php get_search_form(); ?></div>
	</div><!-- .post-area  -->
<?php endif; ?>
