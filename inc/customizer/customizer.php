<?php
/**
 * This file contains the settings for the WordPress Theme Customizer (backend)
 */

function arba_customizer( $wp_customize ) {
/*-----------------------------------------------------------------------------------*/
/*	Site Title & Tagline
/*-----------------------------------------------------------------------------------*/

$wp_customize->add_section( 'title_tagline',
	array(
		'title' => esc_html__('Site Identity', 'arba' ),
		'description' => '',
		'priority' => 1,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
	)
);


		/* Logo for SEO */
		$wp_customize->add_setting( 'arba_image_logo_seo_upload',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control(
				new WP_Customize_Image_Control( $wp_customize, 'arba_image_logo_seo_upload',
					array(
	            		'label' => esc_html__('Upload Logo for Schema.org (200x200)', 'arba' ),
	            		'description' => esc_html__('This logo will be used for Schema.org. The size is used to be 200x200.', 'arba' ),
	            		'section' => 'title_tagline',
	            		'settings' => 'arba_image_logo_seo_upload'
	    			)
				)
			);

		/* Facebook Link */
		$wp_customize->add_setting( 'arba_facebook_link',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control( 'arba_facebook_link',
	    		array(
	        		'label' => esc_html__('Facebook Link', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_facebook_link',
	        		'type' => 'url'
	    		)
			);

		/* Twitter Account */
		$wp_customize->add_setting( 'arba_twitter_account',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

			$wp_customize->add_control( 'arba_twitter_account',
	    		array(
	        		'label' => esc_html__('Twitter Account', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_twitter_account',
	        		'type' => 'url'
	    		)
			);

		/* Google Plus Link */
		$wp_customize->add_setting( 'arba_google_plus_link',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control( 'arba_google_plus_link',
	    		array(
	        		'label' => esc_html__('Google Plus Link', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_google_plus_link',
	        		'type' => 'url'
	    		)
			);

		/* Linkedin Link */
		$wp_customize->add_setting( 'arba_linkedin_link',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control( 'arba_linkedin_link',
	    		array(
	        		'label' => esc_html__('Linkedin Link', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_linkedin_link',
	        		'type' => 'url'
	    		)
			);

		/* Instagram Link */
		$wp_customize->add_setting( 'arba_instagram_link',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control( 'arba_instagram_link',
	    		array(
	        		'label' => esc_html__('Instagram Link', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_instagram_link',
	        		'type' => 'url'
	    		)
			);

		/* Pinterest Link */
		$wp_customize->add_setting( 'arba_pinterest_link',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control( 'arba_pinterest_link',
	    		array(
	        		'label' => esc_html__('Pinterest Link', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_pinterest_link',
	        		'type' => 'url'
	    		)
			);

		/* Youtube Link */
		$wp_customize->add_setting( 'arba_youtube_link',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control( 'arba_youtube_link',
	    		array(
	        		'label' => esc_html__('Youtube Link', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_youtube_link',
	        		'type' => 'url'
	    		)
			);

		/* RSS Feed Link */
		$wp_customize->add_setting( 'arba_rss_link',
			array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

			$wp_customize->add_control( 'arba_rss_link',
	    		array(
	        		'label' => esc_html__('RSS Feed Link', 'arba' ),
	        		'section' => 'title_tagline',
	        		'settings' => 'arba_rss_link',
	        		'type' => 'url'
	    		)
			);
/*-----------------------------------------------------------------------------------*/
/*	Colors
/*-----------------------------------------------------------------------------------*/

$wp_customize->add_panel( 'arba_colors',
	array(
		'title' => esc_html__('Colors', 'arba' ),
		'description' => '',
		'priority' => 3,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
	)
);

	/* Colors
	--------------------------------------------- */
	$wp_customize->add_section('arba_colors',
		array(
			'title' => esc_html__('Colors', 'arba' ),
			'priority' => 1
		)
	);

		/* Brand Color */
		$wp_customize->add_setting( 'arba_highlight_color',
			array(
				'default' => '#5ee0e6',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

			$wp_customize->add_control(
	    		new WP_Customize_Color_Control( $wp_customize, 'arba_highlight_color',
	        		array(
	            		'label' => esc_html__('Highlight Color', 'arba' ),
	            		'section' => 'arba_colors',
	            		'settings' => 'arba_highlight_color'
	       			)
	    		)
			);

		/* Brand Text Color */
		$wp_customize->add_setting( 'arba_logo_text_color',
			array(
				'default' => '#222',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

			$wp_customize->add_control(
	    		new WP_Customize_Color_Control( $wp_customize, 'arba_logo_text_color',
	        		array(
	            		'label' => esc_html__('Logo Text Color', 'arba' ),
	            		'section' => 'arba_colors',
	            		'settings' => 'arba_logo_text_color'
	       			)
	    		)
			);

		/* Link Color */
		$wp_customize->add_setting( 'arba_link_color',
			array(
				'default' => '#000',
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

			$wp_customize->add_control(
	    		new WP_Customize_Color_Control( $wp_customize, 'arba_link_color',
	        		array(
	            		'label' => esc_html__('Link Color', 'arba' ),
	            		'section' => 'arba_colors',
	            		'settings' => 'arba_link_color'
	       			)
	    		)
			);


/*-----------------------------------------------------------------------------------*/
/*	Single Post
/*-----------------------------------------------------------------------------------*/

$wp_customize->add_panel( 'arba_single_post',
	array(
		'title' => esc_html__('Single Post', 'arba' ),
		'description' => '',
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
	)
);

	/* Single Post.
	--------------------------------------------- */

	$wp_customize->add_section('arba_single_post',
		array(
			'title' => esc_html__('Single Post', 'arba' ),
			'priority' => 1
		)
	);

		/* Remove The Featured Image */
		$wp_customize->add_setting( 'arba_post_featured_image',
			array(
				'default' => false,
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'arba_sanitize_checkbox',
			)
		);

			$wp_customize->add_control( 'arba_post_featured_image',
	    		array(
	        		'label' => esc_html__('Remove The Featured Image.', 'arba' ),
					'section' => 'arba_single_post',
	        		'settings' => 'arba_post_featured_image',
	        		'type' => 'checkbox'
	    		)
			);

		/* Remove The Author Box */
		$wp_customize->add_setting( 'arba_author_box_remove',
			array(
				'default' => false,
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'arba_sanitize_checkbox',
			)
		);

			$wp_customize->add_control( 'arba_author_box_remove',
	    		array(
	        		'label' => esc_html__('Remove The Author Box.', 'arba' ),
	        		'section' => 'arba_single_post',
	        		'settings' => 'arba_author_box_remove',
	        		'type' => 'checkbox'
	    		)
			);

		/* Remove Recent Posts */
		$wp_customize->add_setting( 'arba_recent_posts_remove',
			array(
				'default' => false,
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'arba_sanitize_checkbox',
			)
		);

			$wp_customize->add_control( 'arba_recent_posts_remove',
	    		array(
	        		'label' => esc_html__('Remove Recent Posts.', 'arba' ),
	        		'section' => 'arba_single_post',
	        		'settings' => 'arba_recent_posts_remove',
	        		'type' => 'checkbox'
	    		)
			);

}
add_action('customize_register', 'arba_customizer');


/**
 * Sanitize.
 */

// Text, color, checkbox, select.
function arba_sanitize_checkbox( $checked ) {
	return ( ( !empty( $checked ) ) ? true : false );
}

/**
 * Customize preview.
 */

function arba_customize_preview_js() {
	wp_enqueue_script( 'arba-customize-preview', get_template_directory_uri() . '/inc/customizer/customize-preview.js', array( 'customize-preview' ), '100', true );
}
add_action( 'customize_preview_init', 'arba_customize_preview_js' );