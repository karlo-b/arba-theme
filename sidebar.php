<?php
/**
 * The template for the sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
<aside id="sidebar" class="sidebar widget-area" role="complementary">
		<?php if ( is_active_sidebar( 'main-sidebar' )  ) : ?>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		<?php endif; ?>

</aside><!-- #sidebar -->