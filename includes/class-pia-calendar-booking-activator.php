<?php

/**
 * Fired during plugin activation
 *
 * @link       https://planitappy.com
 * @since      1.0.0
 *
 * @package    Pia_CalendarBooking
 * @subpackage Pia_CalendarBooking/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Pia_CalendarBooking
 * @subpackage Pia_CalendarBooking/includes
 * @author     PlanItAppy <info@planitappy.com>
 */
class Pia_CalendarBooking_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		wp_register_style('pia_admin_css', plugins_url("admin/css/pia-calendar-booking-admin.css", dirname(__FILE__)));
				



		function pia_admin_enqueue_options_style() {
			wp_enqueue_style('pia_admin_css');
		}

		function pia_admin_enqueue_options_scripts() {
			wp_enqueue_script('pia_admin_js', plugins_url("admin/js/pia-calendar-booking-admin.js", dirname(__FILE__)));
		}

		add_action('admin_enqueue_styles', 'pia_admin_enqueue_options_style');
		add_action('admin_enqueue_scripts', 'pia_admin_enqueue_options_scripts');

	}


}
