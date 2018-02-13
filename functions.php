<?php

if ( ! defined( 'WPINC' ) ) die();

include_once __DIR__ . '/inc/wp-modular-css-integration.php';

/*
 * Let WordPress manage the document title.
 */
add_theme_support( 'title-tag' );

/*
 * Enable support for Post Thumbnails on posts and pages.
 */
add_theme_support( 'post-thumbnails' );

// Register theme menu(s)
register_nav_menus( array(
	'primary' => __( 'Primary Menu' ),
) );

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );

/**
 * Enqueues scripts and styles.
 */
function untheme_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'untheme-style', get_stylesheet_uri(), [ 'tachyons-custom' ] );

	// ace editor
	wp_enqueue_script( 'ace', get_stylesheet_directory_uri() . '/assets/vendor/ace-builds/src-min-noconflict/ace.js', [], '1.3', true );

	// app javascript
	wp_enqueue_script( 'app-builder', get_stylesheet_directory_uri() . '/assets/js/builder.js', [ 'jquery', 'ace' ], '1.0', true );

	// app javascript public params
	wp_localize_script(
		'app-builder',
		'tachyons_builder_params',
		[
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'security_nonce' => wp_create_nonce( 'build_tachyons' )
		]
	);
}
add_action( 'wp_enqueue_scripts', 'untheme_scripts' );

/**
 * add github buttons
 */
add_action( 'wp_head', function () {
	?>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<?php
} );

/**
 * disable search
 */
function wpb_filter_query( $query, $error = true ) {
	if ( is_search() ) {
		$query->is_search = false;
		$query->query_vars[s] = false;
		$query->query[s] = false;
		if ( $error == true ) $query->is_404 = true;
	}
}
add_action( 'parse_query', 'wpb_filter_query' );