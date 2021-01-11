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
				if(taxonomy_exists('course-category')) :	
					$course_categories = get_terms( array(
						'taxonomy' => 'course-category',
						'hide_empty' => false
					) );
					// foreach( $course_categories as $course_cat ) :
					// 	echo "<pre>";
					// 	print_r(wp_get_attachment_image_src( $course_cat->term_id, 'full' )[0]);
					// 	print_r(get_term_link($course_cat, 'course-category'));
					// 	echo "</pre>";
					if( count($course_categories) > 1 ) :
				?>
					<ul id="menu-footer-one" class="menu-one">
						<li id="menu-item-52" class="icon menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-52">
							<a href=""> Browse </a>
							<ul class="sub-menu">
								<?php 
								foreach($course_categories as $course_cat) {
									$category_link = get_term_link($course_cat, 'course-category');
								?>
									<li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
										<a href="<?php echo esc_url($category_link); ?>">
											<?php echo $course_cat->name; ?>
										</a>
									</li>
								<?php }; ?>
							</ul>
						</li>
					</ul>
				<?php endif; endif; ?>
				<!-- <?php
					if ( has_nav_menu( 'primary' ) ) :
						wp_nav_menu(
							array(
								'theme_location' => 'catmenu',
								'menu_class'     => 'menu-one',
							)
						);
					endif;
				?> -->
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

					<?php if(class_exists('woocommerce')) : ?>
						<div class="tutor-cart">
							<?php echo tutor_starter_header_cart(); ?>
						</div>
					<?php endif ?>
					
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