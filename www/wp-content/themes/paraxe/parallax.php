<?php global $option_setting;
if ( true ): //For Future Purpose
	if ( (get_theme_mod('paraxe_main_parallax_enable')) && (is_home() || is_front_page()) ) :?>
<div id="parallax" data-stellar-background-ratio="0.5">
		<div class="parallax-zone">
			<div class="parallax-item item1" data-stellar-background-ratio="0.5">
				<?php if (get_theme_mod('paraxe_parallax_title')) : ?>
					<h1><span><?php echo esc_html(get_theme_mod('paraxe_parallax_title')) ?></span></h1>
				<?php endif;
				if (get_theme_mod('paraxe_parallax_desc')) : ?>	
					<div class="parallax-content"><?php echo esc_html( get_theme_mod('paraxe_parallax_desc') ) ?></div><?php 
				endif;
				if (get_theme_mod('paraxe_parallax_btn')) : ?>
				<div class="parallax-button"><a href="<?php echo esc_url( get_theme_mod('paraxe_parallax_url')); ?>"><?php echo esc_html( get_theme_mod('paraxe_parallax_btn') ) ?></a></div>
				<?php endif; ?>
			</div>	
		</div>	
</div>	
<?php endif;
else : ?>
<div id="parallax" data-stellar-background-ratio="0.5">
		<div class="parallax-zone">
			<div class="parallax-item item1" data-stellar-background-ratio="0.5">
					<h1><span><?php _e('Parallax Header','paraxe'); ?></span></h1>
					<div class="parallax-content"><?php _e('This is a Parallax Header. Scroll the Site to see the Effect. It Can be easily Configured from Theme Options.','paraxe'); ?></div>
				<div class="parallax-button"><a href="#"><?php _e('Find Out More','paraxe'); ?></a></div>
			</div>	
		</div>	
</div>
<?php endif; ?>