<?php
/**
 * Footer one 3 equal columns
 */
?>

<section class="footer-widgets">
	<div class="container">
		<div class="row justify-between align-top">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'qubelystarters-footer-widget1' ) ? dynamic_sidebar( 'qubelystarters-footer-widget1' ) : null; ?>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'qubelystarters-footer-widget2' ) ? dynamic_sidebar( 'qubelystarters-footer-widget2' ) : null; ?>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'qubelystarters-footer-widget3' ) ? dynamic_sidebar( 'qubelystarters-footer-widget3' ) : null; ?>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .footer-widgets -->
