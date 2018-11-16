<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 */

class Wondaloans_Db {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 */
	protected $plugin_name;

	protected $version;

	public function __construct() {

		$this->plugin_name = 'wondaloans';
		$this->version = '1.1.0';

		$this->wondaloans_load_dependencies();
		$this->wondaloans_define_admin_hooks();
		$this->wondaloans_define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wondaloans_Db_Loader. Orchestrates the hooks of the plugin.
	 * - Wondaloans_Db_i18n. Defines internationalization functionality.
	 * - Wondaloans_Db_Admin. Defines all hooks for the admin area.
	 * - Wondaloans_Db_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 */
	private function wondaloans_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wondaloans-db-loader.php';

		/**
		 * The file responsible for defining all functions that used in both admin and frontend
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wondaloans-function.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wondaloans-admin.php';
		
		/*
		*** For dom pdf
		*/
		// require_once(dirname(dirname(__FILE__)).'/admin/pdfgenerate/dompdf/src/Dompdf.php');
		
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		

		$this->loader = new Wondaloans_Db_Loader();

	}

	
	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 */ 
	private function wondaloans_define_admin_hooks() { 

		$plugin_admin = new Wondaloans_Db_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		// Adding custom screen
		$this->loader->add_action('admin_menu', $plugin_admin, 'wondaloans_plugin_menu',9);
		
                // Adding Interest Field
                $this->loader->add_action('admin_init', $plugin_admin, 'wondaloan_register_settings');
                
		//Get form related fields information 
        	$this->loader->add_filter('vsz_cf7_admin_fields', $plugin_admin,'vsz_cf7_admin_fields_callback', 10, 2);

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function wondaloans_define_public_hooks() {

		

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wondaloans_Db_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
