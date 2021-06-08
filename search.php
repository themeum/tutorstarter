<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-sm-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<header>
							<h1 class="page-title">
								<?php
									printf(
										/* translators: %s: Search Term. */
										esc_html__( 'Search Results for: %s', 'tutorstarter' ),
										'<span>' . get_search_query() . '</span>'
									);
								?>
							</h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'views/content', 'search' );
						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'views/content', 'none' );

					endif;
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .col- -->
	</div><!-- .row -->
</div><!-- .container -->
<div style="padding-bottom:30px"></div>

<?php
get_footer();
