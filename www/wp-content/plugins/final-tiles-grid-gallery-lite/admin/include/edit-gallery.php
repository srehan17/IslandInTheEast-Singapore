<?php

function ftg_p($gallery, $field, $default = NULL)
{
	global $ftg_options;

	if($ftg_options) {
		if(array_key_exists($field, $ftg_options))
			print stripslashes($ftg_options[$field]);
		return;
	}

	if($gallery == NULL || $gallery->$field === NULL)
	{
		if($default === NULL)
		{
			print "";
		}
		else
		{
			print stripslashes($default);
		}
	}
	else
	{
		print stripslashes($gallery->$field);
	}
}
function ftg_sel($gallery, $field, $value, $type="selected")
{
	global $ftg_options;

	if($ftg_options && $ftg_options[$field] == $value) {
		print $type;
		return;
	}

	if($gallery == NULL)
	{
		print "";
	}
	else
	{
		if($gallery->$field == $value)
			print $type;
	}
}


global $ftg_parent_page;
global $ftg_fields;

$filters = explode('|', $gallery->filters);

//print_r($gallery);

$idx = 0;
$colors = array('indigo', 'blue', 'cyan', 'teal' ,'green', 'lime', 'amber', 'deep-orange');
?>

<?php 
	
	/*foreach($ftg_fields as $section => $s) 
	{
		foreach($s["fields"] as $f => $data)
		{
			_e("<strong>" . $data["name"] . "</strong><br>");
			_e("<p>".$data["description"]."</p>");
		}
	}*/
	
	function ftgSortByName($a, $b)
	{
		return $a["name"] > $b["name"];
	}	
	
?>

