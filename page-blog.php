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


<?php 
        /* The loop: the_post retrieves the content
         * of the new Page you created to list the posts,
         * e.g., an intro describing the posts shown listed on this Page..
         */
     

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            // Change these category SLUGS to suit your use.
              'category_name' => '', 
          'paged' => $paged
        );

        $list_of_posts = new WP_Query( $args );
        ?>
        <?php if ( $list_of_posts->have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					wp_reset_postdata();
				?>

			<?php endwhile; ?>
<div class="container nav-container">
			<?php google_s_paging_nav(); ?>
</div>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
<!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
