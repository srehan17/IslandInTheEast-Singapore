<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$see_new_video_nonce = wp_create_nonce( 'see_new_video_nonce' );
?>
<div id="portfolio-gallery-edit-video" style="display: none">
	<div id="portfolio-gallery-edit-video-wrapper" data-video-index="" data-portfolio-id="" data-portfolio-item-id=""
		 data-edit-video-nonce="" data-see-video-nonce="<?php echo $see_new_video_nonce; ?>">
		<h1><?php echo __( 'Update video', 'portfolio-gallery' ); ?></h1>
		<form method="post"
			  action="">
			<div class="iframe-text-area">
				<iframe class="iframe-area" src="" frameborder="0" allowfullscreen></iframe>
				<textarea rows="4" cols="50" class="text-area" disabled>
				</textarea>
				<input type="text" id="huge_it_edit_video_input" name="huge_it_edit_video_input" value=""
					   placeholder="New video url"/><br/>
			</div>
			<a class='button-primary set-new-video'><?php echo __( 'See New Video', 'portfolio-gallery' ); ?></a>
			<button class='save-slider-options button-primary huge-it-insert-edited-video-button'
					id='huge-it-insert-edited-video-button'><?php echo __( 'Insert Video', 'portfolio-gallery' ); ?></button>
		</form>
	</div>
</div>