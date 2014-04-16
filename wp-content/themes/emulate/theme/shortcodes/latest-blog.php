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

if ( !function_exists( 'shortcode_latest_blog' ) ) {

	function shortcode_latest_blog($atts, $content = null) {

		extract(shortcode_atts(array(
			'counts'=> '5',
			'cats'=> '',
			'posts' => ''
		), $atts));

		global $post;

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => 'DESC',
			'orderby' => 'date',
			'post_type'	=> 'post',
			'taxonomy'  => 'category'
		));

		$do_query = new WP_Query($query->do_template_query());

		$html = '<div class="shortcode-latest-blog">';
		$html .= '<ul>';
		while( $do_query->have_posts() ) {
			$do_query->the_post();

			$html .= '<li class="item post-item clearfix">';
			$html .= twoot_generator( 'load_template', 'loop-latest-blog' );
			$html .= '</li>';
		}
		wp_reset_postdata();
		$html .= '</ul>';
		$html .= '</div>';

		return $html;

	}

	add_shortcode('latest_blog', 'shortcode_latest_blog');
}
?>