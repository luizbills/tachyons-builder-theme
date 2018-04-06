<?php
/**
 * Checks if current page is the login page
 *
 * @package az-starter
 */

if ( ! function_exists( 'is_login_page' ) ) :

function is_login_page () {
	return in_array( $GLOBALS['pagenow'], [ 'wp-login.php', 'wp-register.php' ] );
}

endif;

/**
 * Debug Logger
 */
if ( ! function_exists( 'wp_debug_log' ) ) :

function wp_debug_log ( $data ) {
	if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
		$output = '';
		if ( ! is_array( $data ) ) $data = [ $data ];

		foreach ( $data as $value ) {
			$output .= ( is_string( $value ) ? $value : trim( print_r( $value, true ) ) ) . ' ';
		}

		error_log( $output );
	}
}

endif;