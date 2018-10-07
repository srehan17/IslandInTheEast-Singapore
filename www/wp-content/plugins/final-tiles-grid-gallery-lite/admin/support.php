<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die(_e('You are not allowed to call this page directly.','final-tiles-gallery')); } ?>
<?php $ftg_subtitle = "Support" ?>
<?php include "header.php" ?>


<div class="container">        
    <div class="row">
	    <div class="section s12 m12 l12 col" id="support-page">			
			<p>
				Collect the following informations before opening a new support thread:
			</p>
			<ul>
				<li><?php _e('URL of the page with the gallery;','final-tiles-gallery')?> </li>
				<li><?php _e('describe the problem you are experiencing;','final-tiles-gallery')?></li>
				<li><?php _e('browser and operating system used.','final-tiles-gallery')?></li>
			</ul>
			<p>
				<?php _e('Another great help from you would be doing a couple of tests, try these simple operations and let us know the results:','final-tiles-gallery')?>
			</p>
			<ul>
				<li><?php _e("Switch to the default WordPress theme and look if the problem is still there, if not we'll already know that the problem is related to your theme and we can be faster solving the issue;",'final-tiles-gallery')?></li>
				<li><?php _e('See if the problem is repeatable, also on another computers.','final-tiles-gallery')?></li>
			</ul>
			<p><strong><?php _e("The more complete these informations are, the faster we'll be our response",'final-tiles-gallery')?></strong> <?php _e("(aware out time zome, we're +1 GMT), thanks!",'final-tiles-gallery')?></p>
			<p>
				Write on our support <a href="https://wordpress.org/support/plugin/final-tiles-grid-gallery-lite" target="_bloank">forum</a>.<br>
				We'll try to give you an answer as soon as we can.
			</p>
			<p>
				If you're in a rush and need a priority and dedicated support then
				please consider <a href="http://1.envato.market/c/288541/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Ffinal-tiles-wordpress-gallery%2F5189351" target="_blank">buying a license</a>. That will also extend your plugin
				with a lot of new features.
			</p>
			<p class="buttons">
				<a class="waves-effect waves-light btn" href="https://wordpress.org/support/plugin/final-tiles-grid-gallery-lite" target="_blank"><i class="mdi-content-send right"></i> <?php _e('Go to support forum','final-tiles-gallery')?> </a>
				<a class="waves-effect waves-light btn" href="http://1.envato.market/c/288541/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Ffinal-tiles-wordpress-gallery%2F5189351" target="_blank"><i class="mdi-content-send right"></i> <?php _e('Buy dedicated support + unlock features','final-tiles-gallery')?> </a>
			</p>
	    </div>
	</div>
</div>
