<?php
/*
Plugin Name: Migrate Pages Plugin
Plugin URI: http://github.com/rhildred/gitwordpress/
Description: Export pages into git, and import them
Author: Rich Hildred
Version: 1.0
Author URI: http://syndicateme.net/
*/

class MigratePages{
	private static function getConnection() {
	    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, 
	    		DB_USER, DB_PASSWORD);  
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $dbh;
	}
	public static function export()
	{
		global $table_prefix;
		$db = MigratePages::getConnection();
		$sql = 'SELECT * FROM ' . $table_prefix . 'posts';
		$stmt = $db->prepare($sql);
		$stmt->execute();
		//prepare heading from metadata
		$sHeading = "INSERT IGNORE INTO ". $table_prefix . 'posts(';
		for($n = 0; $n < $stmt->columnCount(); $n++){
			if($n != 0) $sHeading .= ",";
			$sHeading .= $stmt->getColumnMeta($n)["name"];
		}
		$sHeading .= ") VALUES\n";
		$aResults = $stmt->fetchAll(PDO::FETCH_NUM);
		file_put_contents(ABSPATH . 'wp-content/uploads/pages.sql', 
			$sHeading);
		
		//go through the rows to insert
		foreach ($aResults as $nRow=>$aRow){
			if($nRow != 0) $sRow = ",\n('";
			else $sRow = "('";
			//a column at a time
			foreach($aRow as $n=>$sColumn){
				$sColumn = addslashes(preg_replace("/[\n\r]/", "", $sColumn));
				if($n > 0) $sRow .= "','";
				$sRow .= $sColumn;
			}
			$sRow .=  "')";
			file_put_contents(ABSPATH . 'wp-content/uploads/pages.sql',
			$sRow, FILE_APPEND);
		} 
		file_put_contents(ABSPATH . 'wp-content/uploads/pages.sql', ";\n", FILE_APPEND);
		echo $nRow . " posts exported";
	}
	public static function import()
	{
		$db = MigratePages::getConnection();
		$sql = file_get_contents(ABSPATH . 'wp-content/uploads/pages.sql');
		$stmt = $db->prepare($sql);
		$stmt->execute();
		echo $stmt->rowCount() . " posts imported";
		
	}
	public static function init()
	{
		add_posts_page( "Import Posts", "Import Posts", "delete_others_posts", "import", "MigratePages::import");
		add_posts_page( "Export Posts", "Export Posts", "read", "export", "MigratePages::export");		
	}
}

add_action('admin_menu', 'MigratePages::init');

?>
