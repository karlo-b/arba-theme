<?php
/**
 * Writer functions and definitions
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
function arba_setup() {
	/*
	 * Make the theme available for translation.
	 * Translations can be added to the /languages/ directory.
	 *
	 */
	load_theme_textdomain( 'arba', get_template_directory() . '/languages' );

	/*
	 * Add title tag.
	 * @see https://codex.wordpress.org/Title_Tag
	 *
	 */
	add_theme_support( 'custom-logo' );

	/*
	 * Add title tag.
	 * @see https://codex.wordpress.org/Title_Tag
	 *
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Add feed links.
	 * @see http://codex.wordpress.org/Automatic_Feed_Links
	 *
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Load the live customizer.
	 *
	 */
	require get_template_directory() . '/inc/customizer/customizer.php';

	/*
	 * Add post thumbnail supports.
	 * @see https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 *
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'arba-archive-post', 340, 240, true );
	add_image_size( 'arba-single-post', 820, 680, true );

	/*
	 * Add menu supports.
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */

	register_nav_menus( array(
		'arba_primary_nav' => esc_html__( 'Primary Navigation', 'arba' ),
	) );

	/*
	 * Add HTML 5 support.
	 *
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );
	/*
	 * Load custom template tags.
	 *
	 */
	require get_template_directory() . '/inc/template-tags.php';
	/*
	 * Load Functions which enhance the theme by hooking into WordPress
	 *
	 */
	require get_template_directory() . '/inc/theme-functions.php';

}
add_action('after_setup_theme', 'arba_setup');

/**
 * Content width.
 *
 * @see https://codex.wordpress.org/Content_Width
 *
 * @since arba 1.0.0
 *
 */
if ( ! isset( $content_width ) ) $content_width = 689;

/**
 * Google fonts.
 *
 * @see https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
 *
 * @since arba 1.0.0
 *
 */
function arba_google_fonts_url() {
    $fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Google fonta: on or off', 'arba' ) ) {
		$fonts[] = 'Poppins:400,400i,700|Merriweather:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts & styles the front end.
 *
 * @see https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 *
 * @since arba 1.0.0
 *
 */
function arba_scripts() {
	if(!is_admin()) {
		// Load the jquery.
		wp_enqueue_script( 'jquery' );

		// Load the custom js.
		wp_register_script('arba-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'arba-custom' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load Google fonts, used in the main stylesheet.
		wp_enqueue_style( 'arba-google-fonts', arba_google_fonts_url(), array(), null );
		// Load FontAwesome.
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css' );
		// Load the main stylesheet.
		wp_enqueue_style( 'arba-style', get_stylesheet_uri() );
	}
}
add_action('wp_enqueue_scripts', 'arba_scripts');


/**
 * Enqueue scripts & styles on Back End.
 *
 * @see https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 *
 * @since arba 1.0.0
 *
 */
function arba_enqueue_admin_styles( $hook ) {
 	if ( $hook == 'appearance_page_arba-welcome' ) {
 		wp_enqueue_style( 'arba-admin-styles', get_template_directory_uri() . '/css/admin.min.css' );
 	}
 }
 add_action( 'admin_enqueue_scripts', 'arba_enqueue_admin_styles' );

 // Customizer Styles
 function arba_enqueue_customizer_scripts() {
 	wp_enqueue_style( 'arba-customizer-styles', get_template_directory_uri() . '/css/customizer.min.css' );
 }
 add_action( 'customize_controls_enqueue_scripts', 'arba_enqueue_customizer_scripts' );

/**
 * Custom typography, styles and scripts.
 *
 * @since arba 1.0.0
 *
 */

function arba_custom_style_function() {
	echo arba_custom_style();
}
add_action('wp_head', 'arba_custom_style_function');

/**
 * This theme styles the visual editor to resemble the theme style.
 *
 * @see https://codex.wordpress.org/Editor_Style
 *
 * @since arba 1.0.0
 *
 */
function arba_editor_styles() {
    add_editor_style( 'inc/editor-style.css' );
}
add_action( 'after_setup_theme', 'arba_editor_styles' );
/**
 * Register five widget areas.
 *
 * @see https://codex.wordpress.org/Function_Reference/register_sidebar
 *
 * @since arba 1.0.0
 *
 */

function arba_widgets_init() {
	if(function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' 			=> __( 'Sidebar Widgets', 'arba' ),
			'id'            => 'main-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		));
	}
	if(function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' 			=> __( 'Footer Widget 1', 'arba' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		));
	}
	if(function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' 			=> __( 'Footer Widget 2', 'arba' ),
			'id'            => 'footer-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		));
	}
	if(function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' 			=> __( 'Footer Widget 3', 'arba' ),
			'id'            => 'footer-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		));
	}
	if(function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' 			=> __( 'Main Banner', 'arba' ),
			'id'            => 'main-ad',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '',
			'after_title' 	=> '',
		));
	}
}
add_action( 'widgets_init', 'arba_widgets_init' );


/**
 * Filter the except length to 30 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function arba_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
	        return $length;
	    }
	return 30;
}
add_filter( 'excerpt_length', 'arba_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function arba_excerpt_more( $more ) {
	if ( is_admin() ) {
	        return $more;
	    }
	return '...';
}
add_filter( 'excerpt_more', 'arba_excerpt_more' );


/**
 * Filter  a ‘sizes’ attribute value for an image.
 *
 */
add_filter('wp_calculate_image_sizes', 'arba_content_archive_thumbnail_image_sizes', 10, 5);
function arba_content_archive_thumbnail_image_sizes($sizes, $size, $image_src, $image_meta, $attachment_id)
{
    if (!is_single()) {
        $sizes = '(max-width: 768px) 680px, 560px';
    }
    return $sizes;
}