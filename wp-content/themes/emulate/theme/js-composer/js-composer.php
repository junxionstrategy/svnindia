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


/*Row*/
function vc_theme_vc_row($atts, $content = null) {

	extract(shortcode_atts(array(
		'el_class' => '',
		'pt' => '',
		'pb' => '',
		'text_color' => '',
		'bg_color' => '',
		'bg_image' => '',
		'bg_repeat' => '',
		'bg_horizontal' => '',
		'bg_vertical' => '',
		'bg_attachment' => ''
	), $atts));

	$el_class = $el_class? ' '.$el_class:'';

	$output = '<div class="wpb_row'.$el_class.'"'.vc_theme_addition_css($pt, $pb, $bg_color, $text_color, $bg_image, $bg_repeat, $bg_horizontal, $bg_vertical, $bg_attachment).'>';
	$output .= '<div class="container clearfix">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}



/*Row Inner*/
function vc_theme_vc_row_inner($atts, $content = null) {

	extract(shortcode_atts(array(
		'el_class' => '',
		'pt' => '',
		'pb' => ''
	), $atts));

	$el_class = $el_class? ' '.$el_class:'';

	$output = '<div class="wpb_row outer clearfix'.$el_class.'"'.vc_theme_addition_css($pt, $pb).'>';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';

	return $output;
}




/*Column*/
function vc_theme_vc_column($atts, $content = null) {

	$style = $animation = '';

	extract(shortcode_atts(array(
		'el_class' => '',
		'pt' => '',
		'pb' => '',
		'css_animation' => '',
		'width' => '1/1'
	), $atts));

	$width = wpb_translateColumnWidthToSpan($width);
	$el_class = $el_class? ' '.$el_class:'';
	$animation_class = $css_animation? ' wp-animate-gen':'';
	$class = 'column '.$width.' wpb_column column_container'.$el_class.$animation_class;

	if($css_animation) { 
		$animation = ' data-gen="'.$css_animation.'" data-gen-offset="bottom-in-view"'; 
	}

	$output = '<div class="'.$class.'"'.vc_theme_addition_css($pt, $pb).$animation.'>';
	$output .= '<div class="inner">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}




/*Column Inner*/
function vc_theme_vc_column_inner($atts, $content = null) {

	$style = $animation = '';

	extract(shortcode_atts(array(
		'el_class' => '',
		'pt' => '',
		'pb' => '',
		'css_animation' => '',
		'width' => '1/1'
	), $atts));

	$width = wpb_translateColumnWidthToSpan($width);
	$el_class = $el_class? ' '.$el_class:'';
	$animation_class = $css_animation? ' wp-animate-gen':'';
	$class = 'column '.$width.' wpb_column column_container'.$el_class.$animation_class;

	if($css_animation) { 
		$animation = ' data-gen="'.$css_animation.'" data-gen-offset="bottom-in-view"'; 
	}

	$output = '<div class="'.$class.'"'.vc_theme_addition_css($pt, $pb).$animation.'>';
	$output .= '<div class="inner">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}




/*Column Text*/
function vc_theme_vc_column_text($atts, $content = null) {

	$style = $animation = '';

	extract(shortcode_atts(array(
		'el_class' => '',
		'css_animation' => '',
		'pt' => '',
		'pb' => ''
	), $atts));

	$el_class = $el_class? ' '.$el_class:'';
	$animation_class = $css_animation? ' wp-animate-gen':'';
	$class = 'wpb_text_column wpb_content_element'.$el_class.$animation_class;

	if($css_animation) { 
		$animation = ' data-gen="'.$css_animation.'" data-gen-offset="bottom-in-view"'; 
	}

	$output = '<div class="'.$class.'"'.vc_theme_addition_css($pt, $pb).$animation.'>';
	$output .= '<div class="wpb_wrapper clearfix">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}



/*Addition CSS */
function vc_theme_addition_css($pt='', $pb='', $bg_color='', $text_color='', $bg_image='', $bg_repeat='', $bg_horizontal='', $bg_vertical='', $bg_attachment='') {

	$css = $pt? 'padding-top:'.$pt.'px;':'';
	$css .= $pb? 'padding-bottom:'.$pb.'px;':'';
	$css .= $bg_color? 'background-color:'.$bg_color.';':'';
	$css .= $text_color? 'color:'.$text_color.';':'';

	if($bg_image) {
		$css .= $bg_image? 'background-image:url('.twoot_get_frontend_func('thumbnail_url', $bg_image).');':'';
		$css .= $bg_repeat? 'background-repeat:'.$bg_repeat.';':'';
		$css .= $bg_horizontal && $bg_vertical? 'background-position:'.$bg_horizontal.' '.$bg_vertical.';':'';
		$css .= $bg_attachment? 'background-attachment:'.$bg_attachment.';':'';
	}

	$output = '';
	if($pt || $pb || $text_color || $bg_color || $bg_image) { 
		$output = ' style="'.$css.'"'; 
	}

	return $output;
}



/*Accordion*/
function vc_theme_vc_accordion($atts, $content = null) {

	extract(shortcode_atts(array(
		'el_class' => ''
	), $atts));

	$el_class = $el_class? ' '.$el_class:'';

	$output = '<div class="shortcode-accordion">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';

	return $output;
}


function vc_theme_vc_accordion_tab($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => ''
	), $atts));

	$output = '<div class="acc-item">';
	$output .= '<a href="#" class="tog"><i class="icon"></i>'. $title .'</a>';
	$output .= '<div class="acc-content clearfix">'. wpb_js_remove_wpautop($content) .'</div>';
	$output .= '</div>';

	return $output;
}



/*Toggle*/
function vc_theme_vc_toggle($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => '',
		'el_class' => ''
	), $atts));

	$output = '<div class="shortcode-toggle">';
	$output .= '<div class="tog-item">';
	$output .= '<a href="#" class="tog"><i class="icon"></i>'. $title .'</a>';
	$output .= '<div class="tog-content clearfix">'. wpb_js_remove_wpautop($content) .'</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}



