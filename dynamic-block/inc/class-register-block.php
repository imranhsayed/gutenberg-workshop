<?php
/**
 * Dynamic Block Registration Class file
 *
 * @package gutenberg-workshop
 */

class GW_Register_Dynamic_Block {

	/**
	 * Construct method.
	 */
	function __construct() {
		add_action( 'init', [ $this, 'resgiter_block' ] );
	}

	/**
	 * Register block and styles
	 */
	public function resgiter_block() {

		// Block front end styles.
		wp_register_style(
			'gtbw-block-front-end-styles',
			GTBW_BLOCKS_URL . '/dynamic-block/assets/css/style.css',
			array( 'wp-edit-blocks' ),
			filemtime( GTBW_BLOCKS_PATH . '/dynamic-block/assets/css/style.css' )
		);
		// Block editor styles.
		wp_register_style(
			'gtbw-block-editor-styles',
			GTBW_BLOCKS_URL . '/dynamic-block/assets/editor.css',
			array( 'wp-edit-blocks' ),
			filemtime( GTBW_BLOCKS_PATH . '/dynamic-block/assets/css/editor.css' )
		);

		// Block Editor Script.
		wp_register_script(
			'gtbw-block-editor-js',
			GTBW_BLOCKS_URL . '/dynamic-block/build/main.js',
			array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
			filemtime( GTBW_BLOCKS_PATH . '/dynamic-block/build/main.js' ),
			true
		);

		register_block_type(
			'gtbw-blocks/latest-posts',
			array(
				'style'         => 'gtbw-block-front-end-styles',
				'editor_style'  => 'gtbw-block-editor-styles',
				'editor_script' => 'gtbw-block-editor-js',
				'render_callback' => [ $this, 'gtbw_stories_block_title_render_callback' ]
			)
		);

	}

	/**
	 * Renders Stories Block Title Block on the front end.
	 */
	public function gtbw_stories_block_title_render_callback() {

		$latest_posts = wp_get_recent_posts();

		if ( $latest_posts ) {

			return gtbw_render_template(
				'block-templates/latest-posts',
				[
					'latest_posts' => $latest_posts,
				]
			);

		}

	}

}

new GW_Register_Dynamic_Block();
