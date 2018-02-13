<?php
/**
 * The main template file
 *
 * untheme - a WordPress theme for developers
 * by Tania Rascia
 *
 * @package untheme
 */

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		the_posts_pagination( array(
			'prev_text' => __( 'Previous page' ),
			'next_text' => __( 'Next page' ),
		) );

	endif; 
	?>

	<?php get_sidebar(); ?>
	<?php get_footer(); ?>