<?php

if ( ! defined( 'WPINC' ) ) die();

function builder_get_default_config () {
	return file_get_contents( WP_Modular_CSS::DIR . '/config-files/default.json' );
}

function builder_get_default_tachyons () {
	$file_name = 'tachyons-' . WP_Modular_CSS::TACHYONS_VERSION . '.css';
	$file_path = WP_Modular_CSS::get_plugin_uploads_folder() . $file_name;

	if ( ! file_exists( $file_path ) ) {
		$config_json = builder_get_default_config();
		$config = WP_Modular_CSS::parse_json( $config_json, false );
		$builder = new WP_Modular_CSS_Builder( $config );
		WP_Modular_CSS::write_file( $file_name, $builder->get_output() );
	}

	return file_get_contents( $file_path );
}

add_action( 'wp_ajax_nopriv_build_tachyons', 'builder_ajax_build_tachyons' );
add_action( 'wp_ajax_build_tachyons', 'builder_ajax_build_tachyons' );
function builder_ajax_build_tachyons () {
	if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) wp_send_json_error( [ 'message' => 'Invalid request type (you must use POST).' ] );;

	check_ajax_referer( 'build_tachyons', 'security' );

	$config_json = ! empty( $_REQUEST['config_json'] ) ? urldecode( $_REQUEST['config_json'] ) : '';
	$config = WP_Modular_CSS::parse_json( $config_json, false );

	if ( false !== $config ) {
		$builder = new WP_Modular_CSS_Builder( $config );
		$css = $builder->get_output( false );

		wp_send_json_success( [ 'css' => $css ] );
	} else {
		wp_send_json_error( [ 'message' => json_last_error_msg(), 'json_error' => true ] );
	}
}
