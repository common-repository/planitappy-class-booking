<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://planitappy.com
 * @since      1.0.0
 *
 * @package    Pia_CalendarBooking
 * @subpackage Pia_CalendarBooking/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pia_CalendarBooking
 * @subpackage Pia_CalendarBooking/admin
 * @author     PlanItAppy <info@planitappy.com>
 */
class Pia_CalendarBooking_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pia_CalendarBooking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pia_CalendarBooking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		

		wp_enqueue_style('pia-calendar-booking-admin', plugins_url("admin/css/pia-calendar-booking-admin.css", dirname(__FILE__)));


		




	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pia_CalendarBooking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pia_CalendarBooking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script('pia_admin_js', plugins_url("admin/js/pia-calendar-booking-admin.js", dirname(__FILE__)), array('jquery'), '1.1', false);

		wp_enqueue_script('pia_admin_js', plugins_url("admin/js/pia-calendar-booking-admin.js", dirname(__FILE__)));

		add_action('admin_enqueue_scripts', 'pia_admin_js');


		


	}

  

	
		


		/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */

	/* public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    /* add_options_page( 'PIA Booking Form Options & Settings', 'PlanItAppy Booking Form', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	    ); 
	}*/


	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function pia_calendar_display_plugin_setup_page() {
	    include_once( 'partials/pia-calendar-booking-admin-display.php' );
	}

	

	public function pia_options_update() {
    register_setting('pia_site_url', 'pia_store_url');
    register_setting('pia_site_url', 'pia_store_url_alert');

	 }




	


}


