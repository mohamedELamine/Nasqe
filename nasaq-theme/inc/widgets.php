<?php
/**
 * Widget Areas and Custom Widgets
 *
 * @package Nasaq
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Widget Areas
 */
function nasaq_widgets_init() {
	// Hero Section
	register_sidebar( array(
		'name'          => __( 'Hero Section', 'nasaq' ),
		'id'            => 'hero_section',
		'description'   => __( 'Widgets in this area will appear in the hero section on the front page.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="hero-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Services Section
	register_sidebar( array(
		'name'          => __( 'Services Section', 'nasaq' ),
		'id'            => 'services_section',
		'description'   => __( 'Widgets for services section.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="services-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );

	// Portfolio Section
	register_sidebar( array(
		'name'          => __( 'Portfolio Section', 'nasaq' ),
		'id'            => 'portfolio_section',
		'description'   => __( 'Widgets for portfolio/projects section.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="portfolio-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );

	// Process Section
	register_sidebar( array(
		'name'          => __( 'Process Section', 'nasaq' ),
		'id'            => 'process_section',
		'description'   => __( 'Widgets for process/workflow section.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="process-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );

	// About Section
	register_sidebar( array(
		'name'          => __( 'About Section', 'nasaq' ),
		'id'            => 'about_section',
		'description'   => __( 'Widgets for about us section.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="about-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );

	// Testimonials Section
	register_sidebar( array(
		'name'          => __( 'Testimonials Section', 'nasaq' ),
		'id'            => 'testimonials_section',
		'description'   => __( 'Widgets for client testimonials.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="testimonials-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );

	// Pricing Section
	register_sidebar( array(
		'name'          => __( 'Pricing Section', 'nasaq' ),
		'id'            => 'pricing_section',
		'description'   => __( 'Widgets for pricing packages.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="pricing-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );

	// Contact Section
	register_sidebar( array(
		'name'          => __( 'Contact Section', 'nasaq' ),
		'id'            => 'contact_section',
		'description'   => __( 'Widgets for contact form and info.', 'nasaq' ),
		'before_widget' => '<div id="%1$s" class="contact-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nasaq_widgets_init' );

/**
 * Custom Widget: Hero Widget
 */
class Nasaq_Hero_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_hero_widget',
			__( 'Nasaq: Hero Section', 'nasaq' ),
			array( 'description' => __( 'Display hero section with title, description, and CTA buttons', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$cta1_text = ! empty( $instance['cta1_text'] ) ? $instance['cta1_text'] : '';
		$cta1_url = ! empty( $instance['cta1_url'] ) ? $instance['cta1_url'] : '';
		$cta2_text = ! empty( $instance['cta2_text'] ) ? $instance['cta2_text'] : '';
		$cta2_url = ! empty( $instance['cta2_url'] ) ? $instance['cta2_url'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		?>

		<div class="hero-content-wrapper">
			<div class="container">
				<div class="hero-grid">
					<div class="hero-text">
						<?php if ( $title ) : ?>
							<h1 class="hero-title"><?php echo wp_kses_post( $title ); ?></h1>
						<?php endif; ?>

						<?php if ( $subtitle ) : ?>
							<p class="hero-subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
						<?php endif; ?>

						<?php if ( $description ) : ?>
							<p class="hero-description"><?php echo wp_kses_post( $description ); ?></p>
						<?php endif; ?>

						<div class="hero-buttons">
							<?php if ( $cta1_text && $cta1_url ) : ?>
								<a href="<?php echo esc_url( $cta1_url ); ?>" class="btn btn-primary"><?php echo esc_html( $cta1_text ); ?></a>
							<?php endif; ?>

							<?php if ( $cta2_text && $cta2_url ) : ?>
								<a href="<?php echo esc_url( $cta2_url ); ?>" class="btn btn-secondary"><?php echo esc_html( $cta2_text ); ?></a>
							<?php endif; ?>
						</div>

						<div class="hero-stats">
							<div class="stat-item">
								<div class="stat-number">50+</div>
								<div class="stat-label">مشروع منجز</div>
							</div>
							<div class="stat-item">
								<div class="stat-number">98%</div>
								<div class="stat-label">رضا العملاء</div>
							</div>
							<div class="stat-item">
								<div class="stat-number">5+</div>
								<div class="stat-label">سنوات خبرة</div>
							</div>
						</div>
					</div>

					<?php if ( $image ) : ?>
						<div class="hero-image">
							<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$cta1_text = ! empty( $instance['cta1_text'] ) ? $instance['cta1_text'] : '';
		$cta1_url = ! empty( $instance['cta1_url'] ) ? $instance['cta1_url'] : '';
		$cta2_text = ! empty( $instance['cta2_text'] ) ? $instance['cta2_text'] : '';
		$cta2_url = ! empty( $instance['cta2_url'] ) ? $instance['cta2_url'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">العنوان الرئيسي:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">العنوان الفرعي:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">الوصف:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" rows="3"><?php echo esc_textarea( $description ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta1_text' ); ?>">نص الزر الأول:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'cta1_text' ); ?>" name="<?php echo $this->get_field_name( 'cta1_text' ); ?>" type="text" value="<?php echo esc_attr( $cta1_text ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta1_url' ); ?>">رابط الزر الأول:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'cta1_url' ); ?>" name="<?php echo $this->get_field_name( 'cta1_url' ); ?>" type="text" value="<?php echo esc_url( $cta1_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta2_text' ); ?>">نص الزر الثاني:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'cta2_text' ); ?>" name="<?php echo $this->get_field_name( 'cta2_text' ); ?>" type="text" value="<?php echo esc_attr( $cta2_text ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta2_url' ); ?>">رابط الزر الثاني:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'cta2_url' ); ?>" name="<?php echo $this->get_field_name( 'cta2_url' ); ?>" type="text" value="<?php echo esc_url( $cta2_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>">رابط الصورة:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['description'] = ! empty( $new_instance['description'] ) ? sanitize_textarea_field( $new_instance['description'] ) : '';
		$instance['cta1_text'] = ! empty( $new_instance['cta1_text'] ) ? sanitize_text_field( $new_instance['cta1_text'] ) : '';
		$instance['cta1_url'] = ! empty( $new_instance['cta1_url'] ) ? esc_url_raw( $new_instance['cta1_url'] ) : '';
		$instance['cta2_text'] = ! empty( $new_instance['cta2_text'] ) ? sanitize_text_field( $new_instance['cta2_text'] ) : '';
		$instance['cta2_url'] = ! empty( $new_instance['cta2_url'] ) ? esc_url_raw( $new_instance['cta2_url'] ) : '';
		$instance['image'] = ! empty( $new_instance['image'] ) ? esc_url_raw( $new_instance['image'] ) : '';
		return $instance;
	}
}

/**
 * Custom Widget: Services Widget
 */
class Nasaq_Services_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_services_widget',
			__( 'Nasaq: Services Section', 'nasaq' ),
			array( 'description' => __( 'Display services section', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'خدماتنا';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>

		<div class="services-content-wrapper">
			<div class="container">
				<div class="section-header">
					<span class="section-badge">خدماتنا</span>
					<?php if ( $title ) : ?>
						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $subtitle ) : ?>
						<p class="section-description"><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>
				</div>

				<div class="services-grid">
					<div class="service-card">
						<div class="service-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">🌐</div>
						<h3 class="service-title">تطوير مواقع ووردبريس</h3>
						<p class="service-description">مواقع شركات، متاجر، ومدونات مبنية على قوالب مخصّصة، سريعة وسهلة الإدارة.</p>
						<a href="#contact" class="service-link">اعرف المزيد ←</a>
					</div>

					<div class="service-card">
						<div class="service-icon" style="background: linear-gradient(135deg, #ff8c42 0%, #f97316 100%);">⚡</div>
						<h3 class="service-title">تصميم صفحات هبوط</h3>
						<p class="service-description">صفحات هبوط مدروسة، تركّز على تحويل الزائر إلى عميل، مع نسق بصري واضح ومسار مستخدم بسيط.</p>
						<a href="#contact" class="service-link">اعرف المزيد ←</a>
					</div>

					<div class="service-card">
						<div class="service-icon" style="background: linear-gradient(135deg, #2d6a4f 0%, #1a4d3e 100%);">📈</div>
						<h3 class="service-title">تحسين الأداء والـSEO</h3>
						<p class="service-description">تسريع الموقع، تحسين ظهوره في محركات البحث، وضبط البنية التقنية.</p>
						<a href="#contact" class="service-link">اعرف المزيد ←</a>
					</div>

					<div class="service-card">
						<div class="service-icon" style="background: linear-gradient(135deg, #a855f7 0%, #9333ea 100%);">💻</div>
						<h3 class="service-title">حلول برمجية مخصّصة</h3>
						<p class="service-description">ربط أنظمة، تطوير إضافات ووردبريس، ولوحات تحكم تناسب عملك.</p>
						<a href="#contact" class="service-link">اعرف المزيد ←</a>
					</div>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان القسم:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">وصف القسم:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" rows="3"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</p>
		<p><em>يمكنك تعديل الخدمات من خلال تحرير الكود في inc/widgets.php</em></p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_textarea_field( $new_instance['subtitle'] ) : '';
		return $instance;
	}
}

/**
 * Custom Widget: Portfolio Widget
 */
class Nasaq_Portfolio_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_portfolio_widget',
			__( 'Nasaq: Portfolio Section', 'nasaq' ),
			array( 'description' => __( 'Display portfolio/projects section', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'أعمالنا';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>

		<div class="portfolio-content-wrapper">
			<div class="container">
				<div class="section-header">
					<span class="section-badge">معرض الأعمال</span>
					<?php if ( $title ) : ?>
						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $subtitle ) : ?>
						<p class="section-description"><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>
				</div>

				<div class="portfolio-grid">
					<?php
					// عرض آخر 6 مشاريع من custom post type أو استخدام محتوى افتراضي
					$projects = array(
						array(
							'title' => 'موقع شركة تقنية',
							'category' => 'تطوير ويب',
							'image' => 'https://via.placeholder.com/400x300/1a4d3e/ffffff?text=Project+1',
						),
						array(
							'title' => 'متجر إلكتروني',
							'category' => 'ووكوميرس',
							'image' => 'https://via.placeholder.com/400x300/ff8c42/ffffff?text=Project+2',
						),
						array(
							'title' => 'تطبيق ويب',
							'category' => 'تطوير تطبيقات',
							'image' => 'https://via.placeholder.com/400x300/2d6a4f/ffffff?text=Project+3',
						),
						array(
							'title' => 'موقع تعليمي',
							'category' => 'منصة تعليمية',
							'image' => 'https://via.placeholder.com/400x300/3b82f6/ffffff?text=Project+4',
						),
						array(
							'title' => 'صفحة هبوط',
							'category' => 'تسويق رقمي',
							'image' => 'https://via.placeholder.com/400x300/a855f7/ffffff?text=Project+5',
						),
						array(
							'title' => 'موقع مطعم',
							'category' => 'مواقع شركات',
							'image' => 'https://via.placeholder.com/400x300/f97316/ffffff?text=Project+6',
						),
					);

					foreach ( $projects as $project ) :
					?>
						<div class="portfolio-item">
							<div class="portfolio-image">
								<img src="<?php echo esc_url( $project['image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
								<div class="portfolio-overlay">
									<h3><?php echo esc_html( $project['title'] ); ?></h3>
									<p><?php echo esc_html( $project['category'] ); ?></p>
									<a href="#" class="portfolio-link">عرض المشروع</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان القسم:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">وصف القسم:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" rows="3"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</p>
		<p><em>يمكنك إضافة custom post type "portfolio" لإدارة المشاريع بشكل ديناميكي</em></p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_textarea_field( $new_instance['subtitle'] ) : '';
		return $instance;
	}
}

/**
 * Custom Widget: Process Widget
 */
class Nasaq_Process_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_process_widget',
			__( 'Nasaq: Process Section', 'nasaq' ),
			array( 'description' => __( 'Display work process/workflow section', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'كيف نعمل';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>

		<div class="process-content-wrapper">
			<div class="container">
				<div class="section-header">
					<span class="section-badge">سير العمل</span>
					<?php if ( $title ) : ?>
						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $subtitle ) : ?>
						<p class="section-description"><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>
				</div>

				<div class="process-steps">
					<div class="process-step">
						<div class="step-number">01</div>
						<div class="step-content">
							<h3 class="step-title">التخطيط والتحليل</h3>
							<p class="step-description">نبدأ بفهم احتياجاتك وأهدافك، ونضع خطة واضحة للمشروع مع تحديد المتطلبات والجدول الزمني.</p>
						</div>
					</div>

					<div class="process-step">
						<div class="step-number">02</div>
						<div class="step-content">
							<h3 class="step-title">التصميم والنماذج</h3>
							<p class="step-description">نصمم واجهات مستخدم جذابة وسهلة الاستخدام، ونعرضها عليك للمراجعة والموافقة.</p>
						</div>
					</div>

					<div class="process-step">
						<div class="step-number">03</div>
						<div class="step-content">
							<h3 class="step-title">التطوير والبرمجة</h3>
							<p class="step-description">نحول التصاميم إلى موقع فعّال باستخدام أحدث التقنيات، مع الالتزام بمعايير الجودة.</p>
						</div>
					</div>

					<div class="process-step">
						<div class="step-number">04</div>
						<div class="step-content">
							<h3 class="step-title">الاختبار والتسليم</h3>
							<p class="step-description">نختبر الموقع بدقة، نصلح أي مشاكل، ثم نسلّمك مشروعاً جاهزاً مع التدريب والدعم الفني.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان القسم:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">وصف القسم:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" rows="3"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_textarea_field( $new_instance['subtitle'] ) : '';
		return $instance;
	}
}

/**
 * Custom Widget: About Widget
 */
class Nasaq_About_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_about_widget',
			__( 'Nasaq: About Section', 'nasaq' ),
			array( 'description' => __( 'Display about us section', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'من نحن';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		?>

		<div class="about-content-wrapper">
			<div class="container">
				<div class="about-grid">
					<?php if ( $image ) : ?>
						<div class="about-image">
							<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
						</div>
					<?php endif; ?>

					<div class="about-text">
						<span class="section-badge">من نحن</span>
						<?php if ( $title ) : ?>
							<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
						<?php endif; ?>
						<?php if ( $subtitle ) : ?>
							<p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
						<?php endif; ?>
						<?php if ( $description ) : ?>
							<div class="about-description">
								<?php echo wpautop( wp_kses_post( $description ) ); ?>
							</div>
						<?php endif; ?>

						<div class="about-features">
							<div class="feature-item">
								<span class="feature-icon">✓</span>
								<span>فريق محترف ومتخصص</span>
							</div>
							<div class="feature-item">
								<span class="feature-icon">✓</span>
								<span>جودة عالية ومواعيد دقيقة</span>
							</div>
							<div class="feature-item">
								<span class="feature-icon">✓</span>
								<span>دعم فني متواصل</span>
							</div>
							<div class="feature-item">
								<span class="feature-icon">✓</span>
								<span>أسعار تنافسية</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان القسم:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">العنوان الفرعي:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">الوصف:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" rows="5"><?php echo esc_textarea( $description ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>">رابط الصورة:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_text_field( $new_instance['subtitle'] ) : '';
		$instance['description'] = ! empty( $new_instance['description'] ) ? wp_kses_post( $new_instance['description'] ) : '';
		$instance['image'] = ! empty( $new_instance['image'] ) ? esc_url_raw( $new_instance['image'] ) : '';
		return $instance;
	}
}

/**
 * Custom Widget: Testimonials Widget
 */
class Nasaq_Testimonials_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_testimonials_widget',
			__( 'Nasaq: Testimonials Section', 'nasaq' ),
			array( 'description' => __( 'Display client testimonials section', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'آراء عملائنا';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>

		<div class="testimonials-content-wrapper">
			<div class="container">
				<div class="section-header">
					<span class="section-badge">الشهادات</span>
					<?php if ( $title ) : ?>
						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $subtitle ) : ?>
						<p class="section-description"><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>
				</div>

				<div class="testimonials-grid">
					<div class="testimonial-card">
						<div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
						<p class="testimonial-text">"تجربة رائعة مع فريق نسق! أنجزوا مشروعنا في الوقت المحدد وبجودة عالية جداً. أنصح بشدة بالتعامل معهم."</p>
						<div class="testimonial-author">
							<img src="https://via.placeholder.com/60x60/1a4d3e/ffffff?text=A" alt="أحمد محمد" class="author-avatar">
							<div class="author-info">
								<h4 class="author-name">أحمد محمد</h4>
								<p class="author-position">مدير شركة تقنية</p>
							</div>
						</div>
					</div>

					<div class="testimonial-card">
						<div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
						<p class="testimonial-text">"احترافية عالية في التعامل والتنفيذ. الموقع الذي صمموه لنا فاق توقعاتنا وساهم في زيادة مبيعاتنا بشكل ملحوظ."</p>
						<div class="testimonial-author">
							<img src="https://via.placeholder.com/60x60/ff8c42/ffffff?text=S" alt="سارة علي" class="author-avatar">
							<div class="author-info">
								<h4 class="author-name">سارة علي</h4>
								<p class="author-position">صاحبة متجر إلكتروني</p>
							</div>
						</div>
					</div>

					<div class="testimonial-card">
						<div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
						<p class="testimonial-text">"فريق متعاون جداً ويفهم متطلبات العميل بسرعة. التطبيق الذي طوروه لنا يعمل بسلاسة ويخدم احتياجاتنا تماماً."</p>
						<div class="testimonial-author">
							<img src="https://via.placeholder.com/60x60/2d6a4f/ffffff?text=K" alt="خالد السعيد" class="author-avatar">
							<div class="author-info">
								<h4 class="author-name">خالد السعيد</h4>
								<p class="author-position">مدير عام</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان القسم:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">وصف القسم:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" rows="3"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</p>
		<p><em>يمكنك إضافة custom post type "testimonials" لإدارة الشهادات بشكل ديناميكي</em></p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_textarea_field( $new_instance['subtitle'] ) : '';
		return $instance;
	}
}

/**
 * Custom Widget: Pricing Widget
 */
class Nasaq_Pricing_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_pricing_widget',
			__( 'Nasaq: Pricing Section', 'nasaq' ),
			array( 'description' => __( 'Display pricing packages section', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'باقات الأسعار';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>

		<div class="pricing-content-wrapper">
			<div class="container">
				<div class="section-header">
					<span class="section-badge">الأسعار</span>
					<?php if ( $title ) : ?>
						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $subtitle ) : ?>
						<p class="section-description"><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>
				</div>

				<div class="pricing-grid">
					<div class="pricing-card">
						<div class="pricing-header">
							<h3 class="pricing-title">الباقة الأساسية</h3>
							<div class="pricing-price">
								<span class="price">1,500</span>
								<span class="currency">ر.س</span>
							</div>
							<p class="pricing-description">للمشاريع الصغيرة والمدونات</p>
						</div>
						<ul class="pricing-features">
							<li><span class="feature-icon">✓</span> تصميم مخصص</li>
							<li><span class="feature-icon">✓</span> حتى 5 صفحات</li>
							<li><span class="feature-icon">✓</span> تصميم متجاوب</li>
							<li><span class="feature-icon">✓</span> دعم فني شهر</li>
							<li><span class="feature-icon">✓</span> تحسين SEO أساسي</li>
						</ul>
						<a href="#contact" class="btn btn-outline">اطلب الباقة</a>
					</div>

					<div class="pricing-card featured">
						<div class="pricing-badge">الأكثر طلباً</div>
						<div class="pricing-header">
							<h3 class="pricing-title">الباقة الاحترافية</h3>
							<div class="pricing-price">
								<span class="price">3,500</span>
								<span class="currency">ر.س</span>
							</div>
							<p class="pricing-description">للشركات والأعمال المتوسطة</p>
						</div>
						<ul class="pricing-features">
							<li><span class="feature-icon">✓</span> تصميم احترافي متقدم</li>
							<li><span class="feature-icon">✓</span> حتى 15 صفحة</li>
							<li><span class="feature-icon">✓</span> تكامل مع الأنظمة</li>
							<li><span class="feature-icon">✓</span> دعم فني 3 أشهر</li>
							<li><span class="feature-icon">✓</span> تحسين SEO متقدم</li>
							<li><span class="feature-icon">✓</span> تحليلات وإحصائيات</li>
						</ul>
						<a href="#contact" class="btn btn-primary">اطلب الباقة</a>
					</div>

					<div class="pricing-card">
						<div class="pricing-header">
							<h3 class="pricing-title">الباقة المتقدمة</h3>
							<div class="pricing-price">
								<span class="price">حسب المشروع</span>
							</div>
							<p class="pricing-description">للمشاريع الكبيرة والمتاجر</p>
						</div>
						<ul class="pricing-features">
							<li><span class="feature-icon">✓</span> كل مميزات الباقة الاحترافية</li>
							<li><span class="feature-icon">✓</span> صفحات غير محدودة</li>
							<li><span class="feature-icon">✓</span> حلول برمجية مخصصة</li>
							<li><span class="feature-icon">✓</span> دعم فني سنة</li>
							<li><span class="feature-icon">✓</span> تدريب الفريق</li>
							<li><span class="feature-icon">✓</span> أولوية في التحديثات</li>
						</ul>
						<a href="#contact" class="btn btn-outline">تواصل معنا</a>
					</div>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان القسم:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">وصف القسم:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" rows="3"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</p>
		<p><em>يمكنك تعديل الباقات والأسعار من خلال تحرير الكود في inc/widgets.php</em></p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_textarea_field( $new_instance['subtitle'] ) : '';
		return $instance;
	}
}

/**
 * Custom Widget: Contact Widget
 */
class Nasaq_Contact_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nasaq_contact_widget',
			__( 'Nasaq: Contact Section', 'nasaq' ),
			array( 'description' => __( 'Display contact section with form', 'nasaq' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'تواصل معنا';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$shortcode = ! empty( $instance['shortcode'] ) ? $instance['shortcode'] : '';
		?>

		<div class="contact-content-wrapper">
			<div class="container">
				<div class="section-header">
					<span class="section-badge">اتصل بنا</span>
					<?php if ( $title ) : ?>
						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $subtitle ) : ?>
						<p class="section-description"><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>
				</div>

				<div class="contact-grid">
					<div class="contact-info">
						<div class="contact-item">
							<div class="contact-icon">📧</div>
							<div class="contact-details">
								<h4>البريد الإلكتروني</h4>
								<p><?php echo esc_html( get_theme_mod( 'nasaq_email', 'info@nasaq.dev' ) ); ?></p>
							</div>
						</div>

						<div class="contact-item">
							<div class="contact-icon">📱</div>
							<div class="contact-details">
								<h4>الهاتف</h4>
								<p><?php echo esc_html( get_theme_mod( 'nasaq_phone', '+966 50 123 4567' ) ); ?></p>
							</div>
						</div>

						<div class="contact-item">
							<div class="contact-icon">📍</div>
							<div class="contact-details">
								<h4>العنوان</h4>
								<p><?php echo esc_html( get_theme_mod( 'nasaq_address', 'الرياض، المملكة العربية السعودية' ) ); ?></p>
							</div>
						</div>

						<div class="contact-item">
							<div class="contact-icon">⏰</div>
							<div class="contact-details">
								<h4>ساعات العمل</h4>
								<p>الأحد - الخميس: 9 صباحاً - 5 مساءً</p>
							</div>
						</div>
					</div>

					<div class="contact-form-wrapper">
						<?php if ( $shortcode ) : ?>
							<?php echo do_shortcode( $shortcode ); ?>
						<?php else : ?>
							<form class="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
								<input type="hidden" name="action" value="nasaq_contact_form">
								<?php wp_nonce_field( 'nasaq_contact_form', 'nasaq_contact_nonce' ); ?>

								<div class="form-group">
									<label for="contact-name">الاسم *</label>
									<input type="text" id="contact-name" name="contact_name" required>
								</div>

								<div class="form-group">
									<label for="contact-email">البريد الإلكتروني *</label>
									<input type="email" id="contact-email" name="contact_email" required>
								</div>

								<div class="form-group">
									<label for="contact-phone">رقم الهاتف</label>
									<input type="tel" id="contact-phone" name="contact_phone">
								</div>

								<div class="form-group">
									<label for="contact-subject">الموضوع *</label>
									<input type="text" id="contact-subject" name="contact_subject" required>
								</div>

								<div class="form-group">
									<label for="contact-message">الرسالة *</label>
									<textarea id="contact-message" name="contact_message" rows="5" required></textarea>
								</div>

								<button type="submit" class="btn btn-primary">إرسال الرسالة</button>
							</form>
							<p class="form-note"><em>أو استخدم Contact Form 7 عبر إضافة الـ shortcode في إعدادات الودجت</em></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$shortcode = ! empty( $instance['shortcode'] ) ? $instance['shortcode'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان القسم:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">وصف القسم:</label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" rows="3"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'shortcode' ); ?>">Contact Form 7 Shortcode (اختياري):</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" value="<?php echo esc_attr( $shortcode ); ?>" placeholder="[contact-form-7 id='123']">
			<small>إذا تركته فارغاً، سيظهر نموذج افتراضي بسيط</small>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['subtitle'] = ! empty( $new_instance['subtitle'] ) ? sanitize_textarea_field( $new_instance['subtitle'] ) : '';
		$instance['shortcode'] = ! empty( $new_instance['shortcode'] ) ? sanitize_text_field( $new_instance['shortcode'] ) : '';
		return $instance;
	}
}

/**
 * Register Custom Widgets
 */
function nasaq_register_widgets() {
	register_widget( 'Nasaq_Hero_Widget' );
	register_widget( 'Nasaq_Services_Widget' );
	register_widget( 'Nasaq_Portfolio_Widget' );
	register_widget( 'Nasaq_Process_Widget' );
	register_widget( 'Nasaq_About_Widget' );
	register_widget( 'Nasaq_Testimonials_Widget' );
	register_widget( 'Nasaq_Pricing_Widget' );
	register_widget( 'Nasaq_Contact_Widget' );
}
add_action( 'widgets_init', 'nasaq_register_widgets' );
