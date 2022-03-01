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
	$page_meta       = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
	$disable_footer  = ( ! empty( $page_meta['footer_toggle'] ) ? $page_meta['footer_toggle'] : false );
	$selected_footer = ( ! empty( $page_meta['footer_select'] ) ? $page_meta['footer_select'] : '' );
	$footer_style    = get_theme_mod( 'footer_type_select', 'footer_four' );
	$footer_text     = get_theme_mod( 'footer_bottom_text', '&copy; All rights reserved.' );

if ( false === $disable_footer ) :
	if ( ! empty( $selected_footer ) ) {
		get_template_part( 'views/partials/footer/' . $selected_footer );
	} else {
		if ( 'footer_six' !== $footer_style ) {
			get_template_part( 'views/partials/footer/' . $footer_style );
		}
	}
	?>
<?php if ( 'footer_six' !== $footer_style ) : ?>
<footer id="colophon" class="site-footer <?php echo 'footer_five' === $selected_footer || 'footer_five' === $footer_style ? 'footer-five ' : ''; ?>container-fluid pt-2 pb-2" role="contentinfo">
	<div class="container">
		<div class="row align-middle justify-between footer-bottom-container">
			<div class="site-info">
				<?php if ( true === get_theme_mod( 'footer_socialmedia_toggle', true ) ) : ?>
					<span id="footer-socialmedia">
						<?php is_active_sidebar( 'tutorstarter-footer-socialmedia' ) ? dynamic_sidebar( 'tutorstarter-footer-socialmedia' ) : null; ?>
					</span>
				<?php endif; ?>
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
			<div class="copyright-container">
				<span class="copyright"><?php echo wp_kses_post( $footer_text ); ?></span>
			</div><!-- .footer-menu-->
		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- #colophon -->
<?php endif; ?>
<?php endif; ?>
<?php if ( 'footer_six' === $footer_style ) : ?>
	<footer id="colophon" class="site-footer container-fluid pt-2 pb-2" role="contentinfo">
		<div class="container">
			<div class="row align-middle justify-between footer-bottom-container footer-six">
				<div class="site-info-wrapper">
					<div class="site-info">
						<?php tutorstarter_footer_trans_logo(); ?>
					</div><!-- .site-info -->
					<div class="copyright-container">
						<span class="copyright"><?php echo wp_kses_post( $footer_text ); ?></span>
					</div><!-- .footer-copyright-->
				</div>
				<!-- .site-info-wrapper -->
				<?php if ( has_nav_menu( 'secondary' ) ) : ?>
				<div class="footer-menu footer-six-menu">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'secondary',
								'menu_id'        => 'secondary-menu',
								'menu_class'     => 'row footer-six-variation',
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
