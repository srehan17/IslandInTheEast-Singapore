<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die(_e('You are not allowed to call this page directly.','final-tiles-gallery')); } ?>

<?php $ftg_subtitle = "Dashboard" ?>    
<?php include "header.php" ?>

<?php
	$colors = array('pink', 'purple', 'indigo', 'blue',
					'light-blue', 'cyan', 'teal', 'green',
					'lime', 'yellow', 'orange', 'deep-orange', 'brown');
	$idx = 0;
	$galleries = $this->FinalTilesdb->getGalleries();
?>

<div class="bd">
	<?php if(! isset($_COOKIE['gtl'])) : ?>
	<div class="row">	
		<div id="adv" class="col s12">
			<a href="http://modula.greentreelabs.net/?utm_source=ftglite&utm_medium=banner&utm_campaign=Final%20Tiles%20Gallery%20Lite" target="_blank">
			<img src="<?php print plugins_url('/images/modula-strip.jpg',__file__) ?>" alt="Modula Grid Gallery">
			</a>
			<a href="#close" class="close">Dismiss</a>
		</div>
	</div>
	<?php endif ?>
	<?php if(count($galleries) == 0) : ?>
	<div class="row ">
		<div class="col s12">
			<div class="card-panel light-green lighten-4">
				<h5 class="cyan-text text-darken-3"><?php _e('Welcome to Final Tiles Grid Gallery!','final-tiles-gallery')?></h5>
				<p>
					<?php _e('Create your first awesome gallery, click','final-tiles-gallery')?> <a href="?page=ftg-lite-add-gallery"><?php _e('here','final-tiles-gallery')?></a>.
				</p>
			</div>
		</div>
	</div>
	<?php else : ?>
	<div id="gallery-list" class="row">
	<?php foreach($galleries as $gallery) : ?>
		<?php
	     $gid = $gallery->Id;  
	     $images = $this->FinalTilesdb->getImagesByGalleryId($gid, 0, 1);
		 $bg = count($images) && $images[0]->type == "image" ? "url('" . $images[0]->imagePath . "')" : "none";
		 $withImage = count($images) && $images[0]->type == "image";
        ?>
		<?php wp_nonce_field('FinalTiles_gallery', 'FinalTiles_gallery'); ?>
		<div class="col s12 m3">
	      <div class="card <?php print $withImage ? "with-image" : "" ?> <?php print $colors[$idx % count($colors)] ?> darken-2" id="gallery-<?php print $gallery->Id ?>" data-gid="<?php print $gallery->Id ?>">
			  <div class="data" style="background-image:<?php print $bg ?>">
		        <div class="card-content white-text">
		          <span class="card-title"><?php print $gallery->name ?></span>
		          <p><?php print $gallery->description ?></p>
		        </div>
		        <div class="card-action  <?php print $colors[$idx % count($colors)] ?> darken-4">
			        
					<a href="#" data-tooltip="Show shortcode" data-position="top" data-delay="10"  class="tooltipped waves-effect waves-<?php print $colors[$idx % count($colors)] ?> show-shortcode" data-gid="<?php print $gallery->Id ?>"><i class="mdi mdi-code-array"></i></a>
					<a href="?page=ftg-lite-gallery-admin&id=<?php print $gallery->Id ?>" data-tooltip="Edit gallery" data-position="top" data-delay="10"  class="tooltipped waves-effect waves-<?php print $colors[$idx % count($colors)] ?>"><i class="mdi mdi-pencil"></i></a>
		          <a data-tooltip="Clone gallery" data-position="top" data-delay="10"  class="tooltipped waves-effect waves-<?php print $colors[$idx % count($colors)] ?> clone-gallery" data-gid="<?php print $gallery->Id ?>"><i class="mdi mdi-content-copy"></i></a>

		          <a data-tooltip="Delete gallery" data-position="top" data-delay="10"  class="tooltipped waves-effect waves-<?php print $colors[$idx % count($colors)] ?> delete-gallery" data-gid="<?php print $gallery->Id ?>"><i class="mdi mdi-delete"></i></a>
		        </div>
			  </div>
	      </div>
	    </div>
	    <?php $idx++; ?>
	<?php endforeach ?>
	</div>
	<?php endif ?>
	<div class="fixed-action-btn" style="bottom: 15px; right: 24px;">
    <a href="?page=ftg-lite-add-gallery" class="btn-floating btn-large red">
      <i class="large fa fa-plus"></i>
    </a>
  </div>
