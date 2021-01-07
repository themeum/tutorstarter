<?php
/**
 * Header One
 */
?>

<header id="masthead" class="default">
	<div class="container">	
		<div class="tutor-nav">
			<div class="tutor-navbar-col tutor-navbar-brand">
				<div class="tutor-brand">
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
								'theme_location' => 'catmenu',
								'menu_class'     => 'menu-one',
							)
						);
					endif;
				?>
			</div>
			<div class="tutor-navbar-col tutor-navbar-menu">
				<div class="tutor-navbar-main-menu">
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
					<button class="navbar-toggler">
						<svg height="30px" id="nav-toggler-id" viewBox="0 0 32 28" width="32px" xml:space="preserve"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
					</button>
				</div>
				<div class="tutor-navbar-cart">
					<div class="tutor-cart">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 16C4.9 16 4.01 16.9 4.01 18C4.01 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM0 0V2H2L5.6 9.59L4.25 12.04C4.09 12.32 4 12.65 4 13C4 14.1 4.9 15 6 15H18V13H6.42C6.28 13 6.17 12.89 6.17 12.75L6.2 12.63L7.1 11H14.55C15.3 11 15.96 10.59 16.3 9.97L19.88 3.48C19.96 3.34 20 3.17 20 3C20 2.45 19.55 2 19 2H4.21L3.27 0H0ZM16 16C14.9 16 14.01 16.9 14.01 18C14.01 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z"
							/>
						</svg>
						<a class="tutor-cart-contents" data-toggle="modal" href="" title="View your shopping cart">
							<span class="count">
								1
							</span>
						</a>
					</div>
					<div class="tutor-login-link">
						<a href="">
							Log In
						</a>
					</div>
					<div class="tutor-get-started-btn">
						<?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>
							<a class="call-to-action" href="<?php echo esc_url( get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php echo esc_html( get_theme_mod( 'cta_text', 'BUY NOW' ) ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>