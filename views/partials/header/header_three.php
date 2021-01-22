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


<header id="masthead" class="default transparent-header">
    <div class="container-fluid">   
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
                </div><!-- .tutor-brand -->
                <?php
                if(taxonomy_exists('course-category')) :
                    $course_categories = get_terms( array(
                        'taxonomy'   => 'course-category',
                        'number'     => 8,
                        'hide_empty' => false
                    ) );
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
                    </ul><!-- ul#menu-footer-one -->
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
                        <svg height="30px" id="nav-toggler-id" viewBox="0 0 32 28" width="32px" xml:space="preserve">
                            <path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
                        </svg>
                    </button>
                </div><!-- .tutor-navbar-main-menu -->
                <div class="tutor-navbar-cart">

                    <div class="tutor-nav-search">
                        <?php if ( true === get_theme_mod( 'header_search_toggle', true ) ) : ?>
                            <button class="btn-search">
                                <svg class="nav-search-icon" height="18px" viewBox="0 0 18 18" width="18px">
                                    <path d="M12.5,11 L11.7,11 L11.4,10.7 C12.4,9.6 13,8.1 13,6.5 C13,2.9 10.1,0 6.5,0 C2.9,0 0,2.9 0,6.5 C0,10.1 2.9,13 6.5,13 C8.1,13 9.6,12.4 10.7,11.4 L11,11.7 L11,12.5 L16,17.5 L17.5,16 L12.5,11 L12.5,11 Z M6.5,11 C4,11 2,9 2,6.5 C2,4 4,2 6.5,2 C9,2 11,4 11,6.5 C11,9 9,11 6.5,11 L6.5,11 Z" id="Shape"/>
                                </svg>
                            </button>
                        <?php endif; ?>
                    </div>

                    <?php if(class_exists('woocommerce')) : ?>
                        <div class="tutor-cart">
                            <?php echo tutor_starter_header_cart(); ?>
                        </div>
                    <?php endif ?>
                    <?php if(!is_user_logged_in()) : ?>
                        <div class="tutor-login-link">
                            <a href="<?php echo get_template_directory_uri() . '/tutor-theme-sign-in'; ?>">
                                Log In
                            </a>
                        </div><!-- .tutor-login-link -->
                    <?php endif; ?>
                    <?php if( is_user_logged_in() ) : ?>
                        <div class="tutor-header-profile-menu">
                            <div class="tutor-header-profile-photo">
                                <?php
                                    if(function_exists('tutor_utils')){
                                        echo tutor_utils()->get_tutor_avatar(get_current_user_id(), 'thumbnail');
                                    }else{
                                        $get_avatar_url = get_avatar_url(get_current_user_id(), 'thumbnail');
                                        echo "<img alt='' src='$get_avatar_url' />";
                                    }
                                ?>
                            </div><!-- .tutor-header-profile-photo -->
                            <ul>
                                <?php
                                    if(function_exists('tutor_utils')) {
                                        $dashboard_page_id = tutor_utils()->get_option('tutor_dashboard_page_id');
                                        $dashboard_pages = tutor_utils()->tutor_dashboard_pages();
                
                                        foreach ($dashboard_pages as $dashboard_key => $dashboard_page){
                                            $menu_title = $dashboard_page;
                                            $menu_link = tutils()->get_tutor_dashboard_page_permalink($dashboard_key);
                                            $separator = false;
                                            if (is_array($dashboard_page)){
                                                if(!current_user_can(tutor()->instructor_role)) continue;
                                                $menu_title = tutor_utils()->array_get('title', $dashboard_page);
                                                /**
                                                 * Add new menu item property "url" for custom link
                                                 */
                                                if (isset($dashboard_page['url'])){
                                                    $menu_link = $dashboard_page['url'];
                                                }
                                                if (isset($dashboard_page['type']) && $dashboard_page['type'] == 'separator'){
                                                    $separator = true;
                                                }
                                            }
                                            if ($separator) {
                                                echo '<li class="tutor-dashboard-menu-divider"></li>';
                                                if ($menu_title) {
                                                    echo "<li class='tutor-dashboard-menu-divider-header'>{$menu_title}</li>";
                                                }
                                            } else {
                                                if ($dashboard_key === 'index') $dashboard_key = '';
                                                echo "<li><a href='".esc_url($menu_link)."'>".esc_html($menu_title)." </a> </li>";
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                        </div><!-- .tutor-header-profile-menu -->
                    <?php endif; ?>

                    <?php if(!is_user_logged_in()) : ?>
                    <div class="tutor-get-started-btn">
                        <?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>
                            <a class="call-to-action" href="<?php echo esc_url( get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php echo esc_html( get_theme_mod( 'cta_text', 'BUY NOW' ) ); ?></a>
                        <?php endif; ?>
                    </div><!-- .tutor-get-started-btn -->
                    <?php endif; ?>

                </div><!-- .tutor-navbar-cart -->
            </div><!-- .tutor-navbar-menu -->
        </div>
    </div>
</header>
