<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

get_header();
$sidebar = get_theme_mod( 'sidebar_type_select' );
?>

<div class="container">
	<div class="row align-stretch">
		<?php if ( 'sidebar_left' === $sidebar ) : ?>
			<div id="sidebar" class="col-sm-3">
				<?php get_sidebar(); ?>
			</div><!-- .col- -->
		<?php endif; ?>
		<div class="<?php echo 'sidebar_none' === $sidebar || false === $sidebar ? 'col-lg-12 col-sm-12' : 'col-sm-9'; ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="blog-post-container">
						<?php if ( is_home() && ! is_front_page() ) : ?>
							<header>
								<h1 class="page-title"><?php single_post_title(); ?></h1>
							</header>
						<?php endif; ?>
						<div class="blog-post-content <?php echo 'grid_view' === get_theme_mod( 'blog_layout_select' ) ? 'layout_grid_2' === get_theme_mod( 'blog_grid_selected' ) ? 'layout-grid-2' : 'layout-grid-3' : 'layout-list'; ?>">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();

							if ( 'list_view' === get_theme_mod( 'blog_layout_select' ) ) {
								get_template_part( 'views/blog/blog', 'list' );
							} elseif ( 'grid_view' === get_theme_mod( 'blog_layout_select' ) ) {
								get_template_part( 'views/blog/blog', 'grid' );
							} else {
								get_template_part( 'views/content', get_post_format() );
							}

						endwhile;
					else :
						get_template_part( 'views/content', 'none' );
					endif;
					?>
					</div><!--blog-post-content-->
					<div class="tutorstarter-pagination">
						<?php tutorstarter_post_pagination(); ?>
					</div>
				</div><!--blog-post-container-->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .col- -->
		<?php if ( 'sidebar_right' === $sidebar ) : ?>
			<div id="sidebar" class="col-sm-3">
				<?php get_sidebar(); ?>
			</div><!-- .col- -->
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
