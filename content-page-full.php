<?php
/**
 * The template used for displaying page content in page-full.php
 *
 * @package Alter Theme
 */
?>

<div id="post-<?php the_ID(); ?>" >
	<div class="editorial-header">
                <div class="container">
                    	<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
			<?php the_title( '<h2 class="editorial-header__subtitle">', '</h2>' ); ?>    
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p>
<?php endif; ?>
    <p class="editorial-header__excerpt "><?php the_content(); ?></p>
			
    <?php edit_post_link( __( 'Edit', 'google_s' ), '<p><span class="button--secondary">', '</span></p>' ); ?>
                </div>
        </div>
</div>

