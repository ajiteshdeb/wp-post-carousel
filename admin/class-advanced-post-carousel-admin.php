<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://ajiteshdeb.com
 * @since      1.0.0
 *
 * @package    Advanced_Post_Carousel
 * @subpackage Advanced_Post_Carousel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Post_Carousel
 * @subpackage Advanced_Post_Carousel/admin
 * @author     Ajitesh Deb <ajitesh.deb@gmail.com>
 */
class Advanced_Post_Carousel_Admin {

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
		$this->plugin_screen_hook_suffix = null;

	}

	/**
	 * Check if we're on our options page
	 *
	 * @since    1.0.0
	 */
	public function is_my_plugin_screen() {
    	$screen = get_current_screen();
    		if (is_object($screen) && $screen->id == 'toplevel_page_advanced-post-carousel') {
        	return true;
    	} else {
        	return false;
    	}
    	
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
		 * defined in Advanced_Post_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Post_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( $this->plugin_name . '-tinymce-css', plugin_dir_url( __FILE__ ) . 'css/advanced-post-carousel-tinymce.css', array(), $this->version, 'all' );

		
		
		if ($this->is_my_plugin_screen()) {
			wp_enqueue_style( $this->plugin_name . '-admin-css', plugin_dir_url( __FILE__ ) . 'css/advanced-post-carousel-admin.css', array(), $this->version, 'all' );
		}
		/**
		*To see what the id is of the current screen 
		*echo '<pre>' . print_r(get_current_screen(), true) . '</pre>';
		*/

		
		
		
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
		 * defined in Advanced_Post_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Post_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name . '-tinymce-js', plugin_dir_url( __FILE__ ) . 'js/advanced-post-carousel-tinymce.js', array( 'jquery' ), $this->version, false );

		if ($this->is_my_plugin_screen()) {
			wp_enqueue_script( $this->plugin_name . '-admin-js', plugin_dir_url( __FILE__ ) . 'js/advanced-post-carousel-admin.js', array( 'jquery' ), $this->version, false );

			
		}
		/**
		*To see what the id is of the current screen 
		*echo '<pre>' . print_r(get_current_screen(), true) . '</pre>';
		*/
		
		wp_enqueue_script( $this->plugin_name . '-tab-js', plugin_dir_url( __FILE__ ) . 'js/advanced-post-carousel-tab.js', array( 'jquery' ), $this->version, false );

		

	}


	/**
	*enquue google fonts
	*/
	public function enqueue_google_fonts() {
		$google_fonts_query_args = array(
		'family' => 'PT+Sans:400,700',
		'subset' => 'latin,latin-ext'
		);
		wp_register_style( 'google_fonts', add_query_arg( $google_fonts_query_args, "//fonts.googleapis.com/css" ), array(), null );
    }


    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
    */

	public function add_plugin_admin_menu() {

    /*
     * Add a settings page for this plugin to the Settings menu.
    */
    $plugin_screen_hook_suffix = add_menu_page( 'Advanced Post Carousel Setup', 'Advanced Post Carousel', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
    ,'dashicons-slides');
    }
    
    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
    */
    public function add_action_links( $links ) {
      $settings_link = array(
      '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
      );
      return array_merge(  $settings_link, $links );

    }

    public function display_plugin_setup_page() {
    	include_once( 'partials/advanced-post-carousel-admin-display.php' );
    }

    
    public function advanced_post_carousel_shortcode_generator() {
        include_once("partials/advanced-post-carousel-shortcode-generator.php");
        exit();
    }

    /*
     *  adds TinyMCE button to the visual editor
     */
    public function advanced_post_carousel_register_tinymce_javascript($tinymce_js) {
        // check user permissions
        if ( !current_user_can( "edit_posts" ) && !current_user_can( "edit_pages" ) ) {
            return;
        }

        $tinymce_js["advanced_post_carousel_button"] = plugin_dir_url(__FILE__)."js/advanced-post-carousel-tinymce.js";
        return $tinymce_js;
    }

    
    public function advanced_post_carousel_add_tinymce_button($tinymce_button) {
        // check user permissions
        if ( !current_user_can( "edit_posts" ) && !current_user_can( "edit_pages" ) ) {
            return;
        }

        array_push($tinymce_button, "advanced_post_carousel_button");
        return $tinymce_button;

    }




}
