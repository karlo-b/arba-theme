<?php
/**
 * The template used for displaying single posts.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>

<article <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
	<?php get_template_part( 'inc/entry-schema' ); ?>

	<?php
	// Yoast breadcrumb.
	if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs hide">','</p>');
	} ?>

<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		<p class="entry-category">
			<span><?php the_category( ', ' ); ?></span>
		</p><!-- .entry-category -->
	</header><!-- .entry-header -->

	<?php if ( get_option( 'arba_post_featured_image' ) == '' ) : ?>
			<?php if ( has_post_thumbnail() ): ?>
				<div class="featured-image">
					<?php the_post_thumbnail( 'arba-single-post', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
				</div><!-- .featured-image -->
			<?php endif; ?>
	<?php endif; ?>

	<div class="entry-blocks clearfix <?php if ( get_option( 'arba_post_meta_remove' ) == '' ) : echo "has-meta"; endif; ?>">
		<?php if ( get_option( 'arba_post_meta_remove' ) == '' ) : arba_single_entry_meta(); endif; ?>
		<div class="entry-content" itemprop="articleBody">
			<?php the_content(); ?>
			<?php
			// Link pages.
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages: ', 'arba' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->

	</div><!-- .entry-blocks -->

			<?php get_template_part( 'inc/author-box' ); ?>

			<?php arba_entry_navigation(); ?>

			<?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

			<?php
				get_template_part( 'inc/recent-posts' );
			?>
</article><!-- #post -->