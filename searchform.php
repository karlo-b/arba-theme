<?php
/**
 * The template for displaying the search form.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>

<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="hidden" id="post_type" name="post_type" value="post" />
	<input type="text" id="search" name="s" placeholder="<?php esc_attr_e('Search...', 'arba'); ?>"/>

	<button type="submit" id="button"><span class="icon-search"></span></button>
</form><!-- .search-form -->
