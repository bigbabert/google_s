<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Google_S
 */
?>

<div id="post-<?php the_ID(); ?>" class="container" >
    <div class="clearfix"></div>
	<div class="editorial-header gs_mtop">
			<?php the_title( '<h2 class="editorial-header__subtitle">', '</h2>' ); ?>
    <?php if ( has_post_thumbnail() ) : ?>
    <p class="featured-image-borded"><?php the_post_thumbnail( 'google_s-large' ); ?></p>
<?php endif; ?>
        </div>
    <p class="editorial-header__excerpt "><?php the_content(); ?></p>

    <?php edit_post_link( __( 'Edit', 'google_s' ), '<p><span class="button--secondary">', '</span></p>' ); ?>

</div>

