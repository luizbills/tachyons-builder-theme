<?php
/**
 * Disable sidebar meta widget
 *
 * @package az-starter
 */

if ( apply_filters( 'az_disable_meta_widget', true ) ) :

add_action( 'widgets_init', 'az_disable_meta_widget', 20 );
function az_disable_meta_widget () {
	unregister_widget( 'WP_Widget_Meta' );
}

endif;