<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-sm-12">
			<!-- #primary -->
			<div id="primary" class="content-area">
				<!-- #main -->
				<main id="main" class="site-main" role="main">
					<div class="tutorstarter-woocommerce">
						<?php woocommerce_content(); ?>
					</div>
				</main>
			</div>
		</div><!-- .col- -->
	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
