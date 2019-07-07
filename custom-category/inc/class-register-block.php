<?php
/**
 * Dynamic Block Registration Class file
 *
 * @package gutenberg-workshop
 */

class GW_Register_Simple_Block{

	/**
	 * Construct method.
	 */
	function __construct() {

		add_action( 'init', [ $this, 'gw_blocks' ] );
	}

	/**
	 * Register block and styles
	 */
	public function gw_blocks() {

		// Block front end styles.
		wp_register_style(
			'gw-category-block-front-end-styles',
			GWPC_BLOCKS_URL . '/custom-category/assets/css/style.css',
			array( 'wp-edit-blocks' ),
			filemtime( GWPC_BLOCKS_PATH . '/custom-category/assets/css/style.css' )
		);
		// Block editor styles.
		wp_register_style(
			'gw-category-block-editor-styles',
			GWPC_BLOCKS_URL . '/custom-category/assets/editor.css',
			array( 'wp-edit-blocks' ),
			filemtime( GWPC_BLOCKS_PATH . '/custom-category/assets/css/editor.css' )
		);

		// Block Editor Script.
		wp_register_script(
			'gw-category-block-editor-js',
			GWPC_BLOCKS_URL . '/custom-category/build/main.js',
			array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
			filemtime( GWPC_BLOCKS_PATH . '/custom-category/build/main.js' ),
			true
		);

		register_block_type(
			'gw-blocks/category-block',
			array(
				'style'         => 'gw-category-block-front-end-styles',
				'editor_style'  => 'gw-category-block-editor-styles',
				'editor_script' => 'gw-category-block-editor-js',
			)
		);

	}

}

new GW_Register_Simple_Block();
