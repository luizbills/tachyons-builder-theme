<?php
/**
 * Disable wp embed
 *
 * @package az-starter
*/

if ( apply_filters( 'az_disable_wp_embed', true ) ) :

add_action( 'wp_footer', 'az_disable_wp_embed' );
function az_disable_wp_embed (){
	wp_dequeue_script( 'wp-embed' );
}

endif;
