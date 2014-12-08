<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Google_S
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function google_s_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'google_s_jetpack_setup' );
