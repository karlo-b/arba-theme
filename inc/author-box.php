<?php
/**
 * The template used for displaying author bio
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
<?php if ( get_option( 'arba_author_box_remove' ) == '' ): ?>
	<section class="author-box">
		<div class="author-box__container clearfix">
			<div class="author-box__left">
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'email' ), '100' ); ?>
				</div><!-- .author-avatar -->
			</div><!-- .author-box__left -->

			<div class="author-box__right">
				<h2 class="vcard author author-title"><?php esc_html_e( 'Author: ' , 'arba' ); ?><span class="fn"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></span></a></h2>

				<p class="author-description">
					<?php the_author_meta( 'description' ); ?>
				</p><!-- .author-description -->
			</div><!-- .author-box__right -->
		</div><!-- .author-box__container -->
	</section><!-- .author-box -->
<?php endif; ?>
