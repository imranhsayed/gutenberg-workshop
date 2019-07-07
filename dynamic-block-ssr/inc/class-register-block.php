<?php
/**
 * Dynamic Block Registration Class file
 *
 * @package gutenberg-workshop
 */

class GTBW_Register_Dynamic_Block_Ssr {

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
			'gtbw-ssr-block-front-end-styles',
			GTBW_BLOCKS_URL . '/dynamic-block-ssr/assets/css/style.css',
			array( 'wp-edit-blocks' ),
			filemtime( GTBW_BLOCKS_PATH . '/dynamic-block-ssr/assets/css/style.css' )
		);
		// Block editor styles.
		wp_register_style(
			'gtbw-ssr-block-editor-styles',
			GTBW_BLOCKS_URL . '/dynamic-block-ssr/assets/editor.css',
			array( 'wp-edit-blocks' ),
			filemtime( GTBW_BLOCKS_PATH . '/dynamic-block-ssr/assets/css/editor.css' )
		);

		// Block Editor Script.
		wp_register_script(
			'gtbw-ssr-block-editor-js',
			GTBW_BLOCKS_URL . '/dynamic-block-ssr/build/main.js',
			array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
			filemtime( GTBW_BLOCKS_PATH . '/dynamic-block-ssr/build/main.js' ),
			true
		);

		register_block_type(
			'gtbw-blocks/dynamic-block-ssr',
			array(
				'style'         => 'gtbw-ssr-block-front-end-styles',
				'editor_style'  => 'gtbw-ssr-block-editor-styles',
				'editor_script' => 'gtbw-ssr-block-editor-js',
				'attributes'      => array(
					'name'    => array(
						'type'      => 'String',
						'default'   => 'Ross',
					),
				),
				'render_callback' => [ $this, 'render_callback' ],
			)
		);

	}

	/**
	 * Renders Stories Block Title Block on the front end.
	 */
	public function render_callback( $attributes = [] ) {

		$attributes = wp_parse_args( $attributes, [] );

		return $attributes['name'];

	}

}

new GTBW_Register_Dynamic_Block_Ssr();
