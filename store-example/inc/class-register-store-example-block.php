<?php
/**
 * Dynamic Block Registration Class file
 *
 * @package gutenberg-workshop
 */

class GTBW_Register_Store_Example_Block {

	/**
	 * Construct method.
	 */
	function __construct() {
		add_action( 'init', [ $this, 'register_block' ] );
	}

	/**
	 * Register block and styles
	 */
	public function register_block() {

		// Block Editor Script.
		wp_register_script(
			'gtbw-store-example-editor-js',
			GTBW_BLOCKS_URL . '/store-example/build/main.js',
			array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
			filemtime( GTBW_BLOCKS_PATH . '/store-example/build/main.js' ),
			true
		);

		register_block_type(
			'gtbw-blocks/store-example',
			array(
				'editor_script' => 'gtbw-store-example-editor-js',
			)
		);

	}

}

new GTBW_Register_Store_Example_Block();
