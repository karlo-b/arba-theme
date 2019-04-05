<?php
/**
 * The template used for displaying the content.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
<div class="home-sticky-post">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ): ?>
			<div class="featured-image">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'arba-single-post', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
				</a>
			</div><!-- .featured-image -->
		<?php endif; ?>
		<div class="sticky-content <?php if ( !has_post_thumbnail()) echo 'no-featured-image'; ?>">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title" itemprop="name"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-description">
					<a class="read-more" href="<?php the_permalink(); ?>"><?php echo __('Read More &rarr;', 'arba'); ?></a>
			</div><!-- .entry-description -->
		</div><!-- .sticky-content -->
	</article><!-- #post -->
</div>