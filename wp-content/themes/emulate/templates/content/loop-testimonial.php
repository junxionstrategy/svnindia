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

$name = twoot_get_frontend_func('meta', 'testimonial_name');
$role = twoot_get_frontend_func('meta', 'testimonial_role');
$url = twoot_get_frontend_func('meta', 'testimonial_url');
$class = has_post_thumbnail()? 'content has-avatar':'content';
?>

<?php if(has_post_thumbnail()) : ?>
<div class="avatar">
	<?php echo twoot_get_frontend_func('resize_thumbnail', get_post_thumbnail_id(), get_the_title(), 90, 90, true); ?>
</div>
<?php endif; ?>
<div class="<?php echo $class; ?>">
	<div class="text"><?php the_content(); ?></div>
	<?php if($name) : ?>
	<h3 class="name">
	<?php if($url) : ?><?php echo '<a href="'.$url.'">'.$name.'</a>'; ?><?php else : ?><?php echo $name; ?><?php endif; ?>
	<?php if($role) : ?><span class="role"><?php echo $role; ?></span><?php endif; ?>
	</h3>
	<?php endif; ?>
</div>