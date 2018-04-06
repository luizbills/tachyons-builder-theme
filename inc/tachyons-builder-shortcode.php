<?php

add_shortcode( 'tachyons_builder', 'tachyons_builder_shortcode_callback' );
function tachyons_builder_shortcode_callback () {
	ob_start();

	get_template_part( 'template-parts/content-builder' );

	return ob_get_clean();
}