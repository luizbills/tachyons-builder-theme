<?php
/**
 * Remove "+ New" from admin bar
 *
 * @package az-starter
 */

if ( apply_filters( 'az_remove_admin_bar_new_content', true ) ) :

add_action( 'wp_before_admin_bar_render', 'az_remove_admin_bar_new_content', 20 );
function az_remove_admin_bar_new_content () {
	global $wp_admin_bar;
	$wp_admin_bar->remove_node( 'new-content' );
}

endif;
