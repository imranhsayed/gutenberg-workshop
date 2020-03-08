<?php
/**
 * Plugin Name: Gutenberg Workshop
 * Plugin URI: https://github.com/imranhsayed/gutenberg-workshop
 * Description: This plugin adds a different Gutenberg blocks in the Gutenberg editor of your WordPress dashboard. See README.md for more
 * Version: 1.0.0
 * Author: Imran Sayed
 * text-domain: gutenberg-workshop
 *
 * @package gutenberg-workshop
 */

defined( 'ABSPATH' ) || exit;

define( 'GTBW_BLOCKS_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'GTBW_BLOCKS_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

include 'helpers/custom-functions.php';
include 'dynamic-block/index.php';
include 'dynamic-block-ssr/index.php';
include 'custom-category/index.php';
include 'store-example/index.php';
