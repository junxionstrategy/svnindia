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


if ( !function_exists( 'shortcode_team_member' ) ) {

	function shortcode_team_member($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'avatar' => '',
			'name' => '',
			'role' => ''
		), $atts));

		$html = '<div class="shortcode-team-member clearfix">';
		if($avatar) {
			$html .= '<div class="avatar img-preload img-hover">';
			$html .= '<img src="'.$avatar.'" /><div class="overlay"></div>';
			if($role) {
				$html .= '<div class="name item-title">'.$name.'</div>';
			}
			$html .= '</div>';
		}
		if($role) {
			$html .= '<div class="role">'.$role.'</div>';
		}
		if($content) {
			$html .= '<div class="content">'.do_shortcode($content).'</div>';
		}
		$html .= '</div>';

		return $html;
	}

	add_shortcode('team_member', 'shortcode_team_member');
}
?>