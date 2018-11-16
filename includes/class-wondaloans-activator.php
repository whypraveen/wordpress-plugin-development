<?php

/**
 * Fired during plugin activation
 * This class defines all code necessary to run during the plugin's activation.
 */
class Wondaloans_Activator {

    public static function activate() {

        global $wpdb;
        create_table_wondaloans_data();
        create_table_wondaloans_entry();
    }

}

function create_table_wondaloans_data() {

    global $wpdb;
    $table_name = $wpdb->prefix . 'wondaloans_data';

    $charset_collate = $wpdb->get_charset_collate();
    if ($wpdb->get_var("show tables like '{$table_name}'") != $table_name) {
        $sql = "CREATE TABLE " . $table_name . " (
             `id` int(11) NOT NULL AUTO_INCREMENT,
                        `ulrn` varchar(250) NOT NULL,
                        `apr` varchar(250) NOT NULL,
                        `status` varchar(250) NOT NULL,
			 `created` timestamp NOT NULL,
			  UNIQUE KEY id (id)
		)$charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }
}

function create_table_wondaloans_entry() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wondaloans_entry';
    $charset_collate = $wpdb->get_charset_collate();
    if ($wpdb->get_var("show tables like '{$table_name}'") != $table_name) {
        $sql = "CREATE TABLE " . $table_name . " (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`ulrn_no` varchar(10) NOT NULL,
				`data_id` int(11) NOT NULL,
				`fname` varchar(250),
				`value` text,
				UNIQUE KEY id (id)
		)$charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }
}
