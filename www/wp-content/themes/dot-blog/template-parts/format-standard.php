<?php
if( has_post_thumbnail() ):
	$post_thumbnail = is_single() ? 'dot-blog-post-large' : 'dot-blog-post-medium';
?>
	<div class="img-holder">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($post_thumbnail); ?></a>
	</div>
<?php endif; ?>
<?php
get_template_part('template-parts/content') ?>