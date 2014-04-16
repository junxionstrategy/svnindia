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

if( ! class_exists( 'Twoot_Template_List') ) {
/**
 * Twoot_Template_List Class
 *
 * @class Twoot_Query
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Template_List {

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
			'columns' => '4',
			'counts' => '12',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'paging' => 'yes',
			'post_type'	=> 'portfolio',
			'taxonomy'  => 'portfolio_cat'
		), $atts);
	}


	/**
	* List
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function lists()
	{
		extract($this->atts);

		$loop=($post_type=='portfolio')? 'portfolio':'blog';

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

		$do_query = new WP_Query($query->do_template_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) return;

		// Set the columns
		switch($columns) {
			case 2: $grid = 'six'; break;
			case 3: $grid = 'four'; break;
			case 4: $grid = 'three'; break;
		}

		// Output HTML
		$html = '<div class="the-post-list the-'.$loop.'-post outer">';
		$html .= '<ul class="clearfix">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();
			$html .= '<li class="item post-item column '.$grid.'">';
			$html .= '<div class="inner">';
			$html .= twoot_generator( 'load_template', 'loop-' . $loop . '-list' );
			$html .= '</div>';
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= $paging=='yes'? twoot_generator('pagination', $this->entries):'';
		wp_reset_postdata();

		return $html;
	}

}
}