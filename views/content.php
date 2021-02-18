<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>"<?php post_class( ! is_single() ? "blog-post-default" : " " ); ?>>
	<header class="entry-header">
		<?php
		if ( true === get_theme_mod( 'post_title_toggle', true ) ) :
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<?php if ( true === get_theme_mod( 'blog_meta_toggle', true ) ) : ?>
				<div class="entry-meta">
					<?php
						Tutor_Starter\Core\Tags::posted_on();
					?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			<div class="mt-2 mb-2 post-thumbnail">
				<?php if ( true === get_theme_mod( 'featured_image_toggle', true ) ) : ?>
					<?php the_post_thumbnail( 'full' ); ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="post-data">
		<?php if ( ! is_single() ) : ?>
		<div class="entry-content excerpt">
			<?php
			if ( true === get_theme_mod( 'post_excerpt_toggle', true ) ) {
				the_excerpt();
			}
			?>
		</div><!-- .entry-content -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		<div class="post-tags">
		<?php Tutor_Starter\Core\Tags::tags_list(); ?>
		</div>
		<?php endif; ?>
		<?php
		if ( ! is_single() && true === get_theme_mod( 'post_readmore_toggle', true ) ) :
			?>
			<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading &rarr;', 'tutorstarter' ); ?></a>
		<?php endif; ?>
	</div>
</article><!--post--->
