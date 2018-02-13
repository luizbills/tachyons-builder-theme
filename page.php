<?php
/**
 * The template for displaying pages
 *
 * untheme - a WordPress theme for developers
 * by Tania Rascia
 *
 */

get_header(); ?>

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

	endwhile; 
	?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>