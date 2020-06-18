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
 * Plugin URI:   https://wordpress.crabcyb.org
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
define('FRANKENFIGHTER_IMAGE_URL', FRANKENFIGHTER_BASE_URL.'assets/images/');

wp_register_script('mithril', 'https://unpkg.com/mithril/mithril.js', null, null, true); // TODO before I submit I need to move mithril from a CDN
wp_register_script('frankenfighter', FRANKENFIGHTER_BASE_URL.'assets/js/frankenfighter.js', null, null, true);

wp_enqueue_script('mithril');
wp_enqueue_script('frankenfighter');

/**
 * @param string $image path
 */
function frankenfighter_image($image) {
	return FRANKENFIGHTER_IMAGE_URL.$image.'.png';
}

/**
 * @param array $atts
 */
function frankenfighter_shortcode($atts) {
	if(isset($atts['key'])) {
		if($key = sanitize_key($atts['key'])) {
			// using a database option
			$config = get_option('jsoneditor_frankenfighter_'.$key);
			$config = is_array($config) ? urlencode(json_encode($config)) : FALSE;
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
	
	return '<div class="frankenfighter" style="text-align: center;" data-config="'.esc_attr($config).'"></div>';
}

add_shortcode('frankenfighter', 'frankenfighter_shortcode');