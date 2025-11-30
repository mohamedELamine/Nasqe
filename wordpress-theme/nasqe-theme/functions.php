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
 * تحميل الملفات الإضافية
 */
require_once get_template_directory() . '/inc/demo-importer.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/widgets.php';

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

    // تحميل ملف الأنيميشن والتأثيرات
    wp_enqueue_style('nasqe-animations', get_template_directory_uri() . '/assets/css/animations.css', array(), '1.0.0');

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
 * تسجيل Custom Post Type - الأعمال (Portfolio)
 */
function nasqe_register_portfolio_post_type() {
    $labels = array(
        'name'                  => _x('الأعمال', 'Post type general name', 'nasqe'),
        'singular_name'         => _x('عمل', 'Post type singular name', 'nasqe'),
        'menu_name'             => _x('الأعمال', 'Admin Menu text', 'nasqe'),
        'name_admin_bar'        => _x('عمل', 'Add New on Toolbar', 'nasqe'),
        'add_new'               => __('إضافة عمل جديد', 'nasqe'),
        'add_new_item'          => __('إضافة عمل جديد', 'nasqe'),
        'new_item'              => __('عمل جديد', 'nasqe'),
        'edit_item'             => __('تحرير العمل', 'nasqe'),
        'view_item'             => __('عرض العمل', 'nasqe'),
        'all_items'             => __('كل الأعمال', 'nasqe'),
        'search_items'          => __('البحث في الأعمال', 'nasqe'),
        'parent_item_colon'     => __('الأعمال الأصلية:', 'nasqe'),
        'not_found'             => __('لم يتم العثور على أعمال', 'nasqe'),
        'not_found_in_trash'    => __('لم يتم العثور على أعمال في المهملات', 'nasqe'),
        'featured_image'        => _x('صورة العمل', 'Overrides the "Featured Image" phrase', 'nasqe'),
        'set_featured_image'    => _x('تعيين صورة العمل', 'Overrides the "Set featured image" phrase', 'nasqe'),
        'remove_featured_image' => _x('إزالة صورة العمل', 'Overrides the "Remove featured image" phrase', 'nasqe'),
        'use_featured_image'    => _x('استخدام كصورة للعمل', 'Overrides the "Use as featured image" phrase', 'nasqe'),
        'archives'              => _x('أرشيف الأعمال', 'The post type archive label used in nav menus', 'nasqe'),
        'insert_into_item'      => _x('إدراج في العمل', 'Overrides the "Insert into post"/"Insert into page" phrase', 'nasqe'),
        'uploaded_to_this_item' => _x('رفع إلى هذا العمل', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase', 'nasqe'),
        'filter_items_list'     => _x('تصفية قائمة الأعمال', 'Screen reader text for the filter links heading on the post type listing screen', 'nasqe'),
        'items_list_navigation' => _x('التنقل في قائمة الأعمال', 'Screen reader text for the pagination heading on the post type listing screen', 'nasqe'),
        'items_list'            => _x('قائمة الأعمال', 'Screen reader text for the items list heading on the post type listing screen', 'nasqe'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'         => array('portfolio_category', 'portfolio_tag'),
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'nasqe_register_portfolio_post_type');

/**
 * تسجيل Taxonomies للأعمال
 */
function nasqe_register_portfolio_taxonomies() {
    // Portfolio Category
    $category_labels = array(
        'name'              => _x('تصنيفات الأعمال', 'taxonomy general name', 'nasqe'),
        'singular_name'     => _x('تصنيف', 'taxonomy singular name', 'nasqe'),
        'search_items'      => __('البحث في التصنيفات', 'nasqe'),
        'all_items'         => __('كل التصنيفات', 'nasqe'),
        'parent_item'       => __('التصنيف الأصلي', 'nasqe'),
        'parent_item_colon' => __('التصنيف الأصلي:', 'nasqe'),
        'edit_item'         => __('تحرير التصنيف', 'nasqe'),
        'update_item'       => __('تحديث التصنيف', 'nasqe'),
        'add_new_item'      => __('إضافة تصنيف جديد', 'nasqe'),
        'new_item_name'     => __('اسم التصنيف الجديد', 'nasqe'),
        'menu_name'         => __('التصنيفات', 'nasqe'),
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-category'),
    );

    register_taxonomy('portfolio_category', array('portfolio'), $category_args);

    // Portfolio Tags
    $tag_labels = array(
        'name'                       => _x('وسوم الأعمال', 'taxonomy general name', 'nasqe'),
        'singular_name'              => _x('وسم', 'taxonomy singular name', 'nasqe'),
        'search_items'               => __('البحث في الوسوم', 'nasqe'),
        'popular_items'              => __('الوسوم الشائعة', 'nasqe'),
        'all_items'                  => __('كل الوسوم', 'nasqe'),
        'edit_item'                  => __('تحرير الوسم', 'nasqe'),
        'update_item'                => __('تحديث الوسم', 'nasqe'),
        'add_new_item'               => __('إضافة وسم جديد', 'nasqe'),
        'new_item_name'              => __('اسم الوسم الجديد', 'nasqe'),
        'separate_items_with_commas' => __('افصل الوسوم بفواصل', 'nasqe'),
        'add_or_remove_items'        => __('إضافة أو إزالة وسوم', 'nasqe'),
        'choose_from_most_used'      => __('اختر من الوسوم الأكثر استخداماً', 'nasqe'),
        'not_found'                  => __('لم يتم العثور على وسوم', 'nasqe'),
        'menu_name'                  => __('الوسوم', 'nasqe'),
    );

    $tag_args = array(
        'hierarchical'      => false,
        'labels'            => $tag_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-tag'),
    );

    register_taxonomy('portfolio_tag', array('portfolio'), $tag_args);
}
add_action('init', 'nasqe_register_portfolio_taxonomies');

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

/**
 * إضافة دعم WooCommerce
 */
function nasqe_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'nasqe_add_woocommerce_support');

/**
 * تخصيص عدد المنتجات في الصفحة
 */
function nasqe_woocommerce_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'nasqe_woocommerce_products_per_page', 20);

/**
 * تخصيص عدد الأعمدة في WooCommerce
 */
function nasqe_woocommerce_loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'nasqe_woocommerce_loop_columns');

/**
 * تخصيص عدد المنتجات المرتبطة
 */
function nasqe_related_products_args($args) {
    $args['posts_per_page'] = 3;
    $args['columns'] = 3;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'nasqe_related_products_args');

/**
 * إضافة wrapper حول محتوى WooCommerce
 */
function nasqe_woocommerce_wrapper_start() {
    echo '<main class="site-main woocommerce-wrapper" role="main">';
}
add_action('woocommerce_before_main_content', 'nasqe_woocommerce_wrapper_start', 10);

function nasqe_woocommerce_wrapper_end() {
    echo '</main>';
}
add_action('woocommerce_after_main_content', 'nasqe_woocommerce_wrapper_end', 10);

/**
 * إزالة sidebar الافتراضي من WooCommerce
 */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * تخصيص زر "أضف إلى السلة"
 */
function nasqe_woocommerce_add_to_cart_text($text) {
    if (is_singular('product')) {
        return __('أضف إلى السلة', 'nasqe');
    }
    return __('اشتر الآن', 'nasqe');
}
add_filter('woocommerce_product_single_add_to_cart_text', 'nasqe_woocommerce_add_to_cart_text');
add_filter('woocommerce_product_add_to_cart_text', 'nasqe_woocommerce_add_to_cart_text');
