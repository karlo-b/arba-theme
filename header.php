<?php
/**
 * The template for displaying the header.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container" class="container">
		<header id="header" class="header">
			<div class="site-header">
				<div class="logo-wrapper">
					<div class="site-wrap">
						<div class="site-row">
							<div class="logo">
								<?php if ( has_custom_logo() ) {
									$custom_logo_id = get_theme_mod( 'custom_logo' );
									$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
									$alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
									?>
								    <?php if ( is_front_page() && is_home() ) { ?>
								        <h1>
								            <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								                <img class="desktop" src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr($alt); ?>">
								            </a>
								        </h1>
								    <?php } else {?>
								        <p>
											<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								                <img class="desktop" src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr($alt); ?>">
								            </a>
								        </p>
								<?php }} else { ?>
								    <?php if ( is_front_page() && is_home() ) { ?>
								        <h1>
								        <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								            <?php bloginfo( 'name' ); ?>
								        </a>
								        </h1>
								    <?php } else {?>
								            <p>
								            <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								                <?php bloginfo( 'name' ); ?>
								            </a>
								            </p>
								<?php }} ?>
							</div><!-- .logo -->
							<div class="header-icons">
								<?php get_template_part( 'inc/social-icons' ); ?>
							</div><!-- .header-icons -->
							<nav class="primary-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<?php wp_nav_menu( array(
									'theme_location' => 'arba_primary_nav',
									'echo' => true,
									'items_wrap' => '<ul>%3$s</ul>',
									'link_before' =>'<span>',
                                    'link_after'  =>'</span>'
								) ); ?>
							</nav><!-- .primary-nav -->
							<div class="mobile-search__menu-slide">
								<a href="javascript:;" id="mobile-search__button" class="mobile-search__button">
									<i class="fa fa-search"></i>
								</a><!-- .mobile-search__button -->

								<a href="javascript:;" id="menu-slide__button" class="menu-slide__button">
									<i class="fa fa-bars"></i>
								</a><!-- .menu-slide__button -->
							</div><!-- .mobile-icons -->
						</div><!-- .site-row -->
					</div><!-- .site-wrap -->
				</div><!-- .logo-wrapper -->
				<aside id="search-overlay" class="search-overlay">
					<div class="site-wrap">
						<div class="site-row relative">
							<?php get_search_form(); ?>
							<a href="javascript:;" id="search-overlay__close" class="search-overlay__close">
								<span>&#10005;</span>
							</a>
						</div><!-- .site-row -->
					</div><!-- .site-wrap -->
				</aside><!-- #search-overlay -->
			</div><!-- .site-header -->
		</header><!-- #header -->