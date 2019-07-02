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
		add_action( 'init', [ $this, 'gw_blocks' ] );
	}

	/**
	 * Register block and styles
	 */
	public function gw_blocks() {

		// Block front end styles.
		wp_register_style(
			'gw-block-front-end-styles',
			GWPC_BLOCKS_URL . '/dynamic-block/assets/css/style.css',
			array( 'wp-edit-blocks' ),
			filemtime( GWPC_BLOCKS_PATH . '/dynamic-block/assets/css/style.css' )
		);
		// Block editor styles.
		wp_register_style(
			'gw-block-editor-styles',
			GWPC_BLOCKS_URL . '/dynamic-block/assets/editor.css',
			array( 'wp-edit-blocks' ),
			filemtime( GWPC_BLOCKS_PATH . '/dynamic-block/assets/css/editor.css' )
		);

		// Block Editor Script.
		wp_register_script(
			'gw-block-editor-js',
			GWPC_BLOCKS_URL . '/dynamic-block/assets/build/main.js',
			array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
			filemtime( GWPC_BLOCKS_PATH . '/dynamic-block/build/main.js' ),
			true
		);

		register_block_type(
			'gw-blocks/latest-posts',
			array(
				'style'         => 'gw-block-front-end-styles',
				'editor_style'  => 'gw-block-editor-styles',
				'editor_script' => 'gw-block-editor-js',
				'render_callback' => [ $this, 'gw_stories_block_title_render_callback' ]
			)
		);

	}

	/**
	 * Renders Stories Block Title Block on the front end.
	 */
	public function gw_stories_block_title_render_callback() {

		$latest_posts = wp_get_recent_posts();

		if ( $latest_posts ) {
			set_query_var( 'latest_posts', $latest_posts );
			load_template( GWPC_BLOCKS_PATH . '/inc/block-templates/latest-posts.php' );
		}

	}

}

new GW_Register_Dynamic_Block();
