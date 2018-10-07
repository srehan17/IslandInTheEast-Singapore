=== Image Photo Gallery Final Tiles Grid ===
Contributors: GreenTreeLabs
Donate link: http://greentreelabs.net/blog/donate/
Tags: gallery, grid gallery, best gallery plugin, free gallery, gallery plugin, gallery grid plugin, masonry, photo gallery, image gallery, social gallery, portfolio gallery, lightbox, justified gallery
Requires at least: 3.8.0
Tested up to: 4.7.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Image Gallery + Photo Gallery + Portfolio Gallery + Tiled Gallery in 1 plugin. Includes lightbox and hover effects. It supports Pinterest (masonry) photo gallery and tiled grid gallery.

== Description ==

Image Gallery + Photo Gallery + Portfolio Gallery + Tiled Gallery in 1 plugin. Includes lightbox and hover effects. It supports Pinterest (masonry) photo gallery and tiled grid gallery.

= A Brand New Algorithm =

There are dozens of wordpress photo galleries out there, but the problem is that they always look the same!
Final Tiles Grid Gallery uses a brand new algorithm to make much more interesting image grids, how does it work?
The main concept is very simple: it doesn't crop the images and it keeps the original size (if possible). 

This is a completely new way to build photo galleries because now you can think of the images like they were tiles with different sizes, so you can use a bigger size for a cover image, for example.

The image photo gallery is fully responsive and it adapts to the browser using a nice and smooth animation, even on mobile devices because it can use the hardware acceleration taking advantage of CSS3 properties.

This gallery plugin is perfect for you if you need:

* wedding album photo gallery
* designer portfolio photo gallery
* photography portfolio photo gallery
* products showcase photo gallery

= Features =

