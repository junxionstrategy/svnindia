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

if( ! class_exists( 'Twoot_Template_Faq') ) {
/**
 * Twoot_Template_List Class
 *
 * @class Twoot_Query
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Template_Faq {

	private $atts;
	private $entries;


	/**
	* Constructor for the list
	* @since     1.0
	* @updated   1.0
	*
	*/
	function __construct($atts = array()) 
	{
		$this->atts = shortcode_atts(array(
			'counts' => '12',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'filter' => 'yes',
			'paging' => 'yes',
			'post_type'	=> 'faq',
			'taxonomy'  => 'faq_cat'
		), $atts);
	}


	/**
	* Faq
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function faq()
	{
		extract($this->atts);

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_type'	=> $post_type,
			'taxonomy'  => $taxonomy
		));

		$grid = new Twoot_Template_Grid();
		$do_query = new WP_Query($query->do_template_query());
		$faqs_class = $filter=='yes'? 'column eight':'twelve';

		$html = '<div class="the-faq-list shortcode-toggle outer clearfix">'."\n";

		if($filter=='yes') {
			$html .= '<div class="column four">';
			$html .= $grid->filter_terms_menu($do_query, $this->atts, 'yes');
			$html .= '</div>';
		}

		$html .= '<div id="faqs" class="'.$faqs_class.'">';
		while( $do_query->have_posts() ) {
			$do_query->the_post();

			//Get terms class
			$terms_class = $grid->filter_terms_class(get_the_ID(), $this->atts);

			$html .= '<div class="tog-item faq-item inner '.$terms_class.'">';
			$html .= '<a href="#" class="tog"><i class="icon twoot-icon"></i>'. get_the_title() .'</a>';
			$html .= '<div class="tog-content clearfix">'. do_shortcode(get_the_content()) .'</div>';
			$html .= '</div>';
		}

		$html .= '</div>';
		$html .= '</div>';
		$html .= $paging=='yes'? twoot_generator('pagination', $do_query):'';

		wp_reset_postdata();

		return $html;
	}

}
}