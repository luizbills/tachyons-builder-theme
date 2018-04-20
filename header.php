<?php
/**
 * The template for displaying the header
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'az_before_content' ); ?>

	<div id="content" class="sans-serif bg-white overflow-hidden">

		<?php do_action( 'az_inside_content_begin' ); ?>
