<?php
/**
 * The template for displaying archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */

get_header(); ?>

<main id="main" class="main">
	<div class="site-wrap">
		<div class="site-row">
			<div class="site-main">
				<div class="content__sidebar clearfix">
					<div id="content" class="content">
						<?php
						// Yoast breadcrumb.
						if ( function_exists('yoast_breadcrumb') ) {
						  	yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
						} ?>

						<?php
						// If have posts.
						if ( have_posts() ) :
						?>
							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</header><!-- .page-header -->

							<div class="front-posts clearfix">
								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();
									?>
									<?php
									// Get the content.
									get_template_part( 'template-parts/content' );
									?>
								<?php
								// End the loop.
									endwhile;
								?>
							</div><!-- .front-posts -->

							<?php
							// Get the pagination.
							get_template_part('pagination');
							?>
						<?php else: ?>
							<?php
							// Get the content none.
							get_template_part( 'template-parts/content', 'none' );
							?>
						<?php
						// End if.
						endif;
						?>
					</div><!-- #content## -->

					<?php get_sidebar(); ?>
				</div><!-- .content__sidebar -->
			</div><!-- .site-main -->
		</div><!-- .site-row -->
	</div><!-- .site-wrap -->
</div><!-- #main## -->

<?php get_footer(); ?>