<?php
/**
 * The template for displaying the pagination.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>

<div id="pagination" class="pagination <?php if ( get_option( 'arba_pagination_style' ) == 'infinite-scroll' || get_option( 'arba_pagination_style' ) == 'load-more-button' ): ?>hide<?php endif; ?>">
	<?php arba_pagination(); ?>
</div><!-- #pagination -->

<?php if ( get_option( 'arba_pagination_style' ) == 'infinite-scroll' || get_option( 'arba_pagination_style' ) == 'load-more-button' ): ?>
	<div class="pagination__loading-img clearfix"></div>

	<?php if ( get_option( 'arba_pagination_style' ) == 'load-more-button' ): ?>
		<?php if ($wp_query->max_num_pages > 1): ?>
			<div class="pagination__loading-button clearfix">
				<button id="load-more-trigger"><?php esc_html_e('Load More Posts', 'arba'); ?></button>
			</div><!-- .loading-button -->
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>