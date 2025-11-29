<?php
/**
 * Nasaq Theme Functions
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
function nasaq_theme_setup() {
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

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

	// Add support for responsive embedded content
	add_theme_support( 'responsive-embeds' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Add support for wide and full alignments
	add_theme_support( 'align-wide' );

	// Add support for block styles
	add_theme_support( 'wp-block-styles' );

	// Register navigation menus
	register_nav_menus( array(
		'primary' => __( 'القائمة الرئيسية', 'nasaq' ),
		'footer'  => __( 'قائمة التذييل', 'nasaq' ),
	) );

	// Add support for RTL
	add_theme_support( 'rtl' );
}
add_action( 'after_setup_theme', 'nasaq_theme_setup' );

/**
 * Enqueue Scripts and Styles
 */
function nasaq_enqueue_scripts() {
	// Enqueue Cairo font from Google Fonts
	wp_enqueue_style(
		'nasaq-fonts',
		'https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap',
		array(),
		null
	);

	// Enqueue theme stylesheet
	wp_enqueue_style(
		'nasaq-theme-style',
		get_template_directory_uri() . '/assets/css/theme.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);

	// Enqueue navigation script
	wp_enqueue_script(
		'nasaq-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Add RTL support
	if ( is_rtl() ) {
		wp_enqueue_style(
			'nasaq-rtl',
			get_template_directory_uri() . '/assets/css/rtl.css',
			array( 'nasaq-theme-style' ),
			wp_get_theme()->get( 'Version' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'nasaq_enqueue_scripts' );

/**
 * Register Block Patterns
 */
function nasaq_register_block_patterns() {
	// Register pattern categories
	register_block_pattern_category(
		'nasaq-sections',
		array(
			'label'       => __( 'أقسام نسق', 'nasaq' ),
			'description' => __( 'أقسام مخصصة لموقع نسق', 'nasaq' ),
		)
	);

	// Register patterns from patterns directory
	$pattern_files = array(
		'hero',
		'services',
		'portfolio',
		'process',
		'about',
		'testimonials',
		'pricing',
		'contact',
	);

	foreach ( $pattern_files as $pattern ) {
		$file = get_theme_file_path( 'patterns/' . $pattern . '.php' );
		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
}
add_action( 'init', 'nasaq_register_block_patterns' );

/**
 * Add custom spacing classes
 */
function nasaq_custom_spacing_classes() {
	?>
	<style>
		.section-spacing {
			padding-top: 7.5rem;
			padding-bottom: 7.5rem;
		}

		@media (max-width: 768px) {
			.section-spacing {
				padding-top: 3.5rem;
				padding-bottom: 3.5rem;
			}
		}

		.container-custom {
			max-width: 1280px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 2rem;
			padding-right: 2rem;
		}

		@media (max-width: 768px) {
			.container-custom {
				padding-left: 1.5rem;
				padding-right: 1.5rem;
			}
		}
	</style>
	<?php
}
add_action( 'wp_head', 'nasaq_custom_spacing_classes' );

/**
 * Smooth scroll for anchor links
 */
function nasaq_smooth_scroll_script() {
	?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			document.querySelectorAll('a[href^="#"]').forEach(anchor => {
				anchor.addEventListener('click', function (e) {
					const href = this.getAttribute('href');
					if (href !== '#' && href !== '') {
						e.preventDefault();
						const target = document.querySelector(href);
						if (target) {
							target.scrollIntoView({
								behavior: 'smooth',
								block: 'start'
							});
						}
					}
				});
			});
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'nasaq_smooth_scroll_script' );

/**
 * Custom body classes
 */
function nasaq_body_classes( $classes ) {
	// Add RTL class
	if ( is_rtl() ) {
		$classes[] = 'rtl';
	}

	// Add page-specific classes
	if ( is_front_page() ) {
		$classes[] = 'front-page-template';
	}

	return $classes;
}
add_filter( 'body_class', 'nasaq_body_classes' );

/**
 * Customize excerpt length
 */
function nasaq_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'nasaq_excerpt_length' );

/**
 * Customize excerpt more string
 */
function nasaq_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'nasaq_excerpt_more' );
