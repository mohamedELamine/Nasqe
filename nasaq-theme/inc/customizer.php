<?php
/**
 * Customizer Settings
 *
 * @package Nasaq
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Customizer Settings
 */
function nasaq_customize_register( $wp_customize ) {

	// Add Nasaq Settings Section
	$wp_customize->add_section( 'nasaq_settings', array(
		'title'    => __( 'Nasaq Theme Settings', 'nasaq' ),
		'priority' => 30,
	) );

	// Primary Color
	$wp_customize->add_setting( 'nasaq_primary_color', array(
		'default'           => '#1a4d3e',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nasaq_primary_color', array(
		'label'    => __( 'Primary Color', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'settings' => 'nasaq_primary_color',
	) ) );

	// Secondary Color
	$wp_customize->add_setting( 'nasaq_secondary_color', array(
		'default'           => '#ff8c42',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nasaq_secondary_color', array(
		'label'    => __( 'Secondary Color', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'settings' => 'nasaq_secondary_color',
	) ) );

	// Phone Number
	$wp_customize->add_setting( 'nasaq_phone', array(
		'default'           => '+966 50 000 0000',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'nasaq_phone', array(
		'label'    => __( 'Phone Number', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'type'     => 'text',
	) );

	// Email
	$wp_customize->add_setting( 'nasaq_email', array(
		'default'           => 'info@nasaq.sa',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'nasaq_email', array(
		'label'    => __( 'Email Address', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'type'     => 'email',
	) );

	// Address
	$wp_customize->add_setting( 'nasaq_address', array(
		'default'           => 'الرياض، المملكة العربية السعودية',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'nasaq_address', array(
		'label'    => __( 'Address', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'type'     => 'text',
	) );

	// Facebook URL
	$wp_customize->add_setting( 'nasaq_facebook', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'nasaq_facebook', array(
		'label'    => __( 'Facebook URL', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'type'     => 'url',
	) );

	// Twitter URL
	$wp_customize->add_setting( 'nasaq_twitter', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'nasaq_twitter', array(
		'label'    => __( 'Twitter URL', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'type'     => 'url',
	) );

	// Instagram URL
	$wp_customize->add_setting( 'nasaq_instagram', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'nasaq_instagram', array(
		'label'    => __( 'Instagram URL', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'type'     => 'url',
	) );

	// LinkedIn URL
	$wp_customize->add_setting( 'nasaq_linkedin', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'nasaq_linkedin', array(
		'label'    => __( 'LinkedIn URL', 'nasaq' ),
		'section'  => 'nasaq_settings',
		'type'     => 'url',
	) );

	// WhatsApp Number
	$wp_customize->add_setting( 'nasaq_whatsapp', array(
		'default'           => '966500000000',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'nasaq_whatsapp', array(
		'label'       => __( 'WhatsApp Number (without +)', 'nasaq' ),
		'section'     => 'nasaq_settings',
		'type'        => 'text',
		'description' => __( 'Enter number without + or spaces (e.g., 966500000000)', 'nasaq' ),
	) );
}
add_action( 'customize_register', 'nasaq_customize_register' );
