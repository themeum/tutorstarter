<?php
/**
 * Footer two 4 equal columns
 */
?>
<?php
    $page_meta         = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
	$selected_footer   = ( ! empty( $page_meta['footer_select'] ) ? $page_meta['footer_select'] : '' );
	$footer_style      = get_theme_mod( 'footer_type_select' );
?>
<section class="footer-widgets">
	<div class="container">
		<div class="row justify-between align-top">
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php if ( 'footer_five' !== $selected_footer || 'footer_five' !== $footer_style ) : ?>
					<?php tutorstarter_footer_logo();
				endif; ?>
				<?php is_active_sidebar( 'tutorstarter-footer-widget1' ) ? dynamic_sidebar( 'tutorstarter-footer-widget1' ) : null; ?>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'tutorstarter-footer-widget2' ) ? dynamic_sidebar( 'tutorstarter-footer-widget2' ) : null; ?>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'tutorstarter-footer-widget3' ) ? dynamic_sidebar( 'tutorstarter-footer-widget3' ) : null; ?>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'tutorstarter-footer-widget4' ) ? dynamic_sidebar( 'tutorstarter-footer-widget4' ) : null; ?>
			</div>	
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .footer-widgets -->
