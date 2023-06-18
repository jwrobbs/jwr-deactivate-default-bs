<?php
/**
 * Plugin Name: JWR Deactivate Default Bulls***
 * Description: Deactivates the default WordPress block library CSS and global styles from loading on the frontend.
 * Version: 1.0.0
 *
 * @package jwr_deactivate_default_bs
 */

namespace JWR\Deactivate_Default_BS;

defined( 'ABSPATH' ) || exit;

/**
 * REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND.
 *
 * I didn't write this code - only collect it. If you have code to add
 * to this, find me on Twitter:
 *
 * @link https://twitter.com/_JoshRobbs
 *
 * @return void;
 */
function remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS.
	wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON.

	// Remove Global Styles and SVG Filters from WP 5.9.1 - 2022-02-27.
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\remove_wp_block_library_css', 100 );


