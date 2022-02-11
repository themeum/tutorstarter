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
			<div class="row align-middle justify-between footer-bottom-container">
				<div class="site-info-wrapper">
					<div class="site-info">
						<?php //tutorstarter_footer_trans_logo(); ?>
						<svg width="118" viewBox="0 0 321.04 60" xmlns="http://www.w3.org/2000/svg"><g fill="#ffffff"><path d="m60 0h-60v60h48a9.25 9.25 0 0 1 -9.22-9.23v-36.69l7.22 8.1v7.07h8.31l5.69 6.31h-14v12.2a5.25 5.25 0 0 0 5.25 5.24h8.75v-17.43zm-33.66 35.5-5.74-6.35h8.92l5.74 6.35z"></path><path d="m135.29 33.19a9.45 9.45 0 0 0 -15.95-6.87l-.19.18c-.11.12-.21.23-.32.33l-.3.35-.28.36c-.17.22-.32.46-.48.71v-15.75l-6.66-4.2v43.77h6.73v-16.51a5.39 5.39 0 0 1 9.21-3.8.87.87 0 0 1 .12.14 2.7 2.7 0 0 1 .28.31l.25.33a3.61 3.61 0 0 1 .23.36c.07.12.13.25.19.38a2.76 2.76 0 0 1 .18.39c0 .13.09.26.13.4s.08.27.11.42a3.21 3.21 0 0 1 .07.43 3.4 3.4 0 0 1 0 .45v16.7h6.66v-17.84a1.62 1.62 0 0 0 0-.22z"></path><path d="m212.18 30.23a8.85 8.85 0 0 0 -8.57-6h-.25a9.85 9.85 0 0 0 -8.61 5.22 9.28 9.28 0 0 0 -8.3-5.12 9.48 9.48 0 0 0 -8.2 4.82v-4.45l-6.36-3.9v31.27h6.67v-16a4.48 4.48 0 0 1 .2-1.13 5.35 5.35 0 0 1 5.13-4.2 5.41 5.41 0 0 1 5.22 5.63v15.7h6.77v-14.56a10.67 10.67 0 0 1 .31-2.56 6.39 6.39 0 0 1 1-2.26 4.48 4.48 0 0 1 1.44-1.33 4.83 4.83 0 0 1 2.46-.61c2.87 0 5.22 2.56 5.33 5.74v15.58h6.66v-16.07a21.19 21.19 0 0 0 -.51-4.4 7.62 7.62 0 0 0 -.39-1.37z"></path><path d="m267.43 39.87a5.41 5.41 0 0 1 -5.4 5.39h-.37-.37l-.37-.07-.35-.08-.35-.12-.33-.13-.33-.16-.31-.17-.3-.2-.28-.21a3.23 3.23 0 0 1 -.27-.23l-.26-.25-.23-.27a3 3 0 0 1 -.22-.28l-.21-.3-.18-.3-.16-.32a3.45 3.45 0 0 1 -.14-.34l-.12-.34c0-.12-.07-.23-.1-.35s0-.24-.07-.37a2 2 0 0 1 0-.24 2.29 2.29 0 0 1 0-.25s0-12 0-12.06l-6.71-4.34v17.73a15.62 15.62 0 0 0 .51 3.69 8.25 8.25 0 0 0 1.64 3.28 7.7 7.7 0 0 0 3.08 2.36 11.24 11.24 0 0 0 4.51.82 8.67 8.67 0 0 0 5.26-1.43 10.62 10.62 0 0 0 2.87-3.49v5.23h6.25v-24l-6.66-4.2z"></path><path d="m320.52 31.57a6.24 6.24 0 0 0 -.41-1.34 8.84 8.84 0 0 0 -8.57-6h-.24a9.85 9.85 0 0 0 -8.61 5.22 9.3 9.3 0 0 0 -8.31-5.12 9.49 9.49 0 0 0 -8.2 4.82v-4.45l-6.35-3.9v31.27h6.64v-16.22a5.28 5.28 0 0 1 5.26-5.26h.07a5.27 5.27 0 0 1 5.25 5.26v16.22h6.71v-16.22a5.28 5.28 0 0 1 5.24-5.26h.07a5.27 5.27 0 0 1 5.25 5.26v.25.39 15.58h6.68v-16.07a15.7 15.7 0 0 0 -.48-4.43z"></path><path d="m99.22 18.24-6.66-4.3v9.94h-5.44v5.84h5.44v13a17.83 17.83 0 0 0 .41 4.1 6.94 6.94 0 0 0 1.33 3 5.83 5.83 0 0 0 2.7 1.74 15.07 15.07 0 0 0 4.31.51 21.66 21.66 0 0 0 2.66-.21 7.28 7.28 0 0 0 2.57-.71v-5.64c-6.09 2.21-7.28-.65-7.28-3.59v-12.2h7.28v-5.84h-7.32z"></path><path d="m163.28 27.67a12.17 12.17 0 0 0 -4-2.77 13.78 13.78 0 0 0 -5-.92 15.27 15.27 0 0 0 -5.63.92 13.56 13.56 0 0 0 -4.65 2.87 13.23 13.23 0 0 0 -3.07 4.41 14 14 0 0 0 -1.13 5.74 15.81 15.81 0 0 0 1.13 5.74 13.23 13.23 0 0 0 3.07 4.41 13.41 13.41 0 0 0 4.62 2.87 17.39 17.39 0 0 0 5.63.92 15.58 15.58 0 0 0 6.05-1.23 13.13 13.13 0 0 0 5.13-4l-4.72-3.69a11.84 11.84 0 0 1 -3 2.57 7.83 7.83 0 0 1 -4.2 1 7.13 7.13 0 0 1 -4.72-1.64 6.61 6.61 0 0 1 -2.36-4.61l20.3-.1v-1.83a21 21 0 0 0 -.92-6.15 15.17 15.17 0 0 0 -2.53-4.51zm-16.49 7.59a2.27 2.27 0 0 1 .06-.3c.87-3.43 3.5-5.94 6.59-5.94s5.53 2.32 6.48 5.57c.07.22.13.44.18.67z"></path><path d="m241.8 27.67a12.21 12.21 0 0 0 -4-2.77 13.73 13.73 0 0 0 -5-.92 15.32 15.32 0 0 0 -5.64.92 13.52 13.52 0 0 0 -4.61 2.87 13.26 13.26 0 0 0 -3.08 4.41 14 14 0 0 0 -1.12 5.74 16 16 0 0 0 1.12 5.74 13.46 13.46 0 0 0 7.69 7.28 17.45 17.45 0 0 0 5.64.92 15.58 15.58 0 0 0 6.05-1.23 13 13 0 0 0 5.12-4l-4.71-3.69a12 12 0 0 1 -3 2.57 7.86 7.86 0 0 1 -4.21 1 7.12 7.12 0 0 1 -4.71-1.64 6.53 6.53 0 0 1 -2.34-4.59l20.3-.1v-1.85a20.65 20.65 0 0 0 -.93-6.15 14.92 14.92 0 0 0 -2.57-4.51zm-16.49 7.59a2.27 2.27 0 0 1 .06-.3c.87-3.43 3.49-5.94 6.59-5.94s5.53 2.32 6.48 5.57a5.06 5.06 0 0 1 .17.67z"></path></g></svg>
					</div><!-- .site-info -->
					<div class="copyright-container">
						<span class="copyright"><?php echo wp_kses_post( $footer_text ); ?></span>
					</div><!-- .footer-copyright-->
				</div>
				<!-- .site-info-wrapper -->
				<?php if ( has_nav_menu( 'secondary' ) ) : ?>
				<div class="footer-menu">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'secondary',
								'menu_id'        => 'secondary-menu',
								'menu_class'     => 'row menu-footer-menu footer-six-variation',
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
