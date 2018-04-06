<?php
/**
 * Disable "website field" from comment form
 *
 * @package az-starter
 */

if ( apply_filters( 'az_disable_website_field', true ) ) :

add_filter( 'comment_form_default_fields', 'az_disable_website_field' );
function az_disable_website_field ( $field ) {
	if( isset( $field['url'] ) ) {
		unset( $field['url'] );
	}
	return $field;
}

endif;
