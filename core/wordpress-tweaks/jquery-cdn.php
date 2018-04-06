<?php
/**
 * Use jquery from a CDN
 *
 * @package az-starter
 */

if ( apply_filters( 'az_jquery_cdn', true ) ) :

add_action( 'init', 'az_jquery_cdn' );
function az_jquery_cdn () {
	if ( ! is_admin() && ! is_login_page() ) {
		$jquery_version = apply_filters( 'az_jquery_cdn_version', '3.3.1' );

		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'jquery-core' );

		wp_register_script( 'jquery', false, array( 'jquery-core' ), $jquery_version );
		wp_register_script( 'jquery-core', "https://ajax.googleapis.com/ajax/libs/jquery/$jquery_version/jquery.min.js", false, $jquery_version );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-core' );
	}
}

endif;