<?php
/**
 * Change admin footer text
 *
 * @package az-starter
 */

if ( apply_filters( 'az_disable_author_search', true ) ) :

add_action( 'wp', 'az_disable_author_search' );
function az_disable_author_search () {
	$disable_author_page = apply_filters( 'az_disable_author_page', true );
	$disable_author_query = apply_filters( 'az_disable_author_query', true );

	global $wp_query;

	if ( $disable_author_query && isset( $_GET['author'] ) ) {
		$wp_query->set_404();
		status_header( 404 );
	} else if ( $disable_author_page && is_author() ) {
		$wp_query->set_404();
		status_header( 404 );
	}
}

endif;