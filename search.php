<?php
/**
 * The template for displaying search results pages.
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
								<h1 class="page-title"><?php printf( __( 'Search Results for: "%s"', 'arba' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
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
						<?php else : ?>
							<?php
							// Get the content none.
							get_template_part( 'template-parts/content-none' );
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
</main><!-- #main## -->

<?php get_footer(); ?>