/*Tabs*/
function vc_theme_vc_tabs($atts, $content = null) {

	extract(shortcode_atts(array(
		'el_class' => ''
	), $atts));

	$el_class = $el_class? ' '.$el_class:'';

	// Extract tab titles
	preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
	$tab_titles = array();

	if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }

	$tabs_nav = '<ul class="tabs etabs clearfix">';
	foreach ( $tab_titles as $tab ) {
		preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		if(isset($tab_matches[1][0])) {
			$tabs_nav .= '<li class="tab"><a href="#'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">' . $tab_matches[1][0] . '</a></li>';
		}
	}
	$tabs_nav .= '</ul>';

	$output = '<div class="shortcode-tab shortcode-tab-wrap'.$el_class.'">';
	$output .= $tabs_nav;
	$output .= '<div class="tabs-content">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}



/*Tour*/
function vc_theme_vc_tour($atts, $content = null) {

	extract(shortcode_atts(array(
		'el_class' => ''
	), $atts));

	$el_class = $el_class? ' '.$el_class:'';

	// Extract tab titles
	preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
	$tab_titles = array();

	if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }

	$tabs_nav = '<ul class="tabs etabs clearfix">';
	foreach ( $tab_titles as $tab ) {
		preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		if(isset($tab_matches[1][0])) {
			$tabs_nav .= '<li class="tab"><a href="#'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">' . $tab_matches[1][0] . '</a></li>';
		}
	}
	$tabs_nav .= '</ul>';

	$output = '<div class="shortcode-left-tab shortcode-tab-wrap'.$el_class.'">';
	$output .= $tabs_nav;
	$output .= '<div class="tabs-content">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}



/*Tab*/
function vc_theme_vc_tab($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => '',
		'tab_id' => ''
	), $atts));

	$output = '<div id="' . (empty($tab_id) ? sanitize_title( $title ) : $tab_id) . '">' . wpb_js_remove_wpautop($content) . '</div>';

	return $output;
}
?>