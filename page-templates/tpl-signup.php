<?php
/**
 * Template Name: Sign Up
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Tutor_Starter
 */
if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
    die();
}

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

        <section class="tutor-theme-signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tutor-theme-signup-form-area">
                            <div class="tutor-theme-signup-form-area-row">
                                <div class="tutor-theme-signup-form-area-heading">
                                    <?php esc_html_e( 'Sign up', 'tutorstarter' ); ?>
                                </div>
                                <div class="tutor-theme-signup-form">
                                    <form action="" method="post" class="tutor-signup-form">
                                        <p class="signup-status"></p>
                                        <?php wp_nonce_field( 'tutor-starter-signup-nonce', 'signup-nonce' ); ?>
                                        <div class="form-grp signup-form-fullname">
                                            <label for="fullname"><?php esc_html_e( 'Full Name', 'tutorstarter' ); ?></label>
                                            <input name="fullname" id="fullname" type="text" placeholder="<?php esc_attr_e( 'John Doe', 'tutorstarter' ); ?>">
                                        </div>
                                        <div class="form-grp signup-form-email">
                                            <label for="email"><?php esc_html_e( 'Email', 'tutorstarter' ); ?></label>
                                            <input name="email" id="email" type="email" placeholder="<?php esc_attr_e( 'name@example.com', 'tutorstarter' ); ?>">
                                        </div>
                                        <div class="form-grp signup-form-password">
                                            <label for="password"><?php esc_html_e( 'Password', 'tutorstarter' ); ?></label>
                                            <input name="password" id="password" type="password" placeholder="<?php esc_attr_e( 'Type your password', 'tutorstarter' ); ?>">
                                        </div>
                                        <div class="form-grp signup-form-confirm-password">
                                            <label for="confirm-password"><?php esc_html_e( 'Confirm Password', 'tutorstarter' ); ?></label>
                                            <input name="confirm_password" id="confirm-password" type="password" placeholder="<?php esc_attr_e( 'Confirm your password', 'tutorstarter' ); ?>">
                                        </div>
                                        <div class="form-grp signup-form-terms-condition">
                                            <?php esc_html_e( 'By signing up you agree to the', 'tutorstarter' ); ?> <a href="<?php echo esc_url( home_url() . '/terms-conditions' ); ?>"><?php esc_html_e( 'Terms and Conditions', 'tutorstarter' ); ?></a> <?php esc_html_e( 'and the', 'tutorstarter' ); ?> <br> <a href="<?php echo esc_url( home_url() . '/privacy-policy' ); ?>">  <?php esc_html_e( 'Privacy Policy', 'tutorstarter' ); ?></a>
                                        </div>
                                        <?php do_action( 'tutorstarter_auth_recaptcha' ); ?>
                                        <button type="submit" class="btn btn-primary tutor-starter-btn"><?php esc_html_e( 'Sign up', 'tutorstarter' ); ?></button>
                                    </form><!-- form -->
                                </div><!-- tutor-theme-signup-form -->
                            </div><!-- tutor-theme-signup-form-area-row -->
                            <div class="already-have-account-link text-center mt-3">
                                <?php esc_html_e( 'Already have an account?', 'tutorstarter' ); ?> <a href="<?php echo esc_url( home_url() . '/sign-in/' ); ?>"><?php esc_html_e( 'Log in', 'tutorstarter' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<?php wp_footer(); ?>
	</body>
</html>
