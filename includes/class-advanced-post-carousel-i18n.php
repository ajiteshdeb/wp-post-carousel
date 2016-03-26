<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://ajiteshdeb.com
 * @since      1.0.0
 *
 * @package    Advanced_Post_Carousel
 * @subpackage Advanced_Post_Carousel/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Advanced_Post_Carousel
 * @subpackage Advanced_Post_Carousel/includes
 * @author     Ajitesh Deb <ajitesh.deb@gmail.com>
 */
class Advanced_Post_Carousel_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'advanced-post-carousel',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
