<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<!-- Skip to Content Link for Accessibility -->
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'تخطى إلى المحتوى', 'nasaq' ); ?></a>

	<!-- Main Header -->
	<header id="site-header" class="nasaq-header" role="banner">
		<div class="container">
			<div class="header-content">

				<!-- Logo Area (Left in RTL) -->
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link" rel="home">
							<div class="logo-icon" aria-hidden="true">ن</div>
							<span class="site-title"><?php bloginfo( 'name' ); ?></span>
						</a>
						<?php
					}

					$nasaq_description = get_bloginfo( 'description', 'display' );
					if ( $nasaq_description || is_customize_preview() ) :
						?>
						<p class="site-description screen-reader-text"><?php echo $nasaq_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div>

				<!-- Navigation Menu (Center) -->
				<nav id="primary-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'القائمة الرئيسية', 'nasaq' ); ?>">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'nav-menu',
								'container'      => false,
								'fallback_cb'    => false,
								'depth'          => 2,
							)
						);
					}
					?>
				</nav>

				<!-- Header Widget Area (Right in RTL) -->
				<div class="header-widgets">
					<?php
					if ( is_active_sidebar( 'header_section' ) ) {
						dynamic_sidebar( 'header_section' );
					} else {
						// Default CTA if no widgets
						?>
						<a href="#contact" class="btn btn-primary header-cta">
							<?php esc_html_e( 'احصل على عرض سعر', 'nasaq' ); ?>
						</a>
						<?php
					}
					?>
				</div>

				<!-- Mobile Menu Toggle Button -->
				<button
					class="mobile-menu-toggle"
					aria-label="<?php esc_attr_e( 'فتح القائمة', 'nasaq' ); ?>"
					aria-expanded="false"
					aria-controls="mobile-menu-wrapper"
				>
					<span class="hamburger-icon">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</span>
					<span class="screen-reader-text"><?php esc_html_e( 'القائمة', 'nasaq' ); ?></span>
				</button>

			</div>
		</div>

		<!-- Mobile Menu -->
		<div id="mobile-menu-wrapper" class="mobile-menu-wrapper">
			<div class="mobile-menu-inner">
				<nav class="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e( 'القائمة المتحركة', 'nasaq' ); ?>">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'mobile-menu',
								'menu_class'     => 'mobile-nav-menu',
								'container'      => false,
								'fallback_cb'    => false,
								'depth'          => 2,
							)
						);
					}
					?>
				</nav>

				<!-- Mobile Widgets -->
				<div class="mobile-header-widgets">
					<?php
					if ( is_active_sidebar( 'header_section' ) ) {
						dynamic_sidebar( 'header_section' );
					}
					?>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content Area -->
	<div id="content" class="site-content">
