<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Google_S
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
<div <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>class="g-medium--full g-wide--full tophome"<?php else : ?>class="g-medium--full g-wide--full tophome"<?php endif; ?>>
	<div class="highlight-module   highlight-module--remember g-medium--full g-wide--full ">
		<div class="highlight-module__container g-medium--full g-wide--full">
			<div class="highlight-module__content  g--half g--centered ">
				<p class="highlight-module__title small-text"><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></p>
				<p class="small">
					<?php if ( 'post' == get_post_type() ) : ?>
					<?php google_s_posted_on(); ?>
		            <?php endif; ?>
			    </p>
<?php if ( has_post_thumbnail() ) : ?>
					<p class="xlarge">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php the_post_thumbnail(); ?>
	</a>
					</p>
					<?php else : ?>
					<div class="xlarge"><?php the_excerpt(); ?></p> 			
<?php endif; ?>
			<div class="xlarge"><p><a href="<?php the_permalink(); ?>" class="button--primary">Full Content</a></p>
				<p class="medium"> <?php google_s_entry_footer(); ?></p> 
			</div>	
		</div>
	
	
</article><!-- #post-## -->
