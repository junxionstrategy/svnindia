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

if ( !function_exists( 'shortcode_feature_service' ) ) {
	
	function shortcode_feature_service( $atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => 'Your title',
			'icon' => '',
			'link' => '',
			'button_text' => ''
		), $atts));

		$html = '<div class="shortcode-feature-service clearfix">';

			if($icon) {
				$html .= '<div class="item-icon"><i class="'.$icon.'"></i></div>';
			}

			$html .= '<div class="item-content">';

			if($link) {
				$html .= '<h3 class="title item-title"><a href="'.$link.'">'.$title.'</a></h3>';
			}else{
				$html .= '<h3 class="title item-title">'.$title.'</h3>';
			}

			$html .= '<div class="text">'.do_shortcode($content).'</div>';

			if($link && $button_text) {
				$html .= '<div class="link"><a href="'.$link.'">'.$button_text.'</a></div>';
			}

			$html .= '</div>';

		$html .= '</div>';

		return $html;
	}

	add_shortcode('feature_service', 'shortcode_feature_service');
}
?>