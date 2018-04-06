<?php

// add frontend scripts
add_action( 'wp_enqueue_scripts', 'az_enqueue_scripts' );
function az_enqueue_scripts () {
	global $post;
	$has_builder_shortcode = false;

	// theme styles
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

	if ( isset( $post ) && has_shortcode( $post->post_content, 'tachyons_builder' ) ) {
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
}

/**
 * add github buttons
 */
add_action( 'wp_head', function () {
	echo '<script async defer src="https://buttons.github.io/buttons.js"></script>';
} );