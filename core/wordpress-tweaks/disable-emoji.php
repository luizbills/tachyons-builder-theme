<?php
/**
 * Disable Emoji Mess
 *
 * @package az-starter
 */

if ( apply_filters( 'az_disable_wp_emojicons', true ) ) :

add_action( 'init', 'az_disable_wp_emojicons' );
function az_disable_wp_emojicons () {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	add_filter( 'tiny_mce_plugins', 'az_disable_emojicons_tinymce' );
	add_filter( 'emoji_svg_url', '__return_false' );
}
function az_disable_emojicons_tinymce ( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

endif;
