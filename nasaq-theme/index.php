<?php
/**
 * The main template file
 *
 * @package Nasaq
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-area">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header class="page-header">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				// Start the Loop
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;

							if ( 'post' === get_post_type() ) :
								?>
								<div class="entry-meta">
									<span class="posted-on"><?php echo get_the_date(); ?></span>
									<span class="byline"> بواسطة <?php the_author(); ?></span>
								</div>
								<?php
							endif;
							?>
						</header>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<?php the_post_thumbnail( 'large' ); ?>
							</div>
						<?php endif; ?>

						<div class="entry-content">
							<?php
							if ( is_singular() ) :
								the_content();
							else :
								the_excerpt();
								?>
								<a href="<?php the_permalink(); ?>" class="read-more">اقرأ المزيد ←</a>
								<?php
							endif;
							?>
						</div>
					</article>
					<?php
				endwhile;

				the_posts_navigation();

			else :
				?>
				<section class="no-results">
					<header class="page-header">
						<h1 class="page-title">لا توجد نتائج</h1>
					</header>
					<div class="page-content">
						<p>عذراً، لم نجد أي محتوى يطابق بحثك.</p>
					</div>
				</section>
				<?php
			endif;
			?>

		</div>
	</div>
</main>

<?php
get_footer();
