<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://planitappy.com
 * @since             1.0.0
 * @package           Pia_CalendarBooking
 *
 * @wordpress-plugin
/*
Plugin Name: PlanItAppy Class Booking 
Plugin URI:  https://wordpress.org/plugins/plan-it-appy-class-booking/
Description: Take bookings for your Classes direct from your Wordpress website.
Version:     1.2
Author:      PlanItAppy
Author URI:  https://planitappy.com
License:     GPL3
License URI: https://opensource.org/licenses/GPL-3.0
Text Domain: pia-class-booking
Domain Path: /languages

{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/
 

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pia-calendar-booking-activator.php
 */
function activate_pia_calendar_booking() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pia-calendar-booking-activator.php';
	wp_register_style( 'namespace', '/public/css/pia-calendar-booking-public.css' );
	Pia_CalendarBooking_Activator::activate();
	wp_enqueue_style('namespace');
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pia-calendar-booking-deactivator.php
 */
function deactivate_pia_calendar_booking() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pia-calendar-booking-deactivator.php';
	Pia_CalendarBooking_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pia_calendar_booking' );
register_deactivation_hook( __FILE__, 'deactivate_pia_calendar_booking' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pia-calendar-booking.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function pia_run_pia_calendar_booking() {

	$plugin = new Pia_CalendarBooking();
	$plugin->run();

}
pia_run_pia_calendar_booking();



function pia_calendar_display() { 

	$store_url = get_option("pia_store_url");
	$store_url = "https://" . $store_url . ".planitappy.com/classic/zCommunity";
	$store_url = esc_url($store_url);
	$echo_string =  '<div class="responsive_iframe_calendar"><iframe frameBorder="0" id="booking-iframe" style="width: 100%; height: 1100px;" src="' . $store_url . '" ></iframe><div style="clear:both;"></div></div>';
	return $echo_string;

}

function pia_plugin_menu_calendar() {
	add_menu_page('PlanItAppy Class Booking Settings', 'PlanItAppy Class Booking Settings', 'administrator', 'pia-calendar-booking', 'pia_calendar_display_plugin_setup_page', 'dashicons-calendar-alt');
}


function pia_calendar_display_plugin_setup_page() {
	    include_once(plugin_dir_path( __FILE__ ) . 'admin/partials/pia-calendar-booking-admin-display.php' );
	}



/* Actions */




add_action('admin_menu', 'pia_plugin_menu_calendar');


/* Shortcodes */

add_shortcode('pia_calendar', 'pia_calendar_display');






