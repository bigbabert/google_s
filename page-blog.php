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
<?php // Display blog posts on any page @ http://m0n.co/l
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<?php get_template_part( 'content-blog', get_post_format() ); ?>

		<?php endwhile; ?>
		<?php if ($paged > 1) { ?>
<div class="container nav-container">
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'google_s' ); ?></h1>
		<div class="nav-links">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'google_s' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'google_s' ) ); ?></div>
</div><!-- .nav-links -->
	</nav><!-- .navigation -->
</div>
		<?php } else { ?>
<div class="container nav-container">
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'google_s' ); ?></h1>
		<div class="nav-links">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'google_s' ) ); ?></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
</div>

		<?php } ?>

		<?php wp_reset_postdata(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>