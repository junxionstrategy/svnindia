<?php
/**
 * Template Name: Page Builder
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
?>
<?php get_header(); ?>

<?php
	if( (twoot_get_frontend_func('meta', 'slideshow')==false) && !is_front_page() ) {
		echo twoot_generator('page_title', 'page'); 
	}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content clearfix">

<article id="primary-wrapper" class="twelve">
<div class="inner">

<?php if (have_posts()) : the_post(); ?>
<div class="post-content">
	<?php the_content(); ?>
</div>
<?php endif; ?>

</div>
</article>
<!--end #primary-->

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>