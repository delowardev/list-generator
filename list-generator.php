<?php
/**
 * Plugin Name: List Generator
 * Description: List Generator Task.
 * Plugin URI:  https://www.example.com/
 * Author:      List Generator
 * Author URI:  https://www.example.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version:     1.0
 * Text Domain: list-generator
 *
 * @package list-generator
 */

define( 'LIST_GENERATOR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'LIST_GENERATOR_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'LIST_GENERATOR_SRC_PATH', plugin_dir_path( __FILE__ ) . 'assets/src/js/blocks' );
const LIST_GENERATOR_VERSION        = 1.0;

// phpcs:disable WordPressVIPMinimum.Files.IncludingFile.UsingCustomConstant
require_once LIST_GENERATOR_PATH . '/inc/helpers/autoloader.php';
// phpcs:enable WordPressVIPMinimum.Files.IncludingFile.UsingCustomConstant

/**
 * To load plugin manifest class.
 *
 * @return void
 */
function list_generator_plugin_loader() {
	\List_Generator\Inc\Plugin::get_instance();
}

list_generator_plugin_loader();
