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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'تخطى إلى المحتوى', 'nasaq' ); ?></a>

	<header id="masthead" class="site-header" role="banner" aria-label="<?php esc_attr_e( 'الترويسة الرئيسية', 'nasaq' ); ?>">
		<div class="header-wrapper">
			<div class="container">
				<div class="header-inner">
					<!-- Logo -->
					<div class="site-branding">
						<?php
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-text" aria-label="<?php esc_attr_e( 'الصفحة الرئيسية', 'nasaq' ); ?>">
								<div class="logo-icon" aria-hidden="true">ن</div>
								<span class="site-title"><?php bloginfo( 'name' ); ?></span>
							</a>
							<?php
						}
						?>
					</div>

					<!-- Desktop Navigation -->
					<nav id="site-navigation" class="main-navigation desktop-nav" role="navigation" aria-label="<?php esc_attr_e( 'القائمة الرئيسية', 'nasaq' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'container'      => false,
								'menu_class'     => 'nav-menu',
								'fallback_cb'    => '__return_false',
							)
						);
						?>
					</nav>

					<!-- CTA Button (Desktop) -->
					<div class="header-cta desktop-cta">
						<a href="#contact" class="btn btn-secondary"><?php esc_html_e( 'احصل على عرض سعر', 'nasaq' ); ?></a>
					</div>

					<!-- Mobile Menu Toggle -->
					<button class="mobile-menu-toggle" aria-label="<?php esc_attr_e( 'فتح القائمة', 'nasaq' ); ?>" aria-expanded="false" aria-controls="mobile-navigation">
						<span class="menu-icon" aria-hidden="true">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<span class="screen-reader-text"><?php esc_html_e( 'القائمة', 'nasaq' ); ?></span>
					</button>
				</div>

				<!-- Mobile Navigation -->
				<nav id="mobile-navigation" class="mobile-nav" role="navigation" aria-label="<?php esc_attr_e( 'القائمة المتحركة', 'nasaq' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'mobile-menu',
							'container'      => false,
							'menu_class'     => 'mobile-menu',
							'fallback_cb'    => '__return_false',
						)
					);
					?>
					<a href="#contact" class="btn btn-secondary mobile-cta"><?php esc_html_e( 'احصل على عرض سعر', 'nasaq' ); ?></a>
				</nav>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">
