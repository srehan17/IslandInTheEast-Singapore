<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$path_site = plugins_url("../../assets/images/front_images", __FILE__);
?>

<div class="wrap">
    <?php require(GALLERY_IMG_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'free-banner.php');?>
    <p class="pro_info">
        <?php echo __('These features are available in the Professional version of the plugin only.', 'gallery-images'); ?>
        <a href="http://huge-it.com/wordpress-gallery/" target="_blank" class="button button-primary"><?php echo __('Enable','gallery-images'); ?></a>
    </p>
    <div>
        <div id="poststuff">
            <div id="post-body-content" class="gallery-options">
                <div style="clear: both;"></div>
                <div id="post-body-content" class="gallery-options">
                    <div id="post-body-heading" class="for_general_">
                        <h3><?php echo __('General Options', 'gallery-img'); ?></h3>
                        <a onclick="document.getElementById('adminForm').submit()" class="save-gallery-options button-primary"><?php echo __('Save', 'gallery-img'); ?></a>
                    </div>
                    <form action="" method="post" id="adminForm" name="adminForm">
                        <div id="gallery-options-list">
                            <ul id="gallery-view-tabs">
                                <li><a href="#gallery-view-options-0"><?php echo __('Gallery/Content-Popup', 'gallery-img'); ?></a></li>
                                <li><a href="#gallery-view-options-1"><?php echo __('Content Slider', 'gallery-img'); ?></a></li>
                                <li><a href="#gallery-view-options-2"><?php echo __('Lightbox-Gallery', 'gallery-img'); ?></a></li>
                                <li><a href="#gallery-view-options-3"><?php echo __('Slider', 'gallery-img'); ?></a></li>
                                <li><a href="#gallery-view-options-4"><?php echo __('Thumbnails', 'gallery-img'); ?></a></li>
                                <li><a href="#gallery-view-options-5"><?php echo __('Justified', 'gallery-img'); ?></a></li>
                                <li><a href="#gallery-view-options-6"><?php echo __('Blog Style Gallery', 'gallery-img'); ?></a></li>
                                <li><a href="#gallery-view-options-7"><?php echo __( 'Elastic Grid', 'gallery-img' ); ?></a></li>
                            </ul>

                            <ul class="options-block lightbox-grey-wrapper widePercents" id="gallery-view-tabs-contents">

                                <li class="gallery-view-options-0">
                                    <div>
                                        <h3><?php echo __('Content Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view2_content_in_center"><?php echo __('Show Content In The Center', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Check to set content in the center</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view2_content_in_center]" />
                                            <input type="checkbox" id="ht_view2_content_in_center"  checked="checked"  name="params[gallery_img_ht_view2_content_in_center]" value="on" />
                                        </div>
                                        <h3><?php echo __('Element Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="image_natural_size_contentpopup"><?php echo __('Image Behavior', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Check to set type of image behavior</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="image_natural_size_contentpopup" name="params[gallery_img_image_natural_size_contentpopup]">
                                                <option <?php if(get_option('gallery_img_image_natural_size_contentpopup') == 'resize'){ echo 'selected="selected"'; } ?> value="resize"><?php echo __('Resize', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_image_natural_size_contentpopup') == 'natural'){ echo 'selected="selected"'; } ?> value="natural"><?php echo __('Natural', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div >
                                            <label for="ht_view2_element_width"><?php echo __('Element Image Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element width in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_element_width]" id="ht_view2_element_width" value="<?php echo get_option('gallery_img_ht_view2_element_width'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_element_height"><?php echo __('Element Image Height', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element height in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_element_height]" id="ht_view2_element_height" value="<?php echo get_option('gallery_img_ht_view2_element_height'); ?>" class="text" />
                                            <span>px</span>
                                        </div>

                                        <div class="has-background">
                                            <label for="ht_view2_element_border_color"><?php echo __('Element Border Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element border color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_element_border_color]" type="text" class="color" id="ht_view2_element_border_color" value="#<?php echo get_option('gallery_img_ht_view2_element_border_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="ht_view2_element_overlay_color"><?php echo __('Elements Image Overlay Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element overlay color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_element_overlay_color]" type="text" class="color" id="ht_view2_element_overlay_color" value="#<?php echo get_option('gallery_img_ht_view2_element_overlay_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_zoombutton_style"><?php echo __('Elements Image Overlay Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element overlay opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_view2_element_overlay_transparency]" id="ht_view2_element_overlay_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_view2_element_overlay_transparency'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_view2_element_overlay_transparency'); ?>%</span>
                                            </div>
                                        </div>
                                        <div >
                                            <label for="ht_view2_zoombutton_style"><?php echo __('Zoom Image Style', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element zoom image type</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="ht_view2_zoombutton_style" name="params[gallery_img_ht_view2_zoombutton_style]">
                                                <option <?php if(get_option('gallery_img_ht_view2_zoombutton_style') == 'light'){ echo 'selected="selected"'; } ?> value="light">Light</option>
                                                <option <?php if(get_option('gallery_img_ht_view2_zoombutton_style') == 'dark'){ echo 'selected="selected"'; } ?> value="dark">Dark</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Element Title', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view2_element_title_font_size"><?php echo __('Element Title Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element title font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_element_title_font_size]" id="ht_view2_element_title_font_size" value="<?php echo get_option('gallery_img_ht_view2_element_title_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view2_element_title_font_color"><?php echo __('Element Title Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_element_title_font_color]" type="text" class="color" id="ht_view2_element_title_font_color" value="#<?php echo get_option('gallery_img_ht_view2_element_title_font_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_element_background_color"><?php echo __('Element Title Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element title background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_element_background_color]" type="text" class="color" id="ht_view2_element_background_color" value="#<?php echo get_option('gallery_img_ht_view2_element_background_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Element Link Button', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view2_element_show_linkbutton"><?php echo __('Show Link Button On Element', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Check to show link button on element</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view2_element_show_linkbutton]" />
                                            <input type="checkbox" id="ht_view2_element_show_linkbutton"  <?php if(get_option('gallery_img_ht_view2_element_show_linkbutton')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view2_element_show_linkbutton]" value="on" />
                                        </div>
                                        <div>
                                            <label for="ht_view2_element_linkbutton_text"><?php echo __('Link Button Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_element_linkbutton_text]" id="ht_view2_element_linkbutton_text" value="<?php echo esc_attr(get_option('gallery_img_ht_view2_element_linkbutton_text')); ?>" class="text" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_element_linkbutton_font_size"><?php echo __('Link Button Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button text font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_element_linkbutton_font_size]" id="ht_view2_element_linkbutton_font_size" value="<?php echo get_option('gallery_img_ht_view2_element_linkbutton_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view2_element_linkbutton_color"><?php echo __('Link Button Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button text font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_element_linkbutton_color]" type="text" class="color" id="ht_view2_element_linkbutton_color" value="#<?php echo get_option('gallery_img_ht_view2_element_linkbutton_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_element_linkbutton_background_color"><?php echo __('Link Button Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_element_linkbutton_background_color]" type="text" class="color" id="ht_view2_element_linkbutton_background_color" value="#<?php echo get_option('gallery_img_ht_view2_element_linkbutton_background_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Popup Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view2_popup_full_width"><?php echo __('Popup Image Full Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show image in full width</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view2_popup_full_width]" />
                                            <input type="checkbox" id="ht_view2_popup_full_width"  <?php if(get_option('gallery_img_ht_view2_popup_full_width')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view2_popup_full_width]" value="on" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_popup_background_color"><?php echo __('Popup Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose popup background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_popup_background_color]" type="text" class="color" id="ht_view2_popup_background_color" value="#<?php echo get_option('gallery_img_ht_view2_popup_background_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="ht_view2_popup_overlay_color"><?php echo __('Popup Overlay Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose popup overlay color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_popup_overlay_color]" type="text" class="color" id="ht_view2_popup_overlay_color" value="#<?php echo get_option('gallery_img_ht_view2_popup_overlay_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_popup_overlay_transparency_color"><?php echo __('Popup Overlay Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose popup overlay transparency level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_view2_popup_overlay_transparency_color]" id="ht_view2_popup_overlay_transparency_color" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_view2_popup_overlay_transparency_color'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_view2_popup_overlay_transparency_color'); ?>%</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="ht_view2_popup_closebutton_style"><?php echo __('Popup Close Button Style', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose popup close button style</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="ht_view2_popup_closebutton_style" name="params[gallery_img_ht_view2_popup_closebutton_style]">
                                                <option <?php if(get_option('gallery_img_ht_view2_popup_closebutton_style') == 'light'){ echo 'selected="selected"'; } ?> value="light"><?php echo __('Light', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_ht_view2_popup_closebutton_style') == 'dark'){ echo 'selected="selected"'; } ?> value="dark"><?php echo __('Dark', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_show_separator_lines"><?php echo __('Show Separator Lines', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show sepator lines</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view2_show_separator_lines]" />
                                            <input type="checkbox" id="ht_view2_show_separator_lines"  <?php if(get_option('gallery_img_ht_view2_show_separator_lines')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view2_show_separator_lines]" value="on" />
                                        </div>
                                        <div>
                                            <label for="light_box_arrowkey"><?php echo __('Keyboard navigation', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose to enable keyboard navigation</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="false" name="params[gallery_img_light_box_arrowkey]" />
                                            <input type="checkbox" id="light_box_arrowkey"  <?php if(get_option('gallery_img_light_box_arrowkey')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_light_box_arrowkey]" value="true" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Popup Title', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view2_popup_title_font_size"><?php echo __('Popup Title Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose popup title font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_popup_title_font_size]" id="ht_view2_element_title_font_size" value="<?php echo get_option('gallery_img_ht_view2_popup_title_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view2_popup_title_font_color"><?php echo __('Popup Title Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose popup title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_popup_title_font_color]" type="text" class="color" id="ht_view2_popup_title_font_color" value="#<?php echo get_option('gallery_img_ht_view2_popup_title_font_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Popup Description', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view2_show_description"><?php echo __('Show Description', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show description</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view2_show_description]" />
                                            <input type="checkbox" id="ht_view2_show_description"  <?php if(get_option('gallery_img_ht_view2_show_description')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view2_show_description]" value="on" />
                                        </div>
                                        <div>
                                            <label for="ht_view2_description_font_size"><?php echo __('Description Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_description_font_size]" id="ht_view2_description_font_size" value="<?php echo get_option('gallery_img_ht_view2_description_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_description_color"><?php echo __('Description Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_description_color]" type="text" class="color" id="ht_view2_description_color" value="#<?php echo get_option('gallery_img_ht_view2_description_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div style="margin-top: -35px;">
                                        <h3><?php echo __('Popup Link Button', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view2_show_popup_linkbutton"><?php echo __('Show Link Button', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show link button</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view2_show_popup_linkbutton]" />
                                            <input type="checkbox" id="ht_view2_show_popup_linkbutton"  <?php if(get_option('gallery_img_ht_view2_show_popup_linkbutton')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view2_show_popup_linkbutton]" value="on" />
                                        </div>
                                        <div>
                                            <label for="ht_view2_popup_linkbutton_text"><?php echo __('Link Button Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_popup_linkbutton_text]" id="ht_view2_popup_linkbutton_text" value="<?php echo esc_attr(get_option('gallery_img_ht_view2_popup_linkbutton_text')); ?>" class="text" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_popup_linkbutton_font_size"><?php echo __('Link Button Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view2_popup_linkbutton_font_size]" id="ht_view2_popup_linkbutton_font_size" value="<?php echo get_option('gallery_img_ht_view2_popup_linkbutton_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view2_popup_linkbutton_color"><?php echo __('Link Button Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_popup_linkbutton_color]" type="text" class="color" id="ht_view2_popup_linkbutton_color" value="#<?php echo get_option('gallery_img_ht_view2_popup_linkbutton_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_popup_linkbutton_font_hover_color"><?php echo __('Link Button Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_popup_linkbutton_font_hover_color]" type="text" class="color" id="ht_view2_popup_linkbutton_font_hover_color" value="#<?php echo get_option('gallery_img_ht_view2_popup_linkbutton_font_hover_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="ht_view2_popup_linkbutton_background_color"><?php echo __('Link Button Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_popup_linkbutton_background_color]" type="text" class="color" id="ht_view2_popup_linkbutton_background_color" value="#<?php echo get_option('gallery_img_ht_view2_popup_linkbutton_background_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view2_popup_linkbutton_background_hover_color"><?php echo __('Link Button Background Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button backgroud color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view2_popup_linkbutton_background_hover_color]" type="text" class="color" id="ht_view2_popup_linkbutton_background_hover_color" value="#<?php echo get_option('gallery_img_ht_view2_popup_linkbutton_background_hover_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div style="margin-top: -290px;">
                                        <h3><?php echo __('Pagination Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view1_paginator_fontsize"><?php echo __('Pagination Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_paginator_fontsize]" id="video_ht_view1_paginator_fontsize" value="<?php echo get_option('gallery_img_video_ht_view1_paginator_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="  fixed-size">
                                            <label for="video_ht_view1_paginator_color"><?php echo __('Pagination Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_paginator_color]" class="color" id="video_ht_view1_paginator_color" value="<?php echo get_option('gallery_img_video_ht_view1_paginator_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view1_paginator_icon_size"><?php echo __('Pagination Icons Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_paginator_icon_size]" id="video_ht_view1_paginator_icon_size" value="<?php echo get_option('gallery_img_video_ht_view1_paginator_icon_size'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="video_ht_view1_paginator_icon_color"><?php echo __('Pagination Icons Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_paginator_icon_color]" class="color" id="video_ht_view1_paginator_icon_color" value="<?php echo get_option('gallery_img_video_ht_view1_paginator_icon_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="video_ht_view1_paginator_position"><?php echo __('Pagination Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view1_paginator_position" name="params[gallery_img_video_ht_view1_paginator_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view1_paginator_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view1_paginator_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view1_paginator_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Load More Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view1_loadmore_text"><?php echo __('Load More Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_loadmore_text]" id="video_ht_view1_loadmore_text" value="<?php echo get_option('gallery_img_video_ht_view1_loadmore_text'); ?>" class="text">

                                        </div>
                                        <div>
                                            <label for="video_ht_view1_loadmore_position"><?php echo __('Load More Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view1_loadmore_position" name="params[gallery_img_video_ht_view1_loadmore_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view1_loadmore_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view1_loadmore_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view1_loadmore_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view1_loadmore_fontsize"><?php echo __('Load More Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_loadmore_fontsize]" id="video_ht_view1_loadmore_fontsize" value="<?php echo get_option('gallery_img_video_ht_view1_loadmore_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="video_ht_view1_loadmore_font_color"><?php echo __('Load More Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_loadmore_font_color]" class="color" id="video_ht_view1_loadmore_font_color" value="<?php echo get_option('gallery_img_video_ht_view1_loadmore_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view1_loadmore_font_color_hover"><?php echo __('Load More Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_loadmore_font_color_hover]" class="color" id="video_ht_view1_loadmore_font_color_hover" value="<?php echo get_option('gallery_img_video_ht_view1_loadmore_font_color_hover'); ?>" class="text">
                                        </div>
                                        <div class="fixed-size">
                                            <label for="video_ht_view1_button_color"><?php echo __('Load More Button Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_button_color]" class="color" id="video_ht_view1_button_color" value="<?php echo get_option('gallery_img_video_ht_view1_button_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view1_button_color_hover"><?php echo __('Load More Background Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view1_button_color_hover]" class="color" id="video_ht_view1_button_color_hover" value="<?php echo get_option('gallery_img_video_ht_view1_button_color_hover'); ?>" class="text">
                                        </div>

                                        <div class="navigation-type-block has-height">
                                            <label for=""><?php echo __('Loading Animation', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose loading animation type</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <div class="has-height has-background clear">
                                                <div>
                                                    <ul id="arrows-type">
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  1){ echo "class='activee'"; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading1.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view1_loading_type]" value="1" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  1){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  2){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading4.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view1_loading_type]" value="2" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  2){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  3){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading36.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view1_loading_type]" value="3" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  3){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  4){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading51.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view1_loading_type]" value="4" <?php if(get_option('gallery_img_video_ht_view1_loading_type')  ==  4){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 45px;">
                                        <h3><?php echo __('Ratings Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_popup_rating_count"><?php echo __('Show Ratings Count', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show ratings count</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_popup_rating_count]" />
                                            <input type="checkbox" id="ht_popup_rating_count"  <?php if(get_option('gallery_img_ht_popup_rating_count')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_popup_rating_count]" value="on" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_popup_likedislike_bg"><?php echo __('Ratings Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_popup_likedislike_bg]" class="color" id="ht_popup_likedislike_bg" value="<?php echo get_option('gallery_img_ht_popup_likedislike_bg'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_popup_likedislike_bg_trans"><?php echo __('Ratings Background Color Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_popup_likedislike_bg_trans]" id="ht_popup_likedislike_bg_trans" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_popup_likedislike_bg_trans'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_popup_likedislike_bg_trans'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_popup_likedislike_font_color"><?php echo __('Ratings Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_popup_likedislike_font_color]" class="color" id="ht_popup_likedislike_font_color" value="<?php echo get_option('gallery_img_ht_popup_likedislike_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_popup_active_font_color"><?php echo __('Ratings Rated Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_popup_active_font_color]" class="color" id="ht_popup_active_font_color" value="<?php echo get_option('gallery_img_ht_popup_active_font_color'); ?>" class="text">

                                        </div>

                                        <div class="fixed-size">
                                            <label for="ht_popup_likedislike_thumb_color"><?php echo __('Like/Dislike Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_popup_likedislike_thumb_color]" class="color" id="ht_popup_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_popup_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_popup_likedislike_thumb_active_color"><?php echo __('Like/Dislike Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_popup_likedislike_thumb_active_color]" class="color" id="ht_popup_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_popup_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_popup_heart_likedislike_thumb_color"><?php echo __('Heart Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_popup_heart_likedislike_thumb_color]" class="color" id="ht_popup_heart_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_popup_heart_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_popup_heart_likedislike_thumb_active_color"><?php echo __('Heart Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_popup_heart_likedislike_thumb_active_color]" class="color" id="ht_popup_heart_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_popup_heart_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                    </div>
                                </li>

                                <li class="gallery-view-options-1">
                                    <div>
                                        <h3><?php echo __('Slider Container', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view5_main_image_width"><?php echo __('Main Image Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose main image width</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view5_main_image_width]" id="ht_view5_main_image_width" value="<?php echo get_option('gallery_img_ht_view5_main_image_width'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view5_slider_background_color"><?php echo __('Slider Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view5_slider_background_color]" type="text" class="color" id="ht_view5_slider_background_color" value="#<?php echo get_option('gallery_img_ht_view5_slider_background_color'); ?>" size="10" />
                                        </div>
                                        <div  class="has-background">
                                            <label for="ht_view5_icons_style"><?php echo __('Arrow Icons Style', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose style of arrows</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="ht_view5_icons_style" name="params[gallery_img_ht_view5_icons_style]">
                                                <option <?php if(get_option('gallery_img_ht_view5_icons_style')  ==  'light'){ echo 'selected="selected"'; } ?> value="light"><?php echo __('Light', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_ht_view5_icons_style')  ==  'dark'){ echo 'selected="selected"'; } ?> value="dark"><?php echo __('Dark', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="ht_view5_show_separator_lines"><?php echo __('Show Separator Lines', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose to show separator lines</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view5_show_separator_lines]" />
                                            <input type="checkbox" id="ht_view5_show_separator_lines"  <?php if(get_option('gallery_img_ht_view5_show_separator_lines')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view5_show_separator_lines]" value="on" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Title', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view5_title_font_size"><?php echo __('Title Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view5_title_font_size]" id="ht_view5_title_font_size" value="<?php echo get_option('gallery_img_ht_view5_title_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view5_title_font_color"><?php echo __('Title Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view5_title_font_color]" type="text" class="color" id="ht_view5_title_font_color" value="#<?php echo get_option('gallery_img_ht_view5_title_font_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Description', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view5_show_description"><?php echo __('Show Description', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show description</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view5_show_description]" />
                                            <input type="checkbox" id="ht_view5_show_description"  <?php if(get_option('gallery_img_ht_view5_show_description')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view5_show_description]" value="on" />
                                        </div>
                                        <div>
                                            <label for="ht_view5_description_font_size"><?php echo __('Description Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view5_description_font_size]" id="ht_view5_description_font_size" value="<?php echo get_option('gallery_img_ht_view5_description_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view5_description_color"><?php echo __('Description Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view5_description_color]" type="text" class="color" id="ht_view5_description_color" value="#<?php echo get_option('gallery_img_ht_view5_description_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div style="margin-top:-120px;">
                                        <h3><?php echo __('Link Button', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view5_show_linkbutton"><?php echo __('Show Link Button', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show link button</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view5_show_linkbutton]" />
                                            <input type="checkbox" id="ht_view5_show_linkbutton"  <?php if(get_option('gallery_img_ht_view5_show_linkbutton')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view5_show_linkbutton]" value="on" />
                                        </div>
                                        <div>
                                            <label for="ht_view5_linkbutton_text"><?php echo __('Link Button Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view5_linkbutton_text]" id="ht_view5_linkbutton_text" value="<?php echo esc_attr(get_option('gallery_img_ht_view5_linkbutton_text')); ?>" class="text" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view5_linkbutton_font_size"><?php echo __('Link Button Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button text font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view5_linkbutton_font_size]" id="ht_view5_linkbutton_font_size" value="<?php echo get_option('gallery_img_ht_view5_linkbutton_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view5_linkbutton_color"><?php echo __('Link Button Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view5_linkbutton_color]" type="text" class="color" id="ht_view5_linkbutton_color" value="#<?php echo get_option('gallery_img_ht_view5_linkbutton_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view5_linkbutton_font_hover_color"><?php echo __('Link Button Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view5_linkbutton_font_hover_color]" type="text" class="color" id="ht_view5_linkbutton_font_hover_color" value="#<?php echo get_option('gallery_img_ht_view5_linkbutton_font_hover_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="ht_view5_linkbutton_background_color"><?php echo __('Link Button Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view5_linkbutton_background_color]" type="text" class="color" id="ht_view5_linkbutton_background_color" value="#<?php echo get_option('gallery_img_ht_view5_linkbutton_background_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view5_linkbutton_background_hover_color"><?php echo __('Link Button Background Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose link button background color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view5_linkbutton_background_hover_color]" type="text" class="color" id="ht_view5_linkbutton_background_hover_color" value="#<?php echo get_option('gallery_img_ht_view5_linkbutton_background_hover_color'); ?>" size="10" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Ratings Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_contentsl_rating_count"><?php echo __('Show Ratings Count', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show ratings count</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_contentsl_rating_count]" />
                                            <input type="checkbox" id="ht_contentsl_rating_count"  <?php if(get_option('gallery_img_ht_contentsl_rating_count')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_contentsl_rating_count]" value="on" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_contentsl_likedislike_bg"><?php echo __('Ratings Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_contentsl_likedislike_bg]" class="color" id="ht_contentsl_likedislike_bg" value="<?php echo get_option('gallery_img_ht_contentsl_likedislike_bg'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_contentsl_likedislike_bg_trans"><?php echo __('Ratings Background Color Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_contentsl_likedislike_bg_trans]" id="ht_contentsl_likedislike_bg_trans" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_contentsl_likedislike_bg_trans'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_contentsl_likedislike_bg_trans'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_contentsl_likedislike_font_color"><?php echo __('Ratings Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_contentsl_likedislike_font_color]" class="color" id="ht_contentsl_likedislike_font_color" value="<?php echo get_option('gallery_img_ht_contentsl_likedislike_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_contentsl_active_font_color"><?php echo __('Ratings Rated Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_contentsl_active_font_color]" class="color" id="ht_contentsl_active_font_color" value="<?php echo get_option('gallery_img_ht_contentsl_active_font_color'); ?>" class="text">

                                        </div>

                                        <div class="fixed-size">
                                            <label for="ht_contentsl_likedislike_thumb_color"><?php echo __('Like/Dislike Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_contentsl_likedislike_thumb_color]" class="color" id="ht_contentsl_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_contentsl_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_contentsl_likedislike_thumb_active_color"><?php echo __('Like/Dislike Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_contentsl_likedislike_thumb_active_color]" class="color" id="ht_contentsl_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_contentsl_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_contentsl_heart_likedislike_thumb_color"><?php echo __('Heart Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_contentsl_heart_likedislike_thumb_color]" class="color" id="ht_contentsl_heart_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_contentsl_heart_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_contentsl_heart_likedislike_thumb_active_color"><?php echo __('Heart Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart active icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_contentsl_heart_likedislike_thumb_active_color]" class="color" id="ht_contentsl_heart_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_contentsl_heart_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                    </div>
                                </li>

                                <li class="gallery-view-options-2">
                                    <div>
                                        <h3><?php echo __('Content Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view6_content_in_center"><?php echo __('Show Content In The Center', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Check to set content in the center</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_view6_content_in_center]" />
                                            <input type="checkbox" id="ht_view6_content_in_center"  <?php if(get_option('gallery_img_ht_view6_content_in_center')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view6_content_in_center]" value="on" />
                                        </div>

                                        <h3><?php echo __('Image', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view6_width"><?php echo __('Image Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image width in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view6_width]" id="ht_view6_width" value="<?php echo get_option('gallery_img_ht_view6_width'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view6_border_width"><?php echo __('Image Border Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image border width in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view6_border_width]" id="ht_view6_border_width" value="<?php echo get_option('gallery_img_ht_view6_border_width'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view6_border_color"><?php echo __('Image Border Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image border color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view6_border_color]" type="text" class="color" id="ht_view6_border_color" value="#<?php echo get_option('gallery_img_ht_view6_border_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="ht_view6_border_radius"><?php echo __('Border Radius', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image border radius</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view6_border_radius]" id="ht_view6_border_radius" value="<?php echo get_option('gallery_img_ht_view6_border_radius'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                    </div>

                                    <div class="light_margin">
                                        <h3><?php echo __('Title', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view6_title_font_size"><?php echo __('Title Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image title font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view6_title_font_size]" id="ht_view6_title_font_size" value="<?php echo get_option('gallery_img_ht_view6_title_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="ht_view6_title_font_color"><?php echo __('Title Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view6_title_font_color]" type="text" class="color" id="ht_view6_title_font_color" value="#<?php echo get_option('gallery_img_ht_view6_title_font_color'); ?>" size="10" />
                                        </div>
                                        <div  class="has-background">
                                            <label for="ht_view6_title_font_hover_color"><?php echo __('Title Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element title font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view6_title_font_hover_color]" type="text" class="color" id="ht_view6_title_font_hover_color" value="#<?php echo get_option('gallery_img_ht_view6_title_font_hover_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="ht_view6_title_background_color"><?php echo __('Title Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element title background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view6_title_background_color]" type="text" class="color" id="ht_view6_title_background_color" value="#<?php echo get_option('gallery_img_ht_view6_title_background_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view6_title_background_transparency"><?php echo __('Title Background Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element title background opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_view6_title_background_transparency]" id="ht_view6_title_background_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_view6_title_background_transparency'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_view6_title_background_transparency'); ?>%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <h3><?php echo __('Pagination Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view4_paginator_fontsize"><?php echo __('Pagination Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_paginator_fontsize]" id="video_ht_view4_paginator_fontsize" value="<?php echo get_option('gallery_img_video_ht_view4_paginator_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="  fixed-size">
                                            <label for="video_ht_view4_paginator_color"><?php echo __('Pagination Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_paginator_color]" class="color" id="video_ht_view4_paginator_color" value="<?php echo get_option('gallery_img_video_ht_view4_paginator_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view4_paginator_icon_size"><?php echo __('Pagination Icons Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_paginator_icon_size]" id="video_ht_view4_paginator_icon_size" value="<?php echo get_option('gallery_img_video_ht_view4_paginator_icon_size'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="video_ht_view4_paginator_icon_color"><?php echo __('Pagination Icons Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_paginator_icon_color]" class="color" id="video_ht_view4_paginator_icon_color" value="<?php echo get_option('gallery_img_video_ht_view4_paginator_icon_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="video_ht_view4_paginator_position"><?php echo __('Pagination Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view4_paginator_position" name="params[gallery_img_video_ht_view4_paginator_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view4_paginator_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view4_paginator_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view4_paginator_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="margin-top:-235px;">
                                        <h3><?php echo __('Load More Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view4_loadmore_text"><?php echo __('Load More Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_loadmore_text]" id="video_ht_view4_loadmore_text" value="<?php echo esc_attr(get_option('gallery_img_video_ht_view4_loadmore_text')); ?>" class="text">

                                        </div>
                                        <div>
                                            <label for="video_ht_view4_loadmore_position"><?php echo __('Load More Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view4_loadmore_position" name="params[gallery_img_video_ht_view4_loadmore_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view4_loadmore_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view4_loadmore_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view4_loadmore_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view4_loadmore_fontsize"><?php echo __('Load More Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_loadmore_fontsize]" id="video_ht_view4_loadmore_fontsize" value="<?php echo get_option('gallery_img_video_ht_view4_loadmore_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="video_ht_view4_loadmore_font_color"><?php echo __('Load More Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_loadmore_font_color]" class="color" id="video_ht_view4_loadmore_font_color" value="<?php echo get_option('gallery_img_video_ht_view4_loadmore_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view4_loadmore_font_color_hover"><?php echo __('Load More Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_loadmore_font_color_hover]" class="color" id="video_ht_view4_loadmore_font_color_hover" value="<?php echo get_option('gallery_img_video_ht_view4_loadmore_font_color_hover'); ?>" class="text">
                                        </div>
                                        <div class="fixed-size">
                                            <label for="video_ht_view4_button_color"><?php echo __('Load More Button Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_button_color]" class="color" id="video_ht_view4_button_color" value="<?php echo get_option('gallery_img_video_ht_view4_button_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view4_button_color_hover"><?php echo __('Load More Background Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view4_button_color_hover]" class="color" id="video_ht_view4_button_color_hover" value="<?php echo get_option('gallery_img_video_ht_view4_button_color_hover'); ?>" class="text">
                                        </div>
                                        <div class="navigation-type-block has-height" style="padding-top:20px;">
                                            <label for=""><?php echo __('Loading Animation', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose loading animation type</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <div class="has-height " style="clear:both;padding:10px 0px 0px 80px;">
                                                <div>
                                                    <ul id="arrows-type">
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  1){ echo "class='activee'"; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading1.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view4_loading_type]" value="1" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  1){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  2){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading4.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view4_loading_type]" value="2" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  2){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  3){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading36.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view4_loading_type]" value="3" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  3){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  4){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading51.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view4_loading_type]" value="4" <?php if(get_option('gallery_img_video_ht_view4_loading_type')  ==  4){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Ratings Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_lightbox_rating_count"><?php echo __('Show Ratings Count', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show ratings count</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_lightbox_rating_count]" />
                                            <input type="checkbox" id="ht_lightbox_rating_count"  <?php if(get_option('gallery_img_ht_lightbox_rating_count')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_lightbox_rating_count]" value="on" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_lightbox_likedislike_bg"><?php echo __('Ratings Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_lightbox_likedislike_bg]" class="color" id="ht_lightbox_likedislike_bg" value="<?php echo get_option('gallery_img_ht_lightbox_likedislike_bg'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_lightbox_likedislike_bg_trans"><?php echo __('Ratings Background Color Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_lightbox_likedislike_bg_trans]" id="ht_lightbox_likedislike_bg_trans" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_lightbox_likedislike_bg_trans'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_lightbox_likedislike_bg_trans'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_lightbox_likedislike_font_color"><?php echo __('Ratings Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_lightbox_likedislike_font_color]" class="color" id="ht_lightbox_likedislike_font_color" value="<?php echo get_option('gallery_img_ht_lightbox_likedislike_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_lightbox_active_font_color"><?php echo __('Ratings Rated Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_lightbox_active_font_color]" class="color" id="ht_lightbox_active_font_color" value="<?php echo get_option('gallery_img_ht_lightbox_active_font_color'); ?>" class="text">

                                        </div>

                                        <div class="fixed-size">
                                            <label for="ht_lightbox_likedislike_thumb_color"><?php echo __('Like/Dislike Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_lightbox_likedislike_thumb_color]" class="color" id="ht_lightbox_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_lightbox_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_lightbox_likedislike_thumb_active_color"><?php echo __('Like/Dislike Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_lightbox_likedislike_thumb_active_color]" class="color" id="ht_lightbox_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_lightbox_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_lightbox_heart_likedislike_thumb_color"><?php echo __('Heart Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_lightbox_heart_likedislike_thumb_color]" class="color" id="ht_lightbox_heart_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_lightbox_heart_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_lightbox_heart_likedislike_thumb_active_color"><?php echo __('Heart Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_lightbox_heart_likedislike_thumb_active_color]" class="color" id="ht_lightbox_heart_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_lightbox_heart_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                    </div>
                                </li>

                                <li class="gallery-view-options-3">
                                    <div class="options-block" id="options-block-slider">
                                        <h3><?php echo __('Slider', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="slider_crop_image"><?php echo __('Image Behavior', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose to set image behavior</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="slider_crop_image" name="params[gallery_img_slider_crop_image]">
                                                <option <?php if(get_option('gallery_img_slider_crop_image')  ==  'crop'){ echo 'selected'; } ?> value="crop"><?php echo __('Natural', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_slider_crop_image')  ==  'resize'){ echo 'selected'; } ?> value="resize"><?php echo __('Resize', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="slider_slider_background_color"><?php echo __('Slider Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_slider_background_color]" type="text" class="color" id="slider_slider_background_color" value="#<?php echo get_option('gallery_img_slider_slider_background_color'); ?>" size="10">
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_slideshow_border_size"><?php echo __('Slider Border Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider border size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_slideshow_border_size]" id="slider_slideshow_border_size" value="<?php echo get_option('gallery_img_slider_slideshow_border_size'); ?>" class="text" />
                                        </div>
                                        <div>
                                            <label for="slider_slideshow_border_color"><?php echo __('Slider Border Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider border color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_slideshow_border_color]" type="text" class="color" id="slider_slideshow_border_color" value="#<?php echo get_option('gallery_img_slider_slideshow_border_color'); ?>" size="10">
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_slideshow_border_radius"><?php echo __('Slider Border radius', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider border radius</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_slideshow_border_radius]" id="slider_slideshow_border_radius" value="<?php echo get_option('gallery_img_slider_slideshow_border_radius'); ?>" class="text" />
                                        </div>
                                    </div>
                                    <div class="options-block" id="options-block-title">
                                        <h3><?php echo __('Title', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="title-container-width"><?php echo __('Title Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title width in percentage</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_slider_title_width]" id="title-container-width" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo get_option('gallery_img_slider_title_width'); ?>" />
                                                <span><?php echo get_option('gallery_img_slider_title_width'); ?>%</span>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div>
                                            <label for="slider_title_has_margin"><?php echo __('Title Has Margin', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether title has margin</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_slider_title_has_margin]" />
                                            <input type="checkbox" id="slider_title_has_margin"  <?php if(get_option('gallery_img_slider_title_has_margin')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_slider_title_has_margin]"  value="on" />
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_title_font_size"><?php echo __('Title Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_title_font_size]" id="slider_title_font_size" value="<?php echo get_option('gallery_img_slider_title_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="slider_title_color"><?php echo __('Title Text Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_title_color]" type="text" class="color" id="slider_title_color" value="#<?php echo get_option('gallery_img_slider_title_color'); ?>" size="10" />
                                        </div>
                                        <div  class="has-background">
                                            <label for="slider_title_text_align"><?php echo __('Title Text Align', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title text alignment</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="slider_title_text_align" name="params[gallery_img_slider_title_text_align]">
                                                <option <?php if(get_option('gallery_img_slider_title_text_align')  ==  'justify'){ echo 'justify'; } ?> value="justify"><?php echo __('Full width', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_slider_title_text_align')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_slider_title_text_align')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_slider_title_text_align')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="title-background-transparency"><?php echo __('Title Background Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title background transparency level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_slider_title_background_transparency]" id="title-background-transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_slider_title_background_transparency'); ?>" />
                                                <span><?php echo get_option('gallery_img_slider_title_background_transparency'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_title_background_color"><?php echo __('Title Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_title_background_color]" type="text" class="color" id="slider_title_background_color" value="#<?php echo get_option('gallery_img_slider_title_background_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="slider_title_border_size"><?php echo __('Title Border Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title border size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_title_border_size]" id="slider_title_border_size" value="<?php echo get_option('gallery_img_slider_title_border_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_title_border_color"><?php echo __('Title Border Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title border color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_title_border_color]" type="text" class="color" id="slider_title_border_color" value="#<?php echo get_option('gallery_img_slider_title_border_color'); ?>" size="10">
                                        </div>
                                        <div>
                                            <label for="slider_title_border_radius"><?php echo __('Title Border Radius', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title border radius</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_title_border_radius]" id="slider_title_border_radius" value="<?php echo get_option('gallery_img_slider_title_border_radius'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-height has-background">
                                            <label for=""><?php echo __('Title Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div>
                                                <table class="bws_position_table">
                                                    <tbody>
                                                    <tr>
                                                        <td><input type="radio" value="left-top" id="slideshow_title_top-left" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'left-top'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="center-top" id="slideshow_title_top-center" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'center-top'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="right-top" id="slideshow_title_top-right" name="params[gallery_img_slider_title_position]"  <?php if(get_option('gallery_img_slider_title_position')  ==  'right-top'){ echo 'checked="checked"'; } ?> /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" value="left-middle" id="slideshow_title_middle-left" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'left-middle'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="center-middle" id="slideshow_title_middle-center" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'center-middle'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="right-middle" id="slideshow_title_middle-right" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'right-middle'){ echo 'checked="checked"'; } ?> /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" value="left-bottom" id="slideshow_title_bottom-left" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'left-bottom'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="center-bottom" id="slideshow_title_bottom-center" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'center-bottom'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="right-bottom" id="slideshow_title_bottom-right" name="params[gallery_img_slider_title_position]" <?php if(get_option('gallery_img_slider_title_position')  ==  'right-bottom'){ echo 'checked="checked"'; } ?> /></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="options-block" style="margin-top:-270px;">
                                        <h3><?php echo __('Description', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="description-container-width"><?php echo __('Description Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description container width </p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_slider_description_width]" id="description-container-width" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo get_option('gallery_img_slider_description_width'); ?>" />
                                                <span><?php echo get_option('gallery_img_slider_description_width'); ?>%</span>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div>
                                            <label for="slider_description_has_margin"><?php echo __('Description Has Margin', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether description has margin</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_slider_description_has_margin]" />
                                            <input type="checkbox" id="slider_description_has_margin"  <?php if(get_option('gallery_img_slider_description_has_margin')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_slider_description_has_margin]" value="on" />
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_description_font_size"><?php echo __('Description Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_description_font_size]" id="slider_description_font_size" value="<?php echo get_option('gallery_img_slider_description_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="slider_description_color"><?php echo __('Description Text Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_description_color]" type="text" class="color" id="slider_description_color" value="#<?php echo get_option('gallery_img_slider_description_color'); ?>" size="10" />
                                        </div>
                                        <div  class="has-background">
                                            <label for="slider_description_text_align"><?php echo __('Description Text Align', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description text alignment</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="slider_description_text_align" name="params[gallery_img_slider_description_text_align]">
                                                <option <?php if(get_option('gallery_img_slider_description_text_align')  ==  'justify'){ echo 'justify'; } ?> value="justify"><?php echo __('Full width', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_slider_description_text_align')  ==  'center'){ echo 'center'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_slider_description_text_align')  ==  'left'){ echo 'left'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_slider_description_text_align')  ==  'right'){ echo 'right'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="description-background-transparency"><?php echo __('Description Background Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description background opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_slider_description_background_transparency]" id="description-background-transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_slider_description_background_transparency'); ?>" />
                                                <span><?php echo get_option('gallery_img_slider_description_background_transparency'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_description_background_color"><?php echo __('Description Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_description_background_color]" type="text" class="color" id="slider_description_background_color" value="#<?php echo get_option('gallery_img_slider_description_background_color'); ?>" size="10">
                                        </div>
                                        <div>
                                            <label for="slider_description_border_size"><?php echo __('Description Border Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description border size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_description_border_size]" id="slider_description_border_size" value="<?php echo get_option('gallery_img_slider_description_border_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="slider_description_border_color"><?php echo __('Description Border Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description border color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_slider_description_border_color]" type="text" class="color" id="slider_description_border_color" value="#<?php echo get_option('gallery_img_slider_description_border_color'); ?>" size="10">
                                        </div>
                                        <div>
                                            <label for="slider_description_border_radius"><?php echo __('Description Border Radius', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description border radius</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_slider_description_border_radius]" id="slider_description_border_radius" value="<?php echo get_option('gallery_img_slider_description_border_radius'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-height has-background">
                                            <label for="params[gallery_img_slider_description_position]"><?php echo __('Description Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div>
                                                <table class="bws_position_table">
                                                    <tbody>
                                                    <tr>
                                                        <td><input type="radio" value="left-top" id="slideshow_description_top-left" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'left-top'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="center-top" id="slideshow_description_top-center" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'center-top'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="right-top" id="slideshow_description_top-right" name="params[gallery_img_slider_description_position]"  <?php if(get_option('gallery_img_slider_description_position')  ==  'right-top'){ echo 'checked="checked"'; } ?> /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" value="left-middle" id="slideshow_description_middle-left" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'left-middle'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="center-middle" id="slideshow_description_middle-center" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'center-middle'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="right-middle" id="slideshow_description_middle-right" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'right-middle'){ echo 'checked="checked"'; } ?> /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" value="left-bottom" id="slideshow_description_bottom-left" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'left-bottom'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="center-bottom" id="slideshow_description_bottom-center" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'center-bottom'){ echo 'checked="checked"'; } ?> /></td>
                                                        <td><input type="radio" value="right-bottom" id="slideshow_description_bottom-right" name="params[gallery_img_slider_description_position]" <?php if(get_option('gallery_img_slider_description_position')  ==  'right-bottom'){ echo 'checked="checked"'; } ?> /></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="options-block" id="options-block-navigation">
                                        <h3><?php echo __('Navigation', 'gallery-img'); ?></h3>
                                        <div  class="has-background">
                                            <label for="slider_show_arrows"><?php echo __('Show Navigation Arrows', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show arrows</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_slider_show_arrows]" />
                                            <input type="checkbox" id="slider_show_arrows" <?php if(get_option('gallery_img_slider_show_arrows')  == 'on'){ echo 'checked="checked"'; } ?> name="params[gallery_img_slider_show_arrows]" value="on" />
                                        </div>
                                        <div>
                                            <label for="slider_dots_position"><?php echo __('Navigation Dots Position / Hide Dots', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider dots position and whether to show or no</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="slider_dots_position" name="params[gallery_img_slider_dots_position]">
                                                <option <?php if(get_option('gallery_img_slider_dots_position')  ==  'none'){ echo 'selected'; } ?> value="none"><?php echo __('', 'gallery-img'); ?>Dont Show</option>
                                                <option <?php if(get_option('gallery_img_slider_dots_position')  ==  'top'){ echo 'selected'; } ?> value="top"><?php echo __('', 'gallery-img'); ?>Top</option>
                                                <option <?php if(get_option('gallery_img_slider_dots_position')  ==  'bottom'){ echo 'selected'; } ?> value="bottom"><?php echo __('', 'gallery-img'); ?>Bottom</option>
                                            </select>
                                        </div>
                                        <div  class="has-background">
                                            <label for="slider_dots_color"><?php echo __('Navigation Dots Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider dots color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" class="color" name="params[gallery_img_slider_dots_color]" id="slider_dots_color" value="<?php echo get_option('gallery_img_slider_dots_color'); ?>" class="text" />
                                        </div>
                                        <div>
                                            <label for="slider_active_dot_color"><?php echo __('Navigation Active Dot Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose navigation dots active color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" class="color" name="params[gallery_img_slider_active_dot_color]" id="slider_active_dot_color" value="<?php echo get_option('gallery_img_slider_active_dot_color'); ?>" class="text" />
                                        </div>
                                        <div class="navigation-type-block has-height has-background" style="padding-top:20px;">
                                            <label for=""><?php echo __('Navigation Type', 'gallery-img'); ?> <?php echo get_option('gallery_img_slider_navigation_type'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider navigation type</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <div class="has-height has-background" style="clear:both;padding:10px 0px 0px 80px;">
                                                <div>
                                                    <ul id="arrows-type">
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  1){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.simple.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="1" <?php if(get_option('gallery_img_slider_navigation_type')  ==  1){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  2){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.circle.shadow.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="2" <?php if(get_option('gallery_img_slider_navigation_type')  ==  2){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  3){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.circle.simple.dark.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="3" <?php if(get_option('gallery_img_slider_navigation_type')  ==  3){ echo 'checked="checked"'; } ?>>
                                                        </li>

                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  4){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.cube.dark.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="4" <?php if(get_option('gallery_img_slider_navigation_type')  ==  4){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  5 ){ echo 'class="active"'; } ?> >
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.light.blue.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="5" <?php if(get_option('gallery_img_slider_navigation_type')  ==  5){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  6){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.light.cube.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="6" <?php if(get_option('gallery_img_slider_navigation_type')  ==  6){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  8){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="8" <?php if(get_option('gallery_img_slider_navigation_type')  ==  8){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  9){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.circle.blue.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="9" <?php if(get_option('gallery_img_slider_navigation_type')  ==  9){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  10){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.circle.green.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="10" <?php if(get_option('gallery_img_slider_navigation_type')  ==  10){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  11){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.blue.retro.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="11" <?php if(get_option('gallery_img_slider_navigation_type')  ==  11){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  12){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.green.retro.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="12" <?php if(get_option('gallery_img_slider_navigation_type')  ==  12){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  13){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.red.circle.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="13" <?php if(get_option('gallery_img_slider_navigation_type')  ==  13){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li class="color" <?php if(get_option('gallery_img_slider_navigation_type')  ==  14){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.triangle.white.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="14" <?php if(get_option('gallery_img_slider_navigation_type')  ==  14){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  15){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.ancient.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="15" <?php if(get_option('gallery_img_slider_navigation_type')  ==  15){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li <?php if(get_option('gallery_img_slider_navigation_type')  ==  16){ echo 'class="active"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/arrows.black.out.png" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_slider_navigation_type]" value="16" <?php if(get_option('gallery_img_slider_navigation_type')  ==  16){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:-610px;">
                                        <h3><?php echo __('Ratings Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_slider_rating_count"><?php echo __('Show Ratings Count', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to display slider rating count</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_slider_rating_count]" />
                                            <input type="checkbox" id="ht_slider_rating_count"  <?php if(get_option('gallery_img_ht_slider_rating_count')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_slider_rating_count]" value="on" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_slider_likedislike_bg"><?php echo __('Ratings Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_slider_likedislike_bg]" class="color" id="ht_slider_likedislike_bg" value="<?php echo get_option('gallery_img_ht_slider_likedislike_bg'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_slider_likedislike_bg_trans"><?php echo __('Ratings Background Color Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose slider background opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_slider_likedislike_bg_trans]" id="ht_slider_likedislike_bg_trans" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_slider_likedislike_bg_trans'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_slider_likedislike_bg_trans'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_slider_likedislike_font_color"><?php echo __('Ratings Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose rating font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_slider_likedislike_font_color]" class="color" id="ht_slider_likedislike_font_color" value="<?php echo get_option('gallery_img_ht_slider_likedislike_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_slider_active_font_color"><?php echo __('Ratings Rated Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose rating active font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_slider_active_font_color]" class="color" id="ht_slider_active_font_color" value="<?php echo get_option('gallery_img_ht_slider_active_font_color'); ?>" class="text">

                                        </div>

                                        <div class="fixed-size">
                                            <label for="ht_slider_likedislike_thumb_color"><?php echo __('Like/Dislike Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose like/dislike icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_slider_likedislike_thumb_color]" class="color" id="ht_slider_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_slider_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_slider_likedislike_thumb_active_color"><?php echo __('Like/Dislike Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose like/dislike active icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_slider_likedislike_thumb_active_color]" class="color" id="ht_slider_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_slider_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_slider_heart_likedislike_thumb_color"><?php echo __('Heart Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_slider_heart_likedislike_thumb_color]" class="color" id="ht_slider_heart_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_slider_heart_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_slider_heart_likedislike_thumb_active_color"><?php echo __('Heart Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose active heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_slider_heart_likedislike_thumb_active_color]" class="color" id="ht_slider_heart_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_slider_heart_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                    </div>
                                </li>

                                <li class="gallery-view-options-4">
                                    <div>
                                        <h3><?php echo __('Container Style', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="thumb_box_padding"><?php echo __('Box padding', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose box padding in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_thumb_box_padding]" id="thumb_box_padding" value="<?php echo get_option('gallery_img_thumb_box_padding'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="thumb_box_background"><?php echo __('Box background', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose box background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_thumb_box_background]" type="text" class="color" id="thumb_box_background" value="#<?php echo get_option('gallery_img_thumb_box_background'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="thumb_box_use_shadow"><?php echo __('Box Use shadow', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Set box shadow</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_thumb_box_use_shadow]" />
                                            <input type="checkbox" id="thumb_box_use_shadow"  <?php if(get_option('gallery_img_thumb_box_use_shadow')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_thumb_box_use_shadow]" value="on" />
                                        </div>
                                        <div>
                                            <label for="thumb_box_has_background"><?php echo __('Box Has background', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Set box background</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_thumb_box_has_background]" />
                                            <input type="checkbox" id="thumb_box_has_background"  <?php if(get_option('gallery_img_thumb_box_has_background')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_thumb_box_has_background]" value="on" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Image', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="image_natural_size_thumbnail"><?php echo __('Image Behavior', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image behavior</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="image_natural_size_thumbnail" name="params[gallery_img_image_natural_size_thumbnail]">
                                                <option <?php if(get_option('gallery_img_image_natural_size_thumbnail')  ==  'resize'){ echo 'selected="selected"'; } ?> value="resize">Resize</option>
                                                <option <?php if(get_option('gallery_img_image_natural_size_thumbnail')  ==  'natural'){ echo 'selected="selected"'; } ?> value="natural">Natural</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="thumb_image_width"><?php echo __('Image Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image width in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_thumb_image_width]" id="thumb_image_width" value="<?php echo get_option('gallery_img_thumb_image_width'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="thumb_image_height"><?php echo __('Image Height', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image height in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_thumb_image_height]" id="thumb_image_height" value="<?php echo get_option('gallery_img_thumb_image_height'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="thumb_image_border_width"><?php echo __('Image Border Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image border width in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_thumb_image_border_width]" id="thumb_image_border_width" value="<?php echo get_option('gallery_img_thumb_image_border_width'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="thumb_image_border_color"><?php echo __('Image Border Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image border color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_thumb_image_border_color]" type="text" class="color" id="thumb_image_border_color" value="#<?php echo get_option('gallery_img_thumb_image_border_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="thumb_image_border_radius"><?php echo __('Border Radius', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image border radius</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_thumb_image_border_radius]" id="thumb_image_border_radius" value="<?php echo get_option('gallery_img_thumb_image_border_radius'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="thumb_margin_image"><?php echo __('Margin Image', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image margin</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_thumb_margin_image]" id="thumb_margin_image" value="<?php echo get_option('gallery_img_thumb_margin_image'); ?>" class="text" />
                                        </div>
                                    </div>
                                    <div style="margin-top:-110px">
                                        <h3><?php echo __('Title', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="thumb_title_font_size"><?php echo __('Title Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_thumb_title_font_size]" id="thumb_title_font_size" value="<?php echo get_option('gallery_img_thumb_title_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div>
                                            <label for="thumb_title_font_color"><?php echo __('Title Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_thumb_title_font_color]" type="text" class="color" id="thumb_title_font_color" value="#<?php echo get_option('gallery_img_thumb_title_font_color'); ?>" size="10" />
                                        </div>
                                        <div class="has-background">
                                            <label for="thumb_title_background_color"><?php echo __('Overlay Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_thumb_title_background_color]" type="text" class="color" id="thumb_title_background_color" value="#<?php echo get_option('gallery_img_thumb_title_background_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="thumb_title_background_transparency"><?php echo __('Title Background Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title background transparency level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_thumb_title_background_transparency]" id="thumb_title_background_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_thumb_title_background_transparency'); ?>" />
                                                <span><?php echo get_option('gallery_img_thumb_title_background_transparency'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="has-background">
                                            <label for="thumb_view_text"><?php echo __('Link Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose the text of the link</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_thumb_view_text]" type="text" id="thumb_view_text" value="<?php echo get_option('gallery_img_thumb_view_text'); ?>"  />
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Pagination Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view7_paginator_fontsize"><?php echo __('Pagination Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_paginator_fontsize]" id="video_ht_view7_paginator_fontsize" value="<?php echo get_option('gallery_img_video_ht_view7_paginator_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="  fixed-size">
                                            <label for="video_ht_view7_paginator_color"><?php echo __('Pagination Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_paginator_color]" class="color" id="video_ht_view7_paginator_color" value="<?php echo get_option('gallery_img_video_ht_view7_paginator_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view7_paginator_icon_size"><?php echo __('Pagination Icons Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_paginator_icon_size]" id="video_ht_view7_paginator_icon_size" value="<?php echo get_option('gallery_img_video_ht_view7_paginator_icon_size'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="video_ht_view7_paginator_icon_color"><?php echo __('Pagination Icons Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_paginator_icon_color]" class="color" id="video_ht_view7_paginator_icon_color" value="<?php echo get_option('gallery_img_video_ht_view7_paginator_icon_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="video_ht_view7_paginator_position"><?php echo __('Pagination Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view7_paginator_position" name="params[gallery_img_video_ht_view7_paginator_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view7_paginator_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view7_paginator_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view7_paginator_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="thumb_margin">
                                        <h3><?php echo __('Load More Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view7_loadmore_text"><?php echo __('Load More Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_loadmore_text]" id="video_ht_view7_loadmore_text" value="<?php echo esc_attr(get_option('gallery_img_video_ht_view7_loadmore_text')); ?>" class="text">

                                        </div>
                                        <div>
                                            <label for="video_ht_view7_loadmore_position"><?php echo __('Load More Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view7_loadmore_position" name="params[gallery_img_video_ht_view7_loadmore_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view7_loadmore_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view7_loadmore_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view7_loadmore_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view7_loadmore_fontsize"><?php echo __('Load More Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_loadmore_fontsize]" id="video_ht_view7_loadmore_fontsize" value="<?php echo get_option('gallery_img_video_ht_view7_loadmore_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="  fixed-size">
                                            <label for="video_ht_view7_loadmore_font_color"><?php echo __('Load More Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_loadmore_font_color]" class="color" id="video_ht_view7_loadmore_font_color" value="<?php echo get_option('gallery_img_video_ht_view7_loadmore_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view7_loadmore_font_color_hover"><?php echo __('Load More Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_loadmore_font_color_hover]" class="color" id="video_ht_view7_loadmore_font_color_hover" value="<?php echo get_option('gallery_img_video_ht_view7_loadmore_font_color_hover'); ?>" class="text">
                                        </div>
                                        <div class="fixed-size">
                                            <label for="video_ht_view7_button_color"><?php echo __('Load More Button Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_button_color]" class="color" id="video_ht_view7_button_color" value="<?php echo get_option('gallery_img_video_ht_view7_button_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view7_button_color_hover"><?php echo __('Load More Background Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view7_button_color_hover]" class="color" id="video_ht_view7_button_color_hover" value="<?php echo get_option('gallery_img_video_ht_view7_button_color_hover'); ?>" class="text">
                                        </div>
                                        <div class="navigation-type-block has-height" style="padding-top:20px;">
                                            <label for=""><?php echo __('Loading Animation', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more animation type</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <div class="has-height " style="clear:both;padding:10px 0px 0px 80px;">
                                                <div>
                                                    <ul id="arrows-type">
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  1){ echo "class='activee'"; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading1.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view7_loading_type]" value="1" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  1){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  2){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading4.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view7_loading_type]" value="2" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  2){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  3){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading36.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view7_loading_type]" value="3" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  3){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  4){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading51.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view7_loading_type]" value="4" <?php if(get_option('gallery_img_video_ht_view7_loading_type')  ==  4){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Ratings Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_thumb_rating_count"><?php echo __('Show Ratings Count', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show ratings count</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_thumb_rating_count]" />
                                            <input type="checkbox" id="ht_thumb_rating_count"  <?php if(get_option('gallery_img_ht_thumb_rating_count')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_thumb_rating_count]" value="on" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_thumb_likedislike_bg"><?php echo __('Ratings Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_thumb_likedislike_bg]" class="color" id="ht_thumb_likedislike_bg" value="<?php echo get_option('gallery_img_ht_thumb_likedislike_bg'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_thumb_likedislike_bg_trans"><?php echo __('Ratings Background Color Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_thumb_likedislike_bg_trans]" id="ht_thumb_likedislike_bg_trans" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_thumb_likedislike_bg_trans'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_thumb_likedislike_bg_trans'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_thumb_likedislike_font_color"><?php echo __('Ratings Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_thumb_likedislike_font_color]" class="color" id="ht_thumb_likedislike_font_color" value="<?php echo get_option('gallery_img_ht_thumb_likedislike_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_thumb_active_font_color"><?php echo __('Ratings Rated Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_thumb_active_font_color]" class="color" id="ht_thumb_active_font_color" value="<?php echo get_option('gallery_img_ht_thumb_active_font_color'); ?>" class="text">

                                        </div>

                                        <div class="fixed-size">
                                            <label for="ht_thumb_likedislike_thumb_color"><?php echo __('Like/Dislike Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings like/dislike icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_thumb_likedislike_thumb_color]" class="color" id="ht_thumb_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_thumb_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_thumb_likedislike_thumb_active_color"><?php echo __('Like/Dislike Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings like/dislike active icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_thumb_likedislike_thumb_active_color]" class="color" id="ht_thumb_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_thumb_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_thumb_heart_likedislike_thumb_color"><?php echo __('Heart Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings like/dislike heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_thumb_heart_likedislike_thumb_color]" class="color" id="ht_thumb_heart_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_thumb_heart_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_thumb_heart_likedislike_thumb_active_color"><?php echo __('Heart Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings like/dislike heart icon active color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_thumb_heart_likedislike_thumb_active_color]" class="color" id="ht_thumb_heart_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_thumb_heart_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                    </div>
                                </li>

                                <li class="gallery-view-options-5">
                                    <div>
                                        <h3><?php echo __('Element Styles', 'gallery-img'); ?></h3>

                                        <!--                                                    <div class="has-background">
		                        <label for="ht_view8_element_size_fix">Size fix</label>
		                        <input type="hidden" value="false" name="params[gallery_img_ht_view8_element_size_fix]" />
		                        <input type="checkbox" id="ht_view8_element_size_fix"  <?php if(get_option('gallery_img_ht_view8_element_size_fix')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view8_element_size_fix]" value="true" />
		                </div>-->

                                        <div class="has-background fixed-size">
                                            <label for="ht_view8_element_height"><?php echo __('Image height', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element height in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view8_element_height]" id="ht_view8_element_height" value="<?php echo get_option('gallery_img_ht_view8_element_height'); ?>" class="text">
                                            <span>px</span>
                                        </div>

                                        <!--                                                    <div class="has-background not-fixed-size">
		                        <label for="ht_view8_element_maxheight">Popup maxHeight</label>
		                        <input type="number" name="params[gallery_img_ht_view8_element_maxheight]" id="ht_view8_element_maxheight" value="<?php echo get_option('gallery_img_ht_view8_element_maxheight'); ?>" class="text">
		                        <span>px</span>
		                </div>-->


                                        <div class="">
                                            <label for="ht_view8_element_padding"><?php echo __('Image margin', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose element margin in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view8_element_padding]" id="ht_view8_element_border_radius" value="<?php echo get_option('gallery_img_ht_view8_element_padding'); ?>" class="text" />
                                            <span>px</span>
                                        </div>


                                        <div class="has-background">
                                            <label for="ht_view8_element_justify"><?php echo __('Image Justify', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to justify elements</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="false" name="params[gallery_img_ht_view8_element_justify]" />
                                            <input type="checkbox" id="ht_view8_element_justify"  <?php if(get_option('gallery_img_ht_view8_element_justify')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view8_element_justify]" value="true" />
                                        </div>

                                        <div class="">
                                            <label for="ht_view8_element_randomize"><?php echo __('Image Randomize', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to randomize elements</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="false" name="params[gallery_img_ht_view8_element_randomize]" />
                                            <input type="checkbox" id="ht_view8_element_justify"  <?php if(get_option('gallery_img_ht_view8_element_randomize')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view8_element_randomize]" value="true" />
                                        </div>

                                        <div class="has-background">
                                            <label for="ht_view8_element_cssAnimation"><?php echo __('Opening With Animation', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to open with animation</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="false" name="params[gallery_img_ht_view8_element_cssAnimation]" />
                                            <input type="checkbox" id="ht_view8_element_justify"  <?php if(get_option('gallery_img_ht_view8_element_cssAnimation')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view8_element_cssAnimation]" value="true" />
                                        </div>

                                        <div class="">
                                            <label for="ht_view8_element_animation_speed"><?php echo __('Opening Animation Speed', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose opening animation speed</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view8_element_animation_speed]" id="ht_view8_element_animation_speed" value="<?php echo get_option('gallery_img_ht_view8_element_animation_speed'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Element Title', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view8_element_show_caption"><?php echo __('Show Title', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show title</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="false" name="params[gallery_img_ht_view8_element_show_caption]" />
                                            <input type="checkbox" id="ht_view8_element_show_caption"  <?php if(get_option('gallery_img_ht_view8_element_show_caption')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view8_element_show_caption]" value="true" />
                                        </div>
                                        <div>
                                            <label for="ht_view8_element_title_font_size"><?php echo __('Element Title Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view8_element_title_font_size]" id="ht_view8_element_title_font_size" value="<?php echo get_option('gallery_img_ht_view8_element_title_font_size'); ?>" class="text" />
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view8_element_title_font_color"><?php echo __('Element Title Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view8_element_title_font_color]" type="text" class="color" id="ht_view8_element_title_font_color" value="#<?php echo get_option('gallery_img_ht_view8_element_title_font_color'); ?>" size="10" />
                                        </div>
                                        <div>
                                            <label for="ht_view8_element_title_background_color"><?php echo __('Element Title Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input name="params[gallery_img_ht_view8_element_title_background_color]" type="text" class="color" id="ht_view8_element_title_background_color" value="#<?php echo get_option('gallery_img_ht_view8_element_title_background_color'); ?>" size="10" />
                                        </div>

                                        <div class="has-background">
                                            <label for="ht_view8_zoombutton_style"><?php echo __('Elements Title Overlay Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title overlay opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_view8_element_title_overlay_transparency]" id="ht_view8_element_title_overlay_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_view8_element_title_overlay_transparency'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_view8_element_title_overlay_transparency'); ?>%</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <h3><?php echo __('Pagination Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view8_paginator_fontsize"><?php echo __('Pagination Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_paginator_fontsize]" id="video_ht_view8_paginator_fontsize" value="<?php echo get_option('gallery_img_video_ht_view8_paginator_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="  fixed-size">
                                            <label for="video_ht_view8_paginator_color"><?php echo __('Pagination Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_paginator_color]" class="color" id="video_ht_view8_paginator_color" value="<?php echo get_option('gallery_img_video_ht_view8_paginator_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view8_paginator_icon_size"><?php echo __('Pagination Icons Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon size in px</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_paginator_icon_size]" id="video_ht_view8_paginator_icon_size" value="<?php echo get_option('gallery_img_video_ht_view8_paginator_icon_size'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="video_ht_view8_paginator_icon_color"><?php echo __('Pagination Icons Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_paginator_icon_color]" class="color" id="video_ht_view8_paginator_icon_color" value="<?php echo get_option('gallery_img_video_ht_view8_paginator_icon_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="video_ht_view8_paginator_position"><?php echo __('Pagination Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view8_paginator_position" name="params[gallery_img_video_ht_view8_paginator_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view8_paginator_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view8_paginator_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view8_paginator_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="just_margin">
                                        <h3><?php echo __('Load More Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view8_loadmore_text"><?php echo __('Load More Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_loadmore_text]" id="video_ht_view8_loadmore_text" value="<?php echo esc_attr(get_option('gallery_img_video_ht_view8_loadmore_text')); ?>" class="text">

                                        </div>
                                        <div >
                                            <label for="video_ht_view8_loadmore_position"><?php echo __('Load More Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_ht_view8_loadmore_position" name="params[gallery_img_video_ht_view8_loadmore_position]">
                                                <option <?php if(get_option('gallery_img_video_ht_view8_loadmore_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view8_loadmore_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_ht_view8_loadmore_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view8_loadmore_fontsize"><?php echo __('Load More Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_loadmore_fontsize]" id="video_ht_view8_loadmore_fontsize" value="<?php echo get_option('gallery_img_video_ht_view8_loadmore_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="video_ht_view8_loadmore_font_color"><?php echo __('Load More Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_loadmore_font_color]" class="color" id="video_ht_view8_loadmore_font_color" value="<?php echo get_option('gallery_img_video_ht_view8_loadmore_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view8_loadmore_font_color_hover"><?php echo __('Load More Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_loadmore_font_color_hover]" class="color" id="video_ht_view8_loadmore_font_color_hover" value="<?php echo get_option('gallery_img_video_ht_view8_loadmore_font_color_hover'); ?>" class="text">
                                        </div>
                                        <div class="fixed-size">
                                            <label for="video_ht_view8_button_color"><?php echo __('Load More Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_button_color]" class="color" id="video_ht_view8_button_color" value="<?php echo get_option('gallery_img_video_ht_view8_button_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view8_button_color_hover"><?php echo __('Load More Background Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more button color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view8_button_color_hover]" class="color" id="video_ht_view8_button_color_hover" value="<?php echo get_option('gallery_img_video_ht_view8_button_color_hover'); ?>" class="text">
                                        </div>
                                        <div class="navigation-type-block has-height has-background " style="padding-top:20px;">
                                            <label for=""><?php echo __('Loading Animation', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more animation</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <div class="has-height " style="clear:both;padding:10px 0px 0px 80px;">
                                                <div>
                                                    <ul id="arrows-type">
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  1){ echo "class='activee'"; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading1.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view8_loading_type]" value="1" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  1){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  2){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading4.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view8_loading_type]" value="2" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  2){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  3){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading36.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view8_loading_type]" value="3" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  3){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  4){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading51.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_video_ht_view8_loading_type]" value="4" <?php if(get_option('gallery_img_video_ht_view8_loading_type')  ==  4){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h3><?php echo __('Ratings Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_just_rating_count"><?php echo __('Show Ratings Count', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show ratings count</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_just_rating_count]" />
                                            <input type="checkbox" id="ht_just_rating_count"  <?php if(get_option('gallery_img_ht_just_rating_count')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_just_rating_count]" value="on" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_just_likedislike_bg"><?php echo __('Ratings Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_just_likedislike_bg]" class="color" id="ht_just_likedislike_bg" value="<?php echo get_option('gallery_img_ht_just_likedislike_bg'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_just_likedislike_bg_trans"><?php echo __('Ratings Background Color Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background transparency level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_just_likedislike_bg_trans]" id="ht_just_likedislike_bg_trans" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_just_likedislike_bg_trans'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_just_likedislike_bg_trans'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_just_likedislike_font_color"><?php echo __('Ratings Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_just_likedislike_font_color]" class="color" id="ht_just_likedislike_font_color" value="<?php echo get_option('gallery_img_ht_just_likedislike_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_just_active_font_color"><?php echo __('Ratings Rated Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings active font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_just_active_font_color]" class="color" id="ht_just_active_font_color" value="<?php echo get_option('gallery_img_ht_just_active_font_color'); ?>" class="text">

                                        </div>

                                        <div class="fixed-size">
                                            <label for="ht_just_likedislike_thumb_color"><?php echo __('Like/Dislike Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose like/dislike icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_just_likedislike_thumb_color]" class="color" id="ht_just_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_just_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_just_likedislike_thumb_active_color"><?php echo __('Like/Dislike Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose like/dislike icon active color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_just_likedislike_thumb_active_color]" class="color" id="ht_just_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_just_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_just_heart_likedislike_thumb_color"><?php echo __('Heart Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_just_heart_likedislike_thumb_color]" class="color" id="ht_just_heart_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_just_heart_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_just_heart_likedislike_thumb_active_color"><?php echo __('Heart Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart icon active color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_just_heart_likedislike_thumb_active_color]" class="color" id="ht_just_heart_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_just_heart_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                    </div>
                                </li>

                                <li class="gallery-view-options-6">
                                    <div>
                                        <h3><?php echo __('General Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_view9_general_width"><?php echo __('Width', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose width percentage</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_view9_general_width]" id="ht_view9_general_width" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_view9_general_width'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_view9_general_width'); ?>%</span>
                                            </div>
                                        </div>
                                        <div >
                                            <label for="view9_general_position"><?php echo __('Content Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose content position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="view9_general_position" name="params[gallery_img_view9_general_position]">
                                                <option <?php if(get_option('gallery_img_view9_general_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_general_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_general_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class="has-background">
                                            <label for="view9_image_position"><?php echo __('Image Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose width in percentage</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="view9_image_position" name="params[gallery_img_view9_image_position]">
                                                <option <?php if(get_option('gallery_img_view9_image_position')  ==  '1'){ echo 'selected'; } ?> value="1"><?php echo __('Before Title', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_image_position')  ==  '2'){ echo 'selected'; } ?> value="2"><?php echo __('After Title', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_image_position')  ==  '3'){ echo 'selected'; } ?> value="3"><?php echo __('After Description', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="ht_view9_general_space"><?php echo __('Space Between Containers', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose image position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_general_space]" id="ht_view9_general_space" value="<?php echo get_option('gallery_img_ht_view9_general_space'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="has-background">
                                            <label for="view9_general_separator_style"><?php echo __('Separator Line Style', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose separator line style</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="view9_general_separator_style" name="params[gallery_img_view9_general_separator_style]">
                                                <option <?php if(get_option('gallery_img_view9_general_separator_style')  ==  'none'){ echo 'selected'; } ?> value="none"><?php echo __('None', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_general_separator_style')  ==  'solid'){ echo 'selected'; } ?> value="solid"><?php echo __('Solid', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_general_separator_style')  ==  'dashed'){ echo 'selected'; } ?> value="dashed"><?php echo __('Dashed', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_general_separator_style')  ==  'dotted'){ echo 'selected'; } ?> value="dotted"><?php echo __('Dotted', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_general_separator_style')  ==  'groove'){ echo 'selected'; } ?> value="groove"><?php echo __('Groove', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_general_separator_style')  ==  'double'){ echo 'selected'; } ?> value="double"><?php echo __('Double', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class=" fixed-size">
                                            <label for="ht_view9_general_separator_size"><?php echo __('Separator Line Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose separator line size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_general_separator_size]" id="ht_view9_general_separator_size" value="<?php echo get_option('gallery_img_ht_view9_general_separator_size'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_view9_general_separator_color"><?php echo __('Separator Line Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose separator line color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_general_separator_color]" class="color" id="ht_view9_general_separator_color" value="<?php echo get_option('gallery_img_ht_view9_general_separator_color'); ?>" class="text">

                                        </div>

                                    </div>
                                    <div>
                                        <h3><?php echo __('Pagination Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background fixed-size">
                                            <label for="ht_view9_paginator_fontsize"><?php echo __('Pagination Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_paginator_fontsize]" id="ht_view9_paginator_fontsize" value="<?php echo get_option('gallery_img_ht_view9_paginator_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_view9_paginator_color"><?php echo __('Pagination Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_paginator_color]" class="color" id="ht_view9_paginator_color" value="<?php echo get_option('gallery_img_ht_view9_paginator_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background  fixed-size">
                                            <label for="ht_view9_paginator_icon_size"><?php echo __('Pagination Icons Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_paginator_icon_size]" id="ht_view9_paginator_icon_size" value="<?php echo get_option('gallery_img_ht_view9_paginator_icon_size'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_view9_paginator_color"><?php echo __('Pagination Icons Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_paginator_icon_color]" class="color" id="ht_view9_paginator_icon_color" value="<?php echo get_option('gallery_img_ht_view9_paginator_icon_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="view9_paginator_position"><?php echo __('Pagination Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose pagination position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="view9_paginator_position" name="params[gallery_img_view9_paginator_position]">
                                                <option <?php if(get_option('gallery_img_view9_paginator_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_paginator_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_paginator_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="blog_margin">
                                        <h3><?php echo __('Title Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background fixed-size">
                                            <label for="ht_view9_element_title_show"><?php echo __('Show Title', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show title</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="false" name="params[gallery_img_ht_view9_element_title_show]" />
                                            <input type="checkbox" id="ht_view9_element_title_show"  <?php if(get_option('gallery_img_ht_view9_element_title_show')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view9_element_title_show]" value="true" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_view9_title_fontsize"><?php echo __('Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_title_fontsize]" id="ht_view9_title_fontsize" value="<?php echo get_option('gallery_img_ht_view9_title_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_view9_title_color"><?php echo __('Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_title_color]" class="color" id="ht_view9_title_color" value="<?php echo get_option('gallery_img_ht_view9_title_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_view9_title_back_color"><?php echo __('Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_title_back_color]" class="color" id="ht_view9_title_back_color" value="<?php echo get_option('gallery_img_ht_view9_title_back_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view9_title_opacity"><?php echo __('Background Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title background opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_view9_title_opacity]" id="ht_view9_title_opacity" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_view9_title_opacity'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_view9_title_opacity'); ?>%</span>
                                            </div>
                                        </div>
                                        <div >
                                            <label for="view9_title_textalign"><?php echo __('Text Align', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose title text align</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="view9_title_textalign" name="params[gallery_img_view9_title_textalign]">
                                                <option <?php if(get_option('gallery_img_view9_title_textalign')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_title_textalign')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_title_textalign')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_title_textalign')  ==  'justify'){ echo 'selected'; } ?> value="justify"><?php echo __('Justify', 'gallery-img'); ?></option>
                                            </select>
                                        </div>

                                    </div>
                                    <div style="margin-top: -227px;">
                                        <h3><?php echo __('Description Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background fixed-size">
                                            <label for="ht_view9_element_desc_show"><?php echo __('Show Description', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show description</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="false" name="params[gallery_img_ht_view9_element_desc_show]" />
                                            <input type="checkbox" id="ht_view9_element_desc_show"  <?php if(get_option('gallery_img_ht_view9_element_desc_show')  == 'true'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_view9_element_desc_show]" value="true" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_view9_desc_fontsize"><?php echo __('Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_desc_fontsize]" id="ht_view9_desc_fontsize" value="<?php echo get_option('gallery_img_ht_view9_desc_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_view9_desc_color"><?php echo __('Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" class="color" name="params[gallery_img_ht_view9_desc_color]" id="ht_view9_desc_color" value="<?php echo get_option('gallery_img_ht_view9_desc_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_view9_desc_back_color"><?php echo __('Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_view9_desc_back_color]" class="color" id="ht_view9_desc_back_color" value="<?php echo get_option('gallery_img_ht_view9_desc_back_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_view9_desc_opacity"><?php echo __('Background Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description background opacity level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_view9_desc_opacity]" id="ht_view9_desc_opacity" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_view9_desc_opacity'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_view9_desc_opacity'); ?>%</span>
                                            </div>
                                        </div>
                                        <div >
                                            <label for="view9_desc_textalign"><?php echo __('Text Align', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose description text align</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="view9_desc_textalign" name="params[gallery_img_view9_desc_textalign]">
                                                <option <?php if(get_option('gallery_img_view9_desc_textalign')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_desc_textalign')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_desc_textalign')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_view9_desc_textalign')  ==  'justify'){ echo 'selected'; } ?> value="justify"><?php echo __('Justify', 'gallery-img'); ?></option>
                                            </select>
                                        </div>

                                    </div>
                                    <div >
                                        <h3><?php echo __('Load More Styles', 'gallery-img'); ?></h3>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view9_loadmore_text"><?php echo __('Load More Text', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more text</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view9_loadmore_text]" id="video_ht_view9_loadmore_text" value="<?php echo esc_attr(get_option('gallery_img_video_ht_view9_loadmore_text')); ?>" class="text">

                                        </div>
                                        <div >
                                            <label for="video_view9_loadmore_position"><?php echo __('Load More Position', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more position</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <select id="video_view9_loadmore_position" name="params[gallery_img_video_view9_loadmore_position]">
                                                <option <?php if(get_option('gallery_img_video_view9_loadmore_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_view9_loadmore_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                <option <?php if(get_option('gallery_img_video_view9_loadmore_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                            </select>
                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view9_loadmore_fontsize"><?php echo __('Load More Font Size', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font size</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view9_loadmore_fontsize]" id="video_ht_view9_loadmore_fontsize" value="<?php echo get_option('gallery_img_video_ht_view9_loadmore_fontsize'); ?>" class="text">
                                            <span>px</span>
                                        </div>
                                        <div class="  fixed-size">
                                            <label for="video_ht_view9_loadmore_font_color"><?php echo __('Load More Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view9_loadmore_font_color]" class="color" id="video_ht_view9_loadmore_font_color" value="<?php echo get_option('gallery_img_video_ht_view9_loadmore_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="video_ht_view9_loadmore_font_color_hover"><?php echo __('Load More Font Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more font color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view9_loadmore_font_color_hover]" class="color" id="video_ht_view9_loadmore_font_color_hover" value="<?php echo get_option('gallery_img_video_ht_view9_loadmore_font_color_hover'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size ">
                                            <label for="video_ht_view9_button_color"><?php echo __('Load More Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view9_button_color]" class="color" id="video_ht_view9_button_color" value="<?php echo get_option('gallery_img_video_ht_view9_button_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size has-background">
                                            <label for="video_ht_view9_button_color_hover"><?php echo __('Load More Background Hover Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more background color on hover</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_video_ht_view9_button_color_hover]" class="color" id="video_ht_view9_button_color_hover" value="<?php echo get_option('gallery_img_video_ht_view9_button_color_hover'); ?>" class="text">

                                        </div>

                                        <div class="navigation-type-block has-height" style="padding-top:20px;">
                                            <label for=""><?php echo __('Loading Animation', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose load more animation type</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <div class="has-height " style="clear:both;padding:10px 0px 0px 80px;">
                                                <div>
                                                    <ul id="arrows-type">
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_loading_type')  ==  1){ echo "class='activee'"; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading1.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_loading_type]" value="1" <?php if(get_option('gallery_img_loading_type')  ==  1){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_loading_type')  ==  2){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading4.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_loading_type]" value="2" <?php if(get_option('gallery_img_loading_type')  ==  2){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_loading_type')  ==  3){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading36.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_loading_type]" value="3" <?php if(get_option('gallery_img_loading_type')  ==  3){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                        <li onclick="jQuery(this).parent().find('li').removeClass('activee');jQuery(this).addClass('activee');" <?php if(get_option('gallery_img_loading_type')  ==  4){ echo 'class="activee"'; } ?>>
                                                            <div class="image-block">
                                                                <img src="<?php echo $path_site; ?>/arrows/loading51.gif" alt="" />
                                                            </div>
                                                            <input type="radio" name="params[gallery_img_loading_type]" value="4" <?php if(get_option('gallery_img_loading_type')  ==  4){ echo 'checked="checked"'; } ?>>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:-627px;">
                                        <h3><?php echo __('Ratings Styles', 'gallery-img'); ?></h3>
                                        <div class="has-background">
                                            <label for="ht_blog_rating_count"><?php echo __('Show Ratings Count', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose whether to show ratings count</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="hidden" value="off" name="params[gallery_img_ht_blog_rating_count]" />
                                            <input type="checkbox" id="ht_blog_rating_count"  <?php if(get_option('gallery_img_ht_blog_rating_count')  == 'on'){ echo 'checked="checked"'; } ?>  name="params[gallery_img_ht_blog_rating_count]" value="on" />
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_blog_likedislike_bg"><?php echo __('Ratings Background Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_blog_likedislike_bg]" class="color" id="ht_blog_likedislike_bg" value="<?php echo get_option('gallery_img_ht_blog_likedislike_bg'); ?>" class="text">

                                        </div>
                                        <div class="has-background">
                                            <label for="ht_blog_likedislike_bg_trans"><?php echo __('Ratings Background Color Opacity', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings background color trancparency level</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="slider-container">
                                                <input name="params[gallery_img_ht_blog_likedislike_bg_trans]" id="ht_blog_likedislike_bg_trans" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo get_option('gallery_img_ht_blog_likedislike_bg_trans'); ?>" />
                                                <span><?php echo get_option('gallery_img_ht_blog_likedislike_bg_trans'); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_blog_likedislike_font_color"><?php echo __('Ratings Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings font color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_blog_likedislike_font_color]" class="color" id="ht_blog_likedislike_font_color" value="<?php echo get_option('gallery_img_ht_blog_likedislike_font_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_blog_active_font_color"><?php echo __('Ratings Rated Font Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings font active color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_blog_active_font_color]" class="color" id="ht_blog_active_font_color" value="<?php echo get_option('gallery_img_ht_blog_active_font_color'); ?>" class="text">

                                        </div>

                                        <div class="fixed-size">
                                            <label for="ht_blog_likedislike_thumb_color"><?php echo __('Like/Dislike Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_blog_likedislike_thumb_color]" class="color" id="ht_blog_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_blog_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_blog_likedislike_thumb_active_color"><?php echo __('Like/Dislike Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings icon active color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_blog_likedislike_thumb_active_color]" class="color" id="ht_blog_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_blog_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                        <div class="fixed-size">
                                            <label for="ht_blog_heart_likedislike_thumb_color"><?php echo __('Heart Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart icon color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_blog_heart_likedislike_thumb_color]" class="color" id="ht_blog_heart_likedislike_thumb_color" value="<?php echo get_option('gallery_img_ht_blog_heart_likedislike_thumb_color'); ?>" class="text">

                                        </div>
                                        <div class="has-background fixed-size">
                                            <label for="ht_blog_heart_likedislike_thumb_active_color"><?php echo __('Heart Rated Icon Color', 'gallery-img'); ?>
                                                <div class="help">?
                                                    <div class="help-block">
                                                        <span class="pnt"></span>
                                                        <p>Choose ratings heart icon active color</p>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" name="params[gallery_img_ht_blog_heart_likedislike_thumb_active_color]" class="color" id="ht_blog_heart_likedislike_thumb_active_color" value="<?php echo get_option('gallery_img_ht_blog_heart_likedislike_thumb_active_color'); ?>" class="text">

                                        </div>
                                    </div>
                                </li>

                                <li class="gallery-view-options-7">
                                    <div class="option-single-column">
                                        <div>
                                            <h3><?php _e('Content Styles','gallery-img'); ?></h3>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_show_center"><?php echo __( 'Show Content In The Center', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Check to set content in the center</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="hidden" value="off"
                                                       name="params[gallery_img_ht_view10_show_center]"/>
                                                <input type="checkbox"
                                                       id="gallery_img_ht_view10_show_center"
                                                       name="params[gallery_img_ht_view10_show_center]"
                                                       value="on"/>
                                            </div>
                                            <h3><?php echo __( 'Element Styles', 'gallery-img' ); ?></h3>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_image_behaviour"><?php echo __( "Element's Image Behaviour", 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Check to set type of image behavior</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <select id="gallery_img_ht_view10_image_behaviour"
                                                        name="params[gallery_img_ht_view10_image_behaviour]">
                                                    <option selected="selected" value="resize"><?php echo __( 'Resize', 'gallery-img' ); ?></option>

                                                            value="crop"><?php echo __( 'Natural', 'gallery-img' ); ?></option>
                                                </select>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_element_width"><?php echo __( 'Element Image Width', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose element width in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_element_width]"
                                                       id="gallery_img_ht_view10_element_width"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_width'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div class="has-background">
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_height"><?php echo __( 'Element Image Height', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose element height in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_element_height]"
                                                       id="gallery_img_ht_view10_element_height"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_height'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_element_margin"><?php echo __( 'Margin Between Elements', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose element margin in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_element_margin]"
                                                       id="gallery_img_ht_view10_element_margin"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_margin'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_hover_effect"><?php echo __( 'Element Hover Effect', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Check to set element hover effect</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="hidden" value="false"
                                                       name="params[gallery_img_ht_view10_element_hover_effect]"/>
                                                <input type="checkbox"
                                                       id="gallery_img_ht_view10_element_hover_effect" <?php if ( get_option('gallery_img_ht_view10_element_hover_effect') == 'true' ) {
                                                    echo 'checked="checked"';
                                                } ?> name="params[gallery_img_ht_view10_element_hover_effect]"
                                                       value="true"/>
                                            </div>
                                            <div >
                                                <label
                                                        for="gallery_img_ht_view10_element_overlay_background_color_"><?php echo __( 'Element Overlay Background Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose element background color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input
                                                        name="params[gallery_img_ht_view10_element_overlay_background_color_]"
                                                        type="text" class="color"
                                                        id="gallery_img_ht_view10_element_overlay_background_color_"
                                                        value="#<?php echo get_option('gallery_img_ht_view10_element_overlay_background_color_'); ?>"
                                                        size="10"/>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_border_color"><?php echo __( 'Element Border Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose element border color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input name="params[gallery_img_ht_view10_element_border_color]"
                                                       type="text" class="color"
                                                       id="gallery_img_ht_view10_element_border_color"
                                                       value="#<?php echo get_option('gallery_img_ht_view10_element_border_color'); ?>"
                                                       size="10"/>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_element_border_width"><?php echo __( 'Element Border Width', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose element border width in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_element_border_width]"
                                                       id="gallery_img_ht_view10_element_border_width"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_border_width'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_overlay_opacity"><?php echo __( "Element's Image Overlay Opacity", 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose element image opacity level</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <div class="slider-container">
                                                    <input name="params[gallery_img_ht_view10_element_overlay_opacity]"
                                                           id="gallery_img_ht_view10_element_overlay_opacity"
                                                           data-slider-highlight="true"
                                                           data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                           data-slider="true"
                                                           value="<?php echo get_option('gallery_img_ht_view10_element_overlay_opacity'); ?>"/>
                                                    <span><?php echo get_option('gallery_img_ht_view10_element_overlay_opacity'); ?>
                                                        %</span>
                                                </div>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_hover_effect_delay"><?php echo __( 'Element  Hover Effect Delay', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Check to set element hover effect delay in ms</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_hover_effect_delay]"
                                                       id="gallery_img_ht_view10_hover_effect_delay"
                                                       value="<?php echo get_option('gallery_img_ht_view10_hover_effect_delay'); ?>"
                                                       class="text"/>
                                                <span>ms</span>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_hover_effect_inverse"><?php echo __( 'Element Hover Effect Inverse', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Check to set element hover effect inverse</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="hidden" value="false"
                                                       name="params[gallery_img_ht_view10_hover_effect_inverse]"/>
                                                <input type="checkbox"
                                                       id="gallery_img_ht_view10_hover_effect_inverse" <?php if ( get_option('gallery_img_ht_view10_hover_effect_inverse') == 'true' ) {
                                                    echo 'checked="checked"';
                                                } ?> name="params[gallery_img_ht_view10_hover_effect_inverse]"
                                                       value="true"/>
                                            </div>
                                        </div>
                                        <div>
                                            <h3><?php echo __( 'Expand Options', 'gallery-img' ); ?></h3>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_expanding_speed"><?php echo __( 'Expanding Speed', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expanding speed in ms</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_expanding_speed]"
                                                       id="gallery_img_ht_view10_expanding_speed"
                                                       value="<?php echo get_option('gallery_img_ht_view10_expanding_speed'); ?>"
                                                       class="text"/>
                                                <span>ms</span>
                                            </div>
                                            <div >
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_height"><?php echo __( 'Expand Block Initial Height', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand block initial height</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_expand_block_height]"
                                                       id="gallery_img_ht_view10_expand_block_height"
                                                       value="<?php echo get_option('gallery_img_ht_view10_expand_block_height'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_expand_width"><?php echo __( 'Expand Block Width', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand block width in percentage</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_expand_width]"
                                                       id="gallery_img_ht_view10_expand_width"
                                                       value="<?php echo get_option('gallery_img_ht_view10_expand_width'); ?>"
                                                       class="text"/>
                                                <span>%</span>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_opacity"><?php echo __( "Expand Block Opacity", 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand block opacity level</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <div class="slider-container">
                                                    <input name="params[gallery_img_ht_view10_expand_block_opacity]"
                                                           id="gallery_img_ht_view10_expand_block_opacity"
                                                           data-slider-highlight="true"
                                                           data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text"
                                                           data-slider="true"
                                                           value="<?php echo get_option('gallery_img_ht_view10_expand_block_opacity'); ?>"/>
                                                    <span><?php echo get_option('gallery_img_ht_view10_expand_block_opacity'); ?>
                                                        %</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h3><?php echo __( 'Expand Title', 'gallery-img' ); ?></h3>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_title_color"><?php echo __( 'Expand Description Title Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand block title color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input name="params[gallery_img_ht_view10_expand_block_title_color]"
                                                       type="text" class="color"
                                                       id="gallery_img_ht_view10_expand_block_title_color"
                                                       value="#<?php echo get_option('gallery_img_ht_view10_expand_block_title_color'); ?>"
                                                       size="10"/>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_title_font_size"><?php echo __( 'Expand Title Font Size', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand block title font size</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_expand_block_title_font_size]"
                                                       id="gallery_img_ht_view10_expand_block_title_font_size"
                                                       value="<?php echo get_option('gallery_img_ht_view10_expand_block_title_font_size'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-single-column">
                                        <div>
                                            <h3><?php _e( 'Element Title', 'gallery-img' ); ?></h3>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_title_font_size"><?php echo __( 'Title Font Size', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose title font size</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_element_title_font_size]"
                                                       id="gallery_img_ht_view10_element_title_font_size"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_title_font_size'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_element_title_font_color"><?php echo __( 'Title Font Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose title font color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input name="params[gallery_img_ht_view10_element_title_font_color]"
                                                       type="text" class="color" id="ht_view0_title_font_color"
                                                       value="#<?php echo get_option('gallery_img_ht_view10_element_title_font_color'); ?>"
                                                       size="10"/>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_title_align"><?php echo __( "Title Alignment", 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose title text align</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <select id="gallery_img_ht_view10_element_title_align"
                                                        name="params[gallery_img_ht_view10_element_title_align]">
                                                    <option <?php if ( get_option('gallery_img_ht_view10_element_title_align') == 'left' ) {
                                                        echo 'selected="selected"';
                                                    } ?>
                                                            value="left"><?php echo __( 'Left', 'gallery-img' ); ?></option>
                                                </select>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_element_title_border_width"><?php echo __( 'Element Title Bottom Border Width', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose title bottom border width in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_element_title_border_width]"
                                                       id="gallery_img_ht_view10_element_title_border_width"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_title_border_width'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_title_border_color"><?php echo __( 'Element Title Bottom Border Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose title bottom border color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input name="params[gallery_img_ht_view10_element_title_border_color]"
                                                       type="text" class="color" id="ht_view0_title_font_color"
                                                       value="#<?php echo get_option('gallery_img_ht_view10_element_title_border_color'); ?>"
                                                       size="10"/>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_element_title_margin_top"><?php echo __( 'Element Title Margin Top', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose title margin top in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_element_title_margin_top]"
                                                       id="gallery_img_ht_view10_element_title_margin_top"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_title_margin_top'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_element_title_padding_top_bottom"><?php echo __( 'Element Title Top Bottom Padding', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose title top and bottom padding</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_element_title_padding_top_bottom]"
                                                       id="gallery_img_ht_view10_element_title_padding_top_bottom"
                                                       value="<?php echo get_option('gallery_img_ht_view10_element_title_padding_top_bottom'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                        </div>
                                        <div >
                                            <h3><?php echo __( 'Expand Description', 'gallery-img' ); ?></h3>
                                            <div class="has-background">
                                                <label
                                                        for="ht_view0_description_font_size"><?php echo __( 'Expand Description Font Size', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand description font size</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_expand_block_description_font_size]"
                                                       id="gallery_img_ht_view10_expand_block_description_font_size"
                                                       value="<?php echo get_option('gallery_img_ht_view10_expand_block_description_font_size'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_description_font_color"><?php echo __( 'Description Font Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand description font color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input
                                                        name="params[gallery_img_ht_view10_expand_block_description_font_color]"
                                                        type="text" class="color"
                                                        id="gallery_img_ht_view10_expand_block_description_font_color"
                                                        value="#<?php echo get_option('gallery_img_ht_view10_expand_block_description_font_color'); ?>"
                                                        size="10"/>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_background_color"><?php echo __( 'Expand Block Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand block background color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input name="params[gallery_img_ht_view10_expand_block_background_color]"
                                                       type="text" class="color"
                                                       id="gallery_img_ht_view10_expand_block_background_color"
                                                       value="#<?php echo get_option('gallery_img_ht_view10_expand_block_background_color'); ?>"
                                                       size="10"/>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_description_text_align"><?php echo __( "Expand Description Text Alignment", 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose expand block description text alignment</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <select id="gallery_img_ht_view10_expand_block_description_text_align"
                                                        name="params[gallery_img_ht_view10_expand_block_description_text_align]">
                                                    <option <?php if ( get_option('gallery_img_ht_view10_expand_block_description_text_align') == 'left' ) {
                                                        echo 'selected="selected"';
                                                    } ?>
                                                            value="left"><?php echo __( 'Left', 'gallery-img' ); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <h3><?php echo __( 'Link Button', 'gallery-img' ); ?></h3>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_button_text"><?php echo __( 'Link Button Text', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose link button text</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_expand_block_button_text]"
                                                       id="gallery_img_ht_view10_expand_block_button_text"
                                                       value="<?php echo esc_attr( get_option('gallery_img_ht_view10_expand_block_button_text') ); ?>"
                                                       class="text"/>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_button_font_size"><?php echo __( 'Link Button Font Size', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose link button font size</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text"
                                                       name="params[gallery_img_ht_view10_expand_block_button_font_size]"
                                                       id="gallery_img_ht_view10_expand_block_button_font_size"
                                                       value="<?php echo get_option('gallery_img_ht_view10_expand_block_button_font_size'); ?>"
                                                       class="text"/>
                                                <span>px</span>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_button_text_color"><?php echo __( 'Link Button Font Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose link button font color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input name="params[gallery_img_ht_view10_expand_block_button_text_color]"
                                                       type="text" class="color"
                                                       id="gallery_img_ht_view10_expand_block_button_text_color"
                                                       value="#<?php echo get_option('gallery_img_ht_view10_expand_block_button_text_color'); ?>"
                                                       size="10"/>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_description_font_hover_color"><?php echo __( 'Link Button Font Hover Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose link button font color on hover</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input
                                                        name="params[gallery_img_ht_view10_expand_block_description_font_hover_color]"
                                                        type="text" class="color"
                                                        id="gallery_img_ht_view10_expand_block_description_font_hover_color"
                                                        value="#<?php echo get_option('gallery_img_ht_view10_expand_block_description_font_hover_color'); ?>"
                                                        size="10"/>
                                            </div>
                                            <div class="has-background">
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_button_background_color"><?php echo __( 'Link Button Background Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose link button background color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input
                                                        name="params[gallery_img_ht_view10_expand_block_button_background_color]"
                                                        type="text" class="color"
                                                        id="gallery_img_ht_view10_expand_block_button_background_color"
                                                        value="#<?php echo get_option('gallery_img_ht_view10_expand_block_button_background_color'); ?>"
                                                        size="10"/>
                                            </div>
                                            <div>
                                                <label
                                                        for="gallery_img_ht_view10_expand_block_button_background_hover_color"><?php echo __( 'Link Button Background Hover Color', 'gallery-img' ); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose link button background color on hover</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input
                                                        name="params[gallery_img_ht_view10_expand_block_button_background_hover_color]"
                                                        type="text" class="color"
                                                        id="gallery_img_ht_view10_expand_block_button_background_hover_color"
                                                        value="#<?php echo get_option('gallery_img_ht_view10_expand_block_button_background_hover_color'); ?>"
                                                        size="10"/>
                                            </div>
                                        </div>
                                        <div>
                                            <h3><?php echo __('Pagination Styles', 'gallery-img'); ?></h3>
                                            <div class="fixed-size has-background">
                                                <label for="gallery_img_ht_view10_paginator_fontsize"><?php echo __('Pagination Font Size', 'gallery-img'); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose pagination font size in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_paginator_fontsize]" id="gallery_img_ht_view10_paginator_fontsize" value="<?php echo get_option('gallery_img_ht_view10_paginator_fontsize'); ?>" class="text">
                                                <span>px</span>
                                            </div>
                                            <div class="  fixed-size">
                                                <label for="gallery_img_ht_view10_paginator_color"><?php echo __('Pagination Font Color', 'gallery-img'); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose pagination font color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_paginator_color]" class="color" id="gallery_img_ht_view10_paginator_color" value="<?php echo get_option('gallery_img_ht_view10_paginator_color'); ?>" class="text">

                                            </div>
                                            <div class="fixed-size has-background">
                                                <label for="gallery_img_ht_view10_paginator_icon_size"><?php echo __('Pagination Icons Size', 'gallery-img'); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose pagination icon size in px</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_paginator_icon_size]" id="gallery_img_ht_view10_paginator_icon_size" value="<?php echo get_option('gallery_img_ht_view10_paginator_icon_size'); ?>" class="text">
                                                <span>px</span>
                                            </div>
                                            <div class=" fixed-size">
                                                <label for="gallery_img_ht_view10_paginator_icon_color"><?php echo __('Pagination Icons Color', 'gallery-img'); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose pagination icon color</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input type="text" name="params[gallery_img_ht_view10_paginator_icon_color]" class="color" id="gallery_img_ht_view10_paginator_icon_color" value="<?php echo get_option('gallery_img_ht_view10_paginator_icon_color'); ?>" class="text">

                                            </div>
                                            <div class="has-background">
                                                <label for="gallery_img_ht_view10_paginator_position"><?php echo __('Pagination Position', 'gallery-img'); ?>
                                                    <div class="help">?
                                                        <div class="help-block">
                                                            <span class="pnt"></span>
                                                            <p>Choose pagination position</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                <select id="gallery_img_ht_view10_paginator_position" name="params[gallery_img_ht_view10_paginator_position]">
                                                    <option <?php if(get_option('gallery_img_ht_view10_paginator_position')  ==  'left'){ echo 'selected'; } ?> value="left"><?php echo __('Left', 'gallery-img'); ?></option>
                                                    <option <?php if(get_option('gallery_img_ht_view10_paginator_position')  ==  'center'){ echo 'selected'; } ?> value="center"><?php echo __('Center', 'gallery-img'); ?></option>
                                                    <option <?php if(get_option('gallery_img_ht_view10_paginator_position')  ==  'right'){ echo 'selected'; } ?> value="right"><?php echo __('Right', 'gallery-img'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div id="post-body-footer">
                                <a onclick="document.getElementById('adminForm').submit()" class="save-gallery-options button-primary"><?php echo __('Save', 'gallery-img'); ?></a>
                                <div class="clear"></div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>