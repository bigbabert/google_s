<?php
/**
 * @package Google_S
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<h1 class="tag editorial-header__title">
			<?php google_s_posted_on(); ?>
		</h1><!-- .entry-meta -->
	</header><!-- .entry-header -->
<?php if ( get_post_meta( get_the_ID(), 'meta-textarea', true ) ) : ?>
<p class="editorial-header__excerpt "><ol class="list-anchor list-large"><?php the_meta('meta-textarea'); ?></ol></p>
<?php endif; ?>
<p class="featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p>
	<div class="entry-content">
		<p class="editorial-header__excerpt "><?php the_content(); ?></p>

	</div><!-- .entry-content -->
    <div  class="container nav-container" >
	<p class="editorial-header__excerpt ">	<?php
			wp_link_pages( array(
				'before' => '<div class="article-nav">' . __( 'Pages:', 'google_s' ),
				'after'  => '</div>',
			) );
			?>
        </p>
    </div>
	<footer class="entry-footer">
		<?php google_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
