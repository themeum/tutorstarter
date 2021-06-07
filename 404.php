<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container">

	<div class="row">

		<div class="col-sm-10" style="padding:30px 0;">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tutorstarter' ); ?></h2>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .col- -->

	</div><!-- .row -->

</div><!-- .container -->

<?php
get_footer();