* responsive
* 2 available layouts: Tiles and Columns (masonry)
* adjust margin between images
* adjust image rendered size based on current screen size
* sort images manually or randomly
* 1 lightbox + support for [EverlightBox](https://wordpress.org/plugins/search/everlightbox/)
* social sharing
* video gallery

= PRO version features =

Final Tiles Gallery Lite is a very complete plugin but if you want the best experience consider buying a PRO license. The PRO version has all features of Lite version plus:

* filters / categories
* 7 lightbox +  support for [EverlightBox](https://wordpress.org/plugins/search/everlightbox/)
* different lightbox for mobile devices
* caption hover effects
* image hover effects
* image loaded effects
* WooCommerce support
* recent posts / custom posts galleries

If you love the Lite version and it’s enough for your needs but you want to say “thanks!” you can always buy a [present](http://amzn.eu/5SP6qpj) ;)

If you instead want to upgrade and unlock all the cool features then you can [buy a license](http://1.envato.market/c/288541/275988/4415?u=http%3A%2F%2F1.envato.market%2Fc%2F288541%2F275988%2F4415%3Fu%3Dhttp%253A%252F%252Fcodecanyon.net%252Fitem%252Ffinal-tiles-grid-gallery-for-wordpress%252F5189351).

The “Final” layout can’t ensure you have a justified edge at the bottom of the gallery. If you have this requirement then you can use the “Masonry” layout and use images with same height, that way you can make a justified gallery.

== Installation ==

= For automatic installation: =

The simplest way to install is to click on 'Plugins' then 'Add' and type 'Final Tiles Grid Gallery Lite' in the search field.

= For manual installation 1: =

1. Login to your website and go to the Plugins section of your admin panel.
2. Click the Add New button.
3. Under Install Plugins, click the Upload link.
4. Select the plugin zip file (final-tiles-grid-gallery-lite.x.x.x.zip) from your computer then click the Install Now button.
5. You should see a message stating that the plugin was installed successfully.
6. Click the Activate Plugin link.

= For manual installation 2: =

1. You should have access to the server where WordPress is installed. If you don't, see your system administrator.
2. Copy the plugin zip file (final-tiles-grid-gallery-lite.x.x.x.zip) up to your server and unzip it somewhere on the file system.
3. Copy the "final-tiles-grid-gallery-lite" folder into the /wp-content/plugins directory of your WordPress installation.
4. Login to your website and go to the Plugins section of your admin panel.
5. Look for "Final Tiles Grid Gallery Lite" and click Activate.

== Frequently Asked Questions ==

= The layout doesnt' look correct =

Check the console of the browser and look if you see any error like: Uncaught TypeError: undefined is not a function jquery.finalTilesGalleryLite.js
This errors means that the browser doesn't know the finalTilesGalleryLite JavaScript plugin, most of the time the problem is caused by a wrong jQuery
inclusion by the theme or another plugin. 

= Why the images arrange themselves in columns ? =

Columns happen when the bottom edges of the images are not aligned. To avoid this tedious layout you can raise the "Grid size" setting. This will crop a few pixels but it raises the chances to avoid columns.

= How to get beautiful grids ? =

Have a look at this [video tutorial](https://www.youtube.com/watch?v=RNT4JGjtyrs)


= Why does some image look blurry ? =

Under some circumstances the images have to be enlarged a bit to avoid gaps. To avoid a blurry effect you can decrease the "Image size factor" setting. 

= I want to use another lightbox instead of the provided one =

The PRO license bundles 7 different lightboxes. However you can use any other lightbox you want also with the Lite license. If you have installed a lightbox plugin then you just need to select "Direct link to image" in the "Lightbox" settings.

= Can I import galleries from other plugins? =

Currently galleries made with Envira, FooGallery, Instagram, NextGen, JetPack, Modula, etc cannot be imported.

= How can I get support? =

* Get priority support with a PRO license: http://www.final-tiles-gallery.com/wordpress/pro.html

= How can I say thanks? =

* Just recommend our plugin to your friends! or
* Like and share our [Facebook page](https://www.facebook.com/greentreelabs "Facebook fan page")
* Or buy me a [present](http://amzn.eu/5SP6qpj)


== Screenshots ==

1. Gallery Example 1
2. Gallery Example 2
3. Gallery Example 3
4. Admin panel with Google Material design
5. Image management
6. 52 pages documentation

== Changelog ==

= 3.0.4 = 
* [Fix] Fixed bug in FinalTilesLiteDB::getImagesByGalleryId()

= 3.0.3 = 
* [Enhancement] Backend UI tweaks
* [Add] Functionalities for usage analysis

= 3.0.2 = 
* [Add] Support for servers without PHP iconv extension

= 3.0.1 = 
* [Fix] Fixed typo in admin panel markup

= 3.0.0 =
* [Add] Removed limit of 20 images per gallery
* [Add] New masonry layout available
* [Add] Dozens of improvements

= 2.0.15 =
* Enhanced support for filters in WordPress media panel

= 2.0.14 =
* Fixed broken css for backends under SSL

= 2.0.13 =
* Added missing alt image attribute

= 2.0.12 =
* Lightbox now group images by gallery

= 2.0.11 =
* Added links to ShortPixel image optimizer

= 2.0.10 =
* Fixed CSS conflict with Lightbox2 and some themes

= 2.0.9 =
* Now you can go to the "edit gallery" page by clicking the whole card on the dashboard

= 2.0.8 =
* Admin panel enhancements: now you can see the preview image for each gallery on the dashboard

= 2.0.7 =
* New features: Add gallery shortcode from text editor

= 2.0.6 =
* New features: Image loaded effects

= 2.0.5 =
* New features: sequential image loading, admin image size list, customize loading bar color and loading bar background color

= 2.0.4 =
* New feature: caption font size

= 2.0.2 =
* Bug fix (image size was hidden)

= 2.0.1 =
* Bug fix on activation

= 2.0 =
* Major release: many new features, new admin panel with Google Material design, many bug fixes

= 1.3 =
* WordPress 4.2 compatibility

= 1.2 =
* Bugfix: fixed menu

= 1.1 =
* Bugfix: the folder name of the plugin was not correct

= 1.0 =
* First release

== Upgrade Notice ==

= 3.0.4 = 
* [Fix] Fixed bug in FinalTilesLiteDB::getImagesByGalleryId()

= 3.0.3 = 
* [Enhancement] Backend UI tweaks
* [Add] Functionalities for usage analysis

= 1.1 =
* This version fixes a critical bug that prevented to activate the plugin.

= 1.0 =
* This is the launch version. No changes yet.