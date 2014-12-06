<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Alter Theme
 */
?>

<div id="post-<?php the_ID(); ?>" >
	<div class="editorial-header">
			<?php the_title( '<h2 class="editorial-header__subtitle">', '</h2>' ); ?>
        
                        <ol class="list-anchor xlarge"><?php the_meta('meta-textarea'); ?></ol>
<p class="g-medium--full g-wide--full featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p>
	</div>
    <p class="editorial-header__excerpt "><?php the_content(); ?></p>
			
			<div class="g-medium--1 g-medium--last g-wide--2">
	<p class="editorial-header__excerpt g--half g--centered">
		<?php edit_post_link( __( 'Edit', 'google_s' ), '<span class="edit-link">', '</span>' ); ?>
	</p<!-- .entry-footer -->
	<div  class="g-medium--full g-wide--full bordered"></div>
	<div class="g-medium--2 g-medium--push-1 g-medium--last g-wide--3 g-wide--push-1 g-wide--last altercomments">


        </div>
        <main>