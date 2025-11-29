<?php
/**
 * The Front Page Template
 *
 * @package Nasaq
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main front-page">

	<?php
	// Hero Section
	if ( is_active_sidebar( 'hero_section' ) ) :
		?>
		<section id="hero" class="section section-hero">
			<?php dynamic_sidebar( 'hero_section' ); ?>
		</section>
		<?php
	endif;

	// Services Section
	if ( is_active_sidebar( 'services_section' ) ) :
		?>
		<section id="services" class="section section-services">
			<?php dynamic_sidebar( 'services_section' ); ?>
		</section>
		<?php
	endif;

	// Portfolio Section
	if ( is_active_sidebar( 'portfolio_section' ) ) :
		?>
		<section id="portfolio" class="section section-portfolio">
			<?php dynamic_sidebar( 'portfolio_section' ); ?>
		</section>
		<?php
	endif;

	// Process Section
	if ( is_active_sidebar( 'process_section' ) ) :
		?>
		<section id="process" class="section section-process">
			<?php dynamic_sidebar( 'process_section' ); ?>
		</section>
		<?php
	endif;

	// About Section
	if ( is_active_sidebar( 'about_section' ) ) :
		?>
		<section id="about" class="section section-about">
			<?php dynamic_sidebar( 'about_section' ); ?>
		</section>
		<?php
	endif;

	// Testimonials Section
	if ( is_active_sidebar( 'testimonials_section' ) ) :
		?>
		<section id="testimonials" class="section section-testimonials">
			<?php dynamic_sidebar( 'testimonials_section' ); ?>
		</section>
		<?php
	endif;

	// Pricing Section
	if ( is_active_sidebar( 'pricing_section' ) ) :
		?>
		<section id="pricing" class="section section-pricing">
			<?php dynamic_sidebar( 'pricing_section' ); ?>
		</section>
		<?php
	endif;

	// Contact Section
	if ( is_active_sidebar( 'contact_section' ) ) :
		?>
		<section id="contact" class="section section-contact">
			<?php dynamic_sidebar( 'contact_section' ); ?>
		</section>
		<?php
	endif;
	?>

</main><!-- #primary -->

<?php
get_footer();
