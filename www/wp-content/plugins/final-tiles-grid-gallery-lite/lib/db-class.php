<?php


if (!class_exists("FinalTilesLiteDB")) {	
	class FinalTilesLiteDB {
		
		private static $pInstance;
		
		private function __construct() {}
		
		public static function getInstance() 
		{
			if(!self::$pInstance) {
				self::$pInstance = new FinalTilesLiteDB();
			}
			
			return self::$pInstance;
		}
		
		public function query() 
		{
			return "Test";	
		}
		

		public function update_config($id, $data)
		{
			global $wpdb;

			$wpdb->update($wpdb->FinalTilesGalleries, array('configuration' => $data), array('Id' => $id));
		}

		public function updateConfiguration()
		{
			global $wpdb;
			$galleries = $wpdb->get_results("SELECT * FROM $wpdb->FinalTilesGalleries");
			foreach($galleries as $gallery)
			{
				if($gallery->configuration == NULL)
				{
					unset($gallery->configuration);
					$configuration = json_encode($gallery);				
					$wpdb->update($wpdb->FinalTilesGalleries, 
									array('configuration' => $configuration),
									array('Id' => $gallery->Id));
				}
			}
		}
		

		public function addGallery($data) 
		{
			global $wpdb;		  
			$configuration = json_encode($data);
			$data = array('configuration' => $configuration);
			$galleryAdded =  $wpdb->insert( $wpdb->FinalTilesGalleries, $data);
			return $galleryAdded;
		}
		
		public function getNewGalleryId() 
		{
			global $wpdb;
			return $wpdb->insert_id;
		}
		
		public function deleteGallery($gid) 
		{
			global $wpdb;
			$wpdb->query($wpdb->prepare("DELETE FROM $wpdb->FinalTilesImages WHERE gid = %d", $gid));
			$wpdb->query($wpdb->prepare("DELETE FROM $wpdb->FinalTilesGalleries WHERE Id = %d", $gid));
		}
		
		public function editGallery($gid, $data) 
		{
			global $wpdb;
			$configuration = json_encode($data);
			$g = $wpdb->update($wpdb->FinalTilesGalleries, 
							array('configuration' => $configuration),
							array('Id' => $gid));
							
			//exit( var_dump( $wpdb->last_query ) );
			return $g;
		}
		
		public function getGalleryConfig($id)
		{
			global $wpdb;
			$gallery = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->FinalTilesGalleries WHERE Id = %d", $id));

			return $gallery->configuration;
		}
		public function getGalleryById($id, $array=false) 
		{
			global $wpdb;
			$gallery = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->FinalTilesGalleries WHERE Id = %d", $id));

			if($array)
			{
				return get_object_vars(json_decode($gallery->configuration));
			}
				
			$data = json_decode($gallery->configuration);
			
			return $data;
		}
		
		public function getGalleries() 
		{
			global $wpdb;
			$query = "SELECT Id, configuration FROM $wpdb->FinalTilesGalleries order by id";
			$galleryResults = $wpdb->get_results( $query );
			
			$result = array();
			foreach($galleryResults as $gallery)
			{
				$data = json_decode($gallery->configuration);
				$data->Id = $gallery->Id;
				$result[] = $data;
			}
			return $result;
		}
		
		public function addVideo($data) 
		{
			global $wpdb;		
			$videoAdded = $wpdb->insert( $wpdb->FinalTilesImages,
			        array( 'gid' => $data['gid'], 'imagePath' => $data['imagePath'], 'type' => 'video', 'sortOrder' => 0, 'imageId' => rand(100000, 1000000) ));
			$id = $wpdb->insert_id;
	        $wpdb->update($wpdb->FinalTilesImages, array('sortOrder' => $id), array('id' => $id));
			return $videoAdded;
		}
		
		public function editVideo($id, $data)
		{
			global $wpdb;
			$result = $wpdb->update( $wpdb->FinalTilesImages, $data, array( 'Id' => $id ) );
			return $result;
		}

		public function addImages($gid, $images) 
		{		
			global $wpdb;		

			foreach ($images as $image) {
				if(! isset($image->group))
					$image->group = "";

				$data = array( 'gid' => $gid,
				               'imagePath' => $image->imagePath,
				               'description' => isset($image->description) ? $image->description : "",
				               'imageId' => $image->imageId,
				               'group' => $image->group,
				               'title' => isset($image->title) ? $image->title : "", 'sortOrder' => 0 );

				if(isset($image->filters))
					$data['filters'] = $image->filters;

				$data['type'] = isset($image->type) ? $image->type : 'image';

				$imageAdded = $wpdb->insert( $wpdb->FinalTilesImages, $data );
				$id = $wpdb->insert_id;
				$wpdb->update($wpdb->FinalTilesImages, array('sortOrder' => $id), array('id' => $id));
			}
			
			return true;
		}
		
		public function addFullImage($data) {
			global $wpdb;		
			$imageAdded = $wpdb->insert( $wpdb->FinalTilesImages, $data );
			return $imageAdded;
		}
		
		public function deleteImage($id) {
			global $wpdb;
			$query = "DELETE FROM $wpdb->FinalTilesImages WHERE Id = '$id'";
			if($wpdb->query($wpdb->prepare("DELETE FROM $wpdb->FinalTilesImages WHERE Id = %d", $id)) === FALSE) {
				return false;
			}
			else {
				return true;
			}
		}
		
		public function editImage($id, $data) 
		{
			global $wpdb;
			$imageEdited = $wpdb->update( $wpdb->FinalTilesImages, $data, array( 'Id' => $id ) );
			return $imageEdited;
		}

		public function getImage($id)
		{
			global $wpdb;
			return $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->FinalTilesImages WHERE id = %d", $id));
		}

		public function sortImages($ids) 
		{
			global $wpdb;
			$index = 1;
			foreach($ids as $id) 
			{
				$data = array('sortOrder' => $index++);
				$wpdb->update( $wpdb->FinalTilesImages, $data, array( 'Id' => $id ) );
			}
			return true;
		}
		
		public function getImagesByGalleryId($gid, $skip=0, $size=0) 
		{
			global $wpdb;

			$limit = "";
			if($size > 0)
				$limit = "LIMIT %d, %d";

			$imageResults = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->FinalTilesImages WHERE gid = %d ORDER BY sortOrder ASC " . $limit, $gid, $skip, $size));

			foreach($imageResults as &$image)
			{
				$image->source = "gallery";
				if(! isset($image->group))
					$image->group = null;
				if(! isset($image->hidden))
					$image->hidden = 'F';
			}
			
			return $imageResults;
		}
		
		public function getGalleryByGalleryId($gid) {
			global $wpdb;
			$gallery = $wpdb->get_results("SELECT $wpdb->FinalTilesGalleries.*, $wpdb->FinalTilesImages.* FROM $wpdb->FinalTilesGalleries INNER JOIN $wpdb->FinalTilesImages ON ($wpdb->FinalTilesGalleries.Id = $wpdb->FinalTilesImages.gid) WHERE $wpdb->FinalTilesGalleries.Id = '$gid' ORDER BY sortOrder ASC");		
			return $gallery;
		}
	}
}
?>