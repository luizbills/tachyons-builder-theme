<?php
/**
 * Remove "wordpress logo" from admin bar
 *
 * @package az-starter
 */

if ( apply_filters( 'az_remove_admin_bar_wp_logo', true ) ) :

add_action( 'wp_before_admin_bar_render', 'az_remove_admin_bar_wp_logo', 20 );
function az_remove_admin_bar_wp_logo () {
	global $wp_admin_bar;
	$wp_admin_bar->remove_node( 'wp-logo' );
}

endif;
