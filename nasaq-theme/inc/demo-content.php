<?php
/**
 * Demo Content Import
 *
 * @package Nasaq
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Demo Content Admin Menu
 */
function nasaq_demo_content_menu() {
	add_theme_page(
		__( 'استيراد المحتوى التجريبي', 'nasaq' ),
		__( 'محتوى تجريبي', 'nasaq' ),
		'manage_options',
		'nasaq-demo-content',
		'nasaq_demo_content_page'
	);
}
add_action( 'admin_menu', 'nasaq_demo_content_menu' );

/**
 * Demo Content Import Page
 */
function nasaq_demo_content_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'استيراد المحتوى التجريبي - Nasaq Theme', 'nasaq' ); ?></h1>

		<?php
		// Check if demo content was imported
		$demo_imported = get_option( 'nasaq_demo_imported', false );

		if ( isset( $_POST['nasaq_import_demo'] ) && check_admin_referer( 'nasaq_demo_import' ) ) {
			$result = nasaq_import_demo_content();

			if ( $result['success'] ) {
				echo '<div class="notice notice-success is-dismissible"><p>' . esc_html( $result['message'] ) . '</p></div>';
				$demo_imported = true;
			} else {
				echo '<div class="notice notice-error is-dismissible"><p>' . esc_html( $result['message'] ) . '</p></div>';
			}
		}

		if ( isset( $_POST['nasaq_remove_demo'] ) && check_admin_referer( 'nasaq_demo_remove' ) ) {
			$result = nasaq_remove_demo_content();

			if ( $result['success'] ) {
				echo '<div class="notice notice-success is-dismissible"><p>' . esc_html( $result['message'] ) . '</p></div>';
				$demo_imported = false;
			} else {
				echo '<div class="notice notice-error is-dismissible"><p>' . esc_html( $result['message'] ) . '</p></div>';
			}
		}
		?>

		<div class="card" style="max-width: 800px;">
			<h2><?php esc_html_e( 'المحتوى التجريبي', 'nasaq' ); ?></h2>

			<?php if ( ! $demo_imported ) : ?>
				<p><?php esc_html_e( 'استيراد المحتوى التجريبي سيضيف:', 'nasaq' ); ?></p>
				<ul style="list-style: disc; margin-right: 20px;">
					<li>✅ 8 ودجات مخصصة في الصفحة الرئيسية</li>
					<li>✅ قائمة تنقل رئيسية (Hero، الخدمات، الأعمال، من نحن، اتصل بنا)</li>
					<li>✅ قائمة فوتر</li>
					<li>✅ صفحة رئيسية مع المحتوى</li>
					<li>✅ 3 صفحات تجريبية</li>
					<li>✅ 2 مقالات تجريبية</li>
					<li>✅ إعدادات Customizer الافتراضية</li>
				</ul>

				<p><strong style="color: #d63638;">⚠️ تحذير:</strong> <?php esc_html_e( 'سيتم إضافة المحتوى إلى موقعك. يمكنك إزالته لاحقاً باستخدام زر "إزالة المحتوى التجريبي".', 'nasaq' ); ?></p>

				<form method="post" action="">
					<?php wp_nonce_field( 'nasaq_demo_import' ); ?>
					<p>
						<button type="submit" name="nasaq_import_demo" class="button button-primary button-hero">
							<?php esc_html_e( '📥 استيراد المحتوى التجريبي', 'nasaq' ); ?>
						</button>
					</p>
				</form>
			<?php else : ?>
				<div class="notice notice-success inline">
					<p><?php esc_html_e( '✅ تم استيراد المحتوى التجريبي بنجاح!', 'nasaq' ); ?></p>
				</div>

				<p><?php esc_html_e( 'يمكنك الآن:', 'nasaq' ); ?></p>
				<ul style="list-style: disc; margin-right: 20px;">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><?php esc_html_e( 'عرض الموقع', 'nasaq' ); ?></a></li>
					<li><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'تعديل الودجات', 'nasaq' ); ?></a></li>
					<li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'تخصيص المظهر', 'nasaq' ); ?></a></li>
				</ul>

				<hr>

				<h3><?php esc_html_e( 'إزالة المحتوى التجريبي', 'nasaq' ); ?></h3>
				<p><?php esc_html_e( 'سيتم حذف جميع الودجات، الصفحات، والمقالات التجريبية.', 'nasaq' ); ?></p>

				<form method="post" action="" onsubmit="return confirm('هل أنت متأكد من إزالة المحتوى التجريبي؟');">
					<?php wp_nonce_field( 'nasaq_demo_remove' ); ?>
					<p>
						<button type="submit" name="nasaq_remove_demo" class="button button-secondary">
							<?php esc_html_e( '🗑️ إزالة المحتوى التجريبي', 'nasaq' ); ?>
						</button>
					</p>
				</form>
			<?php endif; ?>
		</div>
	</div>
	<?php
}

