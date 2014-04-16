<?php
/**
 * Template Name: Blog Grid
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
$layout = twoot_get_frontend_func('meta', 'layout')==false? 'full':twoot_get_frontend_func('meta', 'layout');
$widget = twoot_get_frontend_func('meta', 'sidebar')==false? 'blog':twoot_get_frontend_func('meta', 'sidebar');
?>
<?php get_header(); ?>

<?php
	if( (twoot_get_frontend_func('meta', 'slideshow')==false) && !is_front_page() ) {
		echo twoot_generator('page_title', 'page'); 
	}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container pt pb clearfix">

<?php if($layout=='left') { echo twoot_generator('sidebar', $widget, $layout); } ?>

<article id="primary-wrapper" <?php twoot_layout_class();?>>
	<div class="inner">

	<?php if (have_posts()) : the_post(); ?>
		<?php if(get_the_content()) : ?>
		<div class="post-content entry-text">
			<?php the_content(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php
		$q = new Twoot_Template_Grid(array(
			'columns' => twoot_get_frontend_func('opt', 'opt', 'blog_column'),
			'counts' => twoot_get_frontend_func('opt', 'opt', 'blog_column_counts'),
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'filter' => 'yes',
			'paging' => 'yes',
			'post_type'	=> 'post',
			'taxonomy'  => 'category'
		));
		echo $q->grid();
	?>

	</div>
</article>
<!--end #primary-->

<?php if($layout=='right') { echo twoot_generator('sidebar', $widget, $layout); } ?>

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>