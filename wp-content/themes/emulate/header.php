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
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="generator" content="<?php echo TWOOT_NAME;?> <?php echo TWOOT_VERSION;?>" />
<?php if( twoot_get_checked_func('toolkit_activated') ) : ?>
<meta name="generator" content="<?php echo TWOOT_TOOLKIT_NAME;?> <?php echo TWOOT_TOOLKIT_VERSION;?>" />
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if($icon=twoot_get_frontend_func('opt', 'opt', 'favicon_icon')) : ?>
<!-- For favicon-->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $icon; ?>" />
<link rel="icon" type="image/x-icon" href="<?php echo $icon; ?>" />
<?php endif; ?>
<?php if($icon_144=twoot_get_frontend_func('opt', 'opt', 'touch_icon_144')) : ?>
<!-- For iPad3 with retina display: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $icon_144; ?>" />
<?php endif; ?>
<?php if($icon_114=twoot_get_frontend_func('opt', 'opt', 'touch_icon_114')) : ?>
<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $icon_114; ?>" />
<?php endif; ?>
<?php if($icon_72=twoot_get_frontend_func('opt', 'opt', 'touch_icon_72')) : ?>
<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $icon_72; ?>">
<?php endif; ?>
<?php if($icon_57=twoot_get_frontend_func('opt', 'opt', 'touch_icon_57')) : ?>
<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
<link rel="apple-touch-icon-precomposed" href="<?php echo $icon_57; ?>" /> 
<?php endif; ?>
<?php wp_head(); ?>
<?php if($analytics_code=twoot_get_frontend_func('opt', 'opt', 'analytics_code')) { echo stripslashes($analytics_code); } ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="wrapper">
<div class="rows">

<?php if(twoot_get_frontend_func('opt', 'opt', 'show_topbar')) : ?>
<header class="site-topbar">
	<section class="container clearfix">
		<div class="topbar-left">
			<div class="inner clearfix"><?php echo twoot_generator('top_text'); ?></div>
		</div>
		<div class="topbar-right">
			<div class="inner topbar-right-inner clearfix">
			<?php if(twoot_get_checked_func('wpml_activated')) { echo twoot_wpml_generator('language_switcher'); } ?><?php $show_icons = twoot_get_frontend_func('opt', 'opt', 'show_top_social_icons'); echo twoot_generator('social_icons', 'top', $show_icons); ?><?php echo twoot_generator('search'); ?>
			</div>
		</div>
	</section>
</header>
<div class="clear"></div>
<!--end #topbar-->
<?php endif; ?>

<header class="site-header">
	<section class="container">
	<div class="inner clearfix">
		<?php echo twoot_generator('logo'); ?>
		<?php echo twoot_generator('menu'); ?>
		<?php echo twoot_generator('responsive_menu_switch'); ?>
	</div>
	</section>
</header>
<?php echo twoot_generator('responsive_menu'); ?>
<div class="clear"></div>
<!--end #header-->

<?php
	if(is_page()) {
		$slider_id=twoot_get_frontend_func('meta', 'slideshow');
		if($slider_id) {
			echo do_shortcode('[layerslider id="'.$slider_id.'"]'); 
		}
	}
?>