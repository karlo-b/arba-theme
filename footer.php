<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
		<footer id="footer" class="footer">
			<div class="site-footer">
				<div class="site-wrap">
					<div class="site-row">
						<div class="footer-widgets clearfix">
							<div class="footer-widgets">
								<div class="widget-area one-third">
							      <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							      <?php dynamic_sidebar( 'footer-1' ); ?>
							      <?php endif; ?>
							    </div>
							    <!-- .widget-area -->

							    <div class="widget-area one-third">
							      <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
							      <?php dynamic_sidebar( 'footer-2' ); ?>
							      <?php endif; ?>
							    </div>
							    <!-- .widget-area -->

							    <div class="widget-area one-third last">
							      <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							      <?php dynamic_sidebar( 'footer-3' ); ?>
							      <?php endif; ?>
							    </div>
							    <!-- .widget-area -->
							</div>
						</div><!-- .footer-widgets -->
					</div><!-- .site-row -->
				</div><!-- .site-wrap -->
			</div><!-- .site-footer -->
		</footer><!-- #footer -->
		<div class="footer-copyright">
			<div class="site-wrap">
				<div class="site-row">
					<?php
					$copy_text = sprintf( __( '%2$s WordPress Theme by <a href="%1$s">XstreamThemes</a>.', 'arba' ), 'https://xstreamthemes.com/', wp_get_theme( get_template() ) );
					echo wp_kses_post( $copy_text );
					?>
				</div><!-- .site-row -->
			</div><!-- .site-wrap -->
		</div><!--.copyright -->
	</div><!-- #container -->
<?php wp_footer(); ?>
</body>

</html>