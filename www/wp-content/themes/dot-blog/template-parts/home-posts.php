<!-- cols holder of the page -->
<div class="cols-holder">
	<?php
	if ( have_posts() ):
		$i          = 1;
		$z          = 0;
		while ( have_posts() ): the_post();

			if ( $i == 2 ) {
				$z          = 2;
			} elseif ( $i - $z == 3 ) {
				$i          = $z;
			} 

			$post_clases = ( $i % 3 == 0 ) ? 'post fluid '  : 'post text-left ' ;
			?>
			<!-- post of the page -->
			<article
				id="post-<?php the_ID(); ?>" <?php post_class($post_clases); ?>>
				<?php get_template_part( 'template-parts/format', 'standard' ); ?>
			</article>
			<!-- post of the page end -->
			<?php
			$i ++;
		endwhile;
	endif;
	?>
</div>
<!-- cols-holder of the page end -->