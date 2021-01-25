<?php
/**
 * Blog list layout
 *
 * @package Tutor_Starter
 */
?>

<article id="post-<?php the_ID(); ?>"<?php post_class( 'blog-post-item' ); ?>>
	<?php if ( true === get_theme_mod( 'featured_image_toggle', true ) ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php has_post_thumbnail() ? the_post_thumbnail( 'full' ) : null; ?>
		</a>
	</div>
	<?php endif; ?>
	<div class="post-data">
	<?php if ( true === get_theme_mod( 'blog_meta_toggle' ) ) : ?>
	<div class="entry-meta">
		<?php
			Tutor_Starter\Core\Tags::posted_on();
		?>
	</div><!-- .entry-meta -->
	<?php endif; ?>
		<?php
		if ( true === get_theme_mod( 'post_title_toggle', true ) ) :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<?php
		if ( true === get_theme_mod( 'post_excerpt_toggle', true ) ) :
			?>
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
		<?php
		if ( true === get_theme_mod( 'post_readmore_toggle', true ) ) :
			?>
		<a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'Continue Reading &rarr;', 'tutorstarter' ); ?></a>
		<?php endif; ?>
	</div>
</article>