<ul class="collapsible" data-collapsible="accordion">
	<?php foreach($ftg_fields as $section => $s) : ?>
		<li id="<?php _e(FinalTiles_GalleryLite::slugify($section)) ?>">
			<div class="collapsible-header white-text <?php print $colors[$idx] ?> darken-2">
				<i class="mdi <?php _e($s["icon"]) ?>"></i> <?php _e($section) ?>
			</div>
			<div class="collapsible-body <?php print $colors[$idx] ?> lighten-5 tab form-fields">
				<div class="jump-head">
					<?php
						$jumpFields = array();
						foreach($s["fields"] as $f => $data)
						{
							$jumpFields[$f] = $data;
							$jumpFields[$f]['_code'] = $f;
						}
						unset($f);
						unset($data);

						usort($jumpFields, "ftgSortByName");
					
					?>
					<select class="browser-default jump">
						<option><?php _e('Jump to setting','final-tiles-gallery')?></option>
					<?php foreach($jumpFields as $f => $data) : ?>					
						<?php if(is_array($data["excludeFrom"]) && ! in_array($ftg_parent_page, $data["excludeFrom"])) : ?>
						<option value="<?php _e($data['_code']) ?>">
							<?php _e($data["name"]); ?>
						</option>
						<?php endif ?>
					<?php endforeach ?>
					</select>
				</div>
				<table>
					<tbody>
				<?php foreach($s["fields"] as $f => $data) : ?>
					<?php if(is_array($data["excludeFrom"]) && ! in_array($ftg_parent_page, $data["excludeFrom"])) : ?>
					
					<tr class="row-<?php print $f ?> <?php print $data["type"] ?>">						
						<th scope="row">
							<label><?php _e($data["name"]); ?>
								<?php if($data["mu"]) : ?>
								(<?php _e($data["mu"]) ?>)
								<?php endif ?>
								</label>
						</th>
						<td>
						<div class="field">
						<?php if($data["type"] == "text") : ?>
							<div class="text">
								<input type="text" size="30" name="ftg_<?php print $f ?>" value="<?php ftg_p($gallery, $f, $data["default"])  ?>" /> 
							</div>
						<?php elseif($data["type"] == "select") : ?>
							<div class="text">
								<select class="browser-default" name="ftg_<?php print $f ?>">
									<?php foreach(array_keys($data["values"]) as $optgroup) : ?>
										<optgroup label="<?php print $optgroup  ?>">
											<?php foreach($data["values"][$optgroup] as $option) : ?>
	
												<?php $v = explode("|", $option); ?>
	
												<option <?php ftg_sel($gallery, $f, $v[0]) ?> value="<?php print $v[0] ?>"><?php print $v[1] ?></option>
											<?php endforeach ?>
										</optgroup>
									<?php endforeach ?>
								</select>
								<?php if($f == "lightbox") : ?>
									<div class="col s12 ftg-everlightbox-settings">
									<?php if(class_exists('Everlightbox_Public')) : ?>
										<div class="card-panel light-green lighten-4">
											<a href="?page=everlightbox_options" target="_blank">EverlightBox settings</a>
										</div>
									<?php else : ?>
										<div class="card-panel yellow lighten-3">
											EverlightBox not installed. <a target="_blank" href="plugin-install.php?s=everlightbox&tab=search&type=term">Install</a>
										</div>
									<?php endif ?>								
									</div>
								<?php endif ?>
							</div>
						<?php elseif($data["type"] == "toggle") : ?>
							<div class="text">
								<input type="checkbox" id="ftg_<?php print $f ?>" name="ftg_<?php print $f ?>" value="<?php ftg_p($gallery, $f, $data["default"]) ?>" <?php ftg_sel($gallery, $f, "T", "checked") ?> />
								<label for="ftg_<?php print $f ?>"><?php _e($data["description"]); ?></label>
							</div>

						<?php elseif($data["type"] == "slider") : ?>
							
							<div class="text">
								<p class="range-field">
							      <input name="ftg_<?php print $f ?>" value="<?php ftg_p($gallery, $f, $data["default"]) ?>" type="range" min="<?php print $data["min"] ?>" max="<?php print $data["max"] ?>" />
							    </p>
							</div>
							
						<?php elseif($data["type"] == "number") : ?>
							<div class="text">
								<input type="text" name="ftg_<?php print $f ?>" class="integer-only"  value="<?php ftg_p($gallery, $f, $data["default"]) ?>"  >	
							</div>
								
						<?php elseif($data["type"] == "color") : ?>
							<div class="text">
							<input type="text" size="6" data-default-color="<?php print $data["default"] ?>" name="ftg_<?php print $f ?>" value="<?php ftg_p($gallery, $f, $data["default"])  ?>" class='pickColor' />							</div>
						
						<?php elseif($data["type"] == "PRO_FEATURE") : ?>

							<div class="pro-cell">
								<a href="http://1.envato.market/c/288541/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Ffinal-tiles-wordpress-gallery%2F5189351" target="_blank">
									<i class="fa fa-graduation-cap"></i>
									Unlock this feature with a PRO license</a>
                    		</div>
						<?php elseif($data["type"] == "textarea") : ?>
						<div class="text">
							<textarea name="ftg_<?php print $f ?>"><?php ftg_p($gallery, $f) ?></textarea>
						</div>						
						<?php endif ?>
						<div class="help">
							<?php _e($data["description"]); ?>
						</div>

						</div>
						</td>						
						</tr>						
					<?php endif ?>					
				<?php endforeach ?>
				</tbody>
				</table>
			</div>
		</li>
		<?php $idx++; ?>
	<?php endforeach ?>
	<li id="images">
		<div class="collapsible-header white-text <?php print $colors[$idx] ?> darken-2">
			<i class="mdi mdi-image-filter"></i> <?php _e('Images','final-tiles-gallery')?>
		</div>
		<div class="collapsible-body <?php print $colors[$idx] ?> lighten-5">
			<div id="images" class="ftg-section form-fields">
				<div class="actions">
					<label><?php _e('Source:','final-tiles-gallery')?></label>
					<input class="with-gap" checked type="radio" name="ftg_source" value="images" id="source1" />
	                <label for="source1"><?php _e('Images','final-tiles-gallery')?></label>
					<input class="with-gap" disabled type="radio" name="ftg_source" value="posts" id="source2" />
	                <label for="source2"><?php _e('Recent posts with featured image','final-tiles-gallery')?> <?php _e(PRO_CALL) ?></label>
	                <input class="with-gap" disabled type="radio" name="ftg_source" value="woocommerce" id="source3" />
	                <label for="source3"><?php _e('WooCommerce products','final-tiles-gallery')?> <?php _e(PRO_CALL) ?></label>					
				</div>
				<div class="actions">
					<div class="row">
						<label>Loading method</label>
						<select name="ftg_loadMethod" class="browser-default">
							<option <?php ftg_sel($gallery, "loadMethod", "sequential") ?> value="sequential">Sequential</option>
							<option <?php ftg_sel($gallery, "loadMethod", "lazy") ?> value="lazy">Lazy</option>
						</select>
					</div>
				</div>
				<div class="actions">
					<div class="row">
						<label>Ajax loading</label>
						<select name="ftg_ajaxLoading" class="browser-default js-ajax-loading-control">
							<option <?php ftg_sel($gallery, "ajaxLoading", "F") ?> value="F">Complete markup on page</option>
							<option <?php ftg_sel($gallery, "ajaxLoading", "T") ?> value="T">Enable ajax loading (still in beta!)</option>
						</select>
					</div>
					<div class="row js-ajax-loading" style="display:none;">
						<label>Number of images to load via ajax</label>
						<input class="browser-default" type="text" value="<?php echo $gallery->tilesPerPage ?>" name="ftg_tilesPerPage">
					</div>
				</div>
				<div class="actions source-images source-panel">
					<div class="row">
						<div class="tips">
				            <span class="shortpixel">
		                  	<img src="<?php echo plugins_url('',__file__) ?>/../images/icon-shortpixel.png" alt="ShortPixel">
		                  <a target="_blank" href="https://shortpixel.com/wp/af/J4PFT4Z72393"><?php _e('We suggest you to use ShortPixel image optimization plugin for best SEO results.','modula-gallery')?></a></span>		            
			            </div>
						<label><?php _e('Image size','final-tiles-gallery')?></label>
					
						<select class="current-image-size browser-default">
							<?php
							foreach ($this->list_thumbnail_sizes() as $size => $atts)
							{
								print '<option value="'. $size .'">' . $size . " (" . implode( 'x', $atts ) . ")</option>";
							}
							?>
						</select>
						 <p class="tips"><?php _e('Want to add more images sizes?','final-tiles-gallery')?> <a href="http://www.wpbeginner.com/wp-tutorials/how-to-create-additional-image-sizes-in-wordpress/" target="_blank"><?php _e('Read a simple tutorial.','final-tiles-gallery')?></a></p>
						 <div class="tips">
						<strong><?php _e('About choosing a proper image size:','final-tiles-gallery')?></strong> <?php _e("Final Tiles Gallery doesn't scale down the images when there's enough space, it gives you the freedom to choose your favourite size for each image. So you should use images that are smaller than the container, choose the",'final-tiles-gallery')?> <strong><?php _e('thumbnail','final-tiles-gallery')?></strong> <?php _e('or','final-tiles-gallery')?> <strong><?php _e('medium','final-tiles-gallery')?></strong> <?php _e('size, for example.','final-tiles-gallery')?><br>
						<br>
						<?php _e('How to get a better grid? Watch the','final-tiles-gallery')?> <a href="https://www.youtube.com/watch?v=RNT4JGjtyrs" target="_blank"><?php _e('video tutorial','final-tiles-gallery')?></a>.
					</div>
					</div>
					<div class="row">
					<a href="#" class="open-media-panel waves-effect waves-light btn action"><i class="mdi mdi-image-area"></i> <?php _e('Add images','final-tiles-gallery')?></a>
						<a onclick="alert('Video are available with PRO version')" class="waves-effect waves-light btn action grey lighten-1"><i class="mdi mdi-video"></i> Add video</a>
					</div>
					<div class="row">
						<p class="tips"><?php _e('For multiple selections: Click+CTRL.
						Drag images to change order.','final-tiles-gallery')?></p>
					</div>
				</div>			
			</div>
			<div class="actions">
					<div class="bulk row">
						<label><?php _e('Bulk Actions','final-tiles-gallery')?></label>
						<div class="options">
							<span class="indigo lighten-4">
								<a class="btn indigo darken-4 waves-effect waves-light" href="#" data-action="select"><?php _e('Select all','final-tiles-gallery')?></a>
								<a class="btn indigo darken-4 waves-effect waves-light" href="#" data-action="deselect"><?php _e('Deselect all','final-tiles-gallery')?></a>
								<a class="btn indigo darken-4 waves-effect waves-light" href="#" data-action="toggle"><?php _e('Toggle selection','final-tiles-gallery')?></a>
							</span>
							<span class="green lighten-4">
								<a class="btn green darken-2 waves-effect waves-light" href="#" onclick="alert('Filters are available with PRO version')"><?php _e('Assign filters','final-tiles-gallery')?></a>
								<a class="btn green darken-2 waves-effect waves-light" href="#" onclick="alert('Groups are available with PRO version')"><?php _e('Assign group','final-tiles-gallery')?></a>
							</span>
							<span class="orange lighten-4">
								<a class="btn lime darken-3 waves-effect waves-light" href="#" data-action="show-hide"><?php _e('Toggle visibility','final-tiles-gallery')?></a>
								<a class="btn deep-orange darken-1 waves-effect waves-light" href="#" data-action="remove"><?php _e('Remove','final-tiles-gallery')?></a>
							</span>
						</div>

						<div class="row">
							<b class="listview"> <?php _e('List View:','final-tiles-gallery')?> </b>
							<ul class="list-view-control">
								<li data-size="small" id="listview-small" class="li"> <?php _e('Small','final-tiles-gallery')?> </li>
								<li data-size="medium" id="listview-medium" class="li" > <?php _e('Medium','final-tiles-gallery','final-tiles-gallery')?> </li>
								<li data-size="big" id="listview-big" class="li"> <?php _e('Big','final-tiles-gallery')?> </li>
							</ul>
						</div>				

						<div class="panel">
							<strong></strong>
							<p class="text"></p>
							<p class="input">
								<input type="text" placeholder="<?php _e('Group name','final-tiles-gallery')?>">
								<span><?php _e('avoid space and special characters','final-tiles-gallery')?></span>
							</p>
							<p class="buttons">
								<a class="btn orange cancel" href="#"><?php _e('Cancel','final-tiles-gallery')?></a>
								<a class="btn green proceed" href="#"><?php _e('Proceed','final-tiles-gallery')?></a>
							</p>
						</div>
					</div>
				</div>

				<?php if(is_array($filters) && count($filters) > 1): ?>
				<div class="row filter-list">
							<b class="listview"> <?php _e('Filters:','final-tiles-gallery')?> </b>
							<ul class="filter-select-control">
							<?php foreach($filters as $filter): ?>
								<li class='filter-item' >
								<?php print $filter; ?>
								</li>
							<?php endforeach; ?>
							</ul>
						</div>
				<?php endif; ?>
			<div id="image-list" class="row"></div>		
		</div>
	</li>
</ul>

<a data-tooltip="Update gallery" data-position="top" data-delay="10" class="tooltipped btn-floating btn-large waves-effect waves-light green update-gallery"><i class="fa fa-save"></i></a>

<div class="fixed-action-btn bullet-menu">
    <a class="btn-floating btn-large blue darken-1 right back-to-top">
      <i class="large mdi mdi-chevron-up"></i>
    </a>
    <ul>
	    <?php $idx = 0; ?>
	    <?php foreach($ftg_fields as $section => $s) : ?>
	    <li><a class="btn-floating <?php _e($colors[$idx++]) ?>" rel="<?php _e(FinalTiles_GalleryLite::slugify($section)) ?>"><i class="large mdi <?php _e($s["icon"]) ?>"></i></a></li>
	    <?php endforeach ?>
	    <li><a class="btn-floating <?php _e($colors[$idx++]) ?>" rel="images"><i class="large mdi mdi-image-filter"></i></a></li>
	</ul>
</div>
  
<!-- image panel -->
<div id="image-panel-model"	 class="modal">
	<div class="modal-content cf">
		<h4><?php _e('Edit image','final-tiles-gallery')?></h4>
		<div class="left">
			<div class="figure"></div>
			<div class="field sizes"></div>
		</div>
		<div class="right-side">
			<div class="field">
				<label><?php _e('Title','final-tiles-gallery')?></label>
				<div class="text">
					<textarea name="imageTitle"></textarea>
				</div>
			</div>
			<div class="field">
				<label><?php _e('Caption','final-tiles-gallery')?></label>
				<div class="text">
					<textarea name="description"></textarea>
				</div>
			</div>
			<div class="field">
				<input id="hidden-image" type="checkbox" name="hidden" value="T" />
				<label for="hidden-image">
					<?php _e('Hidden, visible only with lightbox','final-tiles-gallery')?>
				</label>
			</div>
				<div class="field js-no-hidden">
				<label><?php _e('Link','final-tiles-gallery')?></label>
				<div class="text dark">
					<input type="text" size="20" value="" name="link" />					
				</div>
			</div>
			<div class="field js-no-hidden">
				<label><?php _e('Link target','final-tiles-gallery')?></label>
				<div class="text">
					<select name="target" class="browser-default">
						<option value="default"><?php _e('Default target','final-tiles-gallery')?></option>
						<option value="_self"><?php _e('Open in same page','final-tiles-gallery')?></option>
						<option value="_blank"><?php _e('Open in _blank','final-tiles-gallery')?></option>
						<option value="_lightbox"><?php _e('Open in lightbox (when using a lightbox)','final-tiles-gallery')?></option>
					</select>
				</div>			
			</div>
		</div>
	</div>	
	<div class="field buttons modal-footer">
		<a href="#" data-action="save" class="action modal-action modal-close waves-effect waves-green btn-flat"><i class="fa fa-save"></i> <?php _e('Save','final-tiles-gallery')?></a>
		<a href="#" data-action="cancel" class="action modal-action modal-close waves-effect waves-yellow btn-flat"><i class="mdi-content-reply"></i> <?php _e('Cancel','final-tiles-gallery')?></a>
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
<!-- images section -->

<div class="overlay" style="display:none"></div>

<script>
	var ftg_wp_caption_field = '<?php ftg_p($gallery, "wp_field_caption")  ?>';
	(function ($) {
		$("[name=captionFullHeight]").change(function () {
			if($(this).val() == "F")
				$("[name=captionEffect]").val("fade");
		});
		$("[name=captionEffect]").change(function () {
			if($(this).val() != "fade" && $("[name=captionFullHeight]").val() == "F") {
				$(this).val("fade");
				alert("Cannot set this effect if 'Caption full height' is switched off.");
			}
		});

	})(jQuery);
</script>
