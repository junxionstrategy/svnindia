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
?>
<?php if(has_post_thumbnail()) : ?>
<figure class="featured-image img-preload img-hover">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php echo twoot_get_frontend_func('resize_thumbnail', get_post_thumbnail_id(), get_the_title(), 580, 430, true); ?>
	<div class="overlay"></div>
	</a>
</figure>
<?php endif; ?>

<header class="item-head">
	<h3 class="title item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	<div class="desc"><?php echo twoot_generator('the_excerpt', 80, true, '...'); ?></div>
	<div class="meta">
	<span class="date">
		<?php echo get_the_time( get_option('date_format') ); ?>
	</span>

	<?php if(comments_open()) : ?>
	<span class="comments-link">
		<?php comments_popup_link( __( 'Leave a comment', 'Twoot' ), __( '1 Comment', 'Twoot' ), __( '% Comments', 'Twoot' ) ); ?>
	</span>
	<?php endif; ?>
	</div>
</header>