/**
 * Import Demo Content
 */
function nasaq_import_demo_content() {
	// Create demo pages
	$pages = array(
		array(
			'post_title'   => 'الرئيسية',
			'post_content' => '<!-- wp:paragraph --><p>مرحباً بك في موقع نسق للحلول البرمجية</p><!-- /wp:paragraph -->',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_name'    => 'home',
		),
		array(
			'post_title'   => 'من نحن',
			'post_content' => '<!-- wp:paragraph --><p>نسق للحلول البرمجية هي شركة متخصصة في تطوير المواقع والتطبيقات.</p><!-- /wp:paragraph -->',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_name'    => 'about',
		),
		array(
			'post_title'   => 'خدماتنا',
			'post_content' => '<!-- wp:paragraph --><p>نقدم مجموعة واسعة من الخدمات البرمجية.</p><!-- /wp:paragraph -->',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_name'    => 'services',
		),
		array(
			'post_title'   => 'اتصل بنا',
			'post_content' => '<!-- wp:paragraph --><p>نسعد بتواصلك معنا.</p><!-- /wp:paragraph -->',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_name'    => 'contact',
		),
	);

	$page_ids = array();
	foreach ( $pages as $page ) {
		$page_id = wp_insert_post( $page );
		if ( $page_id ) {
			$page_ids[ $page['post_name'] ] = $page_id;
		}
	}

	// Create demo posts
	$posts = array(
		array(
			'post_title'   => 'أهمية تطوير المواقع في العصر الرقمي',
			'post_content' => 'في عالم يتجه نحو الرقمنة بشكل متسارع، أصبح تطوير المواقع الإلكترونية ضرورة حتمية لأي مشروع تجاري...',
			'post_status'  => 'publish',
			'post_type'    => 'post',
		),
		array(
			'post_title'   => 'كيف تختار الشركة المناسبة لتطوير موقعك',
			'post_content' => 'اختيار الشركة المناسبة لتطوير موقعك هو قرار مهم يؤثر على نجاح مشروعك الرقمي...',
			'post_status'  => 'publish',
			'post_type'    => 'post',
		),
	);

	foreach ( $posts as $post ) {
		wp_insert_post( $post );
	}

	// Set front page
	if ( isset( $page_ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page_ids['home'] );
	}

	// Create primary menu
	$menu_name = 'القائمة الرئيسية';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

		// Add menu items
		$menu_items = array(
			array( 'title' => 'الرئيسية', 'url' => home_url( '/' ), 'anchor' => '' ),
			array( 'title' => 'الخدمات', 'url' => '', 'anchor' => '#services' ),
			array( 'title' => 'الأعمال', 'url' => '', 'anchor' => '#portfolio' ),
			array( 'title' => 'من نحن', 'url' => '', 'anchor' => '#about' ),
			array( 'title' => 'اتصل بنا', 'url' => '', 'anchor' => '#contact' ),
		);

		foreach ( $menu_items as $item ) {
			$url = $item['url'] ? $item['url'] : home_url( '/' ) . $item['anchor'];
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'   => $item['title'],
				'menu-item-url'     => $url,
				'menu-item-status'  => 'publish',
			) );
		}

		// Assign menu to location
		$locations = get_theme_mod( 'nav_menu_locations' );
		$locations['primary'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	// Import widgets
	nasaq_import_demo_widgets();

	// Mark as imported
	update_option( 'nasaq_demo_imported', true );

	return array(
		'success' => true,
		'message' => __( 'تم استيراد المحتوى التجريبي بنجاح! يمكنك الآن معاينة الموقع.', 'nasaq' ),
	);
}

