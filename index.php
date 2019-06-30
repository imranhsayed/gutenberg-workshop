<?php
/**
 * Plugin Name: Gutenberg Workshop
 * Plugin URI: https://github.com/imranhsayed/gutenberg-workshop
 * Description: This plugin adds a different Gutenberg blocks in the Gutenberg editor of your WordPress dashboard. See README.md for more
 * Version: 1.0.0
 * Author: Imran Sayed
 *
 * @package gutenberg-workshop
 */

defined( 'ABSPATH' ) || exit;

define( 'GWPC_BLOCKS_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'GWPC_BLOCKS_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

include 'dynamic-block/index.php';
