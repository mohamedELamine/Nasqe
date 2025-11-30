<?php
/**
 * قالب نسق - Functions and definitions
 *
 * @package Nasqe
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * إعداد القالب
 */
function nasqe_theme_setup() {
    // إضافة دعم ترجمة القالب
    load_theme_textdomain('nasqe', get_template_directory() . '/languages');

    // إضافة دعم RSS feeds
    add_theme_support('automatic-feed-links');

    // إضافة دعم العنوان الديناميكي
    add_theme_support('title-tag');

    // إضافة دعم الصور المميزة
    add_theme_support('post-thumbnails');

    // إضافة دعم HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // إضافة دعم Block Editor
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    // إضافة دعم editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // إضافة دعم الشعار المخصص
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // تسجيل قوائم التنقل
    register_nav_menus(array(
        'primary' => __('القائمة الرئيسية', 'nasqe'),
        'footer'  => __('قائمة الفوتر', 'nasqe'),
    ));
}
add_action('after_setup_theme', 'nasqe_theme_setup');

/**
 * تسجيل وتحميل الأنماط والسكربتات
 */
function nasqe_enqueue_scripts() {
    // تحميل ملف الأنماط الرئيسي
    wp_enqueue_style('nasqe-style', get_stylesheet_uri(), array(), '1.0.0');

    // تحميل ملف الأنماط المخصص
    wp_enqueue_style('nasqe-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0');

    // تحميل السكربتات
    wp_enqueue_script('nasqe-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);

    // إضافة متغيرات لـ JavaScript
    wp_localize_script('nasqe-main', 'nasqeData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('nasqe-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'nasqe_enqueue_scripts');

/**
 * تسجيل Block Patterns
 */
function nasqe_register_block_patterns() {
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'nasqe',
            array('label' => __('نسق', 'nasqe'))
        );
    }
}
add_action('init', 'nasqe_register_block_patterns');

/**
 * تحسين الأداء - إزالة السكربتات غير الضرورية
 */
function nasqe_optimize_performance() {
    // إزالة emoji script
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'nasqe_optimize_performance');

/**
 * إضافة دعم SVG
 */
function nasqe_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'nasqe_mime_types');

/**
 * تخصيص طول المقتطف
 */
function nasqe_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'nasqe_excerpt_length');

/**
 * تخصيص نهاية المقتطف
 */
function nasqe_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'nasqe_excerpt_more');

/**
 * إضافة أحجام صور مخصصة
 */
function nasqe_custom_image_sizes() {
    add_image_size('nasqe-hero', 1200, 800, true);
    add_image_size('nasqe-portfolio', 800, 600, true);
    add_image_size('nasqe-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'nasqe_custom_image_sizes');

/**
 * تحسين SEO - إضافة meta tags
 */
function nasqe_add_meta_tags() {
    if (is_singular()) {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
        echo '<meta name="theme-color" content="#1a4d3e">' . "\n";
    }
}
add_action('wp_head', 'nasqe_add_meta_tags', 1);
