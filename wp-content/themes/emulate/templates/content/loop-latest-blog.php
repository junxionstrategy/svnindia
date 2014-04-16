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
<section class="entry-date">
	<?php echo '<span class="day">'.get_the_time('d').'</span>'; ?>
	<?php echo '<span class="month">'.get_the_time('M').'</span>'; ?>
</section>

<section class="entry-content">
	<h3 class="title item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

	<div class="meta">
	<?php if($categories_list=get_the_category_list( __( ', ', 'Twoot' ) )) : ?>
	<span class="cats-link">
		<?php printf( __( 'Posted in: %1$s', 'Twoot' ), $categories_list ); ?>
	</span>
	<?php endif; ?>

	<?php if(comments_open()) : ?>
	<span class="comments-link">
		<?php comments_popup_link( __( 'Leave a comment', 'Twoot' ), __( '1 Comment', 'Twoot' ), __( '% Comments', 'Twoot' ) ); ?>
	</span>
	<?php endif; ?>
	</div>

	<div class="desc"><?php echo twoot_generator('the_excerpt', 220, true, '...'); ?></div>

	<div class="more"><a href="<?php the_permalink(); ?>"><?php esc_attr_e('Continue Reading', 'Twoot'); ?></a></div>
</section>