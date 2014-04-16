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

$config = array(
	'title' => esc_attr__('Testimonial Options', 'Twoot'),
	'id' => 'twoot-metabox-testimonial',
	'pages' => array('testimonial'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(

	array(
		'name' => esc_attr__('Name', 'Twoot'),
		'desc' => esc_attr__('The author name for testimonial.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'testimonial_name',
		'std' => '',
		'size' => '60',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Role (optional)', 'Twoot'),
		'desc' => esc_attr__('The author role for testimonial.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'testimonial_role',
		'std' => '',
		'size' => '60',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Link to authors website (optional)', 'Twoot'),
		'desc' => esc_attr__('What is the URL for the testimonial author?', 'Twoot'),
		'id' => TWOOT_PREFIX . 'testimonial_url',
		'rows' => '2',
		'std' => '',
		'type' => 'textarea'
	)

);
new Twoot_Metabox_Generator($config,$options);
?>