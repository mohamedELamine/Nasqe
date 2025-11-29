<?php
/**
 * The template for displaying all single posts
 *
 * @package Nasaq
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-area single-post">

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						<div class="entry-meta">
							<span class="posted-on">
								<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
									<?php echo esc_html( get_the_date() ); ?>
								</time>
							</span>
							<span class="byline">
								بواسطة <?php the_author(); ?>
							</span>
							<?php if ( has_category() ) : ?>
								<span class="cat-links">
									في <?php the_category( '، ' ); ?>
								</span>
							<?php endif; ?>
						</div>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<?php the_post_thumbnail( 'large' ); ?>
						</div>
					<?php endif; ?>

					<div class="entry-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
									'Continue reading<span class="screen-reader-text"> "%s"</span>',
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">صفحات: ',
								'after'  => '</div>',
							)
						);
						?>
					</div>

					<footer class="entry-footer">
						<?php
						if ( has_tag() ) :
							?>
							<div class="tags-links">
								الوسوم: <?php the_tags( '', '، ' ); ?>
							</div>
							<?php
						endif;

						if ( get_edit_post_link() ) :
							edit_post_link(
								sprintf(
									wp_kses(
										'تحرير <span class="screen-reader-text">%s</span>',
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									wp_kses_post( get_the_title() )
								),
								'<span class="edit-link">',
								'</span>'
							);
						endif;
						?>
					</footer>
				</article>

				<?php
				// Post navigation
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">المقال السابق</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">المقال التالي</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
			?>

		</div>
	</div>
</main>

<?php
get_footer();
