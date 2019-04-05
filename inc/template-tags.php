<?php
/**
 * Custom template tags for the theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */

if ( ! function_exists( 'arba_custom_style' ) ) :
/**
 * Custom style.
 *
 * @since arba 1.0.0
 */
function arba_custom_style() { ?>
	<style type="text/css">
		<?php if ( get_option( 'arba_highlight_color' ) != '' ):
		$highlight_color = get_option( 'arba_highlight_color' );?>
			 .hentry h1.entry-title:before,
			 .home-sticky-post h2.entry-title:before,
			 #sidebar .widget h4.widget-title::after,
			 .btn:hover{
			 	background:<?php echo esc_attr( $highlight_color ); ?>;
			 }
			 a:hover, .hentry .read-more:hover, .home-sticky-post .entry-description a:hover,
			 .primary-nav ul li a:hover, .primary-nav ul li.menu-item-has-children ul li a:hover, .primary-nav ul li.page_item_has_children ul li a:hover{
			 	color:<?php echo esc_attr( $highlight_color ); ?>;
			 }
			 blockquote  {
			 	 border-left: solid 3px <?php echo esc_attr( $highlight_color ); ?>;
			 }
		<?php endif; ?>
		<?php if ( get_option( 'arba_logo_text_color' ) != '' ): ?>
			.logo a{
				color:<?php echo esc_attr( get_option( 'arba_logo_text_color' ) ); ?>;
			}
		<?php endif; ?>

		<?php if ( get_option( 'arba_link_color' ) != '' ): ?>
			a{
				color:<?php echo esc_attr( get_option( 'arba_link_color' ) ); ?>;
			}
		<?php endif; ?>



		<?php if ( get_option( 'arba_image_logo_height' ) != '' ): ?>
		.logo-wrapper{
			line-height: <?php echo esc_attr( get_option( 'arba_image_logo_height' ) ); ?>;
		}
		@media only screen and (min-width: 1024px) {
			.primary-nav div > ul > li {
				line-height: <?php echo esc_attr( get_option( 'arba_image_logo_height' ) ); ?>;
			}
		}
		.logo a {
			line-height: <?php echo esc_attr( get_option( 'arba_image_logo_height' ) ); ?>;
		}
		.logo img {
			max-height: <?php echo esc_attr( get_option( 'arba_image_logo_height' ) ); ?>;
		}
		<?php endif; ?>

	</style>
<?php
}
endif;

if ( ! function_exists( 'arba_entry_meta' ) ) :
/**
 * Entry meta.
 *
 * @since arba 1.0.0
 */
function arba_entry_meta() { ?>
	<p class="entry-meta">
		<span class="entry-author vcard author">
			<a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<span class="fn"><?php the_author(); ?></span>
			</a>
		</span>
		<span><?php esc_html_e( '&mdash;', 'arba' ); ?></span>
		<span class="entry-time"><time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></span>
	</p>
<?php
}
endif;

if ( ! function_exists( 'arba_single_entry_meta' ) ) :
/**
 * Single entry meta.
 *
 * @since arba 1.0.0
 */
function arba_single_entry_meta() { ?>
	<p class="entry-meta">
		<span class="author-image"><a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ), '60' ); ?></a></span>
		<span class="entry-author vcard author">
			<a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<span class="fn"><?php the_author(); ?></span>
			</a>
		</span>
		<span class="entry-time"><time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></span>
	</p>
<?php
}
endif;

if ( ! function_exists( 'arba_page_entry_meta' ) ) :
/**
 * Page entry meta.
 *
 * @since arba 1.0.0
 */
function arba_page_entry_meta() { ?>
	<p class="entry-meta hide">
		<span class="entry-author vcard author">
			<a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<span class="fn"><?php the_author(); ?></span>
			</a>
		</span>
		<span class="entry-time"><time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></span>
	</p>
<?php
}
endif;

if ( ! function_exists( 'arba_entry_navigation' ) ) :
/**
 * Entry navigation.
 *
 * @since arba 1.0.0
 */
function arba_entry_navigation() { ?>
	<div class="entry-navigation clearfix">
		<?php $previous_post = get_previous_post(); if ( !empty( $previous_post ) ) : ?>
			<div class="entry-navigation__prev">
				<h4><?php esc_html_e( 'Previous Article', 'arba' ); ?></h4>

				<a href="<?php echo get_permalink( $previous_post->ID ); ?>"><?php echo $previous_post->post_title; ?></a>
			</div>
		<?php endif; ?>

		<?php $next_post = get_next_post(); if ( !empty( $next_post ) ) : ?>
			<div class="entry-navigation__next">
				<h4><?php esc_html_e( 'Next Article', 'arba' ); ?></h4>

				<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
			</div>
		<?php endif; ?>
	</div><!-- .entry-navigation -->
<?php
}
endif;

if ( ! function_exists( 'arba_pagination' ) ) :
/**
 * Pagination.
 *
 * @since arba 1.0.0
 */
function arba_pagination() {
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_text'    => esc_html__('&larr;  Previous', 'arba'),
		'next_text'    => esc_html__('Next  &rarr;', 'arba')
	) );
}
endif;
