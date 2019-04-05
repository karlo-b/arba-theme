<?php
/**
 * The template used for displaying entry schema.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
<meta itemscope itemprop="mainEntityOfPage"  content="<?php the_permalink(); ?>"/>
<meta itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"/>
<meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>"/>
<div class="hide" itemprop=author itemscope itemtype="https://schema.org/Person">
	<meta itemprop=name content="<?php the_author(); ?>">
</div>

<div class="hide" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
	<meta itemprop="name" content="<?php bloginfo('name'); ?>">
	<meta itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>">

	<?php if ( get_option( 'arba_image_logo_seo_upload' ) != '' ) : ?>
	  	<div class="hide" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
	      	<meta itemprop="url" content="<?php echo esc_url( get_option( 'arba_image_logo_seo_upload' ) ); ?>">
	    </div>
	<?php endif; ?>
</div>

<?php
  	$arba_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$arba_thumbnail_img = wp_get_attachment_image_src( $arba_thumbnail_id, 'full' );
	$arba_thumbnail_width = $arba_thumbnail_img[1];
	$arba_thumbnail_height = $arba_thumbnail_img[2];
?>
<div class="hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
	<img src="<?php the_post_thumbnail_url(); ?>"/>
	<meta itemprop="url" content="<?php the_post_thumbnail_url(); ?>">
	<meta itemprop="width" content="<?php echo esc_attr( $arba_thumbnail_width ); ?>">
	<meta itemprop="height" content="<?php echo esc_attr( $arba_thumbnail_height ); ?>">
</div>