</div>

<!-- Delete gallery modal -->
<div id="delete-gallery-modal" class="modal">
	<div class="modal-content">
	  <h4><?php _e('Confirmation','final-tiles-gallery')?></h4>
	  <p><?php _e('Do you really want to delete the gallery','final-tiles-gallery')?> <span></span> ?</p>
	</div>
	<div class="modal-footer">
	  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat yes"><?php _e('Yes','final-tiles-gallery')?></a>
	  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><?php _e('No','final-tiles-gallery')?></a>
	</div>
</div>
<!-- Shortcode gallery modal -->
<div id="shortcode-gallery-modal" class="modal">
	<div class="modal-content">
	  <h4></h4>
	  <p><?php _e('Copy and paste the following shortcode inside a post, page or widget:','final-tiles-gallery')?></p>
	  <code></code>
	</div>
	<div class="modal-footer">
	  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><?php _e('Close','final-tiles-gallery')?></a>
	</div>
</div>

<div class="preloader-wrapper big active" id="spinner">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
<script>
	(function ($){
		var galleryId;
		var galleryName;
		$(".delete-gallery").click(function (e) {
	        e.preventDefault();	        
	        galleryId = $(this).data("gid");
	        galleryName = $(this).parents(".data").find(".card-title").text();
	        $("#delete-gallery-modal span").text(galleryName);
	        $("#delete-gallery-modal").openModal();	        
        });
        $(".clone-gallery").click(function (e) {
	        e.preventDefault();	        
	        var id = $(this).data("gid");
	        var name = $(this).parents(".data").find(".card-title").text();
	        FTG.show_loading();
            $.ajax({
                url: ajaxurl,
                data: {
	                action: 'clone_gallery',
	                id: id,
                    FinalTiles_gallery: $('#FinalTiles_gallery').val()
                },
                dataType: "json",
                type: "post",
                error: function(a, b, c) {
                    console.log(a, b, c);
                    FTG.hide_loading();
                },
                success: function(r) {
	                toast('Gallery "'+name+'" cloned', 2000);
	                location.href = location.href;
	                //FTG.hide_loading();
                }
            });
        });
        $(".show-shortcode").click(function(e) {
	        e.preventDefault();
	        
	        var id = $(this).data("gid");
	        var name = $(this).parents(".data").find(".card-title").text();
	        $("#shortcode-gallery-modal h4").text(name);
	        $("#shortcode-gallery-modal code").text("[FinalTilesGallery id='"+id+"']");
	        $("#shortcode-gallery-modal").openModal();	   
        });
        $("body").on("click", "#delete-gallery-modal .yes", function () {
	        FTG.show_loading();
            $.ajax({
                url: ajaxurl,
                data: {
	                action: 'delete_gallery',
	                id: galleryId,
                    FinalTiles_gallery: $('#FinalTiles_gallery').val()
                },
                dataType: "json",
                type: "post",
                error: function(a, b, c) {
                    console.log(a, b, c);
                    FTG.hide_loading();
                },
                success: function(r) {
	                toast('Gallery "'+galleryName+'" deleted', 2000);
	                $("#gallery-" + galleryId).remove();
	                FTG.hide_loading();
                }
            });
        });
        $("body").on("click", ".card-content", function () {
	        var gid = $(this).parents(".card").data("gid");
	        location.href = "?page=ftg-lite-gallery-admin&id=" + gid;
        });
	})(jQuery);
</script>