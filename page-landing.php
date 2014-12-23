<?php
/**
 * Template Name: Template Landing Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Google_s
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page-landing' ); ?>

			<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
