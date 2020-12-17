<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;
?>

</div><!-- #content -->

<?php
	$page_meta      = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
	$disable_footer = ( ! empty( $page_meta ) ? $page_meta['footer_toggle'] : false );

if ( false === $disable_footer ) :
	$footer_style = get_theme_mod( 'footer_type_select', 'footer_three' );
	get_template_part( 'views/partials/footer/' . $footer_style );
	?>

<footer id="colophon" class="site-footer container-fluid pt-2 pb-2" role="contentinfo">
	<div class="container">
		<div class="row align-middle justify-between">
			<div class="site-info">
			<?php
			$default     = esc_attr( get_template_directory_uri() . '/assets/dist/images/zeus.png' );
			$footer_logo = esc_url( get_theme_mod( 'footer_logo' ) );

			if ( true === get_theme_mod( 'footer_logo_toggle', true ) ) :
				?>
					<img id="logo-footer" src="<?php echo ( '' !== $footer_logo ? $footer_logo : $default ); ?>" alt="<?php echo esc_html( wp_get_document_title() ); ?>" />
				<?php endif; ?>

				<span class="copyright"><?php wp_kses( _e( get_theme_mod( 'footer_bottom_text', '&copy; All rights reserved.' ), 'tutorstarter' ), allowed_html() ); ?></span>
			</div><!-- .site-info -->
			<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<div class="footer-menu">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'secondary',
							'menu_id'        => 'secondary-menu',
							'menu_class'     => 'row menu-footer-menu',
						)
					);
				?>
			</div><!-- .footer-menu-->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
