<?php
/**
 * Plugin manifest class.
 *
 * @package list-generator
 */

namespace List_Generator\Inc;

use \List_Generator\Inc\Traits\Singleton;

/**
 * Class Plugin
 */
class Plugin {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		// Load plugin classes.
		Assets::get_instance();
	}

}
