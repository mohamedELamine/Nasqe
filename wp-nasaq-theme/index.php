<?php
/**
 * Main Template File
 *
 * This file is a fallback template for block themes.
 * The actual content is handled through block templates in the templates directory.
 *
 * @package Nasaq
 * @since 1.0.0
 */

// Block themes don't require this file, but it's included for compatibility
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wp-site-blocks">
	<?php block_template_part( 'header' ); ?>

	<main class="wp-block-group">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				the_content();
			}
		}
		?>
	</main>

	<?php block_template_part( 'footer' ); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
