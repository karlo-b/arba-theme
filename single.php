<?php
/**
 * The template for displaying all single posts and attachments.
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
				<?php if ( is_active_sidebar( 'main-ad' )  ) : ?>
                    <div class="main-ad">
                        <div class="site-wrap">
                            <div class="site-row">
								<?php dynamic_sidebar( 'main-ad' ); ?>
                            </div><!-- .site-row -->
                        </div><!-- .site-wrap -->
                    </div><!-- .main-ad -->
				<?php endif; ?>
				<div class="content__sidebar clearfix">
					<div id="content" class="content">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
						?>
							<div class="content__container clearfix">
								<?php
								// Get the content single.
								get_template_part( 'template-parts/content-single' );
								?>
							</div><!-- .content__container clearfix -->
						<?php
						// End the loop.
						endwhile;
						?>
					</div><!-- #content -->

					<?php get_sidebar(); ?>
				</div><!-- .content__sidebar -->
			</div><!-- .site-main -->
		</div><!-- .site-row -->
	</div><!-- .site-wrap -->
</main><!-- #main## -->

<?php get_footer(); ?>