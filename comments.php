<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="entry-comments comments-area">
	<button id="comments__toggle" class="comments__toggle">
		<?php if ( have_comments() ): ?>
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'One Comment', 'comments title', 'arba' ));
				} else {
					printf(
						_nx(
							'%1$s Comment',
							'%1$s Comments',
							$comments_number,
							'comments title',
							'arba'
						),
						number_format_i18n( $comments_number )
					);
				}
			?>
		<?php else : ?>
			<?php esc_html_e( 'Leave a Comment', 'arba' ); ?>
		<?php endif ;?>
	</button>

	<div class="comments__container">
		<?php if ( have_comments() ): ?>
			<ol class="comment-list">
				<?php wp_list_comments( array(
					'type'       => 'comment',
	    			'style'      => 'ol',
	    			'short_ping' => true,
	    			'avatar_size'=> 60,
	    			) );
	   			?>

			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comments-nav" role="navigation">
				<div class="comments-previous"><?php previous_comments_link( esc_html__( '&larr; Older comments', 'arba' ) ); ?></div>

				<div class="comments-next"><?php next_comments_link( esc_html__( 'Newer comments &rarr;', 'arba' ) ); ?></div>
			</nav><!-- #comment-nav -->
			<?php endif; // Check for comment navigation. ?>

			<?php if ( ! comments_open() ) : ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'arba' ); ?></p>
			<?php endif; ?>
		<?php endif; // have_comments() ?>

		<?php comment_form(); ?>
	</div><!-- .comments__container -->
</div><!-- #comments -->

