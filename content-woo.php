<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Google_S
 */
?>
<div id="post-<?php the_ID(); ?>" >
    <div class="container">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
    </div>
    <p class="editorial-header__excerpt "><?php woocommerce_content(); ?></p>
			
			<div class="g-medium--1 g-medium--last g-wide--2">
	<p class="editorial-header__excerpt g--half g--centered">
    <?php edit_post_link( __( 'Edit', 'google_s' ), '<p><span class="button--secondary">', '</span></p>' ); ?>
	</p<!-- .entry-footer -->
                        </div>
</div>

