<?php
/**
 * Remove dashboard welcome panel
 *
 * @package az-starter
 */

if ( apply_filters( 'az_remove_welcome_panel', true ) ) :

remove_action( 'welcome_panel', 'wp_welcome_panel' );

endif;