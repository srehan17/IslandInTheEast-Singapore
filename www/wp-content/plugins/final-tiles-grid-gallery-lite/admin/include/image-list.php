<?php

if(isset($gallery))
{
	$active_filters = explode('|', $gallery->filters);
}

?>
<?php foreach($imageResults as $image) {
	$sizes = FinalTiles_GalleryLite::get_image_size_links($image->imageId);
	$thumb = "";
	if($image->type == 'image')
		$thumb = array_key_exists("150x150", $sizes) ? $sizes["150x150"] : $image->imagePath;
	else
		$thumb = plugins_url('../images/video.jpg', __FILE__);
	?>
	<div class="col <?php echo $list_size ." ". $column_size ?>">
		<div class='item card hidden-<?php echo $image->hidden ?>' data-type='<?php _e($image->type) ?>' data-image-id="<?php _e($image->imageId) ?>" data-id="<?php _e($image->Id) ?>">
			<div class="figure card-image" style="background-image: url('<?php _e($thumb) ?>');">
				<?php if($image->type == 'image') : ?>
					<img class="thumb" src="<?php echo plugins_url('../images/square.gif', __FILE__) ?>" />
				<?php else : ?>
					<div class="aspect-ratio">
						<?php print $image->imagePath ?>
					</div>
				<?php endif ?>

				<?php if(in_array($image->imagePath, $sizes)) : ?>
					<span class='card-title'><?php echo array_search($image->imagePath, $sizes) ?></span>
				<?php endif ?>
				<?php if($image->hidden == "T") : ?>
					<span class='card-hidden'><i class="mdi mdi-eye-off" title="Hidden image"></i></span>
				<?php endif ?>
				<?php
				if(! empty($image->filters) || isset($image->group))
				{
					echo "<ul class='filters'>";

					if(isset($image->group) && trim($image->group))
					{
						echo "<li><i class=\"mdi mdi-folder-outline\"></i> $image->group</li>";
					}

					if(! empty($image->filters))
					{
						foreach ( explode( '|', $image->filters ) as $f ) {
							if ( in_array( $f, $active_filters ) ) {
								echo "<li><i class='mdi mdi-tag-outline'></i> $f</li>";
							}
						}
					}

					echo "</ul>";

					echo "<input type='hidden' class ='current_image_filter' value=$image->filters>";

				}

				?>
			</div>
			<div class="card-content">
				<p class="truncate">
					<?php echo (isset($image->title) && !empty($image->title)) ? $image->title : $image->description ?>
				</p>

				<input class="copy" type="hidden" name="id" value="<?php _e($image->Id); ?>" />
				<input class="copy" type="hidden" name="type" value="<?php _e($image->type); ?>" />
				<input class="copy" type="hidden" name="img_id" value="<?php _e($image->imageId); ?>" />
				<input class="copy" type="hidden" name="sortOrder" value="<?php _e($image->sortOrder); ?>" />
				<input class="copy" type="hidden" name="filters" value="<?php _e($image->filters); ?>" />
				<input class="copy" type="hidden" name="post_id" value="<?php _e(isset($image->postId) ? $image->postId : 0) ?>" />
				<select name="img_url" class="select hidden">
					<?php foreach($sizes as $k => $v) : ?>
						<option <?php echo $v == $image->imagePath ? "selected" : "" ?> value="<?php print $v ?>"><?php print $k ?></option>
					<?php endforeach ?>
				</select>
				<input type="hidden" name="target" value="<?php _e($image->target) ?>" />
				<input type="hidden" name="group" value="<?php _e($image->group); ?>" />
				<input type="hidden" name="zoom" value="<?php _e($image->zoom) ?>" />
				<input type="hidden" name="link" value="<?php _e($image->link) ?>" />
				<input type="hidden" name="blank" value="<?php _e($image->blank) ?>" />
				<input type="hidden" name="hidden" value="<?php _e($image->hidden) ?>" />
				<input type="hidden" name="sortOrder" value="<?php _e($image->sortOrder) ?>" />
				<pre class="hidden description"><?php _e($image->description) ?></pre>
				<pre class="hidden imagepath"><?php _e(htmlentities($image->imagePath)) ?></pre>
				<input type="hidden" id="img-title" value="<?php _e($image->title); ?>">
			</div>
			<div class="card-action">

				<a href="#image-panel-model" class="edit modal-trigger">
					<i class="mdi mdi-pencil"></i>
					<span>Edit</span>
				</a>

				<?php if($image->source == "gallery") : ?>
					<a href="#" class="remove">
						<i class="mdi mdi-delete"></i>
						<span>Remove</span>
					</a>
				<?php endif ?>
			</div>
		</div>
	</div>
<?php } ?>