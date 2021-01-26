<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="container">
	<div class="row">
		<?php if ( 'sidebar_left' === get_theme_mod( 'sidebar_type_single' ) ) : ?>
			<div id="sidebar" class="col-sm-3">
				<?php get_sidebar(); ?>
			</div><!-- .col- -->
		<?php endif; ?>
		<div class="<?php echo 'sidebar_none' === get_theme_mod( 'sidebar_type_single' ) ? 'col-lg-10 col-sm-10 m-auto' : 'col-sm-9'; ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'views/content', get_post_format() );

						// the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;

					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .col- -->
		<?php if ( 'sidebar_right' === get_theme_mod( 'sidebar_type_single' ) ) : ?>
			<div id="sidebar" class="col-sm-3">
				<?php get_sidebar(); ?>
			</div><!-- .col- -->
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
