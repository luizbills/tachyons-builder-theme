<?php
/**
 * Hide WordPress Update Nag to All But Admins
 *
 * @package az-starter
 */

if ( apply_filters( 'az_hide_update_notice', true ) ) :

add_action( 'admin_head', 'az_hide_update_notice', 1 );
function az_hide_update_notice () {
	if ( ! current_user_can( 'update_core' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}

endif;
