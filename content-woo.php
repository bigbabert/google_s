<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Google_S
 */
?>

<div id="post-<?php the_ID(); ?>" >
    <p class="editorial-header__excerpt "><?php woocommerce_content(); ?></p>
			
			<div class="g-medium--1 g-medium--last g-wide--2">
	<p class="editorial-header__excerpt g--half g--centered">
		<?php edit_post_link( __( 'Edit', 'google_s' ), '<span class="edit-link">', '</span>' ); ?>
	</p<!-- .entry-footer -->
	<div class="g-medium--2 g-medium--push-1 g-medium--last g-wide--3 g-wide--push-1 g-wide--last altercomments">

