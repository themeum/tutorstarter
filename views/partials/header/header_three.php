<?php
/**
 * Header Three
 */
?>

<!-- Search Popup -->
<div class="search-popup">
	<form>
		<div class="btn-search-close">x</div>
		<input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search" autocomplete="off" />
	</form>
</div>
<header id="transparent-header" class="transparent">
	<nav class="navbar bg-transparent">
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
		<button class="navbar-toggler">
			<svg height="30px" id="nav-toggler-id" viewBox="0 0 32 28" width="32px" xml:space="preserve"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
		</button>
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'navbar-nav',
				)
			);
			endif;
		?>
		<div class="navbar-utils">
			<?php if ( true === get_theme_mod( 'header_search_toggle', true ) ) : ?>
			<div class="utils-search">
				<button class="btn-search"><svg class="nav-search-icon" height="18px" viewBox="0 0 18 18" width="18px"><path d="M12.5,11 L11.7,11 L11.4,10.7 C12.4,9.6 13,8.1 13,6.5 C13,2.9 10.1,0 6.5,0 C2.9,0 0,2.9 0,6.5 C0,10.1 2.9,13 6.5,13 C8.1,13 9.6,12.4 10.7,11.4 L11,11.7 L11,12.5 L16,17.5 L17.5,16 L12.5,11 L12.5,11 Z M6.5,11 C4,11 2,9 2,6.5 C2,4 4,2 6.5,2 C9,2 11,4 11,6.5 C11,9 9,11 6.5,11 L6.5,11 Z" id="Shape"/></svg></button>
			</div>
			<?php endif; ?>
		</div>
	</nav>
</header>
