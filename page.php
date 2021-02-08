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
$page_meta = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
$sidebar   = ( ! empty( $page_meta ) ? $page_meta['sidebar_select'] : 'no-sidebar' );
?>

<div class="container">
	<div class="row align-stretch">
	<?php if ( 'left-sidebar' === $sidebar ) : ?>
		<div id="sidebar" class="col-sm-4">
			<?php dynamic_sidebar( 'tutorstarter-page-sidebar' ); ?>
		</div><!-- .col- -->
	<?php endif; ?>
	<div class="<?php echo 'no-sidebar' === $sidebar || '' === $sidebar ? 'col-xl-12 col-lg-12 col-sm-12' : 'col-sm-8'; ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'views/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;

				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .col- -->
	<?php if ( 'right-sidebar' === $sidebar ) : ?>
		<div id="sidebar" class="col-sm-4">
			<?php dynamic_sidebar( 'tutorstarter-page-sidebar' ); ?>
		</div><!-- .col- -->
	<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
