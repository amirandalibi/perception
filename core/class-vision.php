<?php

use Google\Cloud\Vision\VisionClient;

/**
 * Register aded_post_meta action
 *
 * Initiate Cloud Vision API with api keys
 * Upload the media file to Google server and save the response in metadata
 *
 * @package    perception
 * @subpackage perception/core
 * @author     Amir Andalibi
 */

class vision_api {

	// @todo -- add constants here

	function __construct(){
		
		if (is_admin()){
			add_action('added_post_meta', array($this, 'insert_post_meta_from_vision'), 10, 4);		
		}
	}

	function insert_post_meta_from_vision($meta_id, $post_id, $meta_key, $meta_value) {
			$uploads = wp_upload_dir();
			$json_id = get_option('google-vision-json-id');
			$json = esc_url($uploads['basedir']);
			$json .= '/'.get_post_meta( $json_id, '_wp_attached_file', true );
			$project_id = json_decode(file_get_contents($json))->project_id;
			
			putenv('GOOGLE_APPLICATION_CREDENTIALS='.$json.'');	
	
			# Instantiates a client
			$vision = new VisionClient([
					'projectId' => $project_id
			]);
	
			$fileName = get_attached_file( $post_id );
			# Prepare the image to be annotated
			$imageResource = fopen($fileName, 'r');
	
			$image = $vision->image($imageResource, [
				'labels',
				'logos',
				'web',
				'landmarks'
			], [
				'maxResults' => [
					'labels' => 20,
					'web'	=> 20
				]	
			]);
			
					
			$result = $vision->annotate($image);
			
			$items = array();
			
			// Objects
			if ( null !== $result->labels() ){
				foreach ((array)$result->labels() as $label) {
					$items[] = $label->description();
				}
			}
	
			// Landmarks
			if ( null !== $result->landmarks() ){
				foreach ((array) $result->landmarks() as $landmark) {
					$items[] .= $landmark->description();
				}
			}
			
			// Logos
			if ( null !== $result->logos() ){
				foreach ((array) $result->logos() as $logo) {
					$items[] .= $logo->description();
				}
			}
			
			// Web Entities
			if ( null !== $result->web() ){
				$web = $result->web();
				if ($web->entities()) {
					foreach ($web->entities() as $entity) {
						if (isset($entity->info()['description'])) {
							$items[] .= $entity->description();
						}
					}
				}
			}
			
			$metadata = implode(", ",$items);
			update_post_meta($post_id, '_wp_attached_google_vision', strtolower($metadata));
		}
}
