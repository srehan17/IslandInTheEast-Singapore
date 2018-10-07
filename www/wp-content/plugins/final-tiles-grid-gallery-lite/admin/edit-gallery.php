<?php
	if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }
	
	$galleryResults = $this->FinalTilesdb->getGalleries();
	$gallery = null;
	
	$gid = intval($_GET['id']);
	$imageResults = $this->FinalTilesdb->getImagesByGalleryId($gid, 0, 0);
	$gallery = $this->FinalTilesdb->getGalleryById($gid);
	foreach ( $this->defaultValues as $k => $v )
	{
		if(! isset($gallery->$k))
			$gallery->$k = $v;
	}
	
	global $ftg_parent_page;
	$ftg_parent_page = "edit-gallery";

?>
<?php $ftg_subtitle = "Edit gallery: " . $gallery->name ?>    
<?php include "header.php" ?>

<div class='bd'>
	<div class="row ">
		<div class="col s12">
			<div class="card-panel light-green lighten-4">
		<p><input readonly="" style="font-family: Courier, monospace;" type="text" value="[FinalTilesGallery id='<?php print $gid ?>']"></p>
		
		<ul>
			<li>
				<a target="_blank" href="http://issuu.com/greentreelabs/docs/finaltilesgridgallery-documentation?e=17859916/13243836"><?php _e('Documentation','final-tiles-gallery')?></a> <a target="_blank" href="http://final-tiles-gallery.com/FinalTilesGridGallery-documentation.pdf"><?php _e('(download)','final-tiles-gallery')?></a>
			</li>
			<li>
				<a target="_blank" href="https://www.youtube.com/watch?v=RNT4JGjtyrs"><?php _e('Video tutorial: Tutorial: better grids with Final Tiles Grid Gallery for WordPress','final-tiles-gallery')?></a>
			</li>						
		</ul>
				</div>
			</div>
		</div>
		<p class="import-export"> <a id='import-settings' href="#"> Import </a> / <a id='export-settings' href="#"> Export </a> </p>
        <div id="settings">
            <form name="gallery_form" id="edit-gallery" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
            <?php wp_nonce_field('FinalTiles_gallery', 'FinalTiles_gallery'); ?>
            <input type="hidden" name="ftg_gallery_edit" id="gallery-id" value="<?php _e($gid); ?>" />
            <?php include("include/edit-gallery.php") ?>
            </form>
        </div>

        <script>
            (function ($) {
            	window.onload = function () {
	                
                    $("[name=ftg_source]").val("<?php _e($gallery->source) ?>").change();
                    $("[name=ftg_defaultPostImageSize]").val("<?php _e($gallery->defaultPostImageSize) ?>").change();                    
                
	                FTG.init_gallery();
	                
	                $("select.multiple").change(function () {
		                var val = $(this).val();
		                if(val.length > 1)
		                	$(this).val(val[0]);
	                });
	                
	                $("tr:even").addClass("alternate");
		            $(".sections a:first").addClass("selected");
		            $(".sections a").click(function(e) {
		                e.preventDefault();
		                
		                var idx = $(".sections a").index(this);
		                
		                $(".sections a").removeClass("selected");
		                $(this).addClass("selected");
		                
		                $(".ftg-section").hide().eq(idx).show();
		                
		                if(idx == 6)
		                	$(".form-buttons").hide();
		                else
		                	$(".form-buttons").show();
		            });
		            $(".ftg-section").hide().eq(0).show();
	            }
            })(jQuery);
        </script>

</div>

<div id="import-modal" class="modal">
		    <div class="modal-content">
		    <h3> Import Configuration </h3>
		      <p> Paste Here the configuration code </p>
		      <textarea class="import"> </textarea>
		    </div>
		    <div class="modal-footer">
		    		<a href="#" data-action="save" class="action modal-action modal-close waves-effect waves-green btn-flat"><i class="fa fa-save"></i> <?php _e('Import','final-tiles-gallery')?></a>
					<a href="#" data-action="cancel" class="action modal-action modal-close waves-effect waves-yellow btn-flat"><i class="mdi-content-reply"></i> <?php _e('Cancel','final-tiles-gallery')?></a>
		    </div>
</div>

<div id="export-modal" class="modal">
		    <div class="modal-content">
		    <h3> Export Configuration </h3>
		      <p> Copy the configuration code </p>
		      <textarea class="export"> </textarea>
		    </div>
		    <div class="modal-footer">
					<a href="#" data-action="cancel" class="action modal-action modal-close waves-effect waves-yellow btn-flat"><i class="mdi-content-reply"></i> <?php _e('OK','final-tiles-gallery')?></a>
		    </div>
</div>