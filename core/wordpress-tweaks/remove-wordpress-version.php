<?php
/**
 * Remove WordPress version number in frontend
 *
 * @package az-starter
 */

if ( apply_filters( 'az_remove_wordpress_version', true ) ) :

add_filter( 'the_generator', '__return_empty_string' );

endif;
