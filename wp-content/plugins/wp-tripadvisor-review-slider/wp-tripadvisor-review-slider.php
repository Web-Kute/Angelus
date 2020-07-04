<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://ljapps.com
 * @since             1.0
 * @package           WP_TripAdvisor_Review_Slider
 *
 * @wordpress-plugin
 * Plugin Name: 	  WP TripAdvisor Review Slider
 * Plugin URI:        http://ljapps.com/wp-tripadvisor-review-slider/
 * Description:       Allows you to easily display your TripAdvisor Business Page reviews in your Posts, Pages, and Widget areas.
 * Version:           6.5
 * Author:            LJ Apps
 * Author URI:        http://ljapps.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-tripadvisor-review-slider
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-tripadvisor-review-slider-activator.php
 */
function activate_WP_TripAdvisor_Review( $networkwide )
{
//save time activated
	$newtime=time();
	update_option( 'wprev_activated_time_trip', $newtime );
	
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-tripadvisor-review-slider-activator.php';
    WP_TripAdvisor_Review_Activator::activate_all( $networkwide );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-tripadvisor-review-slider-deactivator.php
 */
function deactivate_WP_TripAdvisor_Review()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-tripadvisor-review-slider-deactivator.php';
    WP_TripAdvisor_Review_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_WP_TripAdvisor_Review' );
register_deactivation_hook( __FILE__, 'deactivate_WP_TripAdvisor_Review' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-tripadvisor-review-slider.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_WP_TripAdvisor_Review()
{
    //define plugin location constant

    define( 'wprev_trip_plugin_dir', plugin_dir_path( __FILE__ ) );
    define( 'wprev_trip_plugin_url', plugins_url( '', __FILE__ ) );


    $plugin = new WP_TripAdvisor_Review();
    $plugin->run();
}

//for running the cron job
add_action('wptripadvisor_daily_event', 'wptripadvisor_do_this_daily');

function wptripadvisor_do_this_daily() {

		
	require_once plugin_dir_path( __FILE__ ) . 'admin/class-wp-tripadvisor-review-slider-admin.php';
	$plugin_admin = new WP_TripAdvisor_Review_Admin( 'wp-tripadvisor-review-slider', '6.5' );
	$plugin_admin->wptripadvisor_download_tripadvisor_master();
	
}

//start the plugin-------------
run_WP_TripAdvisor_Review();