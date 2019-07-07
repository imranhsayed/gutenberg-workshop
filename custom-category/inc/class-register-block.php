<?php
/**
 * Dynamic Block Registration Class file
 *
 * @package gutenberg-workshop
 */

class GTBW_Register_Simple_Block{

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

		// Block front end styles.
		wp_register_style(
			'gtbw-category-block-front-end-styles',
			GTBW_BLOCKS_URL . '/custom-category/assets/css/style.css',
			array( 'wp-edit-blocks' ),
			filemtime( GTBW_BLOCKS_PATH . '/custom-category/assets/css/style.css' )
		);
		// Block editor styles.
		wp_register_style(
			'gtbw-category-block-editor-styles',
			GTBW_BLOCKS_URL . '/custom-category/assets/editor.css',
			array( 'wp-edit-blocks' ),
			filemtime( GTBW_BLOCKS_PATH . '/custom-category/assets/css/editor.css' )
		);

		// Block Editor Script.
		wp_register_script(
			'gtbw-category-block-editor-js',
			GTBW_BLOCKS_URL . '/custom-category/build/main.js',
			array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
			filemtime( GTBW_BLOCKS_PATH . '/custom-category/build/main.js' ),
			true
		);

		register_block_type(
			'gtbw-blocks/category-block',
			array(
				'style'         => 'gtbw-category-block-front-end-styles',
				'editor_style'  => 'gtbw-category-block-editor-styles',
				'editor_script' => 'gtbw-category-block-editor-js',
			)
		);

	}

}

new GTBW_Register_Simple_Block();
