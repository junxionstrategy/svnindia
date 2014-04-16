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

$repeat_opts = array(
	'no-repeat' => esc_attr__('No Repeat', 'Twoot'),
	'repeat-x' => esc_attr__('Repeat only Horizontally', 'Twoot'),
	'repeat-y' => esc_attr__('Repeat only Vertically', 'Twoot'),
	'repeat' => esc_attr__('Repeat both Vertically and Horizontally', 'Twoot')
);

$horizontal_opts = array(
	'left' => esc_attr__('Left', 'Twoot'),
	'right' => esc_attr__('Right', 'Twoot'),
	'center' => esc_attr__('Center', 'Twoot')
);

$vertical_opts = array(
	'top' => esc_attr__('Top', 'Twoot'),
	'bottom' => esc_attr__('Bottom', 'Twoot'),
	'center' => esc_attr__('Center', 'Twoot')
);


$config = array(
	'title' => esc_attr__('Page Description Options', 'Twoot'),
	'id' => 'twoot-metabox-page-desc',
	'pages' => array('page', 'post', 'portfolio'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(

	array(
		'name' => esc_attr__('Text Color', 'Twoot'),
		'desc' => esc_attr__('Set the text color.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc_text_color',
		'std' => '#555555',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background Color', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc_bg_color',
		'std' => '#F2F2F2',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background Image', 'Twoot'),
		'desc' => esc_attr__('Set the background image.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc_bg_image',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Image', 'Twoot'),
		'uploader_title' => esc_attr__('Choose Image', 'Twoot'),
		'uploader_button' => esc_attr__('Insert Image', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Background Repeat', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc_bg_repeat',
		'std' => 'no-repeat',
		'options' => $repeat_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Background Horizontal', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc_bg_horizontal',
		'std' => 'center',
		'options' => $horizontal_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Background Vertical', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc_bg_vertical',
		'std' => 'top',
		'options' => $vertical_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Description', 'Twoot'),
		'desc' => esc_attr__('Set the description for the page.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc',
		'std' => '',
		'rows' => '3',
		'type' => 'textarea'
	)

);
new Twoot_Metabox_Generator($config,$options);
?>