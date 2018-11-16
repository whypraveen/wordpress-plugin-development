<?php

/**
 * The admin-specific functionality of the plugin.
 */
class Wondaloans_Db_Admin {

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {

        wp_enqueue_style('dataTables-bootstrap-min-css', plugin_dir_url(__FILE__) . 'css/dataTables.bootstrap.min.css', array(), $this->version, 'all');
        wp_enqueue_style('wondaloans-admin-css', plugin_dir_url(__FILE__) . 'css/wondaloans-admin.css', array(), $this->version, 'all');
        wp_enqueue_style('font_awesome_css', plugin_dir_url(__FILE__) . 'css/font-awesome.css', array(), $this->version, 'all');
        wp_enqueue_style('bootstrap-min-table-css', plugin_dir_url(__FILE__) . 'css/bootstrap.min-table.css', array(), $this->version, 'all');
        wp_enqueue_style('jquery-datetimepicker-css', plugin_dir_url(__FILE__) . 'css/jquery.datetimepicker.css', array(), $this->version, 'all');
        
    }

    public function enqueue_scripts() {

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wondaloans-admin.js', array('jquery'), $this->version, false);
        wp_enqueue_script('datepicker-min-js', plugin_dir_url(__FILE__) . 'js/jquery.datetimepicker.js', array('jquery'), $this->version, false);
        wp_enqueue_script('jquery-dataTables-min-js', plugin_dir_url(__FILE__) . 'js/jquery.dataTables.min.js', array('jquery'), $this->version, false);
        wp_enqueue_script('dataTables-bootstrap-min-js', plugin_dir_url(__FILE__) . 'js/dataTables.bootstrap.min.js', array('jquery'), $this->version, false);
    }

    function wondaloans_plugin_menu() {

        add_menu_page("Wondaloans Loans", "Wondaloans Loans", "manage_options", "wondaloans-loans", array($this, "loan_listing_callback"), 'dashicons-visibility', 45);
        add_submenu_page('wondaloans-loans', __('APR', 'interest-rate'), __('APR', 'wondaloans-db'), 'manage_options', 'interest-rate', array($this, 'interest_rate'));
    }

    // Callback function for listing screen
    function loan_listing_callback() {
        wp_enqueue_style('wondaloans-admin-css');
        require_once plugin_dir_path(__FILE__) . 'partials/loan_application_listing.php';
    }

    // Callback function for Import CSV screen
    function interest_rate() {
        require_once plugin_dir_path(__FILE__) . 'partials/interest_rate.php';
    }

    function wondaloan_register_settings() {
        add_option('wondaloan_rate_name', '');
        register_setting('wondaloan_interest_field', 'wondaloan_rate_name', 'myplugin_callback');
    }

}
