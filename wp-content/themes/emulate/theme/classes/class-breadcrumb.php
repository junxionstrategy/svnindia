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

if(!class_exists('twoot_breadcrumbs'))
{
	class twoot_breadcrumbs
	{
		var $options;
			
		function twoot_breadcrumbs($options = ''){

			$this->options = array( 	//change this array if you want another output scheme
			'before' => '<span class="sep"> ',
			'after' => ' </span>',
			'delimiter' => '-'
			);
			
			if(is_array($options))
			{
				$this->options = array_merge($this->options, $options);
			}
			
			
			$markup = $this->options['before'].$this->options['delimiter'].$this->options['after'];
			
			global $post, $wp_query, $wp_rewrite;

			echo '<div class="breadcrumbs"><span class="breadcrumb-title">'.__('You are here:', 'Twoot').'</span> <a href="'.get_bloginfo('url').'">';
				_e('Home', 'Twoot');
				echo "</a>";
				if(!is_front_page()){echo $markup;}
						
				$output = $this->simple_breadcrumb_case($post);
				
				echo "<span class='trail-end'>";
				if ( is_page() || is_single()) 
				{
					the_title();
				}
				elseif ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) 
				{
					$path = '';
				/* Get the post type object. */
				$post_type_object = get_post_type_object( get_query_var( 'post_type' ) );

				/* If $front has been set, add it to the $path. */
				if ( $post_type_object->rewrite['with_front'] && $wp_rewrite->front )
					$path .= trailingslashit( $wp_rewrite->front );

				/* If there's a slug, add it to the $path. */
				if ( !empty( $post_type_object->rewrite['archive'] ) )
					$path .= $post_type_object->rewrite['archive'];

				/* Add the post type [plural] name to the trail end. */
				echo $markup.$post_type_object->labels->name;
				}
				else
				{
					echo $output;
				}
				echo " </span></div>";
			}
			
			function simple_breadcrumb_case($der_post)
			{
				global $post,  $author; 
				
				$markup = $this->options['before'].$this->options['delimiter'].$this->options['after'];
				if (is_page()){
					 if($der_post->post_parent) {
						 $my_query = get_post($der_post->post_parent);			 
						 $this->simple_breadcrumb_case($my_query);
						 $link = '<a href="';
						 $link .= get_permalink($my_query->ID);
						 $link .= '">';
						 $link .= ''. get_the_title($my_query->ID) . '</a>'. $markup;
						 echo $link;
					  }	
				return;			 	
				} 
					
			if(is_single())
			{
				$category = get_the_category();
				if (is_attachment()){
				
					$my_query = get_post($der_post->post_parent);			 
					$category = get_the_category($my_query->ID);
					
					if(isset($category[0]))
					{
						$ID = $category[0]->cat_ID;
						$parents = get_category_parents($ID, TRUE, $markup, FALSE );
						if(!is_object($parents)) echo $parents;
						previous_post_link("%link $markup");
					}
					
				}else{
					
					$postType = get_post_type();
									
					if($postType == 'post')
					{
						$ID = $category[0]->cat_ID;
						echo get_category_parents($ID, TRUE, $markup, FALSE );
					}
					elseif($postType == 'portfolio')
					{
						$terms = get_the_term_list( $post->ID, 'portfolio_cat', '', '$$$', '' );
						$terms = explode('$$$',$terms);
						echo $terms[0].$markup;	
					}
				}
			return;
			}
			
			if(is_tax()){
				  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				  return $term->name;
		
			}
			
			
			if(is_category()){
				$category = get_the_category(); 
				$i = $category[0]->cat_ID;
				$parent = $category[0]-> category_parent;
				
				if($parent > 0 && $category[0]->cat_name == single_cat_title("", false)){
					echo get_category_parents($parent, TRUE, $markup, FALSE);
				}
			return single_cat_title('',FALSE);
			}
			
			
			if(is_author()){
				$userdata = get_userdata($author);
				return "Author: ".$userdata->display_name;
			}
			if(is_tag()){ return "Tag: ".single_tag_title('',FALSE); }
			
			if(is_404()){ return _e("404 - Page not Found", 'Twoot'); }
			
			if(is_search()){ return _e("Search", 'Twoot');}	
			
			if(is_year()){ return get_the_time('Y'); }
			
			if(is_month()){
			$k_year = get_the_time('Y');
			echo "<a href='".get_year_link($k_year)."'>".$k_year."</a>".$markup;
			return get_the_time('F'); }
			
			if(is_day() || is_time()){ 
			$k_year = get_the_time('Y');
			$k_month = get_the_time('m');
			$k_month_display = get_the_time('F');
			echo "<a href='".get_year_link($k_year)."'>".$k_year."</a>".$markup;
			echo "<a href='".get_month_link($k_year, $k_month)."'>".$k_month_display."</a>".$markup;
		
			return get_the_time('jS (l)'); }
		
		}
	
	}
}

?>