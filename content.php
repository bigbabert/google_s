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
<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><p class="featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p></a>
 <?php endif; ?>
                  <p styleclass="editorial-header__excerpt "><?php the_excerpt(); ?></p>
                  
<br><a class="button--primary pull-right" href="<?php the_permalink(); ?>"> Read the full post</a>
                                </div>
                    </div>
    <div  class="container" >
	<p class="editorial-header__excerpt ">	<?php
			wp_link_pages( array(
				'before' => '<div class="article-nav">' . __( 'Pages:', 'google_s' ),
				'after'  => '</div>',
			) );
			?>
        </p>
    </div>
		
		
</article>