<?php
/**
 * Script and Style Loaders and Related Functions.
 *
 * @package     Hoaloha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

add_action( 'wp_enqueue_scripts', 'hoaloha_rtl_add_data' );
/**
 * Replace the default theme stylesheet with a RTL version when a RTL
 * language is being used.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hoaloha_rtl_add_data() {
	wp_style_add_data( 'style', 'rtl', 'replace' );
	wp_style_add_data( 'style', 'suffix', hybrid_get_min_suffix() );
}

add_action( 'wp_enqueue_scripts', 'hoaloha_enqueue_styles' );
/**
 * Enqueue theme styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hoaloha_enqueue_styles() {
	$css_dir = trailingslashit( get_template_directory_uri() ) . 'css/';
	$suffix  = hybrid_get_min_suffix();

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Merriweather+Sans:400,700|Lato:400,400italic,700', array(), '1.0.0' );
	wp_enqueue_style( 'genericons', $css_dir . "genericons{$suffix}.css", array(), '3.1' );
}

add_action( 'wp_enqueue_scripts', 'hoaloha_enqueue_scripts' );
/**
 * Enqueue theme scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hoaloha_enqueue_scripts() {
	$js_dir = trailingslashit( get_template_directory_uri() ) . 'js/';
	$suffix = hybrid_get_min_suffix();

	wp_enqueue_script( 'hoaloha', $js_dir . "theme{$suffix}.js", array( 'jquery' ), null, true );
}
