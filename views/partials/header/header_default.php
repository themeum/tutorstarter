<?php
/**
 * Header default
 */

use Tutor_Starter\Traits\Header_Components;

?>

<header class="header-default">
    <!-- .navbar .navbar-center .navbar-right .has-search-field .full-width -->
    <nav class="navbar <?php echo tutorstarter_header_switcher(); ?> <?php echo 'navbar-right' === tutorstarter_header_switcher() ? 'has-search-field' : ''; ?>">
        <div class="navbar-brand">
            <?php tutorstarter_site_logo(); ?>
        </div>
        <!-- .has-search-field must use with .navbar-right -->
        <div class="search-field">
            <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search...', 'tutorstarter' ); ?>" />
            </form>
        </div>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <button class="navbar-toggler">
                <div class="toggle-icon"><span></span></div>
            </button>
        <?php endif; ?>
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
            <?php if ( class_exists( 'WooCommerce' ) && 'header_fullwidth_center' !== get_theme_mod( 'header_type_select' ) ) : 
            global $woocommerce;
            $items = $woocommerce->cart->get_cart();
                ?>
                <?php if ( true === get_theme_mod( 'cart_btn_toggle', true ) ) :
                     if( $items): ?>
                    
                    <div class="utils-cart">
                <?php echo tutor_starter_header_cart();  
                 ?>
            </div>

                <?php
              

             endif; ?>
            
                
               <?php else:echo tutor_starter_header_cart(); endif;?>
              
           
            <?php endif; ?>
            <?php if ( defined( 'TDC_VERSION' ) && ! is_user_logged_in() ) : ?>
                <div class="tutor-landing-explore">
                    <span><?php esc_html_e( 'Want to Explore!', 'tutorstarter' ); ?></span>
                    <a class="tutor-version-new-btn" href="<?php echo esc_url( home_url() . '/login' ); ?>"><?php esc_html_e( 'Instant Login', 'tutorstarter' ); ?></a>
                </div>
            <?php endif; ?>
            <?php if ( class_exists( '\TUTOR\Utils' ) && is_user_logged_in() ) : ?>
                <div class="tutor-header-profile-menu-items">
                    <?php Header_Components::tutor_multi_column_dropdown(); ?>
                </div><!-- .tutor-header-profile-menu -->
            <?php endif; ?>
            <?php if ( ! is_user_logged_in() || is_customize_preview() ) : ?>
                <?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>
                    <div class="utils-btn"><a class="btn-getstarted" href="<?php echo esc_url( get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php printf( esc_html__( '%s', 'tutorstarter' ), get_theme_mod( 'cta_text', 'Getting Started' ) ); ?></a></div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </nav>
</header>