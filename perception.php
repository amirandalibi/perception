<?php

/*
Plugin Name: perception
Plugin URI: https://wordpress.org/plugins/perception/
Description: A Wordpress plugin to detect broad sets of objects in your media library images, from flowers, animals, or transportation to thousands of other object categories commonly found within images.
Version: 1.0.0
Author: Amir Andalibi
Author URI: https://amirandalibi.com
License: GPL
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Copyright: Studio Accolade 
Text Domain: perception
*/

require_once ('core/class-perception.php');
require ('vendor/autoload.php');


function perception() {
	
	$perception = new perception();
	return $perception;
	
}

perception();

