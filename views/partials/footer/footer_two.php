<?php
/**
 * Footer two 4 equal columns
 */
?>

<section class="footer-widgets">
	<div class="container">
		<div class="row justify-between align-top">
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'qubelystarters-footer-widget1' ) ? dynamic_sidebar( 'qubelystarters-footer-widget1' ) : null; ?>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'qubelystarters-footer-widget2' ) ? dynamic_sidebar( 'qubelystarters-footer-widget2' ) : null; ?>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'qubelystarters-footer-widget3' ) ? dynamic_sidebar( 'qubelystarters-footer-widget3' ) : null; ?>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'qubelystarters-footer-widget4' ) ? dynamic_sidebar( 'qubelystarters-footer-widget4' ) : null; ?>
			</div>	
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .footer-widgets -->
