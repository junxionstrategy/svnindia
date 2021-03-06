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

if(!class_exists('Twoot_Widget_Contact_Details')) {

	class Twoot_Widget_Contact_Details extends WP_Widget {

		var $widget_cssclass;
		var $widget_description;
		var $widget_name;

		//Constructor
		function Twoot_Widget_Contact_Details() {

			/* Widget variable settings. */
			$this->widget_cssclass 		= 'widget-contact-details';
			$this->widget_description 	= __( 'This widget will display a contact details section.', 'Twoot' );
			$this->widget_name 			= __( 'Twoot Contact Details', 'Twoot' );

			$widget_ops = array( 'classname' => $this->widget_cssclass, 'description' => $this->widget_description );

			$this->WP_Widget( TWOOT_TOOLKIT_SLUG. '_contact_details', $this->widget_name, $widget_ops );
		}

		//Form
		function form($instance) {
			$instance = wp_parse_args((array) $instance, array( 
				'title' => 'Contact Details',
				'email' => '',
				'phone' => '',
				'address' => '',
				'facebook' => '',
				'twitter' => '',
				'skype' => '',
			));
			$title = strip_tags($instance['title']);
			$email = strip_tags($instance['email']);
			$phone = strip_tags($instance['phone']);
			$address = stripslashes($instance['address']);
			$facebook = stripslashes($instance['facebook']);
			$twitter = stripslashes($instance['twitter']);
			$skype = strip_tags($instance['skype']);
			?>
			<div class="theme-widget-wrap">
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'Twoot'); ?></label>
				<input  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</div>
			<div class="theme-widget-wrap">
				<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email:', 'Twoot'); ?></label>
				<input  id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
			</div>
			<div class="theme-widget-wrap">
				<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e('Phone:', 'Twoot'); ?></label>
				<input  id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
			</div>
			<div class="theme-widget-wrap">
				<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook:', 'Twoot'); ?></label>
				<input  id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
			</div>
			<div class="theme-widget-wrap">
				<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:', 'Twoot'); ?></label>
				<input  id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
			</div>
			<div class="theme-widget-wrap">
				<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e('Skype:', 'Twoot'); ?></label>
				<input  id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" type="text" value="<?php echo esc_attr( $skype ); ?>" />
			</div>
			<div class="theme-widget-wrap">
				<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php esc_html_e('Address:','Twoot'); ?></label>
				<textarea  id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>"  rows="3"><?php echo esc_attr( $address ); ?></textarea>
			</div>
			<?php
		}

		//Update & Save The Widget
		function update($new_instance, $old_instance) {
			$instance = $old_instance;	
			foreach($new_instance as $key=>$value)
			{
				$instance[$key]	= strip_tags($new_instance[$key]);
			}
			return $instance;
		}

		//Prints the widget
		function widget($args, $instance) {
			extract($args, EXTR_SKIP);

			$title = $instance['title'];
			$email = $instance['email'];
			$phone = $instance['phone'];
			$facebook = $instance['facebook'];
			$twitter = $instance['twitter'];
			$skype = $instance['skype'];
			$address = stripslashes($instance['address']);
		?>
		<?php echo $before_widget; ?>
		<?php if($title) { echo $before_title . $title . $after_title; } ?>
		<ul>
			<?php if($address) : ?>
				<li class="clearfix">
				<i class="address icon icon-location"></i>
				<p><strong><?php _e('Address:', 'Twoot'); ?></strong><?php echo $address; ?></p>
				</li>
			<?php endif; ?>

			<?php if($phone) : ?>
				<li class="clearfix">
				<i class="phone icon icon-call"></i>
				<p><strong><?php _e('Phone:', 'Twoot'); ?></strong><?php echo $phone; ?></p>
				</li>
			<?php endif; ?>

			<?php if($email) : ?>
				<li class="clearfix">
				<i class="email icon icon-mail"></i>
				<p><strong><?php _e('Email:', 'Twoot'); ?></strong><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
				</li>
			<?php endif; ?>

			<?php if($skype) : ?>
				<li class="clearfix">
				<i class="skype icon icon-skype"></i>
				<p><strong><?php _e('Skype:', 'Twoot'); ?></strong><?php echo $skype; ?></p>
				</li>
			<?php endif; ?>

			<?php if($facebook) : ?>
				<li class="clearfix">
				<i class="icon icon-facebook"></i>
				<p><strong><?php _e('Facebook:', 'Twoot'); ?></strong><a href="<?php echo $facebook; ?>"><?php _e('Follow US', 'Twoot'); ?></a></p>
				</li>
			<?php endif; ?>

			<?php if($twitter) : ?>
				<li class="clearfix">
				<i class="icon icon-twitter"></i>
				<p><strong><?php _e('Twitter:', 'Twoot'); ?></strong><a href="<?php echo $twitter; ?>"><?php _e('Follow US', 'Twoot'); ?></a></p>
				</li>
			<?php endif; ?>
		</ul>
		<?php echo $after_widget; ?>
		<?php
		}
	}

	register_widget('Twoot_Widget_Contact_Details');
}
?>