/**
 * Import Demo Widgets
 */
function nasaq_import_demo_widgets() {
	// Hero Section Widget
	$hero_widget = array(
		'title'       => 'نحول أفكارك إلى حلول رقمية مبتكرة',
		'subtitle'    => 'نسق للحلول البرمجية',
		'description' => 'نحن فريق متخصص في تطوير المواقع والتطبيقات البرمجية بأحدث التقنيات',
		'cta1_text'   => 'ابدأ مشروعك',
		'cta1_url'    => '#contact',
		'cta2_text'   => 'تعرف علينا',
		'cta2_url'    => '#about',
		'image'       => '',
	);

	$sidebars_widgets = get_option( 'sidebars_widgets', array() );
	$widget_instances = get_option( 'widget_nasaq_hero_widget', array() );

	// Add hero widget
	$widget_instances[] = $hero_widget;
	$widget_key = array_key_last( $widget_instances );

	if ( ! isset( $sidebars_widgets['hero_section'] ) ) {
		$sidebars_widgets['hero_section'] = array();
	}
	$sidebars_widgets['hero_section'][] = 'nasaq_hero_widget-' . $widget_key;

	update_option( 'widget_nasaq_hero_widget', $widget_instances );

	// Services Widget
	$services_widget = array(
		'title'    => 'خدماتنا المتميزة',
		'subtitle' => 'نقدم حلولاً برمجية شاملة تلبي احتياجات عملك',
	);

	$services_instances = get_option( 'widget_nasaq_services_widget', array() );
	$services_instances[] = $services_widget;
	$services_key = array_key_last( $services_instances );

	if ( ! isset( $sidebars_widgets['services_section'] ) ) {
		$sidebars_widgets['services_section'] = array();
	}
	$sidebars_widgets['services_section'][] = 'nasaq_services_widget-' . $services_key;

	update_option( 'widget_nasaq_services_widget', $services_instances );

	// Portfolio Widget
	$portfolio_widget = array(
		'title'    => 'معرض أعمالنا',
		'subtitle' => 'اطلع على بعض مشاريعنا الناجحة',
	);

	$portfolio_instances = get_option( 'widget_nasaq_portfolio_widget', array() );
	$portfolio_instances[] = $portfolio_widget;
	$portfolio_key = array_key_last( $portfolio_instances );

	if ( ! isset( $sidebars_widgets['portfolio_section'] ) ) {
		$sidebars_widgets['portfolio_section'] = array();
	}
	$sidebars_widgets['portfolio_section'][] = 'nasaq_portfolio_widget-' . $portfolio_key;

	update_option( 'widget_nasaq_portfolio_widget', $portfolio_instances );

	// Process Widget
	$process_widget = array(
		'title'    => 'كيف نعمل معك',
		'subtitle' => 'نتبع منهجية واضحة ومنظمة لضمان نجاح مشروعك',
	);

	$process_instances = get_option( 'widget_nasaq_process_widget', array() );
	$process_instances[] = $process_widget;
	$process_key = array_key_last( $process_instances );

	if ( ! isset( $sidebars_widgets['process_section'] ) ) {
		$sidebars_widgets['process_section'] = array();
	}
	$sidebars_widgets['process_section'][] = 'nasaq_process_widget-' . $process_key;

	update_option( 'widget_nasaq_process_widget', $process_instances );

	// About Widget
	$about_widget = array(
		'title'       => 'من نحن',
		'subtitle'    => 'فريق متخصص من المطورين والمصممين',
		'description' => 'نسق للحلول البرمجية هي شركة رائدة في مجال تطوير المواقع والتطبيقات. نقدم حلولاً مبتكرة تساعد الشركات على النمو والتطور في العالم الرقمي.',
		'image'       => '',
	);

	$about_instances = get_option( 'widget_nasaq_about_widget', array() );
	$about_instances[] = $about_widget;
	$about_key = array_key_last( $about_instances );

	if ( ! isset( $sidebars_widgets['about_section'] ) ) {
		$sidebars_widgets['about_section'] = array();
	}
	$sidebars_widgets['about_section'][] = 'nasaq_about_widget-' . $about_key;

	update_option( 'widget_nasaq_about_widget', $about_instances );

	// Testimonials Widget
	$testimonials_widget = array(
		'title'    => 'آراء عملائنا',
		'subtitle' => 'ماذا يقول عملاؤنا عن خدماتنا',
	);

	$testimonials_instances = get_option( 'widget_nasaq_testimonials_widget', array() );
	$testimonials_instances[] = $testimonials_widget;
	$testimonials_key = array_key_last( $testimonials_instances );

	if ( ! isset( $sidebars_widgets['testimonials_section'] ) ) {
		$sidebars_widgets['testimonials_section'] = array();
	}
	$sidebars_widgets['testimonials_section'][] = 'nasaq_testimonials_widget-' . $testimonials_key;

	update_option( 'widget_nasaq_testimonials_widget', $testimonials_instances );

	// Pricing Widget
	$pricing_widget = array(
		'title'    => 'باقاتنا وأسعارنا',
		'subtitle' => 'اختر الباقة المناسبة لاحتياجاتك',
	);

	$pricing_instances = get_option( 'widget_nasaq_pricing_widget', array() );
	$pricing_instances[] = $pricing_widget;
	$pricing_key = array_key_last( $pricing_instances );

	if ( ! isset( $sidebars_widgets['pricing_section'] ) ) {
		$sidebars_widgets['pricing_section'] = array();
	}
	$sidebars_widgets['pricing_section'][] = 'nasaq_pricing_widget-' . $pricing_key;

	update_option( 'widget_nasaq_pricing_widget', $pricing_instances );

	// Contact Widget
	$contact_widget = array(
		'title'     => 'تواصل معنا الآن',
		'subtitle'  => 'نحن هنا للإجابة على جميع استفساراتك',
		'shortcode' => '',
	);

	$contact_instances = get_option( 'widget_nasaq_contact_widget', array() );
	$contact_instances[] = $contact_widget;
	$contact_key = array_key_last( $contact_instances );

	if ( ! isset( $sidebars_widgets['contact_section'] ) ) {
		$sidebars_widgets['contact_section'] = array();
	}
	$sidebars_widgets['contact_section'][] = 'nasaq_contact_widget-' . $contact_key;

	update_option( 'widget_nasaq_contact_widget', $contact_instances );

	// Update sidebars
	update_option( 'sidebars_widgets', $sidebars_widgets );
}

