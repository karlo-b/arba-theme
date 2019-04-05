<?php
/**
 * The template for displaying the 404 page (not found).
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
						<article id="page" <?php post_class('hentry page no-results not-found'); ?> itemscope itemtype="http://schema.org/CreativeWork">
							<header class="entry-header">
								<h1 class="entry-title" itemprop="name"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'arba'); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'arba' ); ?></p>

								<?php get_search_form(); ?>

								<div class="page-content__archives">
									<h4><?php esc_html_e('Recent Posts', 'arba') ?></h4>

									<ul>
										<?php $recent_posts = new WP_Query(array('showposts' => 10)); ?>
											<?php if ($recent_posts->have_posts()) : ?>
												<?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
													<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
												<?php endwhile; ?>
											<?php endif; ?>
										<?php wp_reset_postdata(); ?>
									</ul>
								</div><!-- .page-content__archives -->
							</div><!-- .page-content -->
						</article><!-- #page -->
					</div><!-- #content## -->

					<?php get_sidebar(); ?>
				</div><!-- .content__sidebar -->
			</div><!-- .site-main -->
		</div><!-- .site-row -->
	</div><!-- .site-wrap -->
</main><!-- #main## -->

<?php get_footer(); ?>