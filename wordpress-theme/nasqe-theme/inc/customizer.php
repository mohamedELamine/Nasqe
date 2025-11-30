<?php
/**
 * Nasqe Theme Customizer
 * إعدادات تخصيص القالب
 *
 * @package Nasqe
 * @version 1.0.0
 */

// منع الوصول المباشر
if (!defined('ABSPATH')) {
    exit;
}

/**
 * تسجيل إعدادات Customizer
 */
function nasqe_customize_register($wp_customize) {

    /**
     * قسم إعدادات العامة
     */
    $wp_customize->add_section('nasqe_general_settings', array(
        'title'    => __('إعدادات نسق العامة', 'nasqe'),
        'priority' => 30,
    ));

    // شعار الموقع
    $wp_customize->add_setting('nasqe_logo_text', array(
        'default'           => 'نسق',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('nasqe_logo_text', array(
        'label'    => __('نص الشعار', 'nasqe'),
        'section'  => 'nasqe_general_settings',
        'type'     => 'text',
        'priority' => 10,
    ));

    // وصف الموقع
    $wp_customize->add_setting('nasqe_tagline', array(
        'default'           => 'حلول رقمية متكاملة',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('nasqe_tagline', array(
        'label'    => __('الوصف', 'nasqe'),
        'section'  => 'nasqe_general_settings',
        'type'     => 'text',
        'priority' => 20,
    ));

    /**
     * قسم معلومات التواصل
     */
    $wp_customize->add_section('nasqe_contact_info', array(
        'title'    => __('معلومات التواصل', 'nasqe'),
        'priority' => 40,
    ));

    // رقم الهاتف
    $wp_customize->add_setting('nasqe_phone', array(
        'default'           => '+966 50 123 4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('nasqe_phone', array(
        'label'    => __('رقم الهاتف', 'nasqe'),
        'section'  => 'nasqe_contact_info',
        'type'     => 'text',
        'priority' => 10,
    ));

    // البريد الإلكتروني
    $wp_customize->add_setting('nasqe_email', array(
        'default'           => 'info@nasqe.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('nasqe_email', array(
        'label'    => __('البريد الإلكتروني', 'nasqe'),
        'section'  => 'nasqe_contact_info',
        'type'     => 'email',
        'priority' => 20,
    ));

    // العنوان
    $wp_customize->add_setting('nasqe_address', array(
        'default'           => 'الرياض، المملكة العربية السعودية',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('nasqe_address', array(
        'label'    => __('العنوان', 'nasqe'),
        'section'  => 'nasqe_contact_info',
        'type'     => 'textarea',
        'priority' => 30,
    ));

    /**
     * قسم روابط التواصل الاجتماعي
     */
    $wp_customize->add_section('nasqe_social_links', array(
        'title'    => __('روابط التواصل الاجتماعي', 'nasqe'),
        'priority' => 50,
    ));

    $social_links = array(
        'facebook'  => 'فيسبوك',
        'twitter'   => 'تويتر',
        'instagram' => 'إنستغرام',
        'linkedin'  => 'لينكد إن',
        'youtube'   => 'يوتيوب',
        'github'    => 'جيتهاب',
    );

    $priority = 10;
    foreach ($social_links as $key => $label) {
        $wp_customize->add_setting("nasqe_social_{$key}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("nasqe_social_{$key}", array(
            'label'    => $label,
            'section'  => 'nasqe_social_links',
            'type'     => 'url',
            'priority' => $priority,
        ));

        $priority += 10;
    }

    /**
     * قسم الألوان المخصصة
     */
    $wp_customize->add_section('nasqe_custom_colors', array(
        'title'    => __('ألوان نسق', 'nasqe'),
        'priority' => 60,
    ));

    // اللون الأخضر الداكن
    $wp_customize->add_setting('nasqe_primary_dark_color', array(
        'default'           => '#1a4d3e',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nasqe_primary_dark_color', array(
        'label'    => __('اللون الأخضر الداكن', 'nasqe'),
        'section'  => 'nasqe_custom_colors',
        'priority' => 10,
    )));

    // اللون الأخضر الرئيسي
    $wp_customize->add_setting('nasqe_primary_color', array(
        'default'           => '#2d6a4f',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nasqe_primary_color', array(
        'label'    => __('اللون الأخضر الرئيسي', 'nasqe'),
        'section'  => 'nasqe_custom_colors',
        'priority' => 20,
    )));

    // اللون البرتقالي
    $wp_customize->add_setting('nasqe_secondary_color', array(
        'default'           => '#ff8c42',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nasqe_secondary_color', array(
        'label'    => __('اللون البرتقالي الثانوي', 'nasqe'),
        'section'  => 'nasqe_custom_colors',
        'priority' => 30,
    )));

    /**
     * قسم إعدادات الصفحة الرئيسية
     */
    $wp_customize->add_section('nasqe_homepage_settings', array(
        'title'    => __('إعدادات الصفحة الرئيسية', 'nasqe'),
        'priority' => 70,
    ));

    // عنوان قسم البطل
    $wp_customize->add_setting('nasqe_hero_title', array(
        'default'           => 'حلول رقمية متكاملة لنجاح أعمالك',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('nasqe_hero_title', array(
        'label'    => __('عنوان قسم البطل', 'nasqe'),
        'section'  => 'nasqe_homepage_settings',
        'type'     => 'text',
        'priority' => 10,
    ));

    // وصف قسم البطل
    $wp_customize->add_setting('nasqe_hero_subtitle', array(
        'default'           => 'نساعدك في بناء حضور رقمي قوي من خلال تصميم مواقع احترافية وتطبيقات ويب متقدمة',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('nasqe_hero_subtitle', array(
        'label'    => __('وصف قسم البطل', 'nasqe'),
        'section'  => 'nasqe_homepage_settings',
        'type'     => 'textarea',
        'priority' => 20,
    ));

    // نص زر الاتصال
    $wp_customize->add_setting('nasqe_hero_button_text', array(
        'default'           => 'ابدأ الآن',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('nasqe_hero_button_text', array(
        'label'    => __('نص زر قسم البطل', 'nasqe'),
        'section'  => 'nasqe_homepage_settings',
        'type'     => 'text',
        'priority' => 30,
    ));

    // رابط زر الاتصال
    $wp_customize->add_setting('nasqe_hero_button_url', array(
        'default'           => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('nasqe_hero_button_url', array(
        'label'    => __('رابط زر قسم البطل', 'nasqe'),
        'section'  => 'nasqe_homepage_settings',
        'type'     => 'url',
        'priority' => 40,
    ));

    /**
     * قسم التذييل
     */
    $wp_customize->add_section('nasqe_footer_settings', array(
        'title'    => __('إعدادات التذييل', 'nasqe'),
        'priority' => 80,
    ));

    // نص حقوق النشر
    $wp_customize->add_setting('nasqe_copyright_text', array(
        'default'           => '© 2024 نسق. جميع الحقوق محفوظة',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('nasqe_copyright_text', array(
        'label'    => __('نص حقوق النشر', 'nasqe'),
        'section'  => 'nasqe_footer_settings',
        'type'     => 'textarea',
        'priority' => 10,
    ));

    // إظهار روابط التواصل في التذييل
    $wp_customize->add_setting('nasqe_show_footer_social', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('nasqe_show_footer_social', array(
        'label'    => __('إظهار روابط التواصل في التذييل', 'nasqe'),
        'section'  => 'nasqe_footer_settings',
        'type'     => 'checkbox',
        'priority' => 20,
    ));
}
add_action('customize_register', 'nasqe_customize_register');

/**
 * تحميل JavaScript للمعاينة المباشرة
 */
function nasqe_customize_preview_js() {
    wp_enqueue_script(
        'nasqe-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-preview.js',
        array('customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'nasqe_customize_preview_js');

/**
 * إضافة CSS مخصص للألوان
 */
function nasqe_customizer_css() {
    $primary_dark = get_theme_mod('nasqe_primary_dark_color', '#1a4d3e');
    $primary      = get_theme_mod('nasqe_primary_color', '#2d6a4f');
    $secondary    = get_theme_mod('nasqe_secondary_color', '#ff8c42');
    ?>
    <style type="text/css">
        :root {
            --wp--preset--color--primary-dark-green: <?php echo esc_attr($primary_dark); ?>;
            --wp--preset--color--primary-green: <?php echo esc_attr($primary); ?>;
            --wp--preset--color--secondary-orange: <?php echo esc_attr($secondary); ?>;
        }

        .has-primary-dark-green-color {
            color: <?php echo esc_attr($primary_dark); ?> !important;
        }

        .has-primary-dark-green-background-color {
            background-color: <?php echo esc_attr($primary_dark); ?> !important;
        }

        .has-primary-green-color {
            color: <?php echo esc_attr($primary); ?> !important;
        }

        .has-primary-green-background-color {
            background-color: <?php echo esc_attr($primary); ?> !important;
        }

        .has-secondary-orange-color {
            color: <?php echo esc_attr($secondary); ?> !important;
        }

        .has-secondary-orange-background-color {
            background-color: <?php echo esc_attr($secondary); ?> !important;
        }

        .wp-block-button__link,
        .button {
            background-color: <?php echo esc_attr($primary_dark); ?>;
        }

        .wp-block-button__link:hover,
        .button:hover {
            background-color: <?php echo esc_attr($primary); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'nasqe_customizer_css');

/**
 * دوال مساعدة للحصول على قيم Customizer
 */
function nasqe_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}