/**
 * Remove Demo Content
 */
function nasaq_remove_demo_content() {
	// Remove demo pages
	$demo_pages = get_posts( array(
		'post_type'   => 'page',
		'post_status' => 'publish',
		'numberposts' => -1,
		'post_name__in' => array( 'home', 'about', 'services', 'contact' ),
	) );

	foreach ( $demo_pages as $page ) {
		wp_delete_post( $page->ID, true );
	}

	// Remove demo posts
	$demo_posts = get_posts( array(
		'post_type'   => 'post',
		'post_status' => 'publish',
		'numberposts' => 2,
	) );

	foreach ( $demo_posts as $post ) {
		wp_delete_post( $post->ID, true );
	}

	// Remove widgets
	$sidebars_widgets = get_option( 'sidebars_widgets', array() );
	$widget_areas = array( 'hero_section', 'services_section', 'portfolio_section', 'process_section', 'about_section', 'testimonials_section', 'pricing_section', 'contact_section' );

	foreach ( $widget_areas as $area ) {
		if ( isset( $sidebars_widgets[ $area ] ) ) {
			$sidebars_widgets[ $area ] = array();
		}
	}

	update_option( 'sidebars_widgets', $sidebars_widgets );

	// Remove menu
	$menu = wp_get_nav_menu_object( 'القائمة الرئيسية' );
	if ( $menu ) {
		wp_delete_nav_menu( $menu->term_id );
	}

	// Reset front page
	update_option( 'show_on_front', 'posts' );
	delete_option( 'page_on_front' );

	// Mark as not imported
	delete_option( 'nasaq_demo_imported' );

	return array(
		'success' => true,
		'message' => __( 'تم إزالة المحتوى التجريبي بنجاح!', 'nasaq' ),
	);
}
