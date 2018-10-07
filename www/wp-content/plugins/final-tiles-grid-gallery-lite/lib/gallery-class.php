<?php


if (!class_exists("FinalTilesGalleryLite"))
{
	class FinalTilesGalleryLite
	{
		private $defaultValues;

		public function __construct($galleryId, $db, $defaultValues)
		{
			$this->id = $galleryId;
			$this->defaultValues = $defaultValues;
			$this->gallery = null;
			$this->db = $db;
			$this->images = array();	

			$this->getGallery();

			switch($this->gallery->source)
			{
				default:
				case "images":
					$this->getImages();
					break;				
			}

			$attIDs = array();
			foreach($this->images as $image)
				$attIDs []= $image->attID;

			$args = array(
				'post_type' => 'attachment',
				'posts_per_page' => -1,
				'include' => $attIDs
			);

			$atts = get_posts($args);

			$upload_dir = wp_upload_dir();
			$metaData = array();
			foreach($atts as $att)
			{
				$file = get_post_custom($att->ID);

				$metaData["att" . $att->ID] = array(
					'alt' => get_post_meta( $att->ID, '_wp_attachment_image_alt', true ),
					'caption' => $att->post_excerpt,
					'description' => $att->post_content,
					'href' => get_permalink( $att->ID ),
					'url' => $this->gallery->lightboxImageSize == 'full' ? 
								$att->guid : 
								wp_get_attachment_image_url($att->ID, $this->gallery->lightboxImageSize, false),
					'original' => $att->guid, 
					'title' => $att->post_title,
					'page' => wp_get_attachment_url($att->ID),
					'file' => $file['_wp_attached_file'][0]
				);
			}

			foreach($this->images as &$image)
			{
				if(isset($image->imageId) && isset($metaData['att' . $image->imageId]))
				{
					$meta          = $metaData[ 'att' . $image->imageId ];
					$sizes         = FinalTiles_GalleryLite::get_image_size_links( $image->imageId );
					$search 	   = array_search( $image->imagePath, $sizes );
					if($search)
					{
						$size = explode( "x", $search );
					}
					else
					{
						$md = wp_get_attachment_metadata($image->imageId);
						$size = array($md["width"], $md["height"]);	
					}
					$image->width  		= $size[0];
					$image->height 		= $size[1];
					$image->url    		= $meta['url'];
					$image->page 		= $meta['page'];
					$image->original    = $meta['original'];
					$image->alt    		= $meta['alt'];
				}
			}

		}

		var $cssPrefixes = array("-moz-", "-webkit-", "-o-", "-ms-", "");

		private function getLink($image)
		{
			if(! empty($image->link))
				return "href='" . $image->link . "'";

			switch (trim($this->gallery->lightbox)) {
				case 'attachment-page':
					return "href='" . $image->page . "'";
				case '':
				case 'nolink':
					return '';
			}
			

			$url = isset($image->url) ? $image->url : "";
			return "href='" . $url . "'";
		}


		private function getTarget($image)
		{
			if(! empty($image->target) && $image->target == '_lightbox')
				return '';

			if(! empty($image->target))
				return "target='" . $image->target . "'";

			if($this->gallery->blank == 'T')
				return "target='_blank'";

			return '';
		}

		private function getLightboxClass($image)
		{
			if(! empty($image->target) && $image->target == '_lightbox' && ! empty($image->link))
			{
				if($this->gallery->lightbox == 'magnific' ||
				   $this->gallery->lightbox == 'colorbox')
					return "ftg-lightbox-iframe";
				if($this->gallery->lightbox == 'fancybox')
					return "ftg-lightbox iframe";

				if($this->gallery->lightbox == 'lightgallery' ||
				   $this->gallery->lightbox == 'prettyphoto')
					return 'ftg-lightbox';

				if($this->gallery->lightbox == 'everlightbox')
					return 'ftg-lightbox everlightbox-trigger';
			}

			if(! empty($image->link))
				return '';

			if(empty($this->gallery->lightbox))
				return '';

			if($this->gallery->lightbox == 'nolink')
				return '';

			return 'ftg-lightbox';
		}

		private function getdef($value, $default)
		{
			if($value == NULL || empty($value))
				return $default;

			return $value;
		}

		private function toRGB($Hex)
		{
			if (substr($Hex,0,1) == "#")
				$Hex = substr($Hex,1);

			$R = substr($Hex,0,2);
			$G = substr($Hex,2,2);
			$B = substr($Hex,4,2);

			$R = hexdec($R);
			$G = hexdec($G);
			$B = hexdec($B);

			$RGB['R'] = $R;
			$RGB['G'] = $G;
			$RGB['B'] = $B;

			$RGB[0] = $R;
			$RGB[1] = $G;
			$RGB[2] = $B;

			return $RGB;

		}

		static public function slugify($text)
		{
			$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
			$text = trim($text, '-');
			if(function_exists("iconv"))
				$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
			$text = strtolower($text);
			$text = preg_replace('~[^-\w]+~', '', $text);

			if (empty($text))
			{
				return 'n-a';
			}

			return $text;
		}


		public function useCaptions()
		{			
			if(wp_is_mobile() && $this->gallery->captionMobileBehavior == 'none')
				return false;
			if(wp_is_mobile() && $this->gallery->captionMobileBehavior == 'always-visible')
				return true;

			if($this->gallery->source == "images")
			{
				if(empty($this->gallery->wp_field_caption))
					return true;

				return $this->gallery->wp_field_caption != 'none' ||
				       $this->gallery->wp_field_title != 'none';
			}
			if($this->gallery->source == "posts")
			{
				return $this->gallery->recentPostsCaption != 'none';
			}
			if($this->gallery->source == "woocommerce")
			{
				return true;
			}
			return false;
		}
		

		private function hasCaptionIcon()
		{
			return !(empty($this->gallery->captionIcon) &&
			         empty($this->gallery->customCaptionIcon));
		}

		private function getCaptionIcon()
		{
			if(! empty($this->gallery->customCaptionIcon))
				return substr($this->gallery->customCaptionIcon, 3);

			return $this->gallery->captionIcon;
		}

		public function render()
		{
			$rid = $this->id;

			$gallery = $this->gallery;

			//shuffle enabled?
			if($gallery->imagesOrder == 'random')
				shuffle($this->images);

			//images order
			if($gallery->imagesOrder == 'reverse')
				$this->images = array_reverse($this->images);

			//style
			$bgCaption = $this->toRGB($gallery->captionBackgroundColor);

			$html = "<!-- Final Tiles Grid Gallery Lite for WordPress v".FTGLITEVERSION." -->\n\n";
			$html .= stripslashes($this->gallery->beforeGalleryText);

			$captionVertical = null;
			$captionHorizontal = null;

			switch ($gallery->captionVerticalAlignment)
			{
				case 'Top':
					$captionVertical = " display: flex; align-items: flex-start;";
					break;
				case 'Middle':
					$captionVertical = " display: flex; align-items: center;";
					break;
				case 'Bottom':
					$captionVertical = " display: flex; align-items: flex-end;";
					break;
			}

			switch ($gallery->captionHorizontalAlignment)
			{
				case 'Left':
					$captionHorizontal = " justify-content: flex-start";
					break;
				case 'Center':
					$captionHorizontal =  " justify-content: center";
					break;
				case 'Right':
					$captionHorizontal = " justify-content: flex-end";
					break;
			}


			$html .= "<style>\n";

			if($gallery->captionHorizontalAlignment)
			{
				$html .= "#ftg-$this->id$rid .tile .tile-inner .caption { display: flex; }\n";
				$html .= "#ftg-$this->id$rid .tile .tile-inner .caption { $captionHorizontal }\n";
				$html .= "#ftg-$this->id$rid .tile .tile-inner .caption .text { $captionHorizontal }\n";
			}


			if($gallery->captionVerticalAlignment)
			{
				$html .= "#ftg-$this->id$rid .tile .tile-inner .caption{ display: flex; }\n";
				$html .= "#ftg-$this->id$rid .tile .tile-inner .caption { $captionVertical }\n";
				$html .= "#ftg-$this->id$rid .tile .tile-inner .caption .text { $captionVertical }\n";
			}

			if($gallery->borderSize)
				$html .= "#ftg-$this->id$rid .tile { border: " . $gallery->borderSize . "px solid " . $gallery->borderColor . "; }\n";

			if($gallery->captionIconColor)
				$html .= "#ftg-$this->id$rid .tile .icon { color:".$gallery->captionIconColor."; }\n";

			if($gallery->loadingBarColor)
				$html .= "#ftg-$this->id$rid .ftg-items .loading-bar i { background:" . $gallery->loadingBarColor  . "; }\n";

			if($gallery->loadingBarBackgroundColor)
				$html .= "#ftg-$this->id$rid .ftg-items .loading-bar { background:" . $gallery->loadingBarBackgroundColor  . "; }\n";

			if($gallery->captionIconSize)
			{
				$html .= "#ftg-$this->id$rid .tile .icon { font-size:".$gallery->captionIconSize."px; }\n";
				$html .= "#ftg-$this->id$rid .tile .icon { margin: -".($gallery->captionIconSize / 2)."px 0 0 -".($gallery->captionIconSize / 2)."px; }\n";
			}

			if($gallery->captionFontSize)
			{
				$html .= "#ftg-$this->id$rid .tile .caption { font-size:".$gallery->captionFontSize."px; }\n";
				$html .= "#ftg-$this->id$rid .tile .caption .title { font-size:".$gallery->titleFontSize."px; }\n";

			}

			if($gallery->backgroundColor)
				$html .= "#ftg-$this->id$rid .tile { background-color: " . $gallery->backgroundColor . "; }\n";

			if($gallery->captionColor)
			{
				$html .= "#ftg-$this->id$rid .tile .tile-inner .text { color: " . $gallery->captionColor . "; }\n";
				$html .= "#ftg-$this->id$rid .tile .tile-inner .title { color: " . $gallery->captionColor . "; }\n";
			}

			if($gallery->socialIconColor)
				$html .= "#ftg-$this->id$rid .tile .ftg-social a { color: " . $gallery->socialIconColor . "; }\n";

			if($gallery->borderRadius)
				$html .= "#ftg-$this->id$rid .tile { border-radius: " . $gallery->borderRadius . "px; }\n";

			if($gallery->shadowSize)
				$html .= "#ftg-$this->id$rid .tile { box-shadow: " . $gallery->shadowColor ." 0px 0px " . $gallery->shadowSize . "px; }\n";

			if($gallery->captionEasing)
				$html .= "#ftg-$this->id$rid .tile .caption { transition-timing-function:".$gallery->captionEasing."; }\n";

			if($gallery->captionEffectDuration)
				$html .= "#ftg-$this->id$rid .tile .caption { transition-duration:".($gallery->captionEffectDuration/1000)."s; }\n";

			$html .= "#ftg-$this->id$rid .tile .caption { background-color: $gallery->captionBackgroundColor; }\n";

			$html .= "#ftg-$this->id$rid .tile .caption { background-color: rgba($bgCaption[0], $bgCaption[1], $bgCaption[2], ". ($gallery->captionOpacity/100) . "); }\n";

			if($gallery->captionFrame == 'T' && $gallery->captionFrameColor)
				$html .= "#ftg-$this->id$rid .tile .caption.frame .text { border-color: ". $gallery->captionFrameColor ."; }\n";

			$html .= "#ftg-$this->id$rid .tile { transform: scale(" .$gallery->loadedScale/100 .") translate(" . $gallery->loadedHSlide . 'px,' . $gallery->loadedVSlide . "px) rotate(" . $gallery->loadedRotate .  "deg); }\n";

			
			if($gallery->hoverIconRotation == 'T')
			{
				$html .= "#ftg-$this->id$rid .tile .icon {\n";

				foreach($this->cssPrefixes as $prefix)
				{
					$html .= "\t" . $prefix."transition: all .5s;\n";
				}

				$html .="}\n";

				$html .= "#ftg-$this->id$rid .tile:hover .icon {\n";

				foreach($this->cssPrefixes as $prefix)
				{
					$html .= "\t" . $prefix."transform: rotate(360deg);\n";
				}

				$html .="}\n";
			}
			if(! empty($gallery->style))
				$html .= stripslashes($gallery->style);

			$html .= "</style>\n";

			$filtersSlugs = array_map("FinalTilesGalleryLite::slugify", explode('|', $gallery->filters));
			$current_filter = isset($_GET['ftg-set']) ? $_GET['ftg-set'] : null;

			if($gallery->captionMobileBehavior == "desktop")
				$gallery->captionMobileBehavior = $gallery->captionBehavior;

			$captionBehavior = wp_is_mobile() ? $gallery->captionMobileBehavior : $gallery->captionBehavior;

			$html .= "<a name='$this->id'></a>";
			$html .= "<div class='final-tiles-gallery captions-$captionBehavior hover-$gallery->captionEffect caption-full-height' id='ftg-$this->id$rid' style='width:$gallery->width'>\n";
			
			$html .= "<div class='ftg-items'>\n";

			if($gallery->loadMethod == "sequential")
				$html .= "\t<div class='loading-bar'><i></i></div>\n";

			$lightbox = $gallery->lightbox;

			$groups = array();
			
			$html .= $this->images_markup();

			$html .= "</div>\n";

			if($gallery->support == 'T')
			{
				$html .= "<div class='support-text'><a target='_blank' href='http://codecanyon.net/item/final-tiles-grid-gallery-for-wordpress/5189351?ref=".$gallery->envatoReferral."'>".$gallery->supportText."</a></div>";
			}
			$html .= "</div>\n";

			$html .= "<script type='text/javascript'>\n";			
			if($this->gallery->lightbox != 'lightgallery')
				$html .= "jQuery('#ftg-$this->id$rid img.item').removeAttr('src');\n";
			$html .= "jQuery(document).ready(function () {\n";
			$html .= "setTimeout(function () {\n";
			$html .= "\tjQuery('#ftg-$this->id$rid').finalTilesGallery({\n";
			$html .= "\t\tminTileWidth: $gallery->minTileWidth,\n";
			if(strlen($gallery->script))
			{
				$html .= "\t\tonComplete: function () { " . stripslashes($gallery->script) . "},\n";
			}
			$html .= "\t\tmargin: $gallery->margin,\n";

			$jsLoadMethod = $gallery->loadMethod;
			if($gallery->loadMethod == 'trueLazy')
				$jsLoadMethod = 'lazy';

			$html .= "\t\tloadMethod: '$jsLoadMethod',\n";

			if($gallery->ajaxLoading == 'T')
			{
				$html .= "\t\tautoLoadURL: '" . admin_url( 'admin-ajax.php' ) . "',\n";
				$html .= "\t\tpageSize: $gallery->tilesPerPage,\n";			
			}
			$html .= "\t\tnonce: '".wp_create_nonce('finaltilesgallery')."',\n";
			$html .= "\t\tgalleryId: '{$this->id}',\n";
			$html .= "\t\tlayout: '$gallery->layout',\n";
			$html .= "\t\tdebug: ".(empty($_GET['debug']) ? "false" : "true").",\n";
			$html .= "\t\tgridSize: $gallery->gridCellSize,\n";
			$html .= "\t\tallowEnlargement: " . ($gallery->enlargeImages == "T" ? "true" : "false") . ",\n";
			if($gallery->layout == "columns")
			{
				$html .= "\t\tcolumns: [\n" .
				         "\t\t\t[4000, $gallery->columns],\n" .
				         "\t\t\t[1024, $gallery->columnsTabletLandscape],\n" .
				         "\t\t\t[800, $gallery->columnsTabletPortrait],\n" .
				         "\t\t\t[480, $gallery->columnsPhoneLandscape],\n" .
				         "\t\t\t[320, $gallery->columnsPhonePortrait]\n" .
				         "\t\t],";
			}
			else
			{
				$html .= "\t\timageSizeFactor: [\n" .
				         "\t\t\t [4000, " . ($gallery->imageSizeFactor / 100) . "]\n" .
				         "\t\t\t,[1024, " . ($gallery->imageSizeFactorTabletLandscape / 100) . "]\n" .
				         "\t\t\t,[768, " . ($gallery->imageSizeFactorTabletPortrait / 100) . "]\n" .
				         "\t\t\t,[640, " . ($gallery->imageSizeFactorPhoneLandscape / 100) . "]\n" .
				         "\t\t\t,[320, " . ($gallery->imageSizeFactorPhonePortrait / 100) . "]\n";
				
				$html .= "\t\t],\n";
			}
			$html .= "\t\tscrollEffect: '"  . ($gallery->scrollEffect) . "',\n";
			$html .= "\t\tselectedFilter: '"  . $this->slugify($gallery->defaultFilter) . "'\n";
			$html .= "\t});\n";

			$html .= "\tjQuery(function () {\n";

			//$html .= "\t\tjQuery('#ftg-$this->id$rid .tile > a').unbind('click');\n";


			if($gallery->disableLightboxGroups == 'T')
			{
				if($lightbox == "prettyphoto" || $lightbox == "fancybox" || $lightbox == "swipebox" || $lightbox == "lightbox2")
				{
					$html .= "jQuery('#ftg-$this->id$rid .tile a.ftg-lightbox').each(function (i) { jQuery(this).attr('rel', 'no-group-' + i);});\n";
				}
				if($lightbox == "lightbox2")
				{
					$html .= "jQuery('#ftg-$this->id$rid .tile a.ftg-lightbox').each(function (i) { jQuery(this).attr('data-lightbox', 'no-group-' + i);});\n";
				}
			}

			$html .= "\t(function () {\n";
			$html .= "\t\tvar rel = '';\n";
			$html .= "\t\tjQuery('#ftg-$this->id$rid .ftg-lightbox').click(function (e) {\n";
			$html .= "\t\t\trel = jQuery(this).attr('rel');\n";
			$html .= "\t\t\tjQuery('#ftg-$this->id$rid .ftg-current').removeClass('ftg-current');\n";
			$html .= "\t\t\tjQuery('#ftg-$this->id$rid [rel=\"'+rel+'\"]').addClass('ftg-current');\n";
			$html .= "\t\t});\n";
			$html .= "\t})();\n";

			switch ($lightbox)
			{				
				case 'lightbox2':
				case 'everlightbox':
					break;
			}

			$html .= "\n";
			$html .= "\t});\n";
			$html .= "\t}, ". $gallery->delay .");\n";
			$html .= "\t});\n";

			$html .= "</script>";

			$html .= stripslashes($this->gallery->afterGalleryText);

			if(! empty($_GET["debug"]))
				return $html;

			if($gallery->compressHTML == 'T')
				return str_replace(array("\n", "\t"), "", $html);
			else
				return $html;
		}

		public function images_markup()
		{
			$rid = $this->id;

			$gallery = $this->gallery;

			$html = "";

			$lightbox = $gallery->lightbox;

			$groups = array();
			foreach($this->images as $image)
			{
				
				$title = in_array($gallery->lightbox, array('prettyphoto', 'fancybox', 'swipebox', 'lightbox2')) ? "title" : "data-title";

				$rel = $lightbox == "prettyphoto" ? "prettyPhoto[ftg-$this->id$rid]" : "ftg-$this->id$rid";

				if($gallery->rel)
					$rel = $gallery->rel;

				$groups["ftg-$this->id$rid"] = 1;
				
				$hiddenClass = isset($image->hidden) && $image->hidden == "T" ? "ftg-hidden-tile" : "";
				$html .= "<div class='tile $hiddenClass'>\n";

				if(property_exists($image, "type") && $image->type == "video")
				{
					$html .= "<div>";
					$html .= $image->imagePath;
					$html .= "</div>";
				}
				else
				{
					//$src = $gallery->sequentialImageLoading == "T" ? "" : $image->imagePath;
					$src = $image->imagePath;
					if(wp_is_mobile())
						$src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7";
					$description = (isset($image->title) && !empty($image->title)) ? $image->title : $image->description;

					$html .= "<a $title=\"".htmlspecialchars($description, ENT_QUOTES)."\" ". (($gallery->lightbox == "lightbox2" ) && empty($image->link) ? "data-lightbox='$rel'" : "") ." rel='$rel' " . ($this->getTarget($image)) . " class='tile-inner " . $gallery->aClass . " " . ($this->getLightboxClass($image)) . "' " . $this->getLink($image) . " " . ($lightbox == "lightgallery" ? "data-download-url='$image->original'" : '') . ">\n";

					if(! isset($image->width))
						$image->width = "auto";
					if(! isset($image->height))
						$image->height = "auto";
					if(! isset($image->alt))
						$image->alt = $description;

					$html .= "<img alt='$image->alt' class='item' data-class='item' data-ftg-src='$image->imagePath' src='$src' width='$image->width' height='$image->height' />\n";

					if($gallery->captionPosition == 'inside')
					{
							if(
								(! (empty($image->description) && empty($image->title) ) && 
									$this->useCaptions()
								) || 
								$gallery->captionEmpty == "show" || 
								$this->hasCaptionIcon()
							)
						{
							$html .= "<span class='caption ".($gallery->captionFrame == 'T' ? "frame" : null)."'>\n";
							if($this->hasCaptionIcon())
								$html .= "\t<span class='icon fa fa-".$this->getCaptionIcon()."'></span>\n";

							if($gallery->source == "images" && $this->useCaptions())
							{
								$html .= "\t<span>\n";
								if( ! empty($image->title) && $gallery->wp_field_title != "none")
									$html .= "<span class='title'>".$image->title."</span>\n";

								if( ! empty($image->description) && $gallery->wp_field_caption != "none")
									$html .= "\t<span class='text'>$image->description</span>\n";
								$html .= "\t</span>\n";
							}

							if(($gallery->source == "posts" || $gallery->source == "woocommerce") && $this->useCaptions())
							{
								$html .= "\t<span class='text'>$image->description</span>\n";
							}
							$html .= "</span>\n";
						}
					}
					$html .= "</a>\n";
					if($gallery->captionPosition == 'outside')
					{
						if((! (empty($image->description) && empty($image->title) ) && $this->useCaptions()))
						{
							$html .= "<span class='caption-outside'>\n";

							if($gallery->source == "images")
							{
								$html .= "\t<span>\n";
								if( ! empty($image->title) && $this->useCaptions())
									$html .= "<span class='title'>".$image->title."</span>\n";

								if( ! empty($image->description) && $this->useCaptions())
									$html .= "\t<span class='text'>$image->description</span>\n";
								$html .= "\t</span>\n";
							}

							if(($gallery->source == "posts" || $gallery->source == "woocommerce") && $this->useCaptions())
							{
								$html .= "\t<span class='text'>$image->description</span>\n";
							}
							$html .= "</span>\n";
						}
					}
					if($gallery->source == "woocommerce")
					{
						$html .= "<div class='woo'>";
						$html .= "\t<span class='price'>". $image->price . get_woocommerce_currency_symbol() . "</span>\n";
						$html .= "\t<a href='".get_site_url()."/cart/?add-to-cart=".$image->postID ."'><i class='fa fa-shopping-cart add-to-cart'></i></a>";
						$html .= "</div>";
					}
					$html .= "<div class='ftg-social'>\n";

					if($gallery->enableFacebook == "T")
					{
						$html .= "<a href='#' data-social='facebook' class='ftg-facebook'><i class='fa fa-facebook'></i></a>\n";
					}
					if($gallery->enableTwitter == "T")
					{
						$html .= "<a href='#' data-social='twitter' class='ftg-twitter'><i class='fa fa-twitter'></i></a>\n";
					}
					if($gallery->enablePinterest == "T")
					{
						$html .= "<a href='#' data-social='pinterest' class='ftg-pinterest'><i class='fa fa-pinterest'></i></a>\n";
					}
					if($gallery->enableGplus == "T")
					{
						$html .= "<a href='#' data-social='google-plus' class='ftg-google-plus'><i class='fa fa-google-plus'></i></a>\n";
					}
					$html .= "</div>\n";
				}

				$html .= "</div>\n";
			}

			return $html;
		}

		private function auto_excerpt($post, $length, $excerpt_ending)
		{
			$text = strip_shortcodes($post->post_content);
			$text = apply_filters('the_content', $text);
			$text = str_replace('\]\]\>', ']]&gt;', $text);
			$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
			$text = strip_tags($text);
			$words = explode(' ', $text, $length + 1);

			if (count($words) > $length)
			{
				array_pop($words);
				$text = implode(' ', $words);
				if($excerpt_ending !== 'none')
				{
					$text .= strtr($excerpt_ending, array("(" => "[", ")" => "]"));
				}
			}
			$text = trim($text);
			if(strlen($text) !== strlen($excerpt_ending))
			{
				return $text;
			}
			else
			{
				return '';
			}
		}

		public function getWooProducts()
		{
			$args = array(
				'order' 				=> 'DESC',
				'orderby' 				=> 'date',
				'post_status'			=> array('publish'),
				'meta_query'			=> '_thumbnail_id',
				'ignore_sticky_posts' 	=> 1,
				'nopaging'				=> true,
				'post_type'				=> 'product',
				'meta_query'			=> array(
					array(
						'key'           => '_visibility',
						'value'         => array('catalog', 'visible'),
						'compare'       => 'IN'
					)
				)
			);

			if($this->gallery->woo_categories)
			{
				$args['tax_query'] = array(
					array(
						'taxonomy'      => 'product_cat',
						'field' 		=> 'term_id',
						'terms'         => explode(",", $this->gallery->woo_categories),
						'operator'      => 'IN'
					)
				);
			}

			$posts = get_posts($args);

			$imageResults = array();
//          print_r($posts);
			foreach ($posts as &$post)
			{
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				if($post_thumbnail_id)
				{
					$item = new stdClass;
					$item->attID = $post_thumbnail_id;
					$item->imageId = $item->attID;
					$item->imagePath = get_post_meta( $post->ID, 'ftg_image_url', true);
					$item->filters = get_post_meta( $post->ID, 'ftg_filters', true);
					$item->price = get_post_meta( $post->ID, '_price', true);
					$item->description = $post->post_title;
					$item->postID = $post->ID;

					if(empty($item->imagePath))
					{
						$attr = wp_get_attachment_image_src( $post_thumbnail_id, $this->gallery->defaultWooImageSize);
						$item->imagePath = $attr[0];
					}

					if(empty($this->gallery->lightbox))
						$item->link = get_permalink($post->ID);

					$this->images[] = $item;
					//unset($post, $post_thumbnail_id);
				}
			}
		}
		
		public function getImages()
		{
			$skip = 0;
			$size = 0;

			if($this->gallery->ajaxLoading == "T")
			{
				$size = $this->gallery->tilesPerPage;
				$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
				$skip = ($page - 1) * $size;
			}

			$images = $this->db->getImagesByGalleryId($this->id, $skip, $size);

			$this->images = array();
			foreach($images as $image)
			{
				$image->source = "gallery";
				$image->attID = $image->imageId;
				$this->images[] = $image;
			}
			return $this->images;
		}

		public function getGallery()
		{
			if($this->gallery == null)
			{
				$this->gallery = $this->db->getGalleryById($this->id);

				foreach ( $this->defaultValues as $k => $v )
				{
					if(! isset($this->gallery->$k))
						$this->gallery->$k = $v;
				}

				if(! empty($_GET["debug"]))
				{
					$debug = (array) $this->gallery;
					$fields = array_keys($debug);
					sort($fields);
					print "\n<!-- \n";
					foreach ($fields as $item )
					{
						echo "\t[$item] : $debug[$item]\n";
					}
					print "\n -->\n";
				}
			}
			return $this->gallery;
		}
	}
}
?>