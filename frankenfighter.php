<?php
/**
 * Frankenfighter plugin for WordPress
 *
 * @package   frankenfighter
 * @link      https://github.com/Crabcyborg/wp-frankenfighter
 * @author    Mike Letellier <mike@crabcyb.org>
 * @copyright 2020 Mike Letellier
 * @license   GPL v2 or later
 *
 * Plugin Name:  Frankenfighter
 * Description:  Use the WordPress CMS to build your very own Frankenstein
 * Version:      0.0.1
 * Plugin URI:   https://wp-frankenfighter.crabcyb.org/lady-tiger
 * Author:       Mike Letellier
 * Author URI:   https://crabcyb.org/
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

define('FRANKENFIGHTER_BASE_PATH', plugin_dir_path(__FILE__));
define('FRANKENFIGHTER_BASE_URL', plugin_dir_url(__FILE__));
define('FRANKENFIGHTER_IMAGE_URL', FRANKENFIGHTER_BASE_URL.'/assets/images/');

wp_register_script('mithril', 'https://unpkg.com/mithril/mithril.js', null, null, true);
wp_register_script('frankenfighter', FRANKENFIGHTER_BASE_URL.'/assets/js/frankenfighter.js', null, null, true);

wp_enqueue_script('jquery');
wp_enqueue_script('mithril');
wp_enqueue_script('frankenfighter');

function frankenfighter_image($image) {
	return FRANKENFIGHTER_IMAGE_URL.$image.'.png';
}

function frankenfighter_shortcode($atts) {
	if(isset($atts['key'])) {
		$keys = ($key_csv = get_option('frankenfighter_keys')) ? explode(',', $key_csv) : [];
		if(in_array($atts['key'], $keys)) {
			// using a database option
			$config = get_option('frankenfighter_'.$atts['key']);
		}
	} elseif(isset($atts['config'])) {
		// raw encoded data
		$config = $atts['config'];
	}

	if(empty($config)) {
		// presets
		$preset_configurations = ['lady-tiger', 'zebrelephant'];
		$preset = isset($atts['preset']) && in_array($atts['preset'], $preset_configurations) ? $atts['preset'] : reset($preset_configurations);
		$config = urlencode(json_encode(require(FRANKENFIGHTER_BASE_PATH."config/{$preset}.php")));
	}
	
	return '<div class="frankenfighter" style="text-align: center;" data-config="'.$config.'"></div>';
}

function frankenfighter_admin() {
	wp_register_script('jsoneditor-js', 'https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.0.0/jsoneditor.min.js', null, null, true);
	wp_register_style('jsoneditor-css', 'https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.0.0/jsoneditor.min.css');
	wp_register_script('frankenfighter-admin', FRANKENFIGHTER_BASE_URL.'/assets/js/frankenfighter-admin.js', null, null, true);

	wp_enqueue_script('jsoneditor-js');
	wp_enqueue_style('jsoneditor-css');
	wp_enqueue_script('frankenfighter-admin');

	// '<div class="jsoneditor" data-config="'.$config.'" style="width: 400px; height: 400px;"></div>'
}

//frankenfighter_admin();

add_shortcode('frankenfighter', 'frankenfighter_shortcode');