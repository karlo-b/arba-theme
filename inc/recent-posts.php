<?php
/**
 * The template used for displaying recent posts on single posts.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
<?php if ( get_option( 'arba_recent_posts_remove' ) == '' ): ?>
	<div class="entry-recent-posts">
		<h3 class="block-title clearfix">
			<?php esc_html_e( 'Latest Posts', 'arba' ); ?>
	</h3>

		<div class="recent-posts clearfix">
			<?php
			// Start the query.
			$entry_recent_posts = new WP_Query( array(
				'ignore_sticky_posts' => 1,
				'showposts' => 3
			) );
			?>
			    <?php
			    // If have posts.
			    if( $entry_recent_posts->have_posts() ) :
			    ?>
			   		<?php
			   		// Start the loop.
			   		while( $entry_recent_posts->have_posts() ): $entry_recent_posts->the_post();
			   		?>
			    		<?php
						// Get the content.
						get_template_part( 'template-parts/content-recent' );
						?>
					<?php
					// End the loop.
					endwhile;
					?>
				<?php
				// End if.
				endif;
				?>
			<?php
			// Restore original Post Data.
			wp_reset_postdata();
			?>
		</div><!-- .front-posts -->
	</div><!-- .entry-recent-posts -->
<?php endif; ?>