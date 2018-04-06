<?php
/**
 * Disable xmlrpc.php
 *
 * @package az-starter
 */

if ( apply_filters( 'az_disable_xmlrpc', true ) ) :

add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

endif;

