<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$license = array(
    array(
        "title" => "Advanced View Customization",
        "text" => "Unlock all the settings of gallery views, allowing to edit and customize the views, size, effects, buttons, navigation tools, colors and more.",
        "icon" => "-35px -295px"
    ),
    array(
        "title" => "Full Image Configuration",
        "text" => "Unlock the advanced configuration settings, so that you could use the plugin fully, configure all the corners of images and videos to your taste.",
        "icon" => "-140px -300px"
    ),
    array(
        "title" => "Image Resizer Settings",
        "text" => "Unlock the options allowing to play around images, thumbs and edit all the corners of media using advanced resizer settings",
        "icon" => " -244px -300px"
    ),
    array(
        "title" => "Color and Text Styling",
        "text" => "Unlock more options allowing to edit, add or customize every text and color of the plugin with multiple solutions",
        "icon" => "-326px -297px"
    ),
    array(
        "title" => "Portfolios Category Settings",
        "text" => "We included Category Buttons, which can be used to sort and group content into different sections/subjects. 
        Each project can belong to a single category as well as to multiple categories at once.",
        "icon" => "-424px -418px"
    ),
    array(
        "title" => "Lightbox Views Library",
        "text" => "Some view types of our wonderful Portfolio  Gallery uses quite new designed Lightbox/Popup tool and additional 4 Styles for it",
        "icon" => "-148px -396px"
    ),
   array(
        "title" => "Advanced Lightbox Options",
        "text" => "2 Type of Lightbox with tons of social sharing options, zooming, framing, navigation and sliding effects will make users love the plugin.",
        "icon" => "-251px -396px"
    ),
    array(
        "title" => "Image and Video slideshow",
        "text" => "Showcase Images and Videos in Stunning Slideshows with advanced options, styles and effects",
        "icon" => "-343px -399px"
    )
);
?>
<div class="responsive grid">
    <?php foreach ($license as $key => $val) { ?>
        <div class="col column_1_of_3">
            <div class="header" style="border: 1px solid">
                <div class="col-icon" style="background-position: <?= $val["icon"] ?>; ">
                </div>
                <?= $val["title"] ?>
            </div>
            <p><?= $val["text"] ?></p>
            <div class="col-footer">
                <a href="https://huge-it.com/portfolio-gallery/" class="a-upgrate">Upgrade</a>
            </div>
        </div>
    <?php } ?>
</div>
<div class="license-footer">
    <p class="footer-text">
        You are using the Lite version of the Forms Plugin for WordPress. If you want to get more awesome options,
        advanced features, settings to customize every area of the plugin, then check out the Full License plugin.
        The full version of the plugin is available in 3 different packages of one-time payment.
    </p>
    <p class="this-steps max-width">
        After the purchasing the commercial version folllo this steps
    </p>
    <ul class="steps">
        <li>Deactivate Huge IT Forms Plugin</li>
        <li>Delete Huge IT Forms</li>
        <li>Install the downloaded commercial version of the plugin</li>
    </ul>
    <a href="https://huge-it.com/portfolio-gallery/" target="_blank">Purchase a License</a>
</div>