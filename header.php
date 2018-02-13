<?php
/**
 * The template for displaying the header
 *
 * untheme - a simple, concise WordPress theme for developers
 * by Tania Rascia
 *
 */
?><!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>