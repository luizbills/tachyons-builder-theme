<?php

if ( ! defined( 'WPINC' ) ) die();

function builder_get_default_config () {
	return file_get_contents( WP_Modular_CSS::DIR . '/config-files/default.json' );
}

function builder_get_default_tachyons () {
	return file_get_contents( WP_Modular_CSS::get_plugin_uploads_folder() . 'style.css' );
}

//add_action( 'wp_ajax_nopriv_build_tachyons', 'builder_ajax_build_tachyons' );
add_action( 'wp_ajax_build_tachyons', 'builder_ajax_build_tachyons' );
function builder_ajax_build_tachyons () {
	if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) wp_send_json_error( [ 'message' => 'Invalid request type (you must use POST).' ] );;

	check_ajax_referer( 'build_tachyons', 'security' );

	$config_json = ! empty( $_REQUEST['config_json'] ) ? urldecode( $_REQUEST['config_json'] ) : '';
	//error_log( print_r( $config_json, true ) );
	$config = WP_Modular_CSS::parse_json( $config_json, false );

	if ( false !== $config ) {
		$modular_css_options = wp_get_admin_page( 'wp-modular-css-settings' );
		$value = $modular_css_options->get_field_value( 'config_json' );
		$minify_css = $modular_css_options->get_field_value( 'minify' ) === 'on';
		$filename = 'style.css';
		$builder = new WP_Modular_CSS_Builder( $config );

		$css = $builder->get_output( $minify_css );

		wp_send_json_success( [ 'css' => $css ] );

	} else {
		wp_send_json_error( [ 'message' => json_last_error_msg() ] );
	}
}