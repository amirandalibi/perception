<?php

if( !class_exists('perception') ):	
		
	class perception {
		
		protected $loader;
		protected $vision;
		protected $plugin_name = 'perception';
		protected $version = '1.0.0';
		
		public function __construct() {
			$this->load_dependencies();
		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */

		private function load_dependencies() {
			require_once ('class-vision.php');
			require_once ('admin/class-perception-admin.php');

			
			$this->vision = new vision_api();
			if( is_admin() ){
				add_filter('posts_clauses', array( __CLASS__ , 'alter_media_library_search'), 20, 1 );
			}
		}


		/**
		 * Alter Search query in Media Library page
		 * 
		 * @since 1.0.0
		 * @access private
		 */

		function alter_media_library_search( $search ) {
			global $wp_query, $wpdb;

			$vars = $wp_query->query_vars;
			if ( empty( $vars ) ) {
				$vars = ( isset( $_REQUEST['query'] ) ) ? $_REQUEST['query'] : array();
			}

			// Rewrite the where clause
			if ( ! empty( $vars['s'] ) && ( ( isset( $_REQUEST['action'] ) && 'query-attachments' == $_REQUEST['action'] ) || 'attachment' == $vars['post_type'] ) ) {
				$search['where'] = " AND $wpdb->posts.post_type = 'attachment' AND ($wpdb->posts.post_status = 'inherit')";

				// search for keyword "s"
				$n = '%' . $wpdb->esc_like( $vars['s'] ) . '%';
				$search['where'] .= $wpdb->prepare( " AND ( ($wpdb->posts.ID LIKE %s) OR ($wpdb->postmeta.meta_key = '_wp_attached_google_vision' AND $wpdb->postmeta.meta_value LIKE %s)", $n, $n );

				$search['where'] .= " )";

				$search['join'] .= " LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id";
				$search['distinct'] = 'DISTINCT';	
			}

			return $search;
		}
		
		

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}


		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version() {
			return $this->version;
		}

	}

endif; // class_exists check