<?php
/**
 * durhamtaxhelp_v2 Theme Customizer
 *
 * @package durhamtaxhelp_v2
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function durhamtaxhelp_v2_customize_register( $wp_customize ) {
	
	//Social Media Section
	$wp_customize->add_section(
	 'underscores_social_media',
	 array(
		'title'		=> 'Social Media',
		'capability'=> 'edit_theme_options',
	 )
	);
	
	//Social Media Setting
	$wp_customize->add_setting(
	 'underscores_facebook_url',
	 array(
		'default' => 'https://www.facebook.com',
		'transport' => 'refresh',
	 )
	);

	//Social Media Control
	$wp_customize->add_control(
	 new WP_Customize_Control(
		$wp_customize,
		'underscores_facebook_url',
		array(
		 'label' => 'Facebook',
		 'type' => 'text',
		 'section' => 'underscores_social_media',
		)
	 )
	);

	//Social Media Setting (Twitter)
	$wp_customize->add_setting(
	 'underscores_twitter_url',
	 array(
		'default' => 'https://www.twitter.com',
		'transport' => 'refresh',
	 )
	);

	//Social Media Control (Twitter)
	$wp_customize->add_control(
	 new WP_Customize_Control(
		$wp_customize,
		'underscores_twitter_url',
		array(
		 'label' => 'Twitter',
		 'type' => 'text',
		 'section' => 'underscores_social_media',
		)
	 )
	);


	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'durhamtaxhelp_v2_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'durhamtaxhelp_v2_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'durhamtaxhelp_v2_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function durhamtaxhelp_v2_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function durhamtaxhelp_v2_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function durhamtaxhelp_v2_customize_preview_js() {
	wp_enqueue_script( 'durhamtaxhelp_v2-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'durhamtaxhelp_v2_customize_preview_js' );
