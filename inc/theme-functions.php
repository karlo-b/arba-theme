<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Arba
 */

/**
* Greet new users & guide them to help page
*/
function arba_admin_notice(){
	if ( is_admin() ) {
		arba_greet_user();
	}
}
$intro_notice_dismissed = get_option( 'arba-intro-dismissed' );
if( empty( $intro_notice_dismissed ) ) {
	add_action('admin_notices', 'arba_admin_notice');
}

function arba_greet_user() {
	$help_url = esc_url( admin_url( 'themes.php?page=arba-theme-help' ) );
	echo '<div class="notice arba-intro-notice notice-success is-dismissible">';
	echo wp_kses_post( __( '<p style="margin-bottom: 5px;">Welcome! Thank you for choosing Arba. You can always reach out to us on the support forum if you need any help. If you liked our work, please support us by providing us a review with 5-star ratings.', 'arba' ) );
	echo "<p><a href='https://www.xstreamthemes.com/themes/arba/' class='button' target='_blank'>";
	esc_html_e( 'Documentation', 'arba' );
	echo "</a><a href='https://wordpress.org/support/theme/arba' class='button button-primary' target='_blank' style='margin-left: 10px;'>";
	esc_html_e( 'Support', 'arba' );
	echo "</a><a href='https://www.xstreamthemes.com/' class='' target='_blank' style='margin-left: 10px;'>";
	esc_html_e( 'Theme Customizations', 'arba' );
	echo "</a><a href='#' class='be-notice-dismiss' target='_blank' style='margin-left: 10px;float: right;'>";
	esc_html_e( 'Don\'t display this again!', 'arba' );
	echo '</a></p></div>';
}


// Enqueue dismiss script
function arba_admin_scripts() {
	wp_enqueue_script( 'arba-admin', get_template_directory_uri() . '/assets/js/arba-admin.js ' );
}
$intro_notice_dismissed = get_option( 'arba-intro-dismissed' );
if( empty( $intro_notice_dismissed ) ) {
	add_action( 'admin_enqueue_scripts' , 'arba_admin_scripts' );
}


// Update option if notice dismissed
add_action( 'wp_ajax_arba-intro-dismissed', 'arba_dismiss_intro_notice' );
function arba_dismiss_intro_notice() {
	update_option( 'arba-intro-dismissed', 1 );
}
