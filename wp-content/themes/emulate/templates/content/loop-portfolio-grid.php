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
$link = twoot_get_frontend_func('meta', 'post_link')=='custom' && twoot_get_frontend_func('meta', 'custom_url')!=false? twoot_get_frontend_func('meta', 'custom_url'):get_permalink();
$excerpt = twoot_get_frontend_func('meta', 'page_desc')==false? get_the_excerpt():twoot_get_frontend_func('meta', 'page_desc');
?>

<?php if(has_post_thumbnail()) : ?>
<figure class="featured-image img-preload img-hover">
	<a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>">
	<?php echo twoot_get_frontend_func('resize_thumbnail', get_post_thumbnail_id(), get_the_title(), 580, 430, true); ?>
	<div class="overlay"></div>
	</a>
</figure>
<?php endif; ?>
<header class="item-head">
	<h3 class="title item-title"><a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	<?php if($excerpt) : ?><div class="desc"><?php echo $excerpt; ?></div><?php endif; ?>
</header>