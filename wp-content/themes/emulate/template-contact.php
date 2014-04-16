<?php
/**
 * Template Name: Contact
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
$layout = twoot_get_frontend_func('meta', 'layout')==false? 'right':twoot_get_frontend_func('meta', 'layout');
$widget = twoot_get_frontend_func('meta', 'sidebar')==false? 'contact':twoot_get_frontend_func('meta', 'sidebar');
$show_gmap=twoot_get_frontend_func('opt', 'opt', 'show_gmap');
$gmap_address=twoot_get_frontend_func('opt', 'opt', 'gmap_address');
$gmap_height=twoot_get_frontend_func('opt', 'opt', 'gmap_height');
$gmap_lat=twoot_get_frontend_func('opt', 'opt', 'gmap_lat');
$gmap_lng=twoot_get_frontend_func('opt', 'opt', 'gmap_lng');
$gmap_zoom=twoot_get_frontend_func('opt', 'opt', 'gmap_zoom');
$contact_form_id=twoot_get_frontend_func('opt', 'opt', 'contact_form');
$contact_form_name=twoot_get_frontend_func('page_name', $contact_form_id);
?>
<?php get_header(); ?>

<?php
	if( (twoot_get_frontend_func('meta', 'slideshow')==false) && !is_front_page() ) {
		echo twoot_generator('page_title', 'page'); 
	}
?>

<?php
	if($show_gmap) {
		if(($gmap_address) || ($gmap_lat && $gmap_lng)) {
			echo do_shortcode('[gmap address="'.$gmap_address.'"  lat="'.$gmap_lat.'" lng="'.$gmap_lng.'" zoom="'.$gmap_zoom.'" height="'.$gmap_height.'"]'); 
		}
	}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container contact-page pt pb clearfix">

<?php if($layout=='left') { echo twoot_generator('sidebar', $widget, $layout); } ?>

<article id="primary-wrapper" <?php twoot_layout_class();?>>
	<div class="inner">

	<?php if (have_posts()) : the_post(); ?>
		<?php if(get_the_content()) : ?>
			<div class="post-content entry-text">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_attr__( 'Pages:', 'Twoot' ), 'after' => '</div>' ) ); ?>
	<?php endif; ?>

	<?php if($contact_form_id) { echo do_shortcode('[contact-form-7 id="'.$contact_form_id.'" title="'.$contact_form_name.'"]'); } ?>

	</div>
</article>
<!--end #primary-->

<?php if($layout=='right') { echo twoot_generator('sidebar', $widget, $layout); } ?>

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>