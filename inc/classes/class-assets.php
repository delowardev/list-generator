<?php
/**
 * Assets class.
 *
 * @package list-generator
 */

namespace List_Generator\Inc;

use List_Generator\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Assets {

    use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'enqueue_block_editor_assets', [ $this, 'action_enqueue_block_editor_assets' ] ); // Register block editor assets

	}

	/**
	 * To enqueue scripts and styles.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {}

    /**
     * Get file path or uri based on condition.
     *
     * @param $path
     * @param string $type
     *
     * @return string
     */
    public function get_file_path_or_uri($path, string $type = 'uri' ): string {
        return ( $type === 'uri' ? LIST_GENERATOR_PATH : LIST_GENERATOR_URL ) . $path;
    }

    /**
     * Enqueue scripts.
     *
     * @return void
     */
    public function action_enqueue_block_editor_assets(): void {

        $jsPath = '/build/js/block-editor.js';



        if ( file_exists( LIST_GENERATOR_PATH . $jsPath )) {

            $block_script_asset = [
                'dependencies' => [],
                'version'      => filemtime( LIST_GENERATOR_PATH . $jsPath ),
            ];

            $assets_file = LIST_GENERATOR_PATH . '/build/assets.php';


            if ( file_exists( $assets_file ) ) {
                $assets             = require( $assets_file );
                $block_script_asset = [
                    'dependencies' => $assets['js/block-editor.js']['dependencies'],
                    'version'      => $assets['js/block-editor.js']['version'],
                ];
            }


            wp_register_script(
                'list-generator',
                LIST_GENERATOR_URL . $jsPath,
                $block_script_asset['dependencies'],
                $block_script_asset['version'],
                true
            );
        }

        wp_enqueue_script( 'list-generator' );
    }

}
