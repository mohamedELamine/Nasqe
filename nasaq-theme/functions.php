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
	// Google Fonts - Dynamic font loading based on Customizer selection
	$font_family = get_theme_mod( 'nasaq_font_family', 'Cairo' );
	$font_url = nasaq_get_google_font_url( $font_family );

	if ( $font_url ) {
		wp_enqueue_style(
			'nasaq-google-fonts',
			$font_url,
			array(),
			null
		);
	}

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
 * Get Google Font URL for selected font
 */
function nasaq_get_google_font_url( $font_family ) {
	$fonts_urls = array(
		'Cairo'                => 'https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap',
		'Tajawal'              => 'https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap',
		'Almarai'              => 'https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap',
		'Noto Sans Arabic'     => 'https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700;800&display=swap',
		'IBM Plex Sans Arabic' => 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap',
		'Amiri'                => 'https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap',
		'Lalezar'              => 'https://fonts.googleapis.com/css2?family=Lalezar&display=swap',
		'Harmattan'            => 'https://fonts.googleapis.com/css2?family=Harmattan:wght@400;700&display=swap',
		'Changa'               => 'https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600;700;800&display=swap',
		'Reem Kufi'            => 'https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400;500;600;700&display=swap',
	);

	return isset( $fonts_urls[ $font_family ] ) ? $fonts_urls[ $font_family ] : $fonts_urls['Cairo'];
}

/**
 * Include required files
 */
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/demo-content.php';

/**
 * Allow Upload of Font Files (woff, woff2, ttf, otf)
 */
function nasaq_enable_font_upload( $mimes ) {
	$mimes['woff']  = 'font/woff';
	$mimes['woff2'] = 'font/woff2';
	$mimes['ttf']   = 'font/ttf';
	$mimes['otf']   = 'font/otf';
	$mimes['eot']   = 'application/vnd.ms-fontobject';
	return $mimes;
}
add_filter( 'upload_mimes', 'nasaq_enable_font_upload' );

/**
 * Fix mime type check for fonts
 */
function nasaq_fix_font_mime_type_check( $data, $file, $filename, $mimes ) {
	$wp_filetype = wp_check_filetype( $filename, $mimes );
	$ext = $wp_filetype['ext'];
	$type = $wp_filetype['type'];

	if ( $ext && in_array( $ext, array( 'woff', 'woff2', 'ttf', 'otf', 'eot' ) ) ) {
		$data['ext'] = $ext;
		$data['type'] = $type;
	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'nasaq_fix_font_mime_type_check', 10, 4 );

/**
 * Handle Contact Form AJAX Submission
 */
function nasaq_handle_contact_form() {
	// Verify nonce
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'nasaq_contact_form' ) ) {
		wp_send_json_error( array(
			'message' => __( 'خطأ في التحقق الأمني. يرجى تحديث الصفحة والمحاولة مرة أخرى.', 'nasaq' )
		) );
	}

	// Sanitize and validate inputs
	$name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
	$email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

	// Validation
	$errors = array();

	if ( empty( $name ) ) {
		$errors[] = __( 'الاسم مطلوب', 'nasaq' );
	}

	if ( empty( $email ) || ! is_email( $email ) ) {
		$errors[] = __( 'البريد الإلكتروني غير صحيح', 'nasaq' );
	}

	if ( empty( $subject ) ) {
		$errors[] = __( 'الموضوع مطلوب', 'nasaq' );
	}

	if ( empty( $message ) ) {
		$errors[] = __( 'الرسالة مطلوبة', 'nasaq' );
	}

	// Check for errors
	if ( ! empty( $errors ) ) {
		wp_send_json_error( array(
			'message' => implode( '<br>', $errors )
		) );
	}

	// Prepare email
	$admin_email = get_option( 'admin_email' );
	$site_name = get_bloginfo( 'name' );

	$email_subject = sprintf(
		__( '[%s] رسالة جديدة من نموذج التواصل: %s', 'nasaq' ),
		$site_name,
		$subject
	);

	$email_body = sprintf(
		"رسالة جديدة من نموذج التواصل:\n\n" .
		"الاسم: %s\n" .
		"البريد الإلكتروني: %s\n" .
		"رقم الهاتف: %s\n" .
		"الموضوع: %s\n\n" .
		"الرسالة:\n%s\n\n" .
		"---\n" .
		"تم الإرسال من: %s",
		$name,
		$email,
		$phone ? $phone : __( 'غير متوفر', 'nasaq' ),
		$subject,
		$message,
		home_url()
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	// Send email
	$sent = wp_mail( $admin_email, $email_subject, $email_body, $headers );

	if ( $sent ) {
		wp_send_json_success( array(
			'message' => __( 'شكراً لتواصلك معنا! تم إرسال رسالتك بنجاح وسنرد عليك في أقرب وقت.', 'nasaq' )
		) );
	} else {
		wp_send_json_error( array(
			'message' => __( 'عذراً، حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى أو التواصل معنا مباشرة.', 'nasaq' )
		) );
	}
}
add_action( 'wp_ajax_nasaq_contact_form', 'nasaq_handle_contact_form' );
add_action( 'wp_ajax_nopriv_nasaq_contact_form', 'nasaq_handle_contact_form' );

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
