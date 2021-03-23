<?php

/**
 *  Saturblade Theme Customizer
 *
 * @package Saturblade
 */

function saturblade_customizer( $wp_customize ){
	/*--------------------------------------------------------------------------------*/
	// Slider Section

	$wp_customize->add_section(
		'sec_slider', array(
			'title'			=> __( 'Slider Settings', 'saturblade' ),
			'description'	=> __( 'Slider Section', 'saturblade' )
		)
	);

	// Field 1 - Slider Page Number 1

	$wp_customize->add_setting(
		'set_slider_page1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page1', array(
			'label'			=> __( 'Set slider page 1', 'saturblade' ),
			'description'	=> __( 'Set slider page 1', 'saturblade' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);

	// Field 2 - Slider Button Text Number 1

	$wp_customize->add_setting(
		'set_slider_button_text1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text1', array(
			'label'			=> __( 'Button Text for Page 1', 'saturblade' ),
			'description'	=> __( 'Button Text for Page 1', 'saturblade' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	// Field 3 - Slider Button URL Number 1

	$wp_customize->add_setting(
		'set_slider_button_url1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url1', array(
			'label'			=> __( 'URL for Page 1', 'saturblade' ),
			'description'	=> __( 'URL for Page 1', 'saturblade' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);

	/*---------------------------------------*/

	// Field 4 - Slider Page Number 2

	$wp_customize->add_setting(
		'set_slider_page2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page2', array(
			'label'			=> __( 'Set slider page 2', 'saturblade' ),
			'description'	=> __( 'Set slider page 2', 'saturblade' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);

	// Field 5 - Slider Button Text Number 2

	$wp_customize->add_setting(
		'set_slider_button_text2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text2', array(
			'label'			=> __( 'Button Text for Page 2', 'saturblade' ),
			'description'	=> __( 'Button Text for Page 2', 'saturblade' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	// Field 6 - Slider Button URL Number 2

	$wp_customize->add_setting(
		'set_slider_button_url2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url2', array(
			'label'			=> __( 'URL for Page 2', 'saturblade' ),
			'description'	=> __( 'URL for Page 2', 'saturblade' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);
}
add_action( 'customize_register', 'saturblade_customizer' );