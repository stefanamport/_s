<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php /* Inhaltszeilen auflisten mit ACF Custom Fields */ ?>
				<?php if( have_rows('inhaltszeilen', get_the_id()) ): ?>

					<?php $subrowCounter = 0; ?>

					<?php while ( have_rows('inhaltszeilen', get_the_id()) ) : the_row(); ?>

						<div id="post-<?php the_ID(); ?>" class="container rowno<?php echo $subrowCounter ?> row-<?php echo get_row_layout(); ?>">
							<?php get_template_part( 'template-parts/row', get_row_layout() ); ?>
						</div>

						<?php $subrowCounter++; ?>
				
					<?php endwhile; ?>

				<?php else : ?>
					<?php /* Wenn keinee ACF Rows vorhanden sind, zum normalen Template Format wechseln */ ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php  endif; ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
