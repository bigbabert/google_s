<?php
/**
 * Google_S Theme Customizer
 *
 * @package Google_S
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function google_s_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        // Logo upload
    $wp_customize->add_section( 'google_s_logo_section' , array(
	    'title'       => __( 'Logo', 'google_s' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'google_s_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'google_s_logo', array(
		'label'    => __( 'Logo', 'google_s' ),
		'section'  => 'google_s_logo_section',
		'settings' => 'google_s_logo',
	) ) );
}
add_action( 'customize_register', 'google_s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function google_s_customize_preview_js() {
	wp_enqueue_script( 'google_s_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'google_s_customize_preview_js' );
