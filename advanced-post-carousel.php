<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://ajiteshdeb.com
 * @since             1.0.0
 * @package           Advanced_Post_Carousel
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Post Carousel
 * Plugin URI:        http://advanced-post-carousel.com
 * Description:       Displays WP Posts as Carousel using Shortcodes
 * Version:           1.0.0
 * Author:            Ajitesh Deb
 * Author URI:        http://ajiteshdeb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advanced-post-carousel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-advanced-post-carousel-activator.php
 */
function activate_advanced_post_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-post-carousel-activator.php';
	Advanced_Post_Carousel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-advanced-post-carousel-deactivator.php
 */
function deactivate_advanced_post_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-post-carousel-deactivator.php';
	Advanced_Post_Carousel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_advanced_post_carousel' );
register_deactivation_hook( __FILE__, 'deactivate_advanced_post_carousel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advanced-post-carousel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_advanced_post_carousel() {

	$plugin = new Advanced_Post_Carousel();
	$plugin->run();

}
run_advanced_post_carousel();
