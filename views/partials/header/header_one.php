<?php
/**
 * Header One
 */
?>

<header id="masthead" class="default">
	<nav class="navbar-default bg-primary">
		<div class="navbar-brand">
		<?php if ( has_custom_logo() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php the_custom_logo(); ?>
			</a>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php svg( 'logo' ); ?>
			</a>
		<?php endif; ?>
		</div>
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'navbar-nav menu-one',
				)
			);
			endif;
		?>
	</nav>
	<button class="navbar-toggler">
		<svg height="30px" id="nav-toggler-id" viewBox="0 0 32 28" width="32px" xml:space="preserve"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
	</button>
	<?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>

		<a class="call-to-action" href="<?php echo esc_url( get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php echo esc_html( get_theme_mod( 'cta_text', 'BUY NOW' ) ); ?></a>

	<?php endif; ?>
</header>
