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


/**
* Fixed Caption
*
* @since   1.0.0
*/
function twoot_fixed_caption($output, $atts, $content) {
	if (is_feed()) {
		return $output;
	}

	extract(shortcode_atts(array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	), $atts));


	// If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
	if ($width < 1 || empty($caption)) {
		return $content;
	}

	// Set up the attributes for the caption <figure>
	$attributes = (!empty($id) ? ' id="' . $id . '"' : '');
	$attributes .= ' class="thumbnail wp-caption ' . $align . '"';
	$attributes .= ' style="width: ' . $width . 'px"';

	$output = '<figure' . $attributes . '>';
	$output .= do_shortcode($content);
	$output .= '<figcaption class="caption wp-caption-text">' . $caption . '</figcaption>';
	$output .= '</figure>';

	return $output;
}
add_filter( 'img_caption_shortcode', 'twoot_fixed_caption', 10, 3 );





/**
* Remove the comments style
*
* @since   1.0.0
*/
function twoot_remove_recent_comments_style()  {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'twoot_remove_recent_comments_style' );





/**
* Remove the scroll for the readmore
* @since   1.0.0
*/
function twoot_remove_more_link_scroll( $link ) {
    $link = preg_replace( '|#more-[0-9]+|', '', $link );
    return $link;
}
add_filter( 'the_content_more_link', 'twoot_remove_more_link_scroll' );





/**
* Add shortcode support to text widget
*
* @since   1.0.0
*/
add_filter('widget_text', 'do_shortcode');





/**
* Remove <p> tag in the content
*
* @since   1.0.0
*/
function twoot_clean_shortcodes($content) {   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'twoot_clean_shortcodes');





/**
* Remove gallery css
*
* @since   1.0.0
*/
add_filter( 'use_default_gallery_style', '__return_false' );






/**
* Remove Admin Bar
*
* @since   1.0.0
*/
function twoot_remove_admin_bar() { 

	$admin_bar=twoot_get_frontend_func('opt', 'opt', 'admin_bar');

	if(!is_admin())
	{
		if($admin_bar==0) { show_admin_bar(false); return; }
		if($admin_bar==1 && current_user_can('administrator')) { show_admin_bar(false); return; }
		if($admin_bar==2 && !current_user_can('administrator')) { show_admin_bar(false); }
	}
}
add_action('after_setup_theme', 'twoot_remove_admin_bar');





/**
* Fixed Title Tag
*
* @since   1.0.0
*/
function twoot_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( esc_attr__( 'Page %s', 'Twoot' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twoot_wp_title', 10, 2 );





/**
* <div class="outer"> </div> for content
*
* @since   1.0.0
*/
function twoot_add_outer($content) {
	global $post;
	if ( ! empty( $post->post_content ) && strstr( $post->post_content, '[vc_row' ) ) {
		$output = '<div class="outer">';
		$output .= $content;
		$output .= '</div>';
	} else {
		$output = $content;
	}
    return $output;
}
add_filter( 'the_content', 'twoot_add_outer' );





/**
* Sets up the content width value based on the theme's design.
*
* @since   1.0.0
*/
if ( ! isset( $content_width ) ) { $content_width = 620; }





/**
* Extends the default WordPress comment class to add 'no-avatars' class
*
* @since   1.0.0
*/
function twoot_comment_class( $classes ) {
	if ( ! get_option ( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'comment_class', 'twoot_comment_class' );






/**
* Extends the default WordPress body class
*
* @since   1.0.0
*/
function twoot_body_class($classes) {
	global $is_IE, $is_opera, $is_safari, $is_chrome;

	$layout=twoot_get_frontend_func('opt', 'opt', 'layout');

	if($is_opera) $classes[] = 'opera';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE){ 
		$classes[] = 'ie';

		if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version) && $browser_version[1] == '8') { 
			$classes[] = 'ie8'; 
		}
	}

	if($layout) { $classes[] = $layout; }

	if(twoot_get_checked_func('wpml_activated'))  { $classes[] = 'wpml'; }

	if(is_page()) { 
		$classes[] = twoot_get_frontend_func('meta', 'layout')=='full'? 'has-not-sidebar':'has-sidebar';
	}

	if(twoot_get_frontend_func( 'opt', 'opt', 'show_sticky_header' )) {
		$classes[] = 'sticky-header';
	}

	return $classes;
}
add_filter('body_class', 'twoot_body_class');





/**
* Add content layout class
*
* @since   1.0.0
*/
function twoot_layout_class() {  
	if(is_page()) { 
		$layout = twoot_get_frontend_func('meta', 'layout')==false? 'right':twoot_get_frontend_func('meta', 'layout');
	}

	if($layout == 'full') { $class = 'class="twelve"';  } else { $class = 'class="column eight"'; }

	echo $class;
}





/**
* Protect Password Form
*
* @since   1.0.0
*/
function twoot_password_form() {
    global $post;
	$label = 'pwbox-'.$post->ID;

	$html = '<div class="page-password-form container">';
	$html .= '<h3>'.esc_attr__( 'This post is password protected. To view it please enter your password below:', 'Twoot' ).'</h3>';
    $html .= '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
	$html .= '<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />';
	$html .= '<input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'Twoot' ) . '" />';
	$html .= '</form>';
	$html .= '</div>';

	return $html;
}
add_filter( 'the_password_form', 'twoot_password_form' );




/**
* Comments
*
* @since   1.0.0
*/
function twoot_comments_list($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'Twoot' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'Twoot' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment clearfix">
			
			<header class="comment-header clearfix">
				<div class="avatar">
					<?php
						$avatar_size='0' == $comment->comment_parent? '60':'60';
						echo get_avatar( $comment, $avatar_size ); 
					?>
				</div>
				<div class="meta">
					<?php
						printf( '<cite class="fn">%1$s</cite>', get_comment_author_link() );
						printf( '<time datetime="%1$s">%2$s</time>', get_comment_time( 'c' ), sprintf( __( '%1$s at %2$s', 'Twoot' ), get_comment_date(), get_comment_time() ) );
					?>
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'Twoot' ), 'before' => '<span class="reply-link">', 'after' => '</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			</header>

			<section class="comment-content comment entry-text">
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<div class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'Twoot' ); ?></div>
				<?php endif; ?>
				<?php comment_text(); ?>
			</section><!-- .comment-content -->

		</article><!-- #comment-## -->
	<?php
			break;
		endswitch; 
		// end comment_type check
	?>
	<?php
}





/**
* Comments Form
*
* @since   1.0.0
*/
function twoot_comment_form() {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$req_class = ( $req ? " required" : '' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
		'author' =>
			'<div class="input-wrap comment-form-author' . $req_class . '">
				<input id="author" name="author" type="text" placeholder="' . __( 'Name', 'Twoot' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
			</div>',
		'email' =>
			'<div class="input-wrap comment-form-email' . $req_class . '">
				<input id="email" name="email" type="text" placeholder="' . __( 'Email', 'Twoot' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
			</div>',
		'url' =>
			'<div class="input-wrap comment-form-url">
				<input id="url" name="url" type="text" placeholder="' . __( 'Website', 'Twoot' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
			</div>'
	);

	$args = array(
		'title_reply' =>  '<span>' .__('Leave a Reply', 'Twoot'). '</span>',
		'cancel_reply_link' =>   __('Cancel', 'Twoot'),
		'comment_notes_before' => '',
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field' => '<textarea id="comment" class="comment-form-content" name="comment" rows="5"></textarea>',
		'comment_notes_after' => '',
		'label_submit' => __('Submit Comment', 'Twoot')
	);
	comment_form($args);
}
?>