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
 * Register Custom Widgets
 */
function nasaq_register_widgets() {
	register_widget( 'Nasaq_Hero_Widget' );
	register_widget( 'Nasaq_Services_Widget' );
	// يمكن إضافة المزيد من الودجات المخصصة هنا
}
add_action( 'widgets_init', 'nasaq_register_widgets' );
