<?php
/**
 * Remove some Dashboard Widgets
 *
 * @package az-starter
 */

if ( apply_filters( 'az_remove_dashboard_widgets', true ) ) :

add_action( 'admin_init', 'az_remove_dashboard_widgets' );
function az_remove_dashboard_widgets () {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}

endif;