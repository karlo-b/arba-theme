<?php
/**
 * The template used for displaying page content.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>

<article <?php post_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">
	<?php get_template_part( 'inc/entry-schema' ); ?>

	<?php
	// Yoast breadcrumb.
	if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs hide">','</p>');
	} ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php arba_page_entry_meta(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>

		<?php
		// Link pages.
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'arba' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
		?>

		<?php the_tags('<footer class="entry-footer"><span class="entry-tags">' . esc_html__( 'In this article:', 'arba' ), ' ' ,'</span></footer>' ); ?>
	</div><!-- .entry-content -->
</article><!-- .hentry -->