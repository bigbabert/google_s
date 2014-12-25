<?php

/**
 * Template Name: Template Blog Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Google_S
 */

get_header(); ?>
<?php // WP_Query arguments
$args = array (
	'pagination'             => true
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts($args) ) {
	while ( $query->have_posts() ) {
		$query->the_post();
                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */                
		get_template_part( 'content-blog', get_post_format() );
	}
     google_s_paging_nav();
} else {
	get_template_part( 'content', 'none' );
}

// Restore original Post Data
wp_reset_postdata();
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
