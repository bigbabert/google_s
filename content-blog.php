<?php
/**
 * @package Google_S
 */
?>      

<article style="border-bottom: 1px solid #ccc;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="editorial-header">
			<div  class="container" >

			<h1 class="tag editorial-header__title">		
	    <?php if ( 'post' == get_post_type() ) : ?>
			<?php google_s_posted_on(); ?>
		<?php endif; ?>
			</h1>
<?php the_title( sprintf( ' <h2 class="editorial-header__subtitle"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
 <?php if ( has_post_format( 'quote' ) ) : ?>
<section class="styleguide__quote"><div class="quote"><blockquote class="quote__content g-wide--push-1 g-wide--pull-1 g-medium--push-1">
	<?php the_content(); ?>
	</blockquote></div></section><!-- .entry-content -->
<?php elseif ( has_post_format( 'video' ) || has_post_format( 'audio' )) : ?>
                  <p styleclass="editorial-header__excerpt "><?php the_content(); ?></p>
                  <!-- .entry-content -->
<?php elseif ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>"><p class="image-borded"><?php the_post_thumbnail( 'large' ); ?></p></a>
                  <p styleclass="editorial-header__excerpt "><?php the_excerpt(); ?></p>
                  <!-- .entry-content -->
                  <?php elseif ( post_password_required() ) : ?>
                 <?php  get_the_password_form(); ?>
                  <!-- .entry-content -->
               <?php else : ?>
                 <p styleclass="editorial-header__excerpt "><?php the_excerpt(); ?></p>
                  <!-- .entry-content -->
 <?php endif; ?>
<br><a class="button--primary pull-right" href="<?php the_permalink(); ?>"> Read the full post</a>
                                </div>
                    </div>
  
</article>