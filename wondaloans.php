<?php

/**
 * @link              https://www.yinnovators.com/
 * @since             1.1.0
 * @package           Wondaloans
 *
 * @wordpress-plugin
 * Plugin Name:       Wondaloans
 * Plugin URI:        https://www.yinnovators.com/
 * Description:       Apply loan application using this plugin.
 * Version:           1.1.0
 * Author:            Young Innovators Online Solution Pvt. Ltd.
 * Author URI:        https://www.yinnovators.com/
 * License:           
 * License URI:       
 * Text Domain:       Wondaloans
 * Domain Path:       /languages
 */  
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
global $wondaloans_current_version;
$wondaloans_current_version = '1.1.0';

/**
 * Defining all the table names and setting their prefix here
 */
global $wpdb;

define('WONDALOANS_TABLE_NAME', $wpdb->prefix . 'wondaloans_data');
define('WONDALOANS_DATA_ENTRY_TABLE_NAME', $wpdb->prefix . 'wondaloans_entry');

define('WONDALOANS_UPLOAD_FOLDER', 'wondaloans-upload');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wondaloans-activator.php
 */
function activate_wondaloans() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wondaloans-activator.php';
    Wondaloans_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wondaloans-deactivator.php
 */
function deactivate_wondaloans() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wondaloans-deactivator.php';
    Wondaloans_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wondaloans');
register_deactivation_hook(__FILE__, 'deactivate_wondaloans');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wondaloans-db.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wondaloans_db() {

    $plugin = new Wondaloans_Db();
    $plugin->run();
}

run_wondaloans_db();

/**
 * Replace accented characters with non accented
 *
 * @param $str
 * @return mixed
 */
if (!function_exists("removeAccents")) {

    function removeAccents($str) {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή', '–');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η', '-');
        return str_replace($a, $b, $str);
    }

}

/**
 * Replace smart quotes and other special characters with appropriate characters
 *
 * @param $str
 * @return mixed
 */
if (!function_exists("remove_smart_quotes")) {

    function remove_smart_quotes($content) {
        $content = str_replace(
                array("\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"), array("'", "'", '"', '"', '-', '--', '...'), $content);

        $content = str_replace(
                array(chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)), array("'", "'", '"', '"', '-', '--', '...'), $content);

        return $content;
    }

}

/**
 * Shorcode for front end Application form
 */
function form_data() {

    wp_register_style('wondaloans-bootstrap-css', plugin_dir_url(__FILE__) . 'admin/css/bootstrap.min.css', array(), '', 'all');
    wp_enqueue_style('wondaloans-bootstrap-css', plugin_dir_url(__FILE__) . 'admin/css/bootstrap.min.css', array(), '', 'all');

    ob_start();
    require_once plugin_dir_path(__FILE__) . 'template/loan_application_form.php';
    return ob_get_clean();
}

add_shortcode('loan_application_form', 'form_data');


/**
 * Shorcode for front end Application form search
 */
function form_data_search() {

    wp_register_style('wondaloans-bootstrap-css', plugin_dir_url(__FILE__) . 'admin/css/bootstrap.min.css', array(), '', 'all');
    wp_enqueue_style('wondaloans-bootstrap-css', plugin_dir_url(__FILE__) . 'admin/css/bootstrap.min.css', array(), '', 'all');

    ob_start();
    require_once plugin_dir_path(__FILE__) . 'template/loan_application_search.php';
    return ob_get_clean();
}

add_shortcode('loan_application_search', 'form_data_search');

/*
 * Create a random string
 * @return $str the string
 */
function randomString($length = 6) {
    $str = "";
    $characters = array_merge(range('A', 'Z'), range('0', '9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}
