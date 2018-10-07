<?php
/**
Plugin Name: Final Tiles Grid Gallery Lite
Plugin URI: http://codecanyon.net/item/final-tiles-gallery-for-wordpress/5189351?ref=GreenTreeLabs
Description: Wordpress Plugin for creating responsive image galleries. By: Green Tree Labs
Author: Green Tree Labs
Version: 3.0.4
Author URI: http://codecanyon.net/user/GreenTreeLabs
*/
define("FTGLITEVERSION", "3.0.4");
// Create a helper function for easy SDK access.
function ftggl_fs() {
    global $ftggl_fs;

    if ( ! isset( $ftggl_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $ftggl_fs = fs_dynamic_init( array(
            'id'                  => '1002',
            'slug'                => 'final-tiles-grid-gallery-lite',
            'type'                => 'plugin',
            'public_key'          => 'pk_d0e075b84d491d510a1d0a21087af',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'menu'                => array(
                'slug'            => "ftg-lite-gallery-admin",
                'account'        => false,
                'contact'        => false,
                'support'        => false,
            ),
        ) );
    }

    return $ftggl_fs;
}

// Init Freemius.
ftggl_fs();
// Signal that SDK was initiated.
do_action( 'ftggl_fs_loaded' );

function ftggl_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __fs( 'hey-x' ) . '<br>' .
            __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.<br><br>The main reason we need this analytics is understanding how admin UI is used and how we can improve it.', 'final-tiles-grid-gallery-lite' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    ftggl_fs()->add_filter('connect_message_on_update', 'ftggl_fs_custom_connect_message_on_update', 10, 6);

define("PRO_CALL", "<span class='procall'>(<a href='http://1.envato.market/c/288541/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Ffinal-tiles-wordpress-gallery%2F5189351' target='_blank'>available with PRO version</a>)</span>");
define("PRO_UNLOCK", "<a href='http://1.envato.market/c/288541/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Ffinal-tiles-wordpress-gallery%2F5189351' target='_blank'>Add unlimited images with PRO version</a>");


if (!class_exists("FinalTiles_GalleryLite"))
{
    class FinalTiles_GalleryLite
    {
        private $defaultValues = array(
            'aClass' => '',
            'afterGalleryText' => '',
            'allFilterLabel' => 'All',
            'ajaxLoading' => 'F',
            'backgroundColor' => 'transparent',
            'beforeGalleryText' => '',
            'blank' => 'F',
            'borderColor' => 'transparent',
            'borderRadius' => 0,
            'borderSize' => 0,
            'captionBackgroundColor' => '#000000',
            'captionBehavior' => 'hidden',
            'captionColor' => '#ffffff',
            'captionEasing' => 'linear',
            'captionEffect' => 'fade',
            'captionEffectDuration' => 250,
            'captionEmpty' => 'hide',
            'captionFontSize' => 12,
            'captionFrame' => 'F',
            'captionFrameColor' => '#ffffff',
            'captionFullHeight' => 'T',
            'captionHorizontalAlignment' => 'Center',
            'captionIcon' => 'zoom',
            'captionIconColor' => '#ffffff',
            'captionIconSize' => 12,
            'captionMobileBehavior' => "desktop",
            'captionOpacity' => 80,
            'captionPosition' => 'inside',
            'captionVerticalAlignment' => 'Middle',
            'columns' => 4,
            'columnsPhoneLandscape' => 3,
            'columnsPhonePortrait' => 2,
            'columnsTabletLandscape' => 4,
            'columnsTabletPortrait' => 3,
            'compressHTML' => 'T',
            'customCaptionIcon' =>'',
            'defaultFilter' => '',
            'defaultSize' => 'medium',
            'delay' => 0,
            'disableLightboxGroups' => 'F',
            'enableFacebook' => 'F',
            'enableGplus' => 'F',
            'enablePinterest' => 'F',
            'enableTwitter' => 'F',
            'enlargeImages' => 'T',
            'envatoReferral' => 'GreenTreeLabs',
            'filterClick' => 'F',
            'filters' => '',
            'gridCellSize' => '25',
            'hoverIconRotation' => 'F',
            'hoverRotation' => 0,
            'hoverZoom' => 100,
            'imageSizeFactor' => 90,
            'imageSizeFactorCustom' => '',
            'imageSizeFactorPhoneLandscape' => 60,
            'imageSizeFactorPhonePortrait' => 50,
            'imageSizeFactorTabletLandscape' => 80,
            'imageSizeFactorTabletPortrait' => 70,
            'imagesOrder' => 'user',
            'layout' => 'final',
            'lazyLoad' => false,
            'lightbox' => 'lightbox2',
            'lightboxImageSize' => 'large',
            'loadedHSlide' => 0,
            'loadedRotate' => 0,
            'loadedScale' => 100,
            'loadedVSlide' => 0,
            'loadingBarBackgroundColor' => "#fff",
            'loadingBarColor' => "#fff",
            'loadMethod' => 'sequential',
            'margin' => 10,
            'max_posts' => 0,
            'minTileWidth' => '250',
            'mobileLightbox' => 'swipebox',
            'post_types' => '',
            'recentPostsCaption' => 'title',
            'recentPostsCaptionAutoExcerptLength' => 20,
            'rel' => '',
            'reverseOrder' => false,
            'script' => '',
            'scrollEffect' => 'none',
            'shadowColor' => '#cccccc',
            'shadowSize' => 0,
            'socialIconColor' => '#ffffff',
            'source' => 'images',
            'style' => '',
            'support' => 'F',
            'supportText' => 'Powered by Final Tiles Grid Gallery',
            'tilesPerPage' => 0,
            'titleFontSize' => 14,
            'width' => '100%',
            'wp_field_caption' => 'description',
            'wp_field_title' => 'title'
        );

        //Constructor
        public function __construct()
        {
            $this->plugin_name = plugin_basename(__FILE__);
            $this->define_constants();
            $this->define_db_tables();
            $this->FinalTilesdb = $this->create_db_conn();


            register_activation_hook(__FILE__, array($this, 'activation'));

            add_filter('widget_text', 'do_shortcode');

            add_action('plugins_loaded', array($this, 'create_textdomain'));

            add_action('wp_enqueue_scripts', array($this, 'add_gallery_scripts'));

            //add_action( 'admin_init', array($this,'gallery_admin_init') );
            add_action('admin_menu', array($this, 'add_gallery_admin_menu'));

            add_shortcode('FinalTilesGallery', array($this, 'gallery_shortcode_handler'));

            add_action('wp_ajax_save_gallery', array($this, 'save_gallery'));
            add_action('wp_ajax_add_new_gallery', array($this, 'add_new_gallery'));
            add_action('wp_ajax_delete_gallery', array($this, 'delete_gallery'));
            add_action('wp_ajax_clone_gallery', array($this, 'clone_gallery'));
            add_action('wp_ajax_save_image', array($this, 'save_image'));
            add_action('wp_ajax_add_image', array($this, 'add_image'));
            add_action('wp_ajax_save_video', array($this, 'save_video'));
            add_action('wp_ajax_sort_images', array($this, 'sort_images'));
            add_action('wp_ajax_delete_image', array($this, 'delete_image'));
            add_action('wp_ajax_assign_filters', array($this, 'assign_filters'));
	        add_action('wp_ajax_assign_group', array($this, 'assign_group'));
	        add_action('wp_ajax_toggle_visibility', array($this, 'toggle_visibility'));
            add_action('wp_ajax_refresh_gallery', array($this, 'refresh_gallery'));
            add_action('wp_ajax_get_gallery_configuration', array($this, 'get_configuration'));
            add_action('wp_ajax_update_gallery_configuration', array($this, 'update_configuration'));
	        add_action('wp_ajax_get_image_size_url', array($this, 'get_image_size_url'));

            add_filter('mce_buttons', array($this, 'editor_button'));
            add_filter('mce_external_plugins', array($this, 'register_editor_plugin'));
            add_action('wp_ajax_ftg_shortcode_editor', array($this, 'ftg_shortcode_editor'));

            add_filter('plugin_row_meta', array($this, 'register_links'), 10, 2);

            add_action( 'wp_ajax_load_chunk', array($this, 'load_chunk') );
            add_action( 'wp_ajax_nopriv_load_chunk', array($this, 'load_chunk') );

            add_action( 'admin_notices', array( $this, 'review' ) );
            add_action( 'wp_ajax_ftg_dismiss_review', array( $this, 'dismiss_review' ) );
            add_filter( 'admin_footer_text',     array( $this, 'admin_footer'   ), 1, 2 );

            $this->resetFields();            
        }

        public function review() 
        {
            // Verify that we can do a check for reviews.
            $review = get_option( 'ftg_review' );
            $time   = time();
            $load   = false;
            $there_was_review = false;

            if ( ! $review ) {
                $review = array(
                    'time'      => $time,
                    'dismissed' => false
                );
                $load = true;
                $there_was_review = false;
            } else {                
                // Check if it has been dismissed or not.
                if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + DAY_IN_SECONDS) <= $time)) ) {
                    $load = true;
                }
            }

            // If we cannot load, return early.
            if ( ! $load ) {
                return;
            }

            // Update the review option now.
            update_option( 'ftg_review', $review );

            // Run through optins on the site to see if any have been loaded for more than a week.
            $valid  = false;
            $galleries = $this->FinalTilesdb->getGalleries();

            if ( ! $galleries ) 
            {
                return;
            }

            $with_date = false;
            foreach ( $galleries as $gallery ) 
            {
                if(! isset($gallery->date))
                    continue;

                $with_date = true;
                $data = $gallery->date;

                // Check the creation date of the local optin. It must be at least one week after.
                $created = isset( $data ) ? strtotime( $data ) + (7 * DAY_IN_SECONDS) : false;
                if ( ! $created ) {
                    continue;
                }

                if ( $created <= $time ) {
                    $valid = true;
                    break;
                }
            }

            if(! $with_date && count($galleries) > 0 && ! $there_was_review)
            {
                $valid = true;
            }

            // If we don't have a valid optin yet, return.
            if ( ! $valid ) 
            {
                return;
            }

            // We have a candidate! Output a review message.
            ?>
            <div class="notice notice-info is-dismissible ftg-review-notice">
                <p><?php _e( 'Hey, I noticed you created a photo gallery with Final Tiles - that’s awesome! Would you mind give it a 5-star rating on WordPress to help us spread the word and boost our motivation for new featrues?', 'final-tiles-gallery-lite' ); ?></p>
                <p><strong><?php _e( 'Diego Imbriani<br>Founder of GreenTreeLabs', 'final-tiles-gallery' ); ?></strong></p>
                <p>
                    <a href="https://wordpress.org/support/plugin/final-tiles-grid-gallery-lite/reviews/?filter=5#new-post" class="ftg-dismiss-review-notice ftg-review-out" target="_blank" rel="noopener"><?php _e( 'Ok, you deserve it', 'final-tiles-gallery-lite' ); ?></a><br>
                    <a href="#" class="ftg-dismiss-review-notice" rel="noopener"><?php _e( 'Nope, maybe later', 'final-tiles-gallery' ); ?></a><br>
                    <a href="#" class="ftg-dismiss-review-notice" rel="noopener"><?php _e( 'I already did', 'final-tiles-gallery' ); ?></a><br>
                </p>
            </div>
            <script type="text/javascript">
                jQuery(document).ready( function($) {
                    $(document).on('click', '.ftg-dismiss-review-notice, .ftg-review-notice button', function( event ) {
                        if ( ! $(this).hasClass('ftg-review-out') ) {
                            event.preventDefault();
                        }

                        $.post( ajaxurl, {
                            action: 'ftg_dismiss_review'
                        });

                        $('.ftg-review-notice').remove();
                    });
                });
            </script>
            <?php
        }

        public function dismiss_review() {

            $review = get_option( 'ftg_review' );
            if ( ! $review ) {
                $review = array();
            }

            $review['time']      = time();
            $review['dismissed'] = true;

            update_option( 'ftg_review', $review );
            die;
        }

        public function admin_footer( $text ) 
        {
            global $current_screen;
            if ( !empty( $current_screen->id ) && strpos( $current_screen->id, 'ftg' ) !== false ) {
                $url  = 'https://wordpress.org/support/plugin/final-tiles-grid-gallery-lite/reviews/?filter=5#new-post';
                $text = sprintf( __( 'Please rate <strong>Final Tiles Gallery</strong> <a href="%s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%s" target="_blank">WordPress.org</a> to help us spread the word. Thank you from the Final Tiles Gallery team!', 'wpforms' ), $url, $url );
            }
            return $text;
        }

        public function gallery_admin_bar()
        {
            global $wp_admin_bar;

            $wp_admin_bar->add_menu( array(
                    'id'     => 'ftg-upgrade-bar',
                    'href' => 'http://1.envato.market/c/288541/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Ffinal-tiles-wordpress-gallery%2F5189351',
                    'parent' => 'top-secondary',
                    'title' => __('Upgrade to Final Tiles Grid Gallery PRO'),
                    'meta'   => array('class' => 'ftg-upgrade-to-pro', 'target' => '_blank' ),
                ) );
        }


        private function resetFields()
        {
            $keys = array('name', 'hiddenFor', 'type', 'description', 'default', 'min', 'max', 'mu', 'excludeFrom');

            foreach ($this->fields as $tab_name => $tab) {
                foreach ($tab["fields"] as $key => $field) {
                    //print_r($field);
                    foreach ($keys as $kk) {
                        if (!array_key_exists($kk, $field)) {
                            $this->fields[$tab_name]["fields"][$key][$kk] = "";
                        }
                    }
                }

            }
            //print_r($this->fields);
        }

        public function register_links($links, $file)
        {
            $base = plugin_basename(__FILE__);
            if ($file == $base) {
                $links[] = '<a href="admin.php?page=ftg-lite-gallery-admin" title="Final Tiles Grid Gallery Dashboard">Dashboard</a>';
                $links[] = '<a href="admin.php?page=support" title="Final Tiles Grid Gallery Support">Support</a>';
                $links[] = '<a href="https://twitter.com/greentreelabs" title="@GreenTreeLabs on Twitter">Twitter</a>';
                $links[] = '<a href="https://www.facebook.com/greentreelabs" title="GreenTreeLabs on Facebook">Facebook</a>';
                $links[] = '<a href="https://www.google.com/+GreentreelabsNetjs" title="GreenTreeLabs on Google+">Google+</a>';
            }
            return $links;

        }

        public function create_db_tables()
        {
            include_once(WP_PLUGIN_DIR . '/final-tiles-grid-gallery-lite/lib/install-db.php');
            install_db();
        }

        public function activation()
        {

        }

        //Define textdomain
        public function create_textdomain()
        {
            $plugin_dir = basename(dirname(__FILE__));
            load_plugin_textdomain('final-tiles-gallery', false, dirname(plugin_basename(__FILE__)) . '/lib/languages/');
        }

        //Define constants
        public function define_constants()
        {
            if (!defined('FINALTILESGALLERYLITE_PLUGIN_BASENAME'))
                define('FINALTILESGALLERYLITE_PLUGIN_BASENAME', plugin_basename(__FILE__));

            if (!defined('FINALTILESGALLERYLITE_PLUGIN_NAME'))
                define('FINALTILESGALLERYLITE_PLUGIN_NAME', trim(dirname(FINALTILESGALLERYLITE_PLUGIN_BASENAME), '/'));

            if (!defined('FINALTILESGALLERYLITE_PLUGIN_DIR'))
                define('FINALTILESGALLERYLITE_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . FINALTILESGALLERYLITE_PLUGIN_NAME);
        }

        //Define DB tables
        public function define_db_tables()
        {
            global $wpdb;

            $wpdb->FinalTilesGalleries = $wpdb->prefix . 'FinalTiles_gallery';
            $wpdb->FinalTilesImages = $wpdb->prefix . 'FinalTiles_gallery_images';
        }


        public function create_db_conn()
        {
            require('lib/db-class.php');
            $FinalTilesdb = FinalTilesLiteDB::getInstance();
            return $FinalTilesdb;
        }

        public function editor_button($buttons)
        {
            array_push($buttons, 'separator', 'ftg_shortcode_editor');
            return $buttons;
        }

        public function register_editor_plugin($plugin_array)
        {
            $plugin_array['ftg_shortcode_editor'] = plugins_url('/admin/scripts/editor-plugin.js', __file__);
            return $plugin_array;
        }

        public function ftg_shortcode_editor()
        {
            $css_path = plugins_url('assets/css/admin.css', __FILE__);
            $admin_url = admin_url();

            $galleries = $this->FinalTilesdb->getGalleries(); //load all galleries

            include 'admin/include/tinymce-galleries.php';
            wp_die();
        }

        public function attachment_fields_to_edit($form, $post)
        {
            $form["ftg_link"] = array(
                "label" => "Link <small>FTG</small>",
                "input" => "text",
                "value" => get_post_meta($post->ID, "_ftg_link", true),
                "helps" => ""
            );
            $form["ftg_target"] = array(
                "label" => "_blank <small>FTG</small>",
                "input" => "html",
                "html" =>
                    "<input type='checkbox' name='attachments[{$post->ID}][ftg_target]' id='attachments[{$post->ID}][ftg_target]' value='_mblank' " .
                    (get_post_meta($post->ID, "_ftg_target", true) == "_mblank" ? "checked" : "")
                    . " />"
            );
            return $form;
        }

        public function attachment_fields_to_save($post, $attachment)
        {
            if (isset($attachment['ftg_link'])) {
                update_post_meta($post['ID'], '_ftg_link', $attachment['ftg_link']);
            }
            if (isset($attachment['ftg_target'])) {
                update_post_meta($post['ID'], '_ftg_target', $attachment['ftg_target']);
            }
            return $post;
        }

        //Delete gallery
        public function delete_gallery()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                $this->FinalTilesdb->deleteGallery(intval($_POST['id']));
            }
            exit();
        }


        public function update_configuration()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery'))
            {
                $id = $_POST['galleryId'];

                $config = stripslashes($_POST['config']);

                $this->FinalTilesdb->update_config($id, $config);
            }
            exit();
        }

        public function get_configuration()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery'))
            {
                $id = $_POST['galleryId'];

                $gallery = $this->FinalTilesdb->getGalleryConfig($id);

                echo $gallery;
            }
            exit();
        }

	    public function get_image_size_url()
	    {
		    if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery'))
		    {
			    echo wp_get_attachment_image_url($_POST['id'], $_POST['size'], false);
		    }
		    exit();
	    }

        //Clone gallery
        public function clone_gallery()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery'))
            {
                $sourceId = intval($_POST['id']);
                $g = $this->FinalTilesdb->getGalleryById($sourceId, true);
                $g['name'] .= " (copy)";
                $this->FinalTilesdb->addGallery($g);
                $id = $this->FinalTilesdb->getNewGalleryId();
                $images = $this->FinalTilesdb->getImagesByGalleryId($sourceId);
                foreach ($images as &$image) {
                    $image->Id = null;
                    $image->gid = $id;
                }
                $this->FinalTilesdb->addImages($id, $images);
            }
            exit();
        }

        //Add gallery scripts
        public function add_gallery_scripts()
        {
            wp_enqueue_script('jquery');

            wp_register_script('finalTilesGallery', plugins_url() . '/final-tiles-grid-gallery-lite/scripts/script.js', array('jquery'), FTGLITEVERSION);
            wp_enqueue_script('finalTilesGallery');


            wp_register_style('finalTilesGallery_stylesheet', plugins_url() . '/final-tiles-grid-gallery-lite/scripts/ftg.css', array(), FTGLITEVERSION);
            wp_enqueue_style('finalTilesGallery_stylesheet');

            wp_register_script('lightbox2_script', plugins_url() . '/final-tiles-grid-gallery-lite/lightbox/lightbox2/js/script.js', array('jquery'));
            wp_register_style('lightbox2_stylesheet', plugins_url() . '/final-tiles-grid-gallery-lite/lightbox/lightbox2/css/style.css');

            wp_register_style('fontawesome_stylesheet', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css');
            wp_enqueue_style('fontawesome_stylesheet');
        }

        //Admin Section - register scripts and styles
        public function gallery_admin_init()
        {
            if (function_exists('wp_enqueue_media')) {
                wp_enqueue_media();
            }

            $ftg_db_version = '5.0';
            $installed_ver = get_option("FinalTiles_gallery_db_version");

            if (!$installed_ver) {
				update_option("FinalTiles_gallery_db_version", $ftg_db_version);
            }

            $this->FinalTilesdb->updateConfiguration();

            if ($installed_ver != $ftg_db_version) {
                $this->create_db_tables();
                update_option("FinalTiles_gallery_db_version", $ftg_db_version);
            }

            function ftg_lite_get_image_sizes() 
            {
                global $_wp_additional_image_sizes;

                $sizes = array();

                foreach ( get_intermediate_image_sizes() as $_size ) {
                    if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
                        $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                        $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                        $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
                    } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                        $sizes[ $_size ] = array(
                            'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                            'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                            'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                        );
                    }
                }

                return $sizes;
            }

            foreach(ftg_lite_get_image_sizes()  as $name => $size)
                $this->fields["Links & Lightbox"]["fields"]["lightboxImageSize"]["values"]["Size"] []= $name . "|" . $name . " (" . $size['width'].'x'.$size['height'] . ($size['crop'] ? ' cropped)':')');

            $this->fields["Links & Lightbox"]["fields"]["lightboxImageSize"]["values"]["Size"] []= "full|Original (full)";

            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-dialog');
            wp_enqueue_script('jquery-ui-sortable');

            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style('wp-color-picker');

            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');

            wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,700,500,300,900');
            wp_enqueue_style('google-fonts');
            wp_register_style('google-icons', '//cdn.materialdesignicons.com/1.1.34/css/materialdesignicons.min.css', array());
            wp_enqueue_style('google-icons');

            wp_register_style('final-tiles-grid-gallery-lite-admin', plugins_url() . '/final-tiles-grid-gallery-lite/admin/css/style.css', array('colors'));
            wp_enqueue_style('final-tiles-grid-gallery-lite-admin');

            wp_register_script('materialize', plugins_url() . '/final-tiles-grid-gallery-lite/admin/scripts/materialize.min.js', array('jquery'));
            wp_enqueue_script('materialize');

            wp_register_script('final-tiles-grid-gallery-lite', plugins_url() . '/final-tiles-grid-gallery-lite/admin/scripts/final-tiles-grid-gallery-lite-admin.js', array('jquery', 'media-upload', 'thickbox', 'materialize'));
            wp_enqueue_script('final-tiles-grid-gallery-lite');

            wp_enqueue_style('thickbox');

            wp_register_style('fontawesome_stylesheet', '//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css');
            wp_enqueue_style('fontawesome_stylesheet');
        }

        //Create Admin Menu
        public function add_gallery_admin_menu()
        {
            $overview = add_menu_page('Final Tiles Gallery', 'Final Tiles Gallery', 'edit_posts', 'ftg-lite-gallery-admin', array($this, 'add_overview'), plugins_url() . '/final-tiles-grid-gallery-lite/admin/icon.png');
            $add_gallery = add_submenu_page('ftg-lite-gallery-admin', __('FinalTiles Gallery >> Add Gallery', 'FinalTiles-gallery'), __('Add Gallery', 'FinalTiles-gallery'), 'edit_posts', 'ftg-lite-add-gallery', array($this, 'add_gallery'));
            $tutorial = add_submenu_page('ftg-lite-gallery-admin', __('FinalTiles Gallery >> Tutorial', 'FinalTiles-gallery'), __('Tutorial', 'FinalTiles-gallery'), 'edit_posts', 'ftg-lite-tutorial', array($this, 'tutorial'));
            $plugins = add_submenu_page('ftg-lite-gallery-admin', __('FinalTiles Gallery >> Other galleries','FinalTiles-gallery'), __('Other galleries','FinalTiles-gallery'), 'edit_posts', 'ftg-lite-gallery-others', array($this, 'other_galleries'));
            $support = add_submenu_page('ftg-lite-gallery-admin', __('FinalTiles Gallery >> Support', 'FinalTiles-gallery'), __('Support', 'FinalTiles-gallery'), 'edit_posts', 'ftg-lite-support', array($this, 'support'));
            $upgrade = add_submenu_page('ftg-lite-gallery-admin', __('FinalTiles Gallery >> Upgrade','FinalTiles-gallery'), __('<span style="color:#7cc048">Upgrade</span>','FinalTiles-gallery'), 'edit_posts', 'ftg-lite-gallery-upgrade', array($this, 'upgrade'));

            add_action('load-' . $tutorial, array($this, 'gallery_admin_init'));
            add_action('load-' . $overview, array($this, 'gallery_admin_init'));
            add_action('load-' . $add_gallery, array($this, 'gallery_admin_init'));            
            add_action('load-' . $support, array($this, 'gallery_admin_init'));
            add_action('load-'.$plugins, array($this, 'gallery_admin_init'));
            add_action('load-'.$upgrade, array($this, 'gallery_admin_init'));

            add_action( 'admin_bar_menu', array($this, 'gallery_admin_bar'), 100);
        }

        //Create Admin Pages
        public function add_overview()
        {
            global $ftg_fields;
            $ftg_fields = $this->fields;

            global $ftg_parent_page;
            $ftg_parent_page = "dashboard";

            if (array_key_exists("id", $_GET)) {
                include("admin/edit-gallery.php");
            } else {
                include("admin/overview.php");
            }
        }

        public function upgrade()
        {
            include("admin/upgrade.php");
        }
        
        public function other_galleries()
        {
            include("admin/galleries.php");
        }
        
        public function tutorial()
        {
            include("admin/tutorial.php");
        }

        public function support()
        {
            include("admin/support.php");
        }

        public function add_gallery()
        {
            global $ftg_fields;
            $ftg_fields = $this->fields;
            $gallery = null;
            
            include("admin/add-gallery.php");
        }

        public function delete_image()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                foreach (explode(",", $_POST["id"]) as $id) {
                    $this->FinalTilesdb->deleteImage(intval($id));
                }
            }
            wp_die();
        }

	    public function toggle_visibility()
	    {
		    if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery'))
		    {
		        foreach (explode(",", $_POST["id"]) as $id)
		        {
			        $image = $this->FinalTilesdb->getImage($id);
				    $this->FinalTilesdb->editImage($id, array("hidden" => $image->hidden == 'T' ? 'F' : 'T'));
			    }
		    }
		    wp_die();
	    }

        public function add_image()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                $gid = intval($_POST['galleryId']);
                $enc_images = stripslashes($_POST["enc_images"]);
                $images = json_decode($enc_images);

                $result = $this->FinalTilesdb->addImages($gid, $images);

                header("Content-type: application/json");
                if ($result === false) {
                    echo "{\"success\":false}";
                } else {
                    echo "{\"success\":true}";
                }
            }
            wp_die();
        }

        public function list_thumbnail_sizes()
        {
            global $_wp_additional_image_sizes;
            $sizes = array();
            foreach (get_intermediate_image_sizes() as $s)
            {
                if (in_array($s, array('thumbnail', 'medium', 'large'))) {
                    $sizes[$s][0] = get_option($s . '_size_w');
                    $sizes[$s][1] = get_option($s . '_size_h');
                }
                else
                {
                    if (isset($_wp_additional_image_sizes) &&
                        isset($_wp_additional_image_sizes[$s]) &&
                        $_wp_additional_image_sizes[$s]['width'] > 0 &&
                        $_wp_additional_image_sizes[$s]['height'] > 0
                    )
                    {
	                    $sizes[$s] = array($_wp_additional_image_sizes[$s]['width'], $_wp_additional_image_sizes[$s]['height']);
                    }
                }
            }

            return $sizes;
        }

        public function sort_images()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                $result = $this->FinalTilesdb->sortImages(explode(',', $_POST['ids']));

                header("Content-type: application/json");
                if ($result === false) {
                    echo "{\"success\":false}";
                } else {
                    echo "{\"success\":true}";
                }
            }
            wp_die();
        }

        public function load_chunk()
        {
            require_once('lib/gallery-class.php');

            if (check_admin_referer('finaltilesgallery', 'finaltilesgallery')) 
            {
                $gid = intval($_POST["gallery"]);
                $images = $this->FinalTilesdb->getImagesByGalleryId($gid);

                $FinalTilesGallery = new FinalTilesGalleryLite($gid, $this->FinalTilesdb, $this->defaultValues);
                echo $FinalTilesGallery->images_markup();
            }
            wp_die();
        }

        public function refresh_gallery()
        {
            $this->list_images();
        }

        public function save_image()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                $result = false;

                if ($_POST['source'] == 'posts') {
                    $result = true;
                    $postId = intval($_POST['post_id']);
                    $img_url = stripslashes($_POST['img_url']);
                    update_post_meta($postId, 'ftg_image_url', $img_url);
                    if (array_key_exists("filters", $_POST) && strlen($_POST['filters'])) {
                        update_post_meta($postId, 'ftg_filters', $_POST['filters']);
                    }
                } else {
                    $type = $_POST['type'];
                    $imageUrl = stripslashes($_POST['img_url']);
                    $imageCaption = stripslashes($_POST['description']);
                    $filters = stripslashes($_POST['filters']);
                    $title = stripslashes($_POST['imageTitle']);
                    $target = $_POST['target'];
	                $group = $_POST['group'];
                    $hidden = $_POST['hidden'];
                    $link = isset($_POST['link']) ? stripslashes($_POST['link']) : null;
                    $imageId = intval($_POST['img_id']);
                    $sortOrder = intval($_POST['sortOrder']);

                    $data = array("imagePath" => $imageUrl,
                        "target" => $target,
                        "link" => $link,
                        "imageId" => $imageId,
                        "description" => $imageCaption,
                        "filters" => $filters,
                        "title" => $title,
	                    "group" => $group,
                        "hidden" => $hidden,
                        "sortOrder" => $sortOrder);

                    if (!empty($_POST["id"])) {
                        $imageId = intval($_POST['id']);
                        $result = $this->FinalTilesdb->editImage($imageId, $data);
                    } else {
                        $data["gid"] = intval($_POST['galleryId']);
                        $result = $this->FinalTilesdb->addFullImage($data);
                    }
                }
                header("Content-type: application/json");

                if ($result === false) {
                    echo "{\"success\":false}";
                } else {
                    echo "{\"success\":true}";
                }
            }
            wp_die();
        }

        public function list_images()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                $gid = intval($_POST["gid"]);
                $imageResults = $this->FinalTilesdb->getImagesByGalleryId($gid);
                $gallery = $this->FinalTilesdb->getGalleryById($gid);

                $list_size = "medium";
                $column_size = "s6 m3 l3";

                if (isset($_POST['list_size']) && !empty($_POST['list_size'])) {
                    $list_size = $_POST['list_size'];
                }
                
                setcookie('ftg_imglist_size', $list_size);
                $_COOKIE['ftg_imglist_size'] = $list_size;

                if ($list_size == 'small')
                    $column_size = 's4 m2 l2';
                if ($list_size == 'medium')
                    $column_size = 's6 m3 l3';
                if ($list_size == 'big')
                    $column_size = 's12 m4 l4';

                include('admin/include/image-list.php');
            }
            wp_die();
        }

        public function add_new_gallery()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                $data = $this->defaultValues;

                $data["date"] = date("Y-m-d");
                $data["name"] = $_POST['ftg_name'];
                $data["description"] = $_POST['ftg_description'];
                $data["source"] = $_POST['ftg_source'];
                $data["wp_field_caption"] = $_POST['ftg_wp_field_caption'];
                $data["wp_field_title"] = $_POST['ftg_wp_field_title'];
                $data["captionEffect"] = $_POST['ftg_captionEffect'];
                $data["post_categories"] = $_POST["post_categories"];
                $data["post_tags"] = $_POST["post_tags"];
                $data["layout"] = $_POST["layout"];
                $data["defaultWooImageSize"] = $_POST['def_imgsize'];
                $data["defaultPostImageSize"] = $_POST['def_imgsize'];
                $data["woo_categories"] = $_POST["woo_categories"];

                $result = $this->FinalTilesdb->addGallery($data);
                $id = $this->FinalTilesdb->getNewGalleryId();

                if ($id > 0 && array_key_exists('enc_images', $_POST) && strlen($_POST['enc_images'])) {
                    $enc_images = stripslashes($_POST["enc_images"]);
                    $images = json_decode($enc_images);
                    $result = $this->FinalTilesdb->addImages($id, $images);
                }

                echo $id;
            } else {
                echo -1;
            }
            wp_die();
        }

        private function checkboxVal($field)
        {
            if (isset($_POST[$field]))
                return 'T';

            return 'F';
        }

        public function save_gallery()
        {
            if (check_admin_referer('FinalTiles_gallery', 'FinalTiles_gallery')) {
                $galleryName = stripslashes($_POST['ftg_name']);
                $galleryDescription = stripslashes($_POST['ftg_description']);
                $slug = strtolower(str_replace(" ", "", $galleryName));
                $margin = intval($_POST['ftg_margin']);
                $minTileWidth = intval($_POST['ftg_minTileWidth']);
                $gridCellSize = intval($_POST['ftg_gridCellSize']);
                $imagesOrder = $_POST['ftg_imagesOrder'];
                $width = $_POST['ftg_width'];
                $enableTwitter = $this->checkboxVal('ftg_enableTwitter');
                $filterClick = $this->checkboxVal('ftg_filterClick');
                $enableFacebook = $this->checkboxVal('ftg_enableFacebook');
                $enableGplus = $this->checkboxVal('ftg_enableGplus');
                $enablePinterest = $this->checkboxVal('ftg_enablePinterest');
                $lightbox = $_POST['ftg_lightbox'];
                $mobileLightbox = $_POST['ftg_mobileLightbox'];
                $blank = $this->checkboxVal('ftg_blank');
                $filters = $_POST['ftg_filters'];

                $scrollEffect = $_POST['ftg_scrollEffect'];
                $captionBehavior = $_POST['ftg_captionBehavior'];
                $captionMobileBehavior = $_POST['ftg_captionMobileBehavior'];
                $captionEffect = $_POST['ftg_captionEffect'];
                $captionColor = $_POST['ftg_captionColor'];
                $captionBackgroundColor = $_POST['ftg_captionBackgroundColor'];
                $captionEasing = $_POST['ftg_captionEasing'];
                $captionHorizontalAlignment = $_POST['ftg_captionHorizontalAlignment'];
                $captionVerticalAlignment = $_POST['ftg_captionVerticalAlignment'];
                $captionEmpty = $_POST['ftg_captionEmpty'];
                $captionOpacity = intval($_POST['ftg_captionOpacity']);
                $borderSize = intval($_POST['ftg_borderSize']);
                $borderColor = $_POST['ftg_borderColor'];
                $titleFontSize = intval($_POST['ftg_titleFontSize']);
                $loadingBarColor = $_POST['ftg_loadingBarColor'];
                $loadingBarBackgroundColor = $_POST['ftg_loadingBarBackgroundColor'];
                $borderRadius = intval($_POST['ftg_borderRadius']);
                $allFilterLabel = $_POST['ftg_allFilterLabel'];
                $shadowColor = $_POST['ftg_shadowColor'];
                $shadowSize = intval($_POST['ftg_shadowSize']);
                $enlargeImages = $this->checkboxVal('ftg_enlargeImages');
                $wp_field_caption = $_POST['ftg_wp_field_caption'];
                $wp_field_title = $_POST['ftg_wp_field_title'];
                $style = $_POST['ftg_style'];
                $script = $_POST['ftg_script'];
                $loadedScale = intval($_POST['ftg_loadedScale']);
                $loadedRotate = intval($_POST['ftg_loadedRotate']);
                $loadedHSlide = intval($_POST['ftg_loadedHSlide']);
                $loadedVSlide = intval($_POST['ftg_loadedVSlide']);

                $captionEffectDuration = intval($_POST['ftg_captionEffectDuration']);
                $id = isset($_POST['ftg_gallery_edit']) ? intval($_POST['ftg_gallery_edit']) : 0;

                $data = array(
                    'ajaxLoading' => $_POST['ftg_ajaxLoading'],
                    'layout' => $_POST['ftg_layout'],
                    'name' => $galleryName,
                    'slug' => $slug,
                    'description' => $galleryDescription,
                    'lightbox' => $lightbox,
                    'mobileLightbox' => $mobileLightbox,
                    'lightboxImageSize' => $_POST['ftg_lightboxImageSize'],
                    'blank' => $blank,
                    'margin' => $margin,
                    'allFilterLabel' => $allFilterLabel,
                    'minTileWidth' => $minTileWidth,
                    'gridCellSize' => $gridCellSize,
                    'enableTwitter' => $enableTwitter,
                    'backgroundColor' => $_POST['ftg_backgroundColor'],
                    'filterClick' => $filterClick,
	                'disableLightboxGroups' => $this->checkboxVal('ftg_disableLightboxGroups'),
                    'defaultFilter' => $_POST['ftg_filterDef'],
                    'enableFacebook' => $enableFacebook,
                    'enableGplus' => $enableGplus,
                    'enablePinterest' => $enablePinterest,
                    'imagesOrder' => $imagesOrder,
                    'compressHTML' => $this->checkboxVal('ftg_compressHTML'),
                    'loadMethod' => $_POST['ftg_loadMethod'],
                    'socialIconColor' => $_POST['ftg_socialIconColor'],
                    'recentPostsCaption' => $_POST['ftg_recentPostsCaption'],
                    'recentPostsCaptionAutoExcerptLength' => intval($_POST['ftg_recentPostsCaptionAutoExcerptLength']),
                    'captionBehavior' => $captionBehavior,
                    'captionEffect' => $captionEffect,
                    'captionEmpty' => $captionEmpty,
                    'captionFullHeight' => $this->checkboxVal('ftg_captionFullHeight'),
                    'captionBackgroundColor' => $captionBackgroundColor,
                    'captionColor' => $captionColor,
                    'captionFrameColor' => $_POST['ftg_captionFrameColor'],
                    'captionEffectDuration' => $captionEffectDuration,
                    'captionEasing' => $captionEasing,
                    'captionVerticalAlignment' => $captionVerticalAlignment,
                    'captionHorizontalAlignment' => $captionHorizontalAlignment,
                    'captionMobileBehavior' => $captionMobileBehavior,
                    'captionOpacity' => $captionOpacity,
                    'captionIcon' => $_POST['ftg_captionIcon'],
                    'captionFrame' => $this->checkboxVal('ftg_captionFrame'),
                    'customCaptionIcon' => $_POST['ftg_customCaptionIcon'],
                    'captionIconColor' => $_POST['ftg_captionIconColor'],
                    'captionIconSize' => intval($_POST['ftg_captionIconSize']),
                    'captionFontSize' => intval($_POST['ftg_captionFontSize']),
                    'captionPosition' => $_POST['ftg_captionPosition'],
                    'titleFontSize' => intval($_POST['ftg_titleFontSize']),
                    'hoverZoom' => intval($_POST['ftg_hoverZoom']),
                    'hoverRotation' => intval($_POST['ftg_hoverRotation']),
                    'hoverIconRotation' => $this->checkboxVal('ftg_hoverIconRotation'),
                    'filters' => $filters,
                    'wp_field_caption' => $wp_field_caption,
                    'wp_field_title' => $wp_field_title,
                    'borderSize' => $borderSize,
                    'borderColor' => $borderColor,
                    'loadingBarColor' => $loadingBarColor,
                    'loadingBarBackgroundColor' => $loadingBarBackgroundColor,
                    'enlargeImages' => $enlargeImages,
                    'borderRadius' => $borderRadius,
                    'imageSizeFactor' => intval($_POST['ftg_imageSizeFactor']),
                    'imageSizeFactorTabletLandscape' => intval($_POST['ftg_imageSizeFactorTabletLandscape']),
                    'imageSizeFactorTabletPortrait' => intval($_POST['ftg_imageSizeFactorTabletPortrait']),
                    'imageSizeFactorPhoneLandscape' => intval($_POST['ftg_imageSizeFactorPhoneLandscape']),
                    'imageSizeFactorPhonePortrait' => intval($_POST['ftg_imageSizeFactorPhonePortrait']),
                    'imageSizeFactorCustom' => $_POST['ftg_imageSizeFactorCustom'],

                    'columns' => intval($_POST['ftg_columns']),
                    'columnsTabletLandscape' => intval($_POST['ftg_columnsTabletLandscape']),
                    'columnsTabletPortrait' => intval($_POST['ftg_columnsTabletPortrait']),
                    'columnsPhoneLandscape' => intval($_POST['ftg_columnsPhoneLandscape']),
                    'columnsPhonePortrait' => intval($_POST['ftg_columnsPhonePortrait']),

                    'max_posts' => intval($_POST['ftg_max_posts']),

                    'shadowSize' => $shadowSize,
                    'shadowColor' => $shadowColor,
                    'source' => $_POST['ftg_source'],
                    'post_types' => $_POST['ftg_post_types'],
                    'post_categories' => $_POST['ftg_post_categories'],
                    'post_tags' => $_POST['ftg_post_tags'],
                    'tilesPerPage' => intval($_POST['ftg_tilesPerPage']),
                    'woo_categories' => isset($_POST['ftg_woo_categories']) ? $_POST['ftg_woo_categories'] : '',
                    'defaultPostImageSize' => $_POST['ftg_defaultPostImageSize'],
                    'defaultWooImageSize' => isset($_POST['ftg_defaultWooImageSize']) ? $_POST['ftg_defaultWooImageSize'] : '',
                    'width' => $width,
                    'beforeGalleryText' => $_POST['ftg_beforeGalleryText'],
                    'afterGalleryText' => $_POST['ftg_afterGalleryText'],
                    'aClass' => $_POST['ftg_aClass'],
                    'rel' => $_POST['ftg_rel'],
                    'style' => $style,
                    'delay' => intval($_POST['ftg_delay']),
                    'script' => $script,
                    'support' => $this->checkboxVal('ftg_support'),
                    'supportText' => $_POST['ftg_supportText'],
                    'envatoReferral' => $_POST['ftg_envatoReferral'],
                    'scrollEffect' => $scrollEffect,
                    'loadedScale' => $loadedScale,
                    'loadedRotate' => $loadedRotate,
                    'loadedHSlide' => $loadedHSlide,
                    'loadedVSlide' => $loadedVSlide
                );

                header("Content-type: application/json");
                if ($id > 0) {
                    $result = $this->FinalTilesdb->editGallery($id, $data);
                } else {
                    $result = $this->FinalTilesdb->addGallery($data);
                    $id = $this->FinalTilesdb->getNewGalleryId();
                }

                if ($result)
                    echo "{\"success\":true,\"id\":" . $id . "}";
                else
                    echo "{\"success\":false}";
            }

            wp_die();
        }

        public static function get_image_size_links($id)
        {
            $result = array();
            $sizes = get_intermediate_image_sizes();
            $sizes[] = 'full';

            foreach ($sizes as $size) {
                $image = wp_get_attachment_image_src($id, $size);

                if (!empty($image) && (true == $image[3] || 'full' == $size))
                    $result["$image[1]x$image[2]"] = $image[0];
            }
            ksort($result);
            return $result;
        }

        //Create gallery
        public function create_gallery($galleryId)
        {
            require_once('lib/gallery-class.php');
            global $FinalTilesGallery;

            if (class_exists('FinalTilesGalleryLite')) {
                $FinalTilesGallery = new FinalTilesGalleryLite($galleryId, $this->FinalTilesdb, $this->defaultValues);
                $settings = $FinalTilesGallery->getGallery();

                switch ($settings->lightbox) {
                    case "magnific":
                        wp_enqueue_style('magnific_stylesheet');
                        wp_enqueue_script('magnific_script');
                        break;
                    case "prettyphoto":
                        wp_enqueue_style('prettyphoto_stylesheet');
                        wp_enqueue_script('prettyphoto_script');
                        break;
                    case "fancybox":
                        wp_enqueue_style('fancybox_stylesheet');
                        wp_enqueue_script('fancybox_script');
                        break;
                    case "colorbox":
                        wp_enqueue_style('colorbox_stylesheet');
                        wp_enqueue_script('colorbox_script');
                        break;
                    case "swipebox":
                        wp_enqueue_style('swipebox_stylesheet');
                        wp_enqueue_script('swipebox_script');
                        break;
                    case "lightbox2":
                        wp_enqueue_style('lightbox2_stylesheet');
                        wp_enqueue_script('lightbox2_script');
                        break;
                    case "image-lightbox":
                        wp_enqueue_script('image-lightbox_script');
                    case "lightgallery":
                        wp_enqueue_style('lightgallery_stylesheet');
                        wp_enqueue_script('lightgallery_script');
                        break;
                }

                switch ($settings->mobileLightbox) {
                    default:
                    case "magnific":
                        wp_enqueue_style('magnific_stylesheet');
                        wp_enqueue_script('magnific_script');
                        break;
                    case "prettyphoto":
                        wp_enqueue_style('prettyphoto_stylesheet');
                        wp_enqueue_script('prettyphoto_script');
                        break;
                    case "fancybox":
                        wp_enqueue_style('fancybox_stylesheet');
                        wp_enqueue_script('fancybox_script');
                        break;
                    case "colorbox":
                        wp_enqueue_style('colorbox_stylesheet');
                        wp_enqueue_script('colorbox_script');
                        break;
                    case "swipebox":
                        wp_enqueue_style('swipebox_stylesheet');
                        wp_enqueue_script('swipebox_script');
                        break;
                    case "lightbox2":
                        wp_enqueue_style('lightbox2_stylesheet');
                        wp_enqueue_script('lightbox2_script');
                        break;
                    case "image-lightbox":
                        wp_enqueue_script('image-lightbox_script');
                    case "lightgallery":
                        wp_enqueue_style('lightgallery_stylesheet');
                        wp_enqueue_script('lightgallery_script');
                        break;
                }

                return $FinalTilesGallery->render();
            } else {
                return "Gallery not found.";
            }
        }

        //Create Short Code
        public function gallery_shortcode_handler($atts)
        {
            return $this->create_gallery($atts['id']);
        }

        static public function slugify($text)
        {
            $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
            $text = trim($text, '-');
            if(function_exists("iconv"))
                $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            $text = strtolower($text);
            $text = preg_replace('~[^-\w]+~', '', $text);

            if (empty($text)) {
                return 'n-a';
            }

            return $text;
        }

        var $fields = array(

            "General" => array(
                "icon" => "mdi-settings",
                "fields" => array(
                    "name" => array(
                        "name" => "Name",
                        "hiddenFor" => array("dashboard", "shortcode"),
                        "type" => "text",
                        "description" => "Name of the gallery, for internal use.",
                        "excludeFrom" => array("dashboard", "shortcode")
                    ),
                    "description" => array(
                        "name" => "Description",
                        "hiddenFor" => array("dashboard", "shortcode"),
                        "type" => "text",
                        "description" => "Description of the gallery, for internal use.",
                        "excludeFrom" => array("dashboard", "shortcode")
                    ),
                    "layout" => array(
                        "name" => "Layout",
                        "type" => "select",
                        "description" => "<strong>Final Tiles</strong>: use images with different sizes<br><strong>Masonry</strong>: multi-column layout, use this one if you need images of the same size.",
                        "values" => array(
                            "Layout" => array(
                                "final|Final Tiles", "columns|Masonry"
                            )
                        ),
                        "excludeFrom" => array()
                    ),
                    "width" => array(
                        "name" => "Width",
                        "type" => "text",
                        "description" => "Width of the gallery in pixels or percentage.",
                        "excludeFrom" => array()
                    ),
                    "margin" => array(
                        "name" => "Margin",
                        "type" => "number",
                        "description" => "Margin between images",
                        "mu" => "px",
                        "min" => 0,
                        "max" => 50,
                        "excludeFrom" => array()
                    ),
                    "columns" => array(
                        "name" => "Number of columns",
                        "type" => "number",
                        "description" => "",
                        "mu" => "",
                        "min" => 1,
                        "max" => 50,
                        "excludeFrom" => array()
                    ),
                    "columnsTabletLandscape" => array(
                        "name" => "Number of columns (Tablet landscape)",
                        "type" => "number",
                        "description" => "",
                        "mu" => "",
                        "min" => 1,
                        "max" => 50,
                        "excludeFrom" => array()
                    ),
                    "columnsTabletPortrait" => array(
                        "name" => "Number of columns (Tablet portrait)",
                        "type" => "number",
                        "description" => "",
                        "mu" => "",
                        "min" => 1,
                        "max" => 50,
                        "excludeFrom" => array()
                    ),
                    "columnsPhoneLandscape" => array(
                        "name" => "Number of columns (Phone landscape)",
                        "type" => "number",
                        "description" => "",
                        "mu" => "",
                        "min" => 1,
                        "max" => 50,
                        "excludeFrom" => array()
                    ),
                    "columnsPhonePortrait" => array(
                        "name" => "Number of columns (Phone portrait)",
                        "type" => "number",
                        "description" => "",
                        "mu" => "",
                        "min" => 1,
                        "max" => 50,
                        "excludeFrom" => array()
                    ),
                    "imageSizeFactor" => array(
                        "name" => "Image size factor",
                        "type" => "slider",
                        "description" => "Percentage of image size, i.e.: if an image of the gallery is 300x200 and the size factor is 50% then the resulting image will be 150x100.
	    90% is a suggested default value, because under some circumstances, the images could be enlarged by the script (to fill gaps and avoid blank spaces between tiles).",
                        "default" => 90,
                        "min" => 1,
                        "max" => 100,
                        "mu" => "%",
                        "excludeFrom" => array()
                    ),
                    "imageSizeFactorTabletLandscape" => array(
                        "name" => "Image size factor (Tablet Landscape)",
                        "type" => "slider",
                        "description" => "Image size factor to apply when the viewport is 1024px, typically for tablets with landscape orientation",
                        "default" => 80,
                        "min" => 1,
                        "max" => 100,
                        "mu" => "%",
                        "excludeFrom" => array()
                    ),
                    "imageSizeFactorTabletPortrait" => array(
                        "name" => "Image size factor Tablet Portrait",
                        "type" => "slider",
                        "description" => "Image size factor to apply when the viewport is 768px, typically for tablets with portrait orientation",
                        "default" => 70,
                        "min" => 1,
                        "max" => 100,
                        "mu" => "%",
                        "excludeFrom" => array()
                    ),
                    "imageSizeFactorPhoneLandscape" => array(
                        "name" => "Image size factor Smartphone Landscape",
                        "type" => "slider",
                        "description" => "Image size factor to apply when the viewport is 640px, typically for smartphones with landscape orientation",
                        "default" => 60,
                        "min" => 1,
                        "max" => 100,
                        "mu" => "%",
                        "excludeFrom" => array()
                    ),
                    "imageSizeFactorPhonePortrait" => array(
                        "name" => "Image size factor Phone Portrait",
                        "type" => "slider",
                        "description" => "Image size factor to apply when the viewport is 320px, typically for smartphones with portrait orientation",
                        "default" => 50,
                        "min" => 1,
                        "max" => 100,
                        "mu" => "%",
                        "excludeFrom" => array()
                    ),
                    "imageSizeFactorCustom" => array(
                        "name" => "Custom image size factor",
                        "hiddenFor" => array("dashboard", "shortcode"),
                        "type" => "PRO_FEATURE",
                        "description" => "Use this field if you need further resolutions.",
                        "excludeFrom" => array("dashboard", "shortcode")
                    ),
                    "minTileWidth" => array(
                        "name" => "Tile minimum width",
                        "type" => "number",
                        "description" => "Minimum width of each tile, <strong>multiply this value for the image size factor to get the real size</strong>.",
                        "mu" => "px",
                        "min" => 50,
                        "max" => 500,
                        "default" => 200,
                        "excludeFrom" => array()
                    ),
                    "imagesOrder" => array(
                        "name" => "Images order",
                        "type" => "select",
                        "description" => "Choose the order of the images",
                        "default" => "",
                        "values" => array(
                            "Images order" => array(
                                "user|User", "reverse|Reverse", "random|Random"
                            )
                        ),
                        "excludeFrom" => array()
                    ),
                    "filter" => array(
                        "name" => "Filters",
                        "type" => "PRO_FEATURE",
                        "description" => "Manage here all the filters of this gallery",
                        "excludeFrom" => array("dashboard", "shortcode")
                    ),
                    "filterClick" => array(
                        "name" => "Reload Page on filter click",
                        "type" => "PRO_FEATURE",
                        "description" => "Turn this feature ON if you want to use filters with most lightboxes",
                        "excludeFrom" => array()
                    ),

                    "allFilterLabel" => array(
                        "name" => "Text for 'All' filter",
                        "type" => "PRO_FEATURE",
                        "description" => "Write here the label for the 'All' filter",
                        "excludeFrom" => array()
                    ),
                    "gridCellSize" => array(
                        "name" => "Size of the grid",
                        "type" => "number",
                        "default" => 25,
                        "min" => 1,
                        "max" => 100,
                        "mu" => "px",
                        "description" => "Tiles are snapped to a virtual grid, <strong>the higher this value the higher the chance to get bottom aligned tiles</strong> (but it needs to crop horizontally).",
                        "excludeFrom" => array()
                    ),
                    "enlargeImages" => array(
                        "name" => "Allow image enlargement",
                        "type" => "toggle",
                        "description" => "Images can be occasionally enlarged to avoid gaps. If you notice a quality loss try to reduce the <strong>Image size factor</strong> parameter.",
                        "default" => "T",
                        "excludeFrom" => array()
                    ),
                    "compressHTML" => array(
                        "name" => "Compress HTML",
                        "type" => "toggle",
                        "description" => "Enable or disable HTML compression, some themes prefer uncompressed, switch it off in case of problems.",
                        "default" => "T",
                        "excludeFrom" => array()
                    )
                )
            ),
            "Links & Lightbox" => array(
                "icon" => "mdi-link-variant",
                "fields" => array(
                    "lightbox" => array(
                        "name" => "Lightbox &amp; Links",
                        "type" => "select",
                        "description" => "Define here what happens when user click on the images.<br><strong><a href='http://1.envato.market/c/288541/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Ffinal-tiles-wordpress-gallery%2F5189351' target='_blank'>Buy a PRO license</a></strong> to unlock 5 more lightboxes.",
                        "values" => array(
                            "Link" => array("|No link", "direct|Direct link to image"),
                            "Lightboxes" => array("lightbox2|Lightbox", "everlightbox|EverlightBox")
                        ),
                        "excludeFrom" => array()
                    ),
                    "mobileLightbox" => array(
                        "name" => "Mobile Lightbox  &amp; Links",
                        "type" => "PRO_FEATURE",
                        "description" => "Define here what happens when user click on the images.",                        
                        "excludeFrom" => array()
                    ),
                    "lightboxImageSize" => array(
                        "name" => "Image size for the lightbox",
                        "type" => "select",
                        "description" => "",
                        "values" => array(
                            "Size" => array()
                        ),
                        "excludeFrom" => array()
                    ),
                    "disableLightboxGroups" => array(
                        "name" => "Disable lightbox grouping",
                        "type" => "toggle",
                        "description" => "Flag this option if you don't want to group images when opened in a lightbox.",
                        "default" => "F",
                        "excludeFrom" => array()
                    ),
                    "blank" => array(
                        "name" => "Links target",
                        "type" => "toggle",
                        "description" => "Open links in a blank page.",
                        "excludeFrom" => array()
                    ),
                    "enableTwitter" => array(
                        "name" => "Enable Twitter icon",
                        "type" => "toggle",
                        "description" => "Enable Twitter sharing.",
                        "default" => "F",
                        "excludeFrom" => array()
                    ),
                    "enableFacebook" => array(
                        "name" => "Enable Facebook icon",
                        "type" => "toggle",
                        "description" => "Enable Facebook sharing.",
                        "default" => "F",
                        "excludeFrom" => array()
                    ),
                    "enableGplus" => array(
                        "name" => "Enable Google Plus icon",
                        "type" => "toggle",
                        "description" => "Enable Google Plus sharing",
                        "default" => "F",
                        "excludeFrom" => array()
                    ),
                    "enablePinterest" => array(
                        "name" => "Enable Pinterest icon",
                        "type" => "toggle",
                        "description" => "Enable Pinterest sharing",
                        "default" => "F",
                        "excludeFrom" => array()
                    ),
                    "socialIconColor" => array(
                        "name" => "Color of social sharing icons",
                        "type" => "color",
                        "description" => "Set the color of the social sharing icons",
                        "default" => "#ffffff",
                        "excludeFrom" => array()
                    )
                )
            ),
            "Captions" => array(
                "icon" => "mdi-comment-text-outline",
                "fields" => array(
                    "captionBehavior" => array(
                        "name" => "Caption behavior",
                        "type" => "PRO_FEATURE",
                        "description" => "Captions can have two different behaviors: start hidden and shown on mouse over or viceversa.",                        
                        "excludeFrom" => array()
                    ),
                    "captionMobileBehavior" => array(
                        "name" => "Caption mobile behavior",
                        "type" => "PRO_FEATURE",
                        "description" => "Caption behavior for mobile devices.",
                        "excludeFrom" => array()
                    ),                    
                    "captionFullHeight" => array(
                        "name" => "Caption full height",
                        "type" => "PRO_FEATURE",
                        "description" => "Enable this option for full height captions. <strong>This is required if you want to use caption icons and caption effects other than <i>fade</i>.</strong>",
                        "default" => "T",
                        "excludeFrom" => array()
                    ),
                    "captionEmpty" => array(
                        "name" => "Empty captions",
                        "type" => "PRO_FEATURE",
                        "description" => "Choose if empty caption has to be shown. Consider that empty captions are never shown if <i>Caption full height</i> is switched off.",                        
                        "excludeFrom" => array()
                    ),
                    "captionIcon" => array(
                        "name" => "Caption icon",
                        "type" => "select",
                        "description" => "Choose the icon for the captions.",
                        "values" => array(
                            "Icon" => array("|None", "search|Lens", "search-plus|Lens (plus)", "link|Link", "heart|Heart", "heart-o|Heart empty",
                                "camera|Camera", "camera-retro|Camera retro", "picture-o|Picture", "star|Star", "star-o|Star empty",
                                "sun-o|Sun", "arrows-alt|Arrows", "hand-o-right|Hand")
                        ),
                        "excludeFrom" => array()
                    ),
                    "customCaptionIcon" => array(
                        "name" => "Custom caption icon",
                        "type" => "PRO_FEATURE",
                        "description" => "Use this field to insert the class of a FontAwesome icon (i.e.: fa-heart). <a href='http://fontawesome.io/icons/' target='blank'>See all available icons</a>. <strong>This value override the <i>Caption icon</i> value</strong>.",
                        "excludeFrom" => array()
                    ),
                    "captionIconColor" => array(
                        "name" => "Caption icon color",
                        "type" => "color",
                        "description" => "Color of the icon in captions.",
                        "default" => "#ffffff",
                        "excludeFrom" => array()
                    ),
                    "captionIconSize" => array(
                        "name" => "Caption icon size",
                        "type" => "number",
                        "description" => "Size of the icon in captions.",
                        "default" => 12,
                        "min" => 10,
                        "max" => 96,
                        "mu" => "px",
                        "excludeFrom" => array()
                    ),
                    "captionFontSize" => array(
                        "name" => "Caption font size",
                        "type" => "number",
                        "description" => "Size of the font in captions.",
                        "default" => 12,
                        "min" => 10,
                        "max" => 96,
                        "mu" => "px",
                        "excludeFrom" => array()
                    ),
                    "captionEffect" => array(
                        "name" => "Caption effect",
                        "type" => "PRO_FEATURE",
                        "description" => "Effect used to show the captions.",                        
                        "excludeFrom" => array()
                    ),
                    "captionEasing" => array(
                        "name" => "Caption effect easing",
                        "type" => "PRO_FEATURE",
                        "description" => "Easing function for the caption animation, works better with sliding animations.",                        
                        "excludeFrom" => array()
                    ),
                    "captionFrame" => array(
                        "name" => "Caption frame",
                        "type" => "toggle",
                        "description" => "Add a frame around the caption",
                        "default" => "F",
                        "excludeFrom" => array()
                    ),
                    "captionFrameColor" => array(
                        "name" => "Caption frame color",
                        "type" => "color",
                        "description" => "Color of the frame around the caption",
                        "default" => "#ffffff",
                        "excludeFrom" => array()
                    ),
                    "captionColor" => array(
                        "name" => "Caption color",
                        "type" => "color",
                        "description" => "Text color of the captions.",
                        "default" => "#ffffff",
                        "excludeFrom" => array()
                    ),
                    "captionEffectDuration" => array(
                        "name" => "Caption effect duration",
                        "type" => "text",
                        "description" => "Duration of the caption animation.",
                        "default" => 250,
                        "mu" => "ms",
                        "min" => 0,
                        "max" => 1000,
                        "excludeFrom" => array()
                    ),
                    "captionBackgroundColor" => array(
                        "name" => "Caption background color",
                        "type" => "color",
                        "description" => "Caption background color",
                        "default" => "#000000",
                        "excludeFrom" => array()
                    ),
                    "captionOpacity" => array(
                        "name" => "Caption opacity",
                        "type" => "text",
                        "description" => "Opacity of the caption, 0% means 'invisible' while 100% is a plain color without opacity.",
                        "default" => 80,
                        "min" => 0,
                        "max" => 100,
                        "mu" => "%",
                        "excludeFrom" => array()
                    ),
                    "wp_field_caption" => array(
                        "name" => "WordPress caption field",
                        "type" => "select",
                        "description" => "WordPress field used for captions. <strong>This field is used ONLY when images are added to the gallery, </strong> however, if you want to ignore captions just set it to '<i>Don't use captions</i>'.",
                        "values" => array(
                            "Field" => array("none|Don't use captions", "title|Title", "caption|Caption", "description|Description")
                        ),
                        "excludeFrom" => array("shortcode")
                    ),
                    "wp_field_title" => array(
                        "name" => "WordPress title field",
                        "type" => "select",
                        "description" => "WordPress field used for titles. <strong>This field is used ONLY when images are added to the gallery, </strong> however, if you want to ignore titles just set it to '<i>Don't use titles</i>'.",
                        "values" => array(
                            "Field" => array("none|Don't use titles", "title|Title", "description|Description")
                        ),
                        "excludeFrom" => array("shortcode")
                    ),
                    "recentPostsCaption" => array(
                        "name" => "Recent posts caption",
                        "type" => "select",
                        "description" => "Field of the post used for captions when using \"Recent posts\" as source.",
                        "values" => array(
                            "Field" => array("none|Don't use captions", "title|Title", "excerpt|Excerpt", "auto-excerpt|Auto excerpt")
                        ),
                        "excludeFrom" => array("shortcode")
                    ),
                    "recentPostsCaptionAutoExcerptLength" => array(
                        "name" => "Max number of words for 'Auto excerpt'",
                        "type" => "text",
                        "description" => "Define the max number of words of the caption when <i>Recent posts caption</i> is set to <i>Auto excerpt</i>.",
                        "default" => "20",
                        "excludeFrom" => array()
                    ),
                    "captionVerticalAlignment" => array(
                        "name" => "Caption Vertical Alignment",
                        "type" => "select",
                        "description" => "Choose the vertical alignment of the caption",
                        "values" => array("Caption vertical alignment" => array("Top|Top", "Middle|Middle", "Bottom|Bottom")),
                        "excludeFrom" => array()
                    ),
                    "captionHorizontalAlignment" => array(
                        "name" => "Caption Horizontal Alignment",
                        "type" => "select",
                        "description" => "Choose the horizontal alignment of the caption",
                        "values" => array("Caption horizontal alignment" => array("Left|Left", "Center|Center", "Right|Right")),
                        "excludeFrom" => array()
                    ),
                    "titleFontSize" => array(
                        "name" => "Title font size",
                        "type" => "number",
                        "description" => "Size of the font in captions.",
                        "min" => 10,
                        "max" => 96,
                        "mu" => "px",
                        "excludeFrom" => array()
                    ),


                )
            ),
            "Hover effects" => array(
                "icon" => "mdi-file-image",
                "fields" => array(
                    "hoverZoom" => array(
                        "name" => "Zoom",
                        "type" => "PRO_FEATURE",
                        "description" => "Scale value.",
                        "default" => 100,
                        "min" => 0,
                        "max" => 600,
                        "mu" => "%",
                        "excludeFrom" => array()
                    ),
                    "hoverRotation" => array(
                        "name" => "Rotation",
                        "type" => "PRO_FEATURE",
                        "description" => "Rotation value in degrees.",
                        "min" => 0,
                        "max" => 360,
                        "mu" => "deg",
                        "default" => 0,
                        "excludeFrom" => array()
                    ),
                    "hoverIconRotation" => array(
                        "name" => "Rotate icon",
                        "type" => "toggle",
                        "default" => "F",
                        "description" => "Enable rotation of the icon.",
                        "excludeFrom" => array()
                    )
                )
            ),
            "Image loaded effects" => array(
                "icon" => "mdi-reload",
                "fields" => array(
                    "loadedScale" => array(
                        "name" => "Scale",
                        "description" => "",
                        "type" => "slider",
                        "min" => 0,
                        "max" => 200,
                        "mu" => "%",
                        "default" => 100,
                        "excludeFrom" => array()
                    ),
                    "loadedRotate" => array(
                        "name" => "Rotate",
                        "description" => "",
                        "type" => "slider",
                        "min" => -180,
                        "max" => 180,
                        "default" => 0,
                        "mu" => "deg",
                        "excludeFrom" => array()
                    ),
                    "loadedHSlide" => array(
                        "name" => "Horizontal slide",
                        "description" => "",
                        "type" => "slider",
                        "min" => -100,
                        "max" => 100,
                        "mu" => "px",
                        "default" => 0,
                        "excludeFrom" => array()
                    ),
                    "loadedVSlide" => array(
                        "name" => "Vertical slide",
                        "description" => "",
                        "type" => "slider",
                        "min" => -100,
                        "max" => 100,
                        "mu" => "px",
                        "default" => 0,
                        "excludeFrom" => array()
                    )

                )
            ),
            "Style" => array(
                "icon" => "mdi-format-paint",
                "fields" => array(
                    "borderSize" => array(
                        "name" => "Border size",
                        "type" => "number",
                        "description" => "Size of the border of each image.",
                        "default" => 0,
                        "min" => 0,
                        "max" => 10,
                        "mu" => "px",
                        "excludeFrom" => array()
                    ),
                    "borderRadius" => array(
                        "name" => "Border radius",
                        "type" => "number",
                        "description" => "Border radius of the images.",
                        "default" => 0,
                        "min" => 0,
                        "max" => 100,
                        "mu" => "px",
                        "excludeFrom" => array()
                    ),
                    "borderColor" => array(
                        "name" => "Border color",
                        "type" => "color",
                        "description" => "Color of the border when size is greater than 0.",
                        "default" => "#000000",
                        "excludeFrom" => array()
                    ),
                    "loadingBarColor" => array(
                        "name" => "Loading Bar color",
                        "type" => "color",
                        "description" => "Color of the loading bar",
                        "default" => "#000000",
                        "excludeFrom" => array()
                    ),
                    "loadingBarBackgroundColor" => array(
                        "name" => "Loading Bar background color",
                        "type" => "color",
                        "description" => "Background color of the loading bar",
                        "default" => "#cccccc",
                        "excludeFrom" => array()
                    ),
                    "shadowSize" => array(
                        "name" => "Shadow size",
                        "type" => "number",
                        "description" => "Shadow size of the images.",
                        "default" => 0,
                        "min" => 0,
                        "max" => 20,
                        "mu" => "px",
                        "excludeFrom" => array()
                    ),
                    "shadowColor" => array(
                        "name" => "Shadow color",
                        "type" => "color",
                        "description" => "Color of the shadow when size is greater than 0.",
                        "default" => "#000000",
                        "excludeFrom" => array()
                    ),
                    "backgroundColor" => array(
                        "name" => "Tile background color",
                        "type" => "color",
                        "description" => "Background color of tiles",
                        "default" => "#fafafa",
                        "excludeFrom" => array()
                    )
                )
            ),
            "Customizations" => array(
                "icon" => "mdi-puzzle",
                "fields" => array(
                    "aClass" => array(
                        "name" => "Additional CSS class on A tag",
                        "type" => "text",
                        "description" => "Use this field if you need to add additional CSS classes to the link that contains the image.",
                        "default" => "",
                        "excludeFrom" => array()
                    ),
                    "rel" => array(
                        "name" => "Value of 'rel' attribute on the link that contains the image.",
                        "type" => "text",
                        "description" => "Use this field if you need to add additional CSS classes to the link that contains the image. This is useful mostly to integrate the gallery with other lightbox plugins.",
                        "default" => "",
                        "excludeFrom" => array()
                    ),
                    "beforeGalleryText" => array(
                        "name" => "Text before gallery",
                        "type" => "textarea",
                        "description" => "Use this field to add text/html to be placed just before your gallery.",
                        "excludeFrom" => array("shortcode")
                    ),
                    "afterGalleryText" => array(
                        "name" => "Text after gallery",
                        "type" => "textarea",
                        "description" => "Use this field to add text/html to be placed just after your gallery.",
                        "excludeFrom" => array("shortcode")
                    ),
                    "style" => array(
                        "name" => "Custom CSS",
                        "type" => "textarea",
                        "description" => "<strong>Write just the code without using the &lt;style&gt; tag.</strong><br>List of useful selectors:<br>
	                    <br>
	                    <ul>
	                        <li>
	                            <em>.final-tiles-gallery</em> : gallery container;
	                        </li>
	                        <li>
	                            <em>.final-tiles-gallery .tile-inner</em> : tile content;
	                        </li>
	                        <li>
	                            <em>.final-tiles-gallery .tile-inner .item</em> : image of the tile;
	                        </li>
	                        <li>
	                            <em>.final-tiles-gallery .tile-inner .caption</em> : caption of the tile;
	                        </li>
	                        <li>
	                            <em>.final-tiles-gallery .ftg-filters</em> : filters container
	                        </li>
	                        <li>
	                            <em>.final-tiles-gallery .ftg-filters a</em> : filter
	                        </li>
	                        <li>
	                            <em>.final-tiles-gallery .ftg-filters a.selected</em> : selected filter
	                        </li>
                		</ul>",
                        "excludeFrom" => array("shortcode")
                    ),
                    "script" => array(
                        "name" => "Custom scripts",
                        "type" => "textarea",
                        "description" => "This script will be called after the gallery initialization. Useful for custom lightboxes.
	                        <br />
	                        <br />
	                        <strong>Write just the code without using the &lt;script&gt;&lt;/script&gt; tags</strong>",
                        "excludeFrom" => array("shortcode")
                    ),
                    "delay" => array(
                        "name" => "Delay",
                        "type" => "text",
                        "description" => "Delay (in milliseconds) before firing the gallery. Sometimes it's needed to avoid conflicts with other plugins.",
                        "min" => 0,
                        "max" => 5000,
                        "mu" => "ms",
                        "default" => 0,
                        "excludeFrom" => array()
                    ),
                    "support" => array(
                        "name" => "Show developer link",
                        "type" => "toggle",
                        "description" => "I want to support this plugin, show the developer link!",
                        "default" => "F",
                        "excludeFrom" => array(),
                        "excludeFrom" => array()
                    ),
                    "supportText" => array(
                        "name" => "Developer link text",
                        "type" => "text",
                        "description" => "Text for the developer link",
                        "default" => "powered by Final Tiles Grid Gallery",
                        "excludeFrom" => array()
                    ),
                    "envatoReferral" => array(
                        "name" => "Envato username for referral",
                        "type" => "text",
                        "description" => "Enter your Envato username to earn money! Receive 30% of the first purchase or deposit of each referred user. You do not need to activate anything else, you are automatically eligible.",
                        "default" => "GreenTreeLabs",
                        "excludeFrom" => array()
                    )
                )
            )
        );
    }
}

if (class_exists("FinalTiles_GalleryLite")) {
    global $ob_FinalTiles_GalleryLite;
    $ob_FinalTiles_GalleryLite = new FinalTiles_GalleryLite();
}
?>