<?php
/**
 * The template used for displaying page content in page-landing.php
 *
 * @package Alter Theme
 */
?>
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p>
<?php endif; ?>
                   <?php the_content(); ?>
                        
     <?php edit_post_link( __( 'Edit', 'google_s' ), '<p><span class="button--secondary">', '</span></p>' ); ?>
