<?php
/**
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */


if ( !function_exists( 'shortcode_title' ) ) {

	function shortcode_title($atts, $content = null) {

		$output = '<h3 class="shortcode-title">';
		$output .= '<span>'.$content.'</span>';
		$output .= '</h3>';

		return $output;
	}

	add_shortcode('title', 'shortcode_title');
}
?>