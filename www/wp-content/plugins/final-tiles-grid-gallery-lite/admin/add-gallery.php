<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die(_e('You are not allowed to call this page directly.','final-tiles-gallery')); } ?>
    
<?php $ftg_subtitle = "New gallery" ?>    
<?php include "header.php" ?>


<div class="bd">
	
	<div id="ftg-wizard">
	    <h2><?php _e('Add new gallery wizard','final-tiles-gallery')?></h2>
	
	    <form action="#" method="post">
	        <?php wp_nonce_field('FinalTiles_gallery', 'FinalTiles_gallery'); ?>
	        <input type="hidden" name="action" value="add_new_gallery" />
	        <input type="hidden" name="enc_images" value="" />
	        <input type="hidden" name="post_categories" value="" />
	        <input type="hidden" name="post_tags" value="" />
	        <input type="hidden" name="woo_categories" value="" />
	        <input type="hidden" name="gridSize" value="5" />
	        <fieldset data-step="1">
	            <div class="row">
	                <div class="input-field">
	                    <input name="ftg_name" id="name" type="text" class="validate" required="required">
	                    <label for="name"><?php _e('Name of the gallery','final-tiles-gallery')?></label>
	                </div>
	            </div>
	            <div class="input-field">
	                <textarea name="ftg_description" class="materialize-textarea" id="description"></textarea>
	                <label for="description"><?php _e('Description of the gallery','final-tiles-gallery')?></label>
	            </div>
	        </fieldset>
	        <fieldset data-step="2">
	            <h5><?php _e('Choose the source of the images','final-tiles-gallery')?></h5>
	            <p>
	                <input class="with-gap" type="radio" checked="checked" name="ftg_source" id="source1" value="images" />
	                <label for="source1"><?php _e('Media library','final-tiles-gallery')?></label>
	            </p>
	            <p>
	                <input class="with-gap" disabled type="radio" name="ftg_source" value="posts" id="source2" />
	                <label for="source2">Recent posts with featured image <?php _e(PRO_CALL) ?></label>
	            </p>
	            <p>
	                <input class="with-gap" disabled type="radio" name="ftg_source" value="woocommerce" id="source3" />
	                <label for="source3">WooCommerce products <?php _e(PRO_CALL) ?></label>
	            </p>
	        </fieldset>
	        <fieldset data-step="3" data-branch="images">
	            <div class="field">
	                <h5><?php _e('WordPress field for captions:','final-tiles-gallery')?></h5>
	                	<select class="browser-default" name="ftg_wp_field_caption">
	                		<option value="none"> Don't use captions </option>
	                		<option value="title"> Title  </option>
	                		<option selected value="caption"> Caption  </option>
	                		<option value="description"> Description  </option>
	                	</select>	              
	            </div>

	             <div class="field">
	                <h5><?php _e('WordPress field for titles:','final-tiles-gallery')?></h5>
	                	<select class="browser-default" name="ftg_wp_field_title">
	                		<option value="none"> Don't use titles </option>
	                		<option selected value="title"> Title  </option>
	                		<option value="description"> Description  </option>
	                	</select>	              
	            </div>
	        </fieldset>
	        <fieldset data-step="3" data-branch="posts">
	            <div class="field">
	                <h5><?php _e('Categories:','final-tiles-gallery')?></h5>                
	                 <?php foreach(get_categories() as $c) : ?>
	                 <p>
	                 <input type="checkbox" name="_post_categories" value="<?php _e($c->cat_ID) ?>" id="c<?php _e($c->cat_ID) ?>">
	                 <label for="c<?php _e($c->cat_ID) ?>"><?php _e($c->name) ?></label>
	                 </p>
	                 <?php endforeach ?>                
	            </div>
	            <div class="field">
		            <h5><?php _e('Tags:','final-tiles-gallery')?></h5>
		            <?php $tags = get_tags(); ?>
	                <?php foreach($tags as $c) : ?>
	                 <p>
	                 <input type="checkbox" name="_post_tags" value="<?php _e($c->term_id) ?>" id="t<?php _e($c->term_id) ?>">
	                 <label for="t<?php _e($c->term_id) ?>"><?php _e($c->name) ?></label>
	                 </p>
	                 <?php endforeach ?>  
	                 <?php if(count($tags) == 0) : ?>
						<p><?php _e('No tags found','final-tiles-gallery')?></p>
					<?php endif ?>
	            </div>
	        </fieldset>
	        <fieldset data-step="3" data-branch="woocommerce">
	            <div class="field">
	                <h5><?php _e('Categories:','final-tiles-gallery')?></h5>                
	                 <?php foreach($woo_categories as $c) : ?>
	                 <p>
	                 <input type="checkbox" name="_woo_categories" value="<?php _e($c->cat_ID) ?>" id="wooc<?php _e($c->cat_ID) ?>">
	                 <label for="wooc<?php _e($c->cat_ID) ?>"><?php _e($c->name) ?></label>
	                 </p>
	                 <?php endforeach ?>                
	            </div>	            
	        </fieldset>
	        <fieldset data-step="4" data-save="true">
	            <div class="field">
	                <h5><?php _e('Choose the layout','final-tiles-gallery')?></h5>
	                <select class="browser-default" name="layout">
		                <option value="final">Final Tiles Gallery (mixed image width)</option>
		                <option value="columns">Masonry (columns, same image width)</option>
	                </select>	                
	            </div>
	            <div class="field">
	                <h5><?php _e('Choose a default image size','final-tiles-gallery')?></h5>
	                <select class="browser-default" name="def_imgsize">
	                <?php
	                    foreach ($this->list_thumbnail_sizes() as $size => $atts)
	                    {
	                    	print '<option value="'. $size .'">' . $size . " (" . implode( 'x', $atts ) . ")</option>";
	                    }
	                    ?>
	                </select>
	                <label><?php _e('You can customize each image later','final-tiles-gallery')?></label>
	            </div>
	            <div class="field select-images">
	                <a class="waves-effect waves-light btn add-images">
	                    <i class="mdi-content-add-circle-outline left"></i> Add images</a>
	                <br>
	                <label>You can add images now or later.</label>
	                <br>
	                <label class="shortpixel">
                  	<img src="<?php echo plugins_url('',__file__) ?>/images/icon-shortpixel.png" alt="ShortPixel">
                  <a target="_blank" href="https://shortpixel.com/wp/af/J4PFT4Z72393"><?php _e('We suggest you to use ShortPixel image optimization plugin for best SEO results.','modula-gallery')?></a></label>	                
	                <div class="images list-group"></div>
	            </div>
	        </fieldset>
	        <footer class="page-footer">
	            <div class="progress loading">
	                <div class="indeterminate"></div>
	            </div>
	            <a class="waves-effect waves-yellow btn-flat prev"><?php _e('Previous','final-tiles-gallery')?></a>
	            <a class="waves-effect waves-green btn-flat next"><?php _e('Next','final-tiles-gallery')?></a>
	        </footer>
	    </form>
	    <div id="success" class="modal">
		    <div class="modal-content">
		      <h4><?php _e('Success!','final-tiles-gallery')?></h4>
		      <p><?php _e('Your gallery','final-tiles-gallery')?> "<span class="gallery-name"></span>" <?php _e('has been created. Copy the following shortcode:','final-tiles-gallery')?><br>
			      <input type="text" readonly class="code"><br>
			     <?php _e('and paste it inside a post or a page. Otherwise click','final-tiles-gallery')?> <a class='customize'><?php _e('here','final-tiles-gallery')?></a> <?php _e('to customize
			      the gallery.','final-tiles-gallery')?>
		      </p>
		    </div>
		    <div class="modal-'footer">
		      <a href="?page=ftg-lite-gallery-admin" id="modal-close" class="waves-effect waves-green btn-flat modal-action"><?php _e('Close','final-tiles-gallery')?></a>
		    </div>
		  </div>
		<div id="error" class="modal">
		    <div class="modal-content">
		      <h4><?php _e('Error!','final-tiles-gallery')?></h4>
		      <p><?php _e('For some reason it was not possible to save your gallery, please contact','final-tiles-gallery')?><a href="?page=ftg-lite-support"><?php _e('support','final-tiles-gallery')?></a>.</p>
		    </div>
		    <div class="modal-footer">
		      <a href="?page=ftg-lite-gallery-admin" class="waves-effect waves-green btn-flat modal-action modal-close"><?php _e('Close','final-tiles-gallery')?></a>
		    </div>
		 </div>
	</div>
</div>