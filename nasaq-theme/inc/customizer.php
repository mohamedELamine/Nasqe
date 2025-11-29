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

	// ========================================
	// Typography Section
	// ========================================
	$wp_customize->add_section( 'nasaq_typography', array(
		'title'       => __( 'Typography (الخطوط)', 'nasaq' ),
		'priority'    => 35,
		'description' => __( 'تخصيص الخطوط وأحجامها في القالب', 'nasaq' ),
	) );

	// Font Family Selection
	$wp_customize->add_setting( 'nasaq_font_family', array(
		'default'           => 'Cairo',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'nasaq_font_family', array(
		'label'       => __( 'الخط الأساسي (Font Family)', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'select',
		'choices'     => array(
			'Cairo'          => 'Cairo - القاهرة',
			'Tajawal'        => 'Tajawal - تَجَوَّل',
			'Almarai'        => 'Almarai - المرعي',
			'Noto Sans Arabic' => 'Noto Sans Arabic',
			'IBM Plex Sans Arabic' => 'IBM Plex Sans Arabic',
			'Amiri'          => 'Amiri - أميري',
			'Lalezar'        => 'Lalezar - لالیزار',
			'Harmattan'      => 'Harmattan - هرمتن',
			'Changa'         => 'Changa - چنگہ',
			'Reem Kufi'      => 'Reem Kufi - ريم كوفي',
		),
		'description' => __( 'اختر الخط العربي المستخدم في الموقع', 'nasaq' ),
	) );

	// Base Font Size
	$wp_customize->add_setting( 'nasaq_base_font_size', array(
		'default'           => '16',
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'nasaq_base_font_size', array(
		'label'       => __( 'حجم الخط الأساسي (Base Font Size)', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 12,
			'max'  => 22,
			'step' => 1,
		),
		'description' => __( 'الحجم الافتراضي: 16px', 'nasaq' ),
	) );

	// H1 Font Size
	$wp_customize->add_setting( 'nasaq_h1_font_size', array(
		'default'           => '48',
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'nasaq_h1_font_size', array(
		'label'       => __( 'حجم عنوان H1', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 24,
			'max'  => 72,
			'step' => 2,
		),
		'description' => __( 'الحجم الافتراضي: 48px', 'nasaq' ),
	) );

	// H2 Font Size
	$wp_customize->add_setting( 'nasaq_h2_font_size', array(
		'default'           => '40',
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'nasaq_h2_font_size', array(
		'label'       => __( 'حجم عنوان H2', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 20,
			'max'  => 60,
			'step' => 2,
		),
		'description' => __( 'الحجم الافتراضي: 40px', 'nasaq' ),
	) );

	// H3 Font Size
	$wp_customize->add_setting( 'nasaq_h3_font_size', array(
		'default'           => '32',
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'nasaq_h3_font_size', array(
		'label'       => __( 'حجم عنوان H3', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 18,
			'max'  => 48,
			'step' => 2,
		),
		'description' => __( 'الحجم الافتراضي: 32px', 'nasaq' ),
	) );

	// Line Height
	$wp_customize->add_setting( 'nasaq_line_height', array(
		'default'           => '1.8',
		'sanitize_callback' => 'nasaq_sanitize_float',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'nasaq_line_height', array(
		'label'       => __( 'ارتفاع السطر (Line Height)', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 1.2,
			'max'  => 2.5,
			'step' => 0.1,
		),
		'description' => __( 'المسافة بين الأسطر - الافتراضي: 1.8', 'nasaq' ),
	) );

	// Font Weight for Headings
	$wp_customize->add_setting( 'nasaq_heading_font_weight', array(
		'default'           => '700',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'nasaq_heading_font_weight', array(
		'label'       => __( 'وزن خط العناوين (Heading Font Weight)', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'select',
		'choices'     => array(
			'400' => __( 'عادي (Normal - 400)', 'nasaq' ),
			'500' => __( 'متوسط (Medium - 500)', 'nasaq' ),
			'600' => __( 'نصف عريض (Semi Bold - 600)', 'nasaq' ),
			'700' => __( 'عريض (Bold - 700)', 'nasaq' ),
			'800' => __( 'عريض جداً (Extra Bold - 800)', 'nasaq' ),
		),
	) );

	// Font Weight for Body
	$wp_customize->add_setting( 'nasaq_body_font_weight', array(
		'default'           => '400',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'nasaq_body_font_weight', array(
		'label'       => __( 'وزن خط المحتوى (Body Font Weight)', 'nasaq' ),
		'section'     => 'nasaq_typography',
		'type'        => 'select',
		'choices'     => array(
			'300' => __( 'خفيف (Light - 300)', 'nasaq' ),
			'400' => __( 'عادي (Normal - 400)', 'nasaq' ),
			'500' => __( 'متوسط (Medium - 500)', 'nasaq' ),
			'600' => __( 'نصف عريض (Semi Bold - 600)', 'nasaq' ),
		),
	) );
}
add_action( 'customize_register', 'nasaq_customize_register' );

/**
 * Sanitize Float Values
 */
function nasaq_sanitize_float( $input ) {
	return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
}

/**
 * Output Custom CSS for Typography
 */
function nasaq_typography_css() {
	// Get font family
	$font_family = get_theme_mod( 'nasaq_font_family', 'Cairo' );

	// Get font sizes
	$base_font_size = get_theme_mod( 'nasaq_base_font_size', 16 );
	$h1_font_size = get_theme_mod( 'nasaq_h1_font_size', 48 );
	$h2_font_size = get_theme_mod( 'nasaq_h2_font_size', 40 );
	$h3_font_size = get_theme_mod( 'nasaq_h3_font_size', 32 );

	// Get line height
	$line_height = get_theme_mod( 'nasaq_line_height', 1.8 );

	// Get font weights
	$heading_weight = get_theme_mod( 'nasaq_heading_font_weight', '700' );
	$body_weight = get_theme_mod( 'nasaq_body_font_weight', '400' );

	// Get colors
	$primary_color = get_theme_mod( 'nasaq_primary_color', '#1a4d3e' );
	$secondary_color = get_theme_mod( 'nasaq_secondary_color', '#ff8c42' );

	?>
	<style type="text/css">
		:root {
			--font-family: '<?php echo esc_attr( $font_family ); ?>', sans-serif;
			--base-font-size: <?php echo absint( $base_font_size ); ?>px;
			--h1-font-size: <?php echo absint( $h1_font_size ); ?>px;
			--h2-font-size: <?php echo absint( $h2_font_size ); ?>px;
			--h3-font-size: <?php echo absint( $h3_font_size ); ?>px;
			--line-height: <?php echo esc_attr( $line_height ); ?>;
			--heading-weight: <?php echo esc_attr( $heading_weight ); ?>;
			--body-weight: <?php echo esc_attr( $body_weight ); ?>;
			--primary-color: <?php echo esc_attr( $primary_color ); ?>;
			--secondary-color: <?php echo esc_attr( $secondary_color ); ?>;
		}

		body {
			font-family: var(--font-family);
			font-size: var(--base-font-size);
			line-height: var(--line-height);
			font-weight: var(--body-weight);
		}

		h1, h2, h3, h4, h5, h6 {
			font-weight: var(--heading-weight);
		}

		h1, .hero-title {
			font-size: var(--h1-font-size);
		}

		h2, .section-title {
			font-size: var(--h2-font-size);
		}

		h3, .service-title, .step-title {
			font-size: var(--h3-font-size);
		}

		/* Apply primary color */
		.btn-primary,
		.section-badge {
			background: var(--primary-color);
		}

		/* Apply secondary color */
		.btn-secondary {
			background: var(--secondary-color);
		}
	</style>
	<?php
}
add_action( 'wp_head', 'nasaq_typography_css' );
