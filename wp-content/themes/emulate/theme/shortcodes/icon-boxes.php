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

if ( !function_exists( 'shortcode_icon_box' ) ) {

	function shortcode_icon_box( $atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => 'Your title',
			'icon' => '',
			'link' => '',
			'button_text' => ''
		), $atts));

		$class = $icon==false? 'item-content':'item-content has-icon';

		$html = '<div class="shortcode-icon-box clearfix">';

			if($icon) {
				$html .= '<div class="item-icon"><i class="'.$icon.'"></i></div>';
			}

			$html .= '<div class="'.$class.'">';

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

	add_shortcode('icon_box', 'shortcode_icon_box');
}
?>