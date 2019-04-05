<?php
/**
 * The template used for displaying menu slide.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
<ul>
    <?php if ( get_option( 'arba_facebook_link' ) != '' ): ?>
        <li><a target="_blank" href="<?php echo esc_url( get_option( 'arba_facebook_link' ) ); ?>"><i class="fa fa-facebook"></i></a></li>
    <?php endif; ?>

    <?php if ( get_option( 'arba_twitter_account' ) != '' ): ?>
        <li><a target="_blank" href="https://twitter.com/<?php echo esc_attr( get_option( 'arba_twitter_account' ) ); ?>/"><i class="fa fa-twitter"></i></a></li>
    <?php endif; ?>

    <?php if ( get_option( 'arba_google_plus_link' ) != '' ): ?>
        <li><a target="_blank" href="<?php echo esc_url( get_option( 'arba_google_plus_link' ) ); ?>"><i class="fa fa-google-plus"></i></a></li>
    <?php endif; ?>

    <?php if ( get_option( 'arba_linkedin_link' ) != '' ): ?>
        <li><a target="_blank" href="<?php echo esc_url( get_option( 'arba_linkedin_link' ) ); ?>"><i class="fa fa-linkedin"></i></a></li>
    <?php endif; ?>

    <?php if ( get_option( 'arba_instagram_link' ) != '' ): ?>
        <li><a target="_blank" href="<?php echo esc_url( get_option( 'arba_instagram_link' ) ); ?>"><i class="fa fa-instagram"></i></a></li>
    <?php endif; ?>

    <?php if ( get_option( 'arba_pinterest_link' ) != '' ): ?>
        <li><a target="_blank" href="<?php echo esc_url( get_option( 'arba_pinterest_link' ) ); ?>"><i class="fa fa-pinterest-p"></i></a></li>
    <?php endif; ?>

    <?php if ( get_option( 'arba_youtube_link' ) != '' ): ?>
        <li><a target="_blank" href="<?php echo esc_url( get_option( 'arba_youtube_link' ) ); ?>"><i class="fa fa-youtube"></i></a></li>
    <?php endif; ?>

    <?php if ( get_option( 'arba_rss_link' ) != '' ): ?>
        <li><a target="_blank" href="<?php echo esc_url( get_option( 'arba_rss_link' ) ); ?>"><i class="fa fa-rss"></i></a></li>
    <?php endif; ?>
</ul>