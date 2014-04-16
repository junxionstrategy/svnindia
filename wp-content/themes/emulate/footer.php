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
<div class="site-footer clear-fixed">
<?php echo twoot_generator('bottom_widgets'); ?>
<footer class="site-bottom">
	<section class="container">
	<div class="inner clearfix">
		<?php if($copy_text=twoot_get_frontend_func('opt', 'opt', 'copy_text')): ?>
			<div id="bottom-copy"><?php echo stripslashes($copy_text); ?></div>
		<?php endif; ?>
		<?php echo twoot_generator('bottom_menu'); ?>
	</div>
	</section>
</footer>
</div>
<!--end #footer-->

</div>
</div><!--end #warpper-->

<?php echo twoot_generator('contact_form'); ?>

<?php if(twoot_get_frontend_func('opt', 'opt', 'show_gotop')) : ?>
<div id="gotop"><i class="icon-up-open-big"></i></div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>