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

if ( !function_exists( 'shortcode_number' ) ) {

	function shortcode_number($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'icon' => '',
				'title' => 'Title',
				'percent' => '80'
		), $atts));

		$class = $icon==false? 'item-content':'item-content has-icon';

		$html = '<div class="shortcode-number clearfix">';

			if($icon) {
				$html .= '<div class="item-icon"><i class="'.$icon.'"></i></div>';
			}

			$html .= '<div class="'.$class.'" data-percent="'.$percent.'">';
			$html .= '<span class="count"></span>';
			$html .= '<h5 class="title item-title">'.$title.'</h5>';
			$html .= '</div>';

		$html .= '</div>';
	
		return $html;
	}

	add_shortcode('number', 'shortcode_number');
}
?>