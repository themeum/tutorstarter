<?php
/**
 * Header default
 */
?>

<header class="header-default">
    <!-- .navbar .navbar-center .navbar-right .has-search-field .full-width -->
    <nav class="navbar <?php echo tutorstarter_header_switcher(); ?> <?php echo 'navbar-right' === tutorstarter_header_switcher() ? 'has-search-field' : ''; ?>">
        <div class="navbar-brand">
            <?php tutorstarter_site_logo(); ?>
        </div>
        <!-- .has-search-field must use with .navbar-right -->
        <div class="search-field">
            <form>
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
            <?php if ( class_exists( 'woocommerce' ) ) : ?>
            <div class="utils-cart">
                <?php echo tutor_starter_header_cart(); ?>
            </div>
            <?php endif; ?>
            <?php if ( class_exists( '\TUTOR\Utils' ) && is_user_logged_in() ) : ?>
                <div class="tutor-header-profile-menu">
                    <div class="tutor-header-profile-photo">
                        <?php
                            if ( function_exists( 'tutor_utils' ) ){
                                echo tutor_utils()->get_tutor_avatar( get_current_user_id(), 'thumbnail' );
                            } else {
                                $get_avatar_url = get_avatar_url( get_current_user_id(), 'thumbnail' );
                                echo "<img alt='' src='$get_avatar_url' />";
                            }
                        ?>
                    </div><!-- .tutor-header-profile-photo -->
                    <ul>
                        <?php
                            if ( function_exists( 'tutor_utils' ) ) {
                                $dashboard_page_id = tutor_utils()->get_option( 'tutor_dashboard_page_id' );
                                $dashboard_pages = tutor_utils()->tutor_dashboard_pages();
        
                                foreach ( $dashboard_pages as $dashboard_key => $dashboard_page ) {
                                    $menu_title = $dashboard_page;
                                    $menu_link = tutils()->get_tutor_dashboard_page_permalink( $dashboard_key );
                                    $separator = false;
                                    if ( is_array( $dashboard_page ) ) {
                                        if ( ! current_user_can( tutor()->instructor_role ) ) continue;
                                        $menu_title = tutor_utils()->array_get( 'title', $dashboard_page );
                                        /**
                                         * Add new menu item property "url" for custom link
                                         */
                                        if ( isset( $dashboard_page['url'] ) ) {
                                            $menu_link = $dashboard_page['url'];
                                        }
                                        if ( isset( $dashboard_page['type'] ) && $dashboard_page['type'] === 'separator' ) {
                                            $separator = true;
                                        }
                                    }
                                    if ( $separator ) {
                                        echo '<li class="tutor-dashboard-menu-divider"></li>';
                                        if ( $menu_title ) {
                                            echo "<li class='tutor-dashboard-menu-divider-header'>$menu_title</li>";
                                        }
                                    } else {
                                        if ( $dashboard_key === 'index') $dashboard_key = '';
                                        echo "<li><a href='" . esc_url( $menu_link ) . "'>" . esc_html( $menu_title ) . " </a></li>";
                                    }
                                }
                            }
                        ?>
                    </ul>
                </div><!-- .tutor-header-profile-menu -->
            <?php endif; ?>
            <?php if ( ! is_user_logged_in() || is_customize_preview() ) : ?>
                <?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>
                    <div class="utils-btn"><a class="btn-getstarted" href="<?php echo esc_url( home_url() . get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php printf( esc_html__( '%s', 'tutorstarter' ), get_theme_mod( 'cta_text', 'Getting Started' ) ); ?></a></div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </nav>
</header>