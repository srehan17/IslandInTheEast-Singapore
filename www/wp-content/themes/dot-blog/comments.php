<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<!-- Comment of the page -->
<section class="section comments">

	<?php if ( have_comments() ) : ?>
			<header class="header">
				<h2><?php esc_html_e('Comments on this post','dot-blog'); ?></h2>
				<p>
					<?php
					$comments_number = get_comments_number();
					if ( 1 == $comments_number ) {
						/* translators: %s: post title */
						echo _x( 'One Comment', 'comments title', 'dot-blog' );
					} else {
						printf(
						/* translators: 1: number of comments*/
							_nx(
								'%1$s Comment',
								'%1$s Comments',
								$comments_number,
								'comments title',
								'dot-blog'
							),
							number_format_i18n( $comments_number )
						);
					}
					?>
				</p>
				<div class="navigation">
					<div class="alignleft"><?php previous_comments_link(esc_html__(' < Older Comments','dot-blog')) ?></div>
					<div class="alignright"><?php next_comments_link(esc_html__('Newer Comments > ','dot-blog')) ?></div>
				</div><!-- .navigation  -->
			</header>

			<div class="commentlist">
				<?php wp_list_comments(array('avatar_size' => 49, 'callback' => 'dot_blog_custom_comment', 'style'=> 'div')); ?>
			</div><!-- .commentlist -->

	<?php endif; // have_comments() ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dot-blog' ); ?></p>
	<?php endif; ?>

</section><!-- .comments-area -->

<section>
	<?php comment_form(); ?>
</section>