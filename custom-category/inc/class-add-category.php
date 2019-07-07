<?php
/**
 * Add Custom Block Category
 *
 * @package gutenberg-workshop
 */

/**
 * Class Blocks
 */
class GTBW_Add_Categories {

	/**
	 * Construct method.
	 */
	function __construct() {

		add_action( 'block_categories', [ $this, 'add_block_category' ], 10, 2 );

	}

	/**
	 * Add Block Category.
	 *
	 * @param {Array}  $categories Block categories.
	 * @param {Object} $post Post.
	 *
	 * @return {Array} Array of block categories.
	 */
	public function add_block_category( $categories, $post ) {

		$post_types = [ 'post', 'page' ];

		if ( ( ! in_array( $post->post_type, $post_types, true ) ) ) {
			return $categories;
		}

		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'gtbw-home-blocks',
					'title' => __( 'GTPW Custom blocks', 'gutenberg-workshop' ),
				),
			)
		);
	}

}

new GTBW_Add_Categories();
