<?php
/**
 * Remove Query String from scripts (javaScript and CSS)
 *
 * @package az-starter
 */

if ( apply_filters( 'az_remove_query_string_from_scripts', true ) ) :

add_filter( 'style_loader_src', 'az_remove_query_string_from_scripts', 10, 2 );
add_filter( 'script_loader_src', 'az_remove_query_string_from_scripts', 10, 2 );
function az_remove_query_string_from_scripts ( $src ) {
	if( strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}

endif;