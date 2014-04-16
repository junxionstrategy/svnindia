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
$format=get_post_format() === false? 'standard':get_post_format();
?>
<?php echo twoot_generator( 'load_template', 'format-' . $format ); ?>

<div class="clearfix">
	<section class="entry-meta">
		<span class="date-link">
			<?php echo get_the_time( get_option('date_format') ); ?>
		</span>
		<?php if(comments_open()) : ?>
		<span class="comments-link">
			<?php comments_popup_link( __( 'Leave a comment', 'Twoot' ), __( '1 Comment', 'Twoot' ), __( '% Comments', 'Twoot' ) ); ?>
		</span>
		<?php endif; ?>
	</section>

	<article class="entry-content clearfix">
		<div class="entry-sub">
		<?php if($categories_list=get_the_category_list( __( ', ', 'Twoot' ) )) : ?>
		<span class="cats-link">
			<?php printf( __( 'Posted in: %1$s', 'Twoot' ), $categories_list ); ?>
		</span>
		<?php endif; ?>
		<span class="author vcard">
		<?php esc_attr_e('Started by', 'themewoot'); ?>
		<?php
			printf( '<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'themewoot' ), get_the_author() ) ),
				get_the_author()
			);
		?>
		</span>
		</div>
		<h3 class="entry-title item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<div class="entry-text"><?php echo twoot_generator('post_excerpt', 360, true, '...', __('Continue reading &raquo;', 'Twoot')); ?></div>
	</article>
</div>