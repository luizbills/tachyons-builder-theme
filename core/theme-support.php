<?php
/**
 * Registers theme support for some features
 *
 * @package az-starter
 */

add_action( 'after_setup_theme', 'az_add_theme_support' );
function az_add_theme_support () {

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	] );

	/*
	 * Enable WooCommerce template overrides and others features
	 */
	add_theme_support( 'woocommerce', [
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,
		/*
		'product_grid'          => [
			'default_rows'    => 3,
			'min_rows'        => 2,
			'max_rows'        => 8,
			'default_columns' => 4,
			'min_columns'     => 2,
			'max_columns'     => 5,
		],
		*/
	] );

	do_action( 'az_add_theme_support' );

}
