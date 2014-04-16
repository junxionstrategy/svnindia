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
include_once( 'theme/themewoot.php' );

/**
*  Init Twoot class
*
* @since   1.0.0
*
*/
if ( class_exists( 'Twoot' ) ) {
	$GLOBALS['twoot'] = new Twoot();
}


/**
*  Add toolkit supports
*
* @since   1.0.0
*
*/
if( twoot_get_checked_func('toolkit_activated') ) { 

	// Post Types
	twoot_toolkit_support( 'post_type', array( 
		'portfolio', 
		'faq',
		'testimonial'
	) );


	// Shortcodes
	twoot_toolkit_support( 'shortcode', 'no', array(
		'accordion',
		'audio',
		'blog',
		'blog_carousel',
		'blog_grid',
		'blog_list',
		'blog_masonry',
		'button',
		'column',
		'faqs',
		'feature_services',
		'gmap',
		'hgroup',
		'icon',
		'icon_boxes',
		'image',
		'latest_blog',
		'left_tab',
		'message-box',
		'number',
		'portfolio_carousel',
		'portfolio_grid',
		'portfolio_list',
		'portfolio_masonry',
		'post_images',
		'post_masonry',
		'post_slider',
		'price_table',
		'progress_bar',
		'simple_buttons',
		'social_icons',
		'tab',
		'team_members',
		'testimonial',
		'testimonial_carousel',
		'title',
		'toggle',
		'twitter_carousel',
		'video'
	) );


	// Widgets
	twoot_toolkit_support( 'widget', array(
		'blog',
		'comments',
		'contact_details',
		'dribbble',
		'flickr',
		'instagram',
		'portfolio',
		'portfolio_tags',
		'social_icons',
		'twitter'
	) );

	if (!class_exists('WPBakeryVisualComposerAbstract')) {
		// Page Builder
		twoot_toolkit_support( 'js_composer');
	}
}
?>