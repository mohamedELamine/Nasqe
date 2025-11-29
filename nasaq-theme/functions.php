<?php
/**
 * Nasaq Classic Theme Functions
 *
 * @package Nasaq
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Setup
 */
function nasaq_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'nasaq', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 675, true );

	// Switch default core markup to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Add theme support for selective refresh for widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Register navigation menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nasaq' ),
		'footer'  => __( 'Footer Menu', 'nasaq' ),
	) );

	// Add support for custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'nasaq_setup' );

/**
 * Set the content width in pixels
 */
function nasaq_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nasaq_content_width', 1200 );
}
add_action( 'after_setup_theme', 'nasaq_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function nasaq_scripts() {
	// Google Fonts - Cairo
	wp_enqueue_style(
		'nasaq-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap',
		array(),
		null
	);

	// Main stylesheet
	wp_enqueue_style(
		'nasaq-main-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/main.css' )
	);

	// Main JavaScript
	wp_enqueue_script(
		'nasaq-main-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'jquery' ),
		filemtime( get_template_directory() . '/assets/js/main.js' ),
		true
	);

	// Pass data to JavaScript
	wp_localize_script( 'nasaq-main-script', 'nasaqData', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'nasaq-nonce' ),
	) );

	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nasaq_scripts' );

/**
 * Include required files
 */
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Add body classes for RTL support
 */
function nasaq_body_classes( $classes ) {
	if ( is_rtl() ) {
		$classes[] = 'rtl';
	}

	if ( is_front_page() ) {
		$classes[] = 'home-page';
	}

	return $classes;
}
add_filter( 'body_class', 'nasaq_body_classes' );

/**
 * Custom excerpt length
 */
function nasaq_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'nasaq_excerpt_length' );

/**
 * Custom excerpt more
 */
function nasaq_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'nasaq_excerpt_more' );

/**
 * Add inline styles for customizer colors
 */
function nasaq_customizer_css() {
	$primary_color = get_theme_mod( 'nasaq_primary_color', '#1a4d3e' );
	$secondary_color = get_theme_mod( 'nasaq_secondary_color', '#ff8c42' );
	?>
	<style type="text/css">
		:root {
			--primary-color: <?php echo esc_attr( $primary_color ); ?>;
			--secondary-color: <?php echo esc_attr( $secondary_color ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'nasaq_customizer_css' );
