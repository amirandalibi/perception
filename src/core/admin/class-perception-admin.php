<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://amirandalibi.com
 * @since      1.0.0
 *
 * @package    perception
 * @subpackage perception/admin
 */

class perception_admin {

	public function __construct() {

		if (is_admin()) {
			add_action('admin_init', array($this, 'register_settings' ) );
			add_action('admin_menu', array($this, 'register_perception_page') );
			add_filter('upload_mimes', array($this, 'my_myme_types'), 1, 1);			
			add_action('admin_enqueue_scripts', array($this, 'enqueue_assets' ) );
		}
		
	}

	function register_perception_page() {
		add_menu_page('Perception Setting', 'Perception', 'manage_options', 'perception-settings', array($this, 'admin_template'), 'dashicons-visibility');
	}

	/**
	* Display admin settings page
	*
	* @return void
	*/
	function admin_template() {
		include_once ('partials/admin-template.php');
	}

	/**
	 * Configurable settings that use the Wordpress settings API
	 *
	 * @return void
	 */

	function register_settings() {
		// register json file path
		register_setting(
			'perception-settings',
			'google-vision-json-path'
		);
		register_setting(
			'perception-settings',
			'google-vision-json-id'
		);
	}
		
	/**
	 * Enqueue all scripts and styles for the setting page
	 *
	 * @return void
	 */
	function enqueue_assets() {
		
		// media uploader
		wp_enqueue_media();

		//register admin page js
		wp_enqueue_script(
			'perception-admin-js',
			plugin_dir_url( __FILE__ ) . '/js/perception-admin.js',
			array( 'jquery')
		);
		// register plugin stylesheet
		wp_enqueue_style(
			'perception-admin-css',
			plugin_dir_url( __FILE__ ) . '/css/perception-admin.css'
		);

	}

	/**
	 * Adding JSON mime type to upload
	 *@return void
	 */

	function my_myme_types($mime_types){
		$mime_types['json'] = 'application/json'; // Adding .json extension
    return $mime_types;
	}
}
