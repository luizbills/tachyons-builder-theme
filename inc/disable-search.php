<?php

/**
 * disable search
 */
add_action( 'template_redirect', 'wpb_disable_search' );
function wpb_disable_search () {
    if ( is_search() ) {
        wp_redirect( home_url( '/' ) );
        die;
    }
}