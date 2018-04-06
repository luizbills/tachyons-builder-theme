<?php
/**
 * Change admin footer text
 *
 * @package az-starter
 */

if ( apply_filters( 'az_custom_admin_footer_text', true ) ) :

add_filter( 'admin_footer_text', 'az_custom_admin_footer_text' );
function az_custom_admin_footer_text () {
	$text_template = '&copy; %s %s · All Rights Reserved.';
	$text = sprintf( $text_template, date('Y'), get_bloginfo('name') );
	echo apply_filters( 'az_admin_footer_text', $text );
}

endif;
