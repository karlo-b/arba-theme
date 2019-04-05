<?php
/**
 * The template for displaying full-width page.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
/* Template Name: Full-Width Template */

get_header(); ?>

<main id="main" class="main">
	<div class="site-wrap">
		<div class="site-row">
			<div class="site-main">
				<div class="content__sidebar clearfix">
					<div id="content" class="content_full-width">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
						?>
							<?php
							// Get the content page.
							get_template_part( 'template-parts/content-page' );
							?>

							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
							?>
						<?php
						// End the loop.
						endwhile;
						?>
					</div><!-- #content -->
				</div><!-- .content__sidebar -->
			</div><!-- .site-main -->
		</div><!-- .site-row -->
	</div><!-- .site-wrap -->
</main><!-- #main## -->

<?php get_footer(); ?>