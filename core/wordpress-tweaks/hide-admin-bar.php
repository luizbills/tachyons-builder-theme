<?php
/**
 * Show admin bar for admin users only
 *
 * @package az-starter
 */

if ( apply_filters( 'az_hide_admin_bar_for_nonadmin_users', true ) ) :

add_filter( 'show_admin_bar', 'az_hide_admin_bar_for_nonadmin_users' );
function az_hide_admin_bar_for_nonadmin_users ( $content ) {
	if ( ! current_user_can('administrator') ) {
		return false;
	}
	return $content;
}

endif;