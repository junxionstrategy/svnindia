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

if( ! class_exists( 'Twoot_Template_Grid') ) {
/**
 * Twoot_Template_Grid Class
 *
 * @class Twoot_Query
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Template_Grid {

	private $atts;
	private $entries;

	/**
	* Constructor for the grid
	* @since     1.0
	* @updated   1.0
	*
	*/
	function __construct($atts = array()) {
		$this->atts = shortcode_atts(array(
			'columns' => '4',
			'counts' => '16',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'filter' => 'yes',
			'paging' => 'yes',
			'post_type'	=> 'portfolio',
			'taxonomy'  => 'portfolio_cat'
		), $atts);
	}


	/**
	* Grid
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function grid() {
		extract($this->atts);

		// Loop
		switch($post_type) {
			case 'portfolio': $loop = 'portfolio'; break;
			case 'post': $loop = 'blog'; break;
		}

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

		$do_query = ( is_page() || is_singular() )? new WP_Query($query->do_template_query()):new WP_Query($query->do_global_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) {
			return $html = '<div class="the-not-posts">'.esc_attr__('Sorry, there is no posts in the current categories, please add some items in the dashboard!', 'Twoot').'</div>'; 
		}

		// Set the columns
		switch($columns) {
			case 2: $grid = 'six'; break;
			case 3: $grid = 'four'; break;
			case 4: $grid = 'three'; break;
		}

		$count=0;

		// Output HTML
		$html = '<div class="the-grid-list the-not-masonry-list outer">';
		$html .= $filter=='yes'?$this->filter_terms_menu($this->entries, $this->atts, 'no'):'';
		$html .= '<ul class="filter-items clearfix">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();

			// Num class
			$count++;
			$num_class=$this->entries->post_count%$count==0? 'odd':'even';

			//Get terms class
			$terms_class = $this->filter_terms_class(get_the_ID(), $this->atts);
			$html .= '<li class="item column '.$num_class.' '.$grid.' '.$terms_class.'">';
			$html .= '<div class="inner">';
			$html .= twoot_generator( 'load_template', 'loop-' . $loop . '-grid' );
			$html .= '</div>';
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= $paging=='yes'? twoot_generator('pagination', $this->entries):'';
		wp_reset_postdata();

		return $html;
	}




	/**
	* Masonry
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function masonry() {
		extract($this->atts);

		// Loop
		switch($post_type) {
			case 'portfolio': $loop = 'portfolio'; break;
			case 'post': $loop = 'blog'; break;
		}

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

		$do_query = ( is_page() || is_singular() )? new WP_Query($query->do_template_query()):new WP_Query($query->do_global_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) {
			return $html = '<div class="the-not-posts">'.esc_attr__('Sorry, there is no posts in the current categories, please add some items in the dashboard!', 'Twoot').'</div>'; 
		}

		// Set the columns
		switch($columns) {
			case 2: $grid = 'six'; break;
			case 3: $grid = 'four'; break;
			case 4: $grid = 'three'; break;
		}

		$count=0;

		// Output HTML
		$html = '<div class="the-grid-list the-masonry-list outer">';
		$html .= $filter=='yes'?$this->filter_terms_menu($this->entries, $this->atts, 'no'):'';
		$html .= '<ul class="filter-items clearfix">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();

			// Num class
			$count++;
			$num_class=$this->entries->post_count%$count==0? 'odd':'even';

			//Get terms class
			$terms_class = $this->filter_terms_class(get_the_ID(), $this->atts);
			$html .= '<li class="item column '.$num_class.' '.$grid.' '.$terms_class.'">';
			$html .= '<div class="inner">';
			$html .= twoot_generator( 'load_template', 'loop-' . $loop . '-masonry' );
			$html .= '</div>';
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= $paging=='yes'? twoot_generator('pagination', $this->entries):'';
		wp_reset_postdata();

		return $html;
	}




	/**
	* Get current page terms
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function filter_terms_menu($entries, $args, $show_count) {
		// Get the terms
		if(!empty($args['cats'])) {
			$terms = get_terms($args['taxonomy'], array('hide_empty'=> false, 'include' => explode(',', $args['cats'])));
		}else{
			$terms = get_terms($args['taxonomy'], array('hide_empty'=> false));
		}

		// Get the terms of current page
		$current_page_terms = array();
		foreach ($entries->posts as $entry) {
			$current_item_terms = wp_get_post_terms($entry->ID, $args['taxonomy']);
			if($current_item_terms && !empty($current_item_terms)) {
				foreach ($current_item_terms as $current_item_term) {
					$current_page_terms[$current_item_term->term_id] = $current_item_term->term_id;
				}
			}
		}

		// Output HTML
		$html = '<nav class="filter-menu inner">';
		$html .= '<ul class="filter clearfix">';
		$html .= '<li>';
		$html .= '<a href="'.get_page_link(get_the_ID()).'" class="active" data-filter="*">'.esc_attr__('All', 'Twoot').'</a>';
		$html .= $show_count=='yes'? '<span>'.$entries->post_count.'</span>':'';
		$html .= '</li>';
		foreach($terms as $term) {
			if(in_array($term->term_id, $current_page_terms)) {
				$html .= '<li>';
				$html .= '<a href="'.get_term_link($term->slug, $args['taxonomy']).'" data-filter=".term-'.$term->term_id.'">'.$term->name.'</a>';
				$html .= $show_count=='yes'? '<span>'.$term->count.'</span>':'';
				$html .= '</li>';
			}
		}
		$html .= '</ul>';
		$html .= '</nav>';

		return $html;
	}


	/**
	* Get the term ids for posts
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function filter_terms_class($id, $args) {
		$terms_classes = '';
		$terms = wp_get_post_terms( $id, $args['taxonomy']);

		if(is_array($terms) && ! is_wp_error($terms)) {
			$terms_query = array();
			foreach ( $terms as $term ) {
				$terms_query[] = 'term-'.$term->term_id;
			}

			$terms_classes = implode( ' ', $terms_query );
		}

		return $terms_classes;
	}
}
}
?>