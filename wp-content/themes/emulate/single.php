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
<?php get_header(); ?>
<?php echo twoot_generator('page_title', 'page'); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container pt pb clearfix">

<article id="primary-wrapper" class="column eight">
	
	<?php if (have_posts()) : the_post(); ?>

	<div class="inner">

	<div class="post-blog">
		<?php echo twoot_generator( 'load_template', 'format-' . $format ); ?>

		<div class="clearfix">
		<section class="entry-meta">
			<span class="date-link">
				<?php echo get_the_time( get_option('date_format') ); ?>
			</span>
			<span class="comments-link">
				<?php comments_popup_link( __( 'Leave a comment', 'Twoot' ), __( '1 Comment', 'Twoot' ), __( '% Comments', 'Twoot' ) ); ?>
			</span>
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
			<h3 class="entry-title item-title"><?php the_title(); ?></h3>
			<div class="entry-text clearfix">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_attr__( 'Pages:', 'Twoot' ), 'after' => '</div>' ) ); ?>
			</div>

			<?php if($tags_list = get_the_tag_list( '', __( ', ', 'Twoot' ) )) : ?>
			<div class="tags-link">
				<?php printf( __( '<strong>Tags:</strong> %1$s', 'Twoot' ), $tags_list ); ?>
			</div>
			<?php endif; ?>
		</article>
		</div>
	</div>
	<!--end post blog-->

	<?php 
		$q = new Twoot_Template_Related_Posts(array(
			'title' => esc_attr__('Related Posts', 'Twoot'), 
			'counts' => twoot_get_frontend_func('opt', 'opt', 'blog_related_counts'),
			'order' => twoot_get_frontend_func('opt', 'opt', 'blog_related_order'),
			'orderby' => twoot_get_frontend_func('opt', 'opt', 'blog_related_orderby'),
			'post_type'	=> 'post',
			'taxonomy'  => 'category'
		));

		echo $q->post();
	?>

	<?php 
		if(comments_open()) { 
			comments_template( '', true ); 
		} 
	?>

	<?php twoot_single_navigation(); ?>

	</div>

	<?php endif; ?>

</article>
<!--end #primary-->

<?php get_sidebar(); ?>

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>