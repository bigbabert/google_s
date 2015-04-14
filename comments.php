<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Google_S
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="clearfix"></div>
<div class="g-medium--full g-wide--full gs-mrg-top"><div class="container">
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<p class="large">
			<?php
				printf( _nx( 'Un Commento su &ldquo;%2$s&rdquo;', '%1$s Commenti su &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'google_s' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</p>

		<?php google_s_comment_nav(); ?>

		<ul class="featured-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php google_s_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'google_s' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

        </div><!-- #comments -->
</div>
<div class="clearfix"></div>
