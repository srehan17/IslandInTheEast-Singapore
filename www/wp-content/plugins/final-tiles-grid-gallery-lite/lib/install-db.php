<?php

function set_utf8()
{
	global $wpdb;
	
	$FinalTilesImages = $wpdb->FinalTilesImages;
	
	$sql1 = "ALTER TABLE  $FinalTilesImages DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	$sql2 = "ALTER TABLE  $FinalTilesImages CHANGE  `description`  `description` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
	
	$wpdb->query($sql1);	
	$wpdb->query($sql2);
}

function ftg_nullable()
{
    global $wpdb;
	
	$FinalTilesGalleries = $wpdb->FinalTilesGalleries;
	
    $fields = array("name", "slug", "description", "filters", "width", "margin", "minTileWidth", "gridCellSize", "imageSizeFactor",
                    "lightbox", "hoverEffect", "hoverColor", "hoverOpacity", "hoverEffectDuration", "hoverEasing", "scrollEffect",
                    "shuffle", "enableTwitter", "enableFacebook", "enableGplus", "enablePinterest", "borderSize", "borderColor",
                    "shadowSize", "shoadowColor", "backgroundColor", "enlargeImages", "borderRadius", "style", "script");
    
    foreach($fields as $field)
    {
        $wpdb->query("ALTER TABLE  $FinalTilesGalleries MODIFY  $field VARCHAR(1000) NULL");
    }
}

function install_db() 
{
  global $wpdb;			  

  $FinalTilesGalleries = $wpdb->FinalTilesGalleries;
  $FinalTilesImages = $wpdb->FinalTilesImages;
  
  
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		
  $sql = "CREATE TABLE $FinalTilesGalleries (
	 	Id INT NOT NULL AUTO_INCREMENT, 	
        configuration VARCHAR( 5000 ) NULL,
        UNIQUE KEY Id (Id)
  ) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci;";

		dbDelta( $sql );


  $sql = "CREATE TABLE $FinalTilesImages (
		Id INT NOT NULL AUTO_INCREMENT, 
		gid INT NOT NULL, 
		type VARCHAR(10) DEFAULT \"image\" NOT NULL,
		imageId INT NOT NULL,
		imagePath LONGTEXT NOT NULL, 
        filters VARCHAR( 1500 ) NULL,
        link LONGTEXT NULL,
        title LONGTEXT NULL,
        target VARCHAR(50) NULL,
        blank ENUM('T','F') DEFAULT \"F\" NOT NULL, 
		description LONGTEXT NOT NULL, 
		sortOrder INT NOT NULL,
		`group` text,
		hidden ENUM('T','F') DEFAULT \"F\" NOT NULL,
		UNIQUE KEY id (Id) 
	) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci";

	dbDelta( $sql );
  
}
