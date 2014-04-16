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

$icons = array(
	'behance' => esc_attr__('Behance',  'Twoot'),
	'dribbble' => esc_attr__('Dribbble',  'Twoot'),
	'deviantart' => esc_attr__('Deviantart',  'Twoot'),
	'facebook' => esc_attr__('Facebook',  'Twoot'),
	'flickr' => esc_attr__('Flickr',  'Twoot'),
	'fivehundredpx' => esc_attr__('500px',  'Twoot'),
	'gplus' => esc_attr__('Google+',  'Twoot'),
	'linkedin' => esc_attr__('Linkedin',  'Twoot'),
	'instagram' => esc_attr__('Instagram',  'Twoot'),
	'pinterest' => esc_attr__('Pinterest',  'Twoot'),
	'rss' => esc_attr__('RSS',  'Twoot'),
	'soundcloud' => esc_attr__('Soundcloud',  'Twoot'),
	'tumblr' => esc_attr__('Tumblr',  'Twoot'),
	'twitter' => esc_attr__('Twitter',  'Twoot'),
	'vimeo' => esc_attr__('Vimeo',  'Twoot'),
	'youtube' => esc_attr__('Youtube',  'Twoot')
);



$options = array(

	array(
		'type' => 'tab_begin'
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('General',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Header',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Footer',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Social',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Blog',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Portfolio',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Contact',  'Twoot')
	),

	array(
		'type' => 'tab_end'
	),

	// End tabs

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('General',  'Twoot'),
		'class' => 'active'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('General',  'Twoot')
	),

	array(
		'name' => esc_attr__('Disable Admin Bar',  'Twoot'),
		'desc' => esc_attr__('Disabled the admin bar in the front top.', 'Twoot'),
		'id' => 'admin_bar',
		'std' => '0',
		'options' => array(
			'0' => 'Administrator and user.',
			'1' => 'Only administrator.',
			'2' => 'Only user.'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Show Nice Scroll',  'Twoot'),
		'desc' => esc_attr__('Display the nicescroll.', 'Twoot'),
		'id' => 'show_nicescroll',
		'std' => '0',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Layout',  'Twoot'),
		'desc' => esc_attr__('Choose the layout you want to display.', 'Twoot'),
		'id' => 'layout',
		'std' => 'wide',
		'options' => array(
			'wide' => 'Wide',
			'boxed' => 'Boxed'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Coming Soon Date',  'Twoot'),
		'desc' => __('Set a date for your coming soon page.',  'Twoot'),
		'id' => 'coming_soon_date',
		'std' => '30 January 2015 23:59:01',
		'rows' => '2',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Admin Login Logo', 'Twoot'),
		'desc' => esc_attr__('Set the admin login page logo.', 'Twoot'),
		'id' => 'login_logo',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Logo', 'Twoot'),
		'uploader_title' => esc_attr__('Choose a Logo', 'Twoot'),
		'uploader_button' => esc_attr__('Insert the Logo', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Analytics Code',  'Twoot'),
		'desc' => __('Paste your <a href="http://www.google.com/analytics/" target="_blank">analytics code</a> here, it will get applied to each page.',  'Twoot'),
		'id' => 'analytics_code',
		'std' => '',
		'rows' => '12',
		'type' => 'textarea'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Favicon & Touch icons',  'Twoot')
	),

	array(
		'name' => esc_attr__('Favicon', 'Twoot'),
		'desc' => esc_attr__('To upload an image click on "Upload favicon" button. Once the image is as custom favicon.', 'Twoot'),
		'id' => 'favicon_icon',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Icon', 'Twoot'),
		'uploader_title' => esc_attr__('Choose a Icon', 'Twoot'),
		'uploader_button' => esc_attr__('Insert the Icon', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Touch icons', 'Twoot'),
		'desc' => __('For iPad3 with retina display, <span>size is 144x144</span>', 'Twoot'),
		'id' => 'touch_icon_144',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Icon', 'Twoot'),
		'uploader_title' => esc_attr__('Choose a Icon', 'Twoot'),
		'uploader_button' => esc_attr__('Insert the Icon', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Touch icons', 'Twoot'),
		'desc' => __('For first- and second-generation iPad, <span>size is 114x114</span>', 'Twoot'),
		'id' => 'touch_icon_114',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Icon', 'Twoot'),
		'uploader_title' => esc_attr__('Choose a Icon', 'Twoot'),
		'uploader_button' => esc_attr__('Insert the Icon', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Touch icons', 'Twoot'),
		'desc' => __('For first- and second-generation iPad, <span>size is 72x72</span>', 'Twoot'),
		'id' => 'touch_icon_72',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Icon', 'Twoot'),
		'uploader_title' => esc_attr__('Choose a Icon', 'Twoot'),
		'uploader_button' => esc_attr__('Insert the Icon', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Touch icons', 'Twoot'),
		'desc' => __('For non-Retina iPhone, iPod Touch, and Android 2.1+ devices, <span>size is 57x57</span>', 'Twoot'),
		'id' => 'touch_icon_57',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Icon', 'Twoot'),
		'uploader_title' => esc_attr__('Choose a Icon', 'Twoot'),
		'uploader_button' => esc_attr__('Insert the Icon', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'tab_content_end'
	),
	// End General

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Header',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Header Height', 'Twoot'),
		'desc' => __('Set the header height, the height must more than logo height. <span>The unit is pixel.</span>', 'Twoot'),
		'id' => 'header_height',
		'std' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Sticky Header Height', 'Twoot'),
		'desc' => __('Set the sticky header height, the height must more than sticky logo height. <span>The unit is pixel.</span>', 'Twoot'),
		'id' => 'sticky_header_height',
		'std' => '50',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Show Sticky Header',  'Twoot'),
		'desc' => esc_attr__('Display the sticky header.', 'Twoot'),
		'id' => 'show_sticky_header',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Topbar',  'Twoot')
	),

	array(
		'name' => esc_attr__('Show Topbar',  'Twoot'),
		'desc' => esc_attr__('Display the topbar.', 'Twoot'),
		'id' => 'show_topbar',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Show Search',  'Twoot'),
		'desc' => esc_attr__('Display the search bar.', 'Twoot'),
		'id' => 'show_search',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Search Types', 'Twoot'),
		'desc' => esc_attr__('Choose the type for the search bar.', 'Twoot'),
		'id' => 'search_type',
		'std' => '1',
		'options' => array(
			'1' => 'All (page, post, portfolio.)',
			'2' => 'Page and Post',
			'3' => 'Post',
			'4' => 'Page',
			'5' => 'Portfolio'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Phone Icon',  'Twoot'),
		'desc' => __('Add the icon you like. You can find the icon name here:<a href="'. get_template_directory_uri() . '/fonts/" target="_blank">Link</a>',  'Twoot'),
		'id' => 'phone_icon',
		'std' => 'icon-call',
		'size' => '40',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Phone Number',  'Twoot'),
		'desc' => esc_attr__('Add your phone number or other text here.',  'Twoot'),
		'id' => 'phone_number',
		'std' => '+180 2998 5590',
		'rows' => '3',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Time Icon',  'Twoot'),
		'desc' => __('Add the icon you like. You can find the icon name here:<a href="'. get_template_directory_uri() . '/fonts/" target="_blank">Link</a>',  'Twoot'),
		'id' => 'time_icon',
		'std' => 'icon-clock',
		'size' => '40',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Work Time',  'Twoot'),
		'desc' => esc_attr__('Add your work time or other text here.',  'Twoot'),
		'id' => 'work_time',
		'std' => 'Mon. - Fri. 10:00-22:00',
		'rows' => '3',
		'type' => 'textarea'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Logo',  'Twoot')
	),

	array(
		'name' => esc_attr__('Logo Image', 'Twoot'),
		'desc' => __('Image must be twice of the logo size, ex:<span>Logo size is 200x100 px</span>, so you need to use an image as <span>400x200 px</span>', 'Twoot'),
		'id' => 'standard_logo',
		'std' => TWOOT_URL . '/images/logo.png',
		'size' => '80',
		'button' => esc_attr__('Upload Logo', 'Twoot'),
		'uploader_title' => esc_attr__('Choose a Logo', 'Twoot'),
		'uploader_button' => esc_attr__('Insert the Logo', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Logo Height', 'Twoot'),
		'desc' => __('Set the logo height. <span>The unit is pixel.</span>', 'Twoot'),
		'id' => 'logo_height',
		'std' => '40',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Sticky Logo Height', 'Twoot'),
		'desc' => __('Set the sticky logo height. <span>The unit is pixel.</span>', 'Twoot'),
		'id' => 'sticky_logo_height',
		'std' => '25',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Menu',  'Twoot')
	),

	array(
		'name' => esc_attr__('Drop Menu Width', 'Twoot'),
		'desc' => __('Set the drop menu width. <span>The unit is pixel.</span>', 'Twoot'),
		'id' => 'drop_menu_width',
		'std' => '200',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Header

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Footer',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Show Widgets',  'Twoot'),
		'desc' => esc_attr__('Display the footer widgets area.', 'Twoot'),
		'id' => 'show_widgets',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Widgets Columns', 'Twoot'),
		'desc' => esc_attr__('Choose the column for your footer widgets area.', 'Twoot'),
		'id' => 'widgets_column',
		'std' => '4',
		'options' => array(
			'1' => '1 Column',
			'2' => '2 Column',
			'3' => '3 Column',
			'4' => '4 Column'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Show Go Top', 'Twoot'),
		'desc' => esc_attr__('Display the gotop button.', 'Twoot'),
		'id' => 'show_gotop',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Copyright',  'Twoot'),
		'desc' => esc_attr__('You can add your copyright message here.',  'Twoot'),
		'id' => 'copy_text',
		'std' => 'Copyright &copy; 2013 <a href="'. home_url( '/' ) . '">' .esc_attr__( get_bloginfo('name') ).'</a>, All rights reserved. Design by <a href="http://themeforest.net/user/ThemeWoot/">ThemeWoot</a>',
		'rows' => '5',
		'type' => 'textarea'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Quick Contact',  'Twoot')
	),

	array(
		'name' => esc_attr__('Show From',  'Twoot'),
		'desc' => esc_attr__('Display the quick contact form.', 'Twoot'),
		'id' => 'show_quick_contact',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Contact From', 'Twoot'),
		'desc' => esc_attr__('Choose a from for the contact page. You should install the contact form7, and add a form first.', 'Twoot'),
		'id' => 'quick_contact_form',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => '',
		'options' => array('0' => esc_attr__('None', 'Twoot')),
		'target' => 'wpcf7',
		'type' => 'select'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Footer

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Social',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Show Top Icons', 'Twoot'),
		'desc' => esc_attr__('Display the social icons in the top of site.', 'Twoot'),
		'id' => 'show_top_social_icons',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Icons', 'Twoot'),
		'desc' => esc_attr__('Select the icons and orders you want to display in top and bottom. It will display as the order you set.', 'Twoot'),
		'id' => 'current_social_icons',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'chosen' => true,
		'chosen_order' => true,
		'std' => array('twitter', 'facebook', 'rss'),
		'options' => $icons,
		'type' => 'multiselect'
	),

	array(
		'name' => esc_attr__('Widget Icons', 'Twoot'),
		'desc' => esc_attr__('Select the icons and orders you want to display in widget. It will display as the order you set.', 'Twoot'),
		'id' => 'widget_social_icons',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'chosen' => true,
		'chosen_order' => true,
		'std' => array('behance', 'dribbble', 'facebook', 'flickr', 'fivehundredpx', 'gplus', 'linkedin', 'instagram', 'pinterest', 'rss', 'soundcloud', 'tumblr', 'twitter', 'vimeo', 'youtube'),
		'options' => $icons,
		'type' => 'multiselect'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Icons',  'Twoot')
	),

	array(
		'name' => esc_attr__('Twitter', 'Twoot'),
		'id' => 'twitter',
		'std' => 'http://twitter.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Facebook', 'Twoot'),
		'id' => 'facebook',
		'std' => 'http://www.facebook.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Google+', 'Twoot'),
		'id' => 'gplus',
		'std' => 'http://plus.google.com/userID',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('LinkedIn', 'Twoot'),
		'id' => 'linkedin',
		'std' => 'http://www.linkedin.com/in/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Flickr', 'Twoot'),
		'id' => 'flickr',
		'std' => 'http://www.flickr.com/photos/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Dribbble', 'Twoot'),
		'id' => 'dribbble',
		'std' => 'http://dribbble.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Pinterest', 'Twoot'),
		'id' => 'pinterest',
		'std' => 'http://pinterest.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Behance', 'Twoot'),
		'id' => 'behance',
		'std' => 'http://www.behance.net/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Instagram', 'Twoot'),
		'id' => 'instagram',
		'std' => 'http://instagram.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Tumblr', 'Twoot'),
		'id' => 'tumblr',
		'std' => 'http://username.tumblr.com',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Vimeo', 'Twoot'),
		'id' => 'vimeo',
		'std' => 'http://vimeo.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Youtube', 'Twoot'),
		'id' => 'youtube',
		'std' => 'http://www.youtube.com/user/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('RSS', 'Twoot'),
		'id' => 'rss',
		'std' => get_bloginfo('rss2_url'),
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('500px', 'Twoot'),
		'id' => 'fivehundredpx',
		'std' => 'http://500px.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Soundcloud', 'Twoot'),
		'id' => 'soundcloud',
		'std' => 'https://soundcloud.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Deviantart', 'Twoot'),
		'id' => 'deviantart',
		'std' => 'http://deviantart.com/username',
		'size' => '80',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Social

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Blog',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Main Page', 'Twoot'),
		'desc' => esc_attr__('Set the parent page of blog single.', 'Twoot'),
		'id' => 'blog_page_id',
		'std' => get_option( TWOOT_PREFIX . 'template_blog_id' ),
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'options' => array('0' => esc_attr__('None', 'Twoot')),
		'target' => 'page',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Counts', 'Twoot'),
		'desc' => esc_attr__('Set the number of blog posts you want to display.', 'Twoot'),
		'id' => 'blog_counts',
		'std' => '5',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Columns', 'Twoot'),
		'desc' => esc_attr__('Choose the column for your blog masonry and blog list page.', 'Twoot'),
		'id' => 'blog_column',
		'std' => '4',
		'options' => array(
			'2' => '2 Column',
			'3' => '3 Column',
			'4' => '4 Column'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Column Counts', 'Twoot'),
		'desc' => esc_attr__('Set the number of posts on blog masonry and blog list page.', 'Twoot'),
		'id' => 'blog_column_counts',
		'std' => '12',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Related Posts',  'Twoot')
	),

	array(
		'name' => esc_attr__('Order', 'Twoot'),
		'desc' => esc_attr__('Choose the order for your related posts.', 'Twoot'),
		'id' => 'blog_related_order',
		'std' => 'DESC',
		'options' =>  array(
			'ASC' => 'ASC',
			'DESC' => 'DESC'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Orderby', 'Twoot'),
		'desc' => esc_attr__('Choose the orderby for your related posts.', 'Twoot'),
		'id' => 'blog_related_orderby',
		'std' => 'date',
		'options' =>  array(
			'ID' => 'ID', 
			'title' => 'Title', 
			'name' => 'Name', 
			'date' => 'Date', 
			'rand' => 'Rand'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Counts', 'Twoot'),
		'desc' => esc_attr__('Set the number of posts you want to display.', 'Twoot'),
		'id' => 'blog_related_counts',
		'std' => '10',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Blog

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Portfolio',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Main Page', 'Twoot'),
		'desc' => esc_attr__('Set the parent page of portfolio single.', 'Twoot'),
		'id' => 'portfolio_page_id',
		'std' => get_option( TWOOT_PREFIX . 'template_portfolio_id' ),
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'options' => array('0' => esc_attr__('None', 'Twoot')),
		'target' => 'page',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Columns', 'Twoot'),
		'desc' => esc_attr__('Choose the column for your portfolio archive page.', 'Twoot'),
		'id' => 'portfolio_column',
		'std' => '4',
		'options' => array(
			'2' => '2 Column',
			'3' => '3 Column',
			'4' => '4 Column'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Order', 'Twoot'),
		'desc' => esc_attr__('Choose the order for your portfolio archive page.', 'Twoot'),
		'id' => 'portfolio_order',
		'std' => 'DESC',
		'options' =>  array(
			'ASC' => 'ASC',
			'DESC' => 'DESC'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Orderby', 'Twoot'),
		'desc' => esc_attr__('Choose the orderby for your portfolio archive page.', 'Twoot'),
		'id' => 'portfolio_orderby',
		'std' => 'date',
		'options' =>  array(
			'ID' => 'ID', 
			'title' => 'Title', 
			'name' => 'Name', 
			'date' => 'Date', 
			'rand' => 'Rand', 
			'menu_order' => 'Menu Order'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Counts', 'Twoot'),
		'desc' => esc_attr__('Set the number of portfolio posts you want to display.', 'Twoot'),
		'id' => 'portfolio_counts',
		'std' => '16',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Related Works',  'Twoot')
	),

	array(
		'name' => esc_attr__('Layout', 'Twoot'),
		'desc' => esc_attr__('Choose the layout for your related works.', 'Twoot'),
		'id' => 'portfolio_related_layout',
		'std' => 'carousel',
		'options' =>  array(
			'carousel' => 'Carousel',
			'grid' => 'Grid'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Order', 'Twoot'),
		'desc' => esc_attr__('Choose the order for your related works.', 'Twoot'),
		'id' => 'portfolio_related_order',
		'std' => 'DESC',
		'options' =>  array(
			'ASC' => 'ASC',
			'DESC' => 'DESC'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Orderby', 'Twoot'),
		'desc' => esc_attr__('Choose the orderby for your related works.', 'Twoot'),
		'id' => 'portfolio_related_orderby',
		'std' => 'date',
		'options' =>  array(
			'ID' => 'ID', 
			'title' => 'Title', 
			'name' => 'Name', 
			'date' => 'Date', 
			'rand' => 'Rand', 
			'menu_order' => 'Menu Order'
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Counts', 'Twoot'),
		'desc' => esc_attr__('Set the number of posts you want to display.', 'Twoot'),
		'id' => 'portfolio_related_counts',
		'std' => '16',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Portfolio



	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Contact',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Google Map',  'Twoot')
	),

	array(
		'name' => esc_attr__('Show Map', 'Twoot'),
		'desc' => esc_attr__('Disable or enable the map.', 'Twoot'),
		'id' => 'show_gmap',
		'std' => '1',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Height', 'Twoot'),
		'desc' => esc_attr__('The number of map height.', 'Twoot'),
		'id' => 'gmap_height',
		'std' => '450',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Address',  'Twoot'),
		'desc' => esc_attr__('You can add your address for map here.',  'Twoot'),
		'id' => 'gmap_address',
		'std' => '',
		'rows' => '2',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Latitude', 'Twoot'),
		'desc' => esc_attr__('The number of map lat.', 'Twoot'),
		'id' => 'gmap_lat',
		'std' => '',
		'size' => '50',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Longitude', 'Twoot'),
		'desc' => esc_attr__('The number of map lng.', 'Twoot'),
		'id' => 'gmap_lng',
		'std' => '',
		'size' => '50',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Zoom', 'Twoot'),
		'desc' => esc_attr__('The number of map zoom.', 'Twoot'),
		'id' => 'gmap_zoom',
		'std' => '14',
		'type' => 'text'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Contact From',  'Twoot')
	),

	array(
		'name' => esc_attr__('From', 'Twoot'),
		'desc' => esc_attr__('Choose a from for the contact page. You should install the contact form7, and add a form first.', 'Twoot'),
		'id' => 'contact_form',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => '',
		'options' => array('0' => esc_attr__('None', 'Twoot')),
		'target' => 'wpcf7',
		'type' => 'select'
	),

	array(
		'type' => 'group_end'
	),

	array(
		'type' => 'tab_content_end'
	)
	// End Contact

);


return array('auto' => true, 'name' => 'opt', 'options' => $options);
?>