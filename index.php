<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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
					<?php if(is_front_page()){
						if ( !is_paged() ) {
						$sticky = get_option( 'sticky_posts' );
						$args = array(
							'posts_per_page' => 1,
							'post__in'  => $sticky,
							'ignore_sticky_posts' => 1
						);
						$query = new WP_Query( $args );
						if ( isset($sticky[0]) ) {
							// Get the sticky content.
							get_template_part( 'template-parts/content-home-sticky' );
							}
						}
					} ?>
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
						if(!empty($paged)) {
						    $paged = $paged;
						}elseif(get_query_var( 'paged')) {
						    $paged = get_query_var('paged');
						}elseif(get_query_var( 'page')) {
						    $paged = get_query_var('page');
						}else {
						    $paged = 1;
						}
						$the_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ), 'paged' => $paged ) );
						// If have posts.
						if ( $the_query->have_posts() ) :
						?>
							<div class="front-posts clearfix">
								<?php
								// Start the loop.
								while ( $the_query->have_posts() ) : $the_query->the_post();
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
					</div><!-- #content -->

					<?php get_sidebar(); ?>
				</div><!-- .content__sidebar -->
			</div><!-- .site-main -->
		</div><!-- .site-row -->
	</div><!-- .site-wrap -->
</main><!-- #main## -->

<?php get_footer(